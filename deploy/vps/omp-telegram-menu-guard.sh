#!/bin/bash
# Keep Office bot chat-menu label «Процеси» for Andrii.
# Preserves a living trycloudflare leader /board; otherwise durable /md-access/brokers.
# Does NOT send chat messages (avoids spam + deleteMessage keyboard wipe).
set -euo pipefail
ENV=/etc/omp-vps-cleanup.env
# shellcheck disable=SC1090
set -a; source "$ENV"; set +a
python3 - <<'PY'
import json, os, urllib.request
from urllib.parse import urlparse, parse_qs
bot=os.environ["TELEGRAM_BOT_TOKEN"]
chat=int((os.environ.get("TELEGRAM_CHAT_IDS") or "120352595").split(",")[0].strip())
# Prefer BOARD_READ_TOKEN from env; never hardcode board tokens in this script.
fallback=(os.environ.get("BOARD_READ_TOKEN") or os.environ.get("BOARD_TOKEN") or "").strip()

def get(url):
    with urllib.request.urlopen(url, timeout=20) as r: return json.load(r)
def post(url, payload):
    data=json.dumps(payload, ensure_ascii=False).encode()
    req=urllib.request.Request(url, data=data, headers={"Content-Type":"application/json; charset=utf-8"}, method="POST")
    with urllib.request.urlopen(req, timeout=20) as r: return json.load(r)

def page_answers(url: str) -> bool:
    try:
        req = urllib.request.Request(url, method="GET")
        with urllib.request.urlopen(req, timeout=12) as r:
            return 200 <= r.status < 300
    except Exception:
        return False

def is_quick_tunnel(url: str) -> bool:
    try:
        host = (urlparse(url).hostname or "")
    except Exception:
        return False
    return host.endswith(".trycloudflare.com")

menu=get(f"https://api.telegram.org/bot{bot}/getChatMenuButton?chat_id={chat}").get("result") or {}
url=((menu.get("web_app") or {}).get("url")) or ""
text=menu.get("text") or ""
mtype=menu.get("type") or ""
qs_t=(parse_qs(urlparse(url).query).get("t") or [""])[0]
t=(qs_t or fallback).strip()
if not t and not (is_quick_tunnel(url) and page_answers(url)):
    print("skip: no BOARD_READ_TOKEN / BOARD_TOKEN and menu URL has no t=")
    raise SystemExit(0)

brokers=f"https://omp.net.ua/md-access/brokers?t={t}" if t else ""

# Living leader tunnel: keep it (only fix label if needed).
if is_quick_tunnel(url) and page_answers(url):
    if mtype == "web_app" and text == "Процеси":
        print("ok tunnel", urlparse(url).hostname)
        raise SystemExit(0)
    r=post(f"https://api.telegram.org/bot{bot}/setChatMenuButton", {
      "chat_id": chat,
      "menu_button": {"type":"web_app","text":"Процеси","web_app":{"url":url}},
    })
    print("fixed label tunnel", r.get("ok"), urlparse(url).hostname)
    raise SystemExit(0)

# Dead tunnel / wrong host → durable brokers (scan fallback; same host as МДдок when no tunnel).
if not brokers:
    print("skip: cannot build brokers fallback")
    raise SystemExit(0)
need = (mtype != "web_app") or (text != "Процеси") or ("/md-access/brokers?" not in url)
if not need:
    print("ok brokers")
    raise SystemExit(0)
r=post(f"https://api.telegram.org/bot{bot}/setChatMenuButton", {
  "chat_id": chat,
  "menu_button": {"type":"web_app","text":"Процеси","web_app":{"url":brokers}},
})
print("fixed brokers", r.get("ok"), "was", text, mtype, (urlparse(url).hostname or "")[:40])
PY
