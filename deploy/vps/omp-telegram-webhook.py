#!/usr/bin/env python3
"""Office bot: /start and /buttons silently restore board ReplyKeyboard.

- Commands only (/start, /buttons, /keyboard) — never on arbitrary chat text.
- One quiet sendMessage with reply_markup (text "." ); no «Кнопки дошки».
- Dedupe stamp per chat+markup; /start force-resends keyboard once.
- Menu «Процеси»: living broker_board_source trycloudflare /board; else /md-access/brokers.
- No remove_keyboard, no inline spam, no loops.
"""
from __future__ import annotations

import json
import os
import subprocess
import time
import urllib.error
import urllib.request
from http.server import BaseHTTPRequestHandler, HTTPServer
from pathlib import Path
from urllib.parse import urlparse

ENV = Path("/etc/omp-vps-cleanup.env")
STATE_DIR = Path("/var/lib/omp-telegram-webhook")
STATE_DIR.mkdir(parents=True, exist_ok=True)
LAST = STATE_DIR / "last-command.json"
STAMP = STATE_DIR / "quiet-keyboard.stamp"


def load_env() -> dict[str, str]:
    out: dict[str, str] = {}
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
        req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0 OfficeBotMenu"})
        with urllib.request.urlopen(req, timeout=12) as r:
            body = r.read(500)
            if b"Cloudflare Tunnel error" in body or b"Error 1033" in body:
                return False
            return 200 <= r.status < 300
    except Exception:
        return False


def is_quick_tunnel(url: str) -> bool:
    try:
        return (urlparse(url).hostname or "").endswith(".trycloudflare.com")
    except Exception:
        return False


def leader_board_page() -> str:
    try:
        conn = subprocess.check_output(
            ["docker", "exec", "md-access-api", "printenv", "ConnectionStrings__Default"],
            text=True,
        ).strip()
        parts = {k.strip(): v.strip() for p in conn.split(";") if "=" in p for k, v in [p.split("=", 1)]}
        return subprocess.check_output(
            [
                "docker",
                "exec",
                "-e",
                f"PGPASSWORD={parts['Password']}",
                "md-access-db",
                "psql",
                "-U",
                parts["Username"],
                "-d",
                parts["Database"],
                "-Atc",
                "SELECT page FROM broker_board_source WHERE id=1;",
            ],
            text=True,
        ).strip()
    except Exception:
        return ""


def resolve_menu_url(brokers: str) -> str:
    leader = leader_board_page()
    if leader and is_quick_tunnel(leader) and page_answers(leader):
        return leader
    return brokers


def keyboard_markup(board: str, brokers: str) -> dict:
    return {
        "keyboard": [
            [
                {"text": "Процеси · OMP", "web_app": {"url": board}},
                {"text": "МДдок імпорт", "web_app": {"url": brokers}},
            ]
        ],
        "resize_keyboard": True,
        "is_persistent": True,
    }


def stamp_key(board: str, brokers: str) -> str:
    return f"{board}|{brokers}"


def load_json(path: Path) -> dict:
    if not path.exists():
        return {}
    try:
        return json.loads(path.read_text())
    except Exception:
        return {}


def restore(chat_id: int, force: bool) -> str:
    env = load_env()
    bot = env["TELEGRAM_BOT_TOKEN"]
    token = (env.get("BOARD_READ_TOKEN") or "").strip()
    allowed = {c.strip() for c in env.get("TELEGRAM_CHAT_IDS", "").split(",") if c.strip()}
    if str(chat_id) not in allowed and str(chat_id) != "120352595":
        return "ignored"
    if not token:
        return "no-token"

    # Rate-limit non-force (e.g. double-tap /buttons)
    state = load_json(LAST)
    key = str(chat_id)
    now = time.time()
    if not force and now - float(state.get(key, 0)) < 15:
        return "rate"

    brokers = f"https://omp.net.ua/md-access/brokers?t={token}"
    board = f"https://omp.net.ua/md-access/board?t={token}"
    processes = resolve_menu_url(brokers)

    # Menu only — no chat text
    api(
        bot,
        "setChatMenuButton",
        {
            "chat_id": chat_id,
            "menu_button": {
                "type": "web_app",
                "text": "Процеси",
                "web_app": {"url": processes},
            },
        },
    )

    marker = stamp_key(board, brokers)
    stamps = load_json(STAMP)
    if not force and stamps.get(key) == marker:
        state[key] = now
        LAST.write_text(json.dumps(state))
        return "keyboard-cached"

    # Silent keyboard attach (Telegram requires a message body)
    api(
        bot,
        "sendMessage",
        {
            "chat_id": chat_id,
            "text": ".",
            "disable_notification": True,
            "reply_markup": keyboard_markup(board, brokers),
        },
    )
    stamps[key] = marker
    STAMP.write_text(json.dumps(stamps))
    state[key] = now
    LAST.write_text(json.dumps(state))
    return "ok"


COMMANDS = {"/start", "/buttons", "/keyboard", "кнопки", "Кнопки"}


class H(BaseHTTPRequestHandler):
    def log_message(self, fmt, *args):
        return

    def do_POST(self):
        secret = Path("/etc/omp-telegram-webhook.secret").read_text().strip()
        if self.path.rstrip("/") != f"/telegram-office-hook/{secret}":
            self.send_response(404)
            self.end_headers()
            return
        length = int(self.headers.get("Content-Length") or 0)
        raw = self.rfile.read(length) if length else b"{}"
        try:
            update = json.loads(raw.decode("utf-8"))
        except Exception:
            self.send_response(200)
            self.end_headers()
            self.wfile.write(b"ok")
            return
        msg = update.get("message") or update.get("edited_message") or {}
        chat = (msg.get("chat") or {}).get("id")
        text = (msg.get("text") or "").strip()
        # Only explicit commands — never every message (avoids loops)
        cmd = text.split("@", 1)[0].split(" ", 1)[0] if text else ""
        if chat and (cmd in COMMANDS or text in COMMANDS):
            try:
                restore(int(chat), force=cmd == "/start" or text.startswith("/start"))
            except Exception as e:
                Path("/var/log/omp-telegram-webhook.err").write_text(str(e))
        self.send_response(200)
        self.end_headers()
        self.wfile.write(b"ok")

    def do_GET(self):
        self.send_response(200)
        self.end_headers()
        self.wfile.write(b"omp telegram webhook silent\n")


if __name__ == "__main__":
    HTTPServer(("127.0.0.1", 8791), H).serve_forever()
