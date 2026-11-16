#!/usr/bin/env python3
"""Office bot webhook: /start restores menu «Процеси» + reply/inline board buttons.

Distinct boards (MDDocImport OmpBoardRelay / BlueProcessMenu):
- Menu «Процеси» → living trycloudflare /board if it answers; else /md-access/brokers
- «Процеси · OMP» → /md-access/board (митниця)
- «МДдок імпорт» → /md-access/brokers (зріз)

Always remove_keyboard before re-sending reply web_app (text-only leftovers break taps).
Also send InlineKeyboard url+web_app fallback so buttons open even if reply web_app fails.
"""
from __future__ import annotations
import json, os, time, urllib.request
from http.server import BaseHTTPRequestHandler, HTTPServer
from pathlib import Path
from urllib.parse import urlparse

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

def api(bot: str, method: str, payload: dict | None = None):
    url = f"https://api.telegram.org/bot{bot}/{method}"
    if payload is None:
        with urllib.request.urlopen(url, timeout=20) as r:
            return json.load(r)
    data = json.dumps(payload, ensure_ascii=False).encode("utf-8")
    req = urllib.request.Request(
        url, data=data, headers={"Content-Type": "application/json; charset=utf-8"}, method="POST"
    )
    with urllib.request.urlopen(req, timeout=20) as r:
        return json.load(r)

def page_answers(url: str) -> bool:
    try:
        req = urllib.request.Request(url, method="GET")
        with urllib.request.urlopen(req, timeout=12) as r:
            return 200 <= r.status < 300
    except Exception:
        return False

def is_quick_tunnel(url: str) -> bool:
    try:
        host = urlparse(url).hostname or ""
    except Exception:
        return False
    return host.endswith(".trycloudflare.com")

def menu_page(bot: str, chat_id: int, brokers: str) -> str:
    try:
        menu = (api(bot, f"getChatMenuButton?chat_id={chat_id}").get("result") or {})
    except Exception:
        menu = {}
    current = ((menu.get("web_app") or {}).get("url") or "").strip()
    if is_quick_tunnel(current) and page_answers(current):
        return current
    return brokers

def restore(chat_id: int, force: bool = False) -> str:
    env = load_env()
    bot = env["TELEGRAM_BOT_TOKEN"]
    board_t = (env.get("BOARD_READ_TOKEN") or "").strip()
    allowed = {c.strip() for c in env.get("TELEGRAM_CHAT_IDS", "").split(",") if c.strip()}
    if str(chat_id) not in allowed and str(chat_id) != "120352595":
        return "ignored"
    if not board_t:
        return "no-token"
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
    customs = f"https://omp.net.ua/md-access/board?t={board_t}"
    processes = menu_page(bot, chat_id, brokers)

    api(bot, "setChatMenuButton", {
        "chat_id": chat_id,
        "menu_button": {
            "type": "web_app",
            "text": "Процеси",
            "web_app": {"url": processes},
        },
    })

    # Drop broken / text-only keyboards before publishing web_app row.
    api(bot, "sendMessage", {
        "chat_id": chat_id,
        "text": "Оновлюю кнопки дошки…",
        "disable_notification": True,
        "reply_markup": {"remove_keyboard": True},
    })

    # Reply web_app — no style field (clients have rejected/ignored styled rows).
    api(bot, "sendMessage", {
        "chat_id": chat_id,
        "text": (
            "Кнопки дошки:\n"
            "• «Процеси · OMP» — митниця (/md-access/board)\n"
            "• «МДдок імпорт» — зріз брокерів (/md-access/brokers)\n"
            "Меню «Процеси» — скан брокерів.\n"
            "Якщо нижній ряд знову зник — /start (не чистіть історію)."
        ),
        "disable_notification": True,
        "reply_markup": {
            "keyboard": [[
                {"text": "Процеси · OMP", "web_app": {"url": customs}},
                {"text": "МДдок імпорт", "web_app": {"url": brokers}},
            ]],
            "resize_keyboard": True,
            "is_persistent": True,
        },
    })

    # Inline fallback — url buttons always open; web_app opens mini-app.
    inline = api(bot, "sendMessage", {
        "chat_id": chat_id,
        "text": "Запасні кнопки (якщо нижній ряд не відкриває):",
        "disable_notification": True,
        "reply_markup": {
            "inline_keyboard": [
                [
                    {"text": "Процеси · OMP", "url": customs},
                    {"text": "МДдок імпорт", "url": brokers},
                ],
                [
                    {"text": "OMP (app)", "web_app": {"url": customs}},
                    {"text": "МДдок (app)", "web_app": {"url": brokers}},
                ],
            ]
        },
    })
    # Persist only after Telegram accepted inline markup with both URLs.
    markup = ((inline.get("result") or {}).get("reply_markup") or {})
    rows = markup.get("inline_keyboard") or []
    urls = []
    for row in rows:
        for btn in row:
            if "url" in btn:
                urls.append(btn["url"])
            wa = btn.get("web_app") or {}
            if wa.get("url"):
                urls.append(wa["url"])
    if not any("/md-access/board?" in u for u in urls) or not any("/md-access/brokers?" in u for u in urls):
        raise RuntimeError("inline keyboard missing distinct board/brokers urls: " + json.dumps(urls))

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
