#!/usr/bin/env python3
"""Office bot webhook: /start restores menu «Процеси» + reply keyboard. No deleteMessage."""
from __future__ import annotations
import json, os, time, urllib.request
from http.server import BaseHTTPRequestHandler, HTTPServer
from pathlib import Path
from urllib.parse import urlparse, parse_qs

ENV = Path("/etc/omp-vps-cleanup.env")
LAST = Path("/var/lib/omp-telegram-webhook/last-restore.json")
LAST.parent.mkdir(parents=True, exist_ok=True)

def load_env():
    out = {}
    for line in ENV.read_text().splitlines():
        if "=" in line and not line.strip().startswith("#"):
            k, v = line.split("=", 1)
            out[k.strip()] = v.strip()
    return out

def api(bot: str, method: str, payload: dict):
    url = f"https://api.telegram.org/bot{bot}/{method}"
    data = json.dumps(payload, ensure_ascii=False).encode("utf-8")
    req = urllib.request.Request(url, data=data, headers={"Content-Type": "application/json; charset=utf-8"}, method="POST")
    with urllib.request.urlopen(req, timeout=20) as r:
        return json.load(r)

def restore(chat_id: int, force: bool = False) -> str:
    env = load_env()
    bot = env["TELEGRAM_BOT_TOKEN"]
    board_t = env.get("BOARD_READ_TOKEN", "")
    allowed = {c.strip() for c in env.get("TELEGRAM_CHAT_IDS", "").split(",") if c.strip()}
    if str(chat_id) not in allowed and str(chat_id) != "120352595":
        return "ignored"
    # rate limit non-force restores
    state = {}
    if LAST.exists():
        try:
            state = json.loads(LAST.read_text())
        except Exception:
            state = {}
    key = str(chat_id)
    now = time.time()
    if not force and now - float(state.get(key, 0)) < 30:
        return "rate"
    brokers = f"https://omp.net.ua/md-access/brokers?t={board_t}"
    api(bot, "setChatMenuButton", {
        "chat_id": chat_id,
        "menu_button": {
            "type": "web_app",
            "text": "Процеси",
            "web_app": {"url": brokers},
        },
    })
    keyboard = {
        "keyboard": [[
            {"text": "Процеси · OMP", "style": "primary", "web_app": {"url": brokers}},
            {"text": "МДдок імпорт", "style": "success", "web_app": {"url": brokers}},
        ]],
        "resize_keyboard": True,
        "is_persistent": True,
    }
    text = (
        "Меню «Процеси» + кнопки «Процеси · OMP» / «МДдок імпорт».\n"
        "Якщо зникли знову — надішліть /start (не чистіть історію чату)."
    )
    api(bot, "sendMessage", {
        "chat_id": chat_id,
        "text": text,
        "disable_notification": True,
        "reply_markup": keyboard,
    })
    state[key] = now
    LAST.write_text(json.dumps(state))
    return "ok"

class H(BaseHTTPRequestHandler):
    def log_message(self, fmt, *args):
        return

    def do_POST(self):
        secret = Path("/etc/omp-telegram-webhook.secret").read_text().strip()
        if self.path.rstrip("/") != f"/telegram-office-hook/{secret}":
            self.send_response(404); self.end_headers(); return
        length = int(self.headers.get("Content-Length") or 0)
        raw = self.rfile.read(length) if length else b"{}"
        try:
            update = json.loads(raw.decode("utf-8"))
        except Exception:
            self.send_response(200); self.end_headers(); self.wfile.write(b"ok"); return
        msg = update.get("message") or update.get("edited_message") or {}
        chat = (msg.get("chat") or {}).get("id")
        text = (msg.get("text") or "").strip()
        if chat and (text.startswith("/start") or text in ("/keyboard", "/buttons", "кнопки", "Кнопки")):
            try:
                restore(int(chat), force=text.startswith("/start"))
            except Exception as e:
                Path("/var/log/omp-telegram-webhook.err").write_text(str(e))
        self.send_response(200); self.end_headers(); self.wfile.write(b"ok")

    def do_GET(self):
        self.send_response(200); self.end_headers(); self.wfile.write(b"omp telegram webhook\n")

if __name__ == "__main__":
    HTTPServer(("127.0.0.1", 8791), H).serve_forever()
