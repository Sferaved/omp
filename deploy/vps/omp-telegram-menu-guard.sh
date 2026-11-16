#!/bin/bash
# Keep Office bot menu «Процеси» on living broker-leader trycloudflare /board.
# Source of truth: md-access broker_board_source.page (leader RegisterBrokerPage).
# Durable fallback only when tunnel is dead: /md-access/brokers.
# Does NOT send chat messages.
set -euo pipefail
ENV=/etc/omp-vps-cleanup.env
# shellcheck disable=SC1090
set -a; source "$ENV"; set +a
python3 - <<'PY'
import json, os, subprocess, urllib.request, urllib.error
from urllib.parse import urlparse, parse_qs

bot = os.environ["TELEGRAM_BOT_TOKEN"]
chat = int((os.environ.get("TELEGRAM_CHAT_IDS") or "120352595").split(",")[0].strip())
fallback_t = (os.environ.get("BOARD_READ_TOKEN") or os.environ.get("BOARD_TOKEN") or "").strip()
brokers = f"https://omp.net.ua/md-access/brokers?t={fallback_t}" if fallback_t else ""

def get(url):
    with urllib.request.urlopen(url, timeout=20) as r:
        return json.load(r)

def post(url, payload):
    data = json.dumps(payload, ensure_ascii=False).encode()
    req = urllib.request.Request(
        url, data=data, headers={"Content-Type": "application/json; charset=utf-8"}, method="POST"
    )
    with urllib.request.urlopen(req, timeout=20) as r:
        return json.load(r)

def page_answers(url: str) -> bool:
    try:
        req = urllib.request.Request(url, headers={"User-Agent": "Mozilla/5.0 MDDocImportMenuGuard"})
        with urllib.request.urlopen(req, timeout=12) as r:
            body = r.read(500)
            if b"Cloudflare Tunnel error" in body or b"Error 1033" in body:
                return False
            return 200 <= r.status < 300
    except Exception:
        return False

def is_quick_tunnel(url: str) -> bool:
    try:
        host = urlparse(url).hostname or ""
    except Exception:
        return False
    return host.endswith(".trycloudflare.com")

def leader_page() -> str:
    """Living board URL published by broker leader into Access broker_board_source."""
    try:
        conn = subprocess.check_output(
            ["docker", "exec", "md-access-api", "printenv", "ConnectionStrings__Default"],
            text=True,
        ).strip()
        parts = {k.strip(): v.strip() for p in conn.split(";") if "=" in p for k, v in [p.split("=", 1)]}
        user, password, db = parts["Username"], parts["Password"], parts["Database"]
        page = subprocess.check_output(
            [
                "docker", "exec", "-e", f"PGPASSWORD={password}", "md-access-db",
                "psql", "-U", user, "-d", db, "-Atc",
                "SELECT page FROM broker_board_source WHERE id=1;",
            ],
            text=True,
        ).strip()
        return page
    except Exception as ex:
        print("leader_page error:", ex)
        return ""

menu = get(f"https://api.telegram.org/bot{bot}/getChatMenuButton?chat_id={chat}").get("result") or {}
current = ((menu.get("web_app") or {}).get("url")) or ""
text = menu.get("text") or ""
mtype = menu.get("type") or ""

leader = leader_page()
desired = ""
if leader and is_quick_tunnel(leader) and page_answers(leader):
    desired = leader
elif is_quick_tunnel(current) and page_answers(current):
    desired = current
elif brokers:
    desired = brokers
else:
    print("skip: no living tunnel and no BOARD_READ_TOKEN")
    raise SystemExit(0)

need = (mtype != "web_app") or (text != "Процеси") or (current.strip() != desired.strip())
if not need:
    kind = "tunnel" if is_quick_tunnel(desired) else "brokers-fallback"
    print("ok", kind, urlparse(desired).hostname)
    raise SystemExit(0)

r = post(
    f"https://api.telegram.org/bot{bot}/setChatMenuButton",
    {
        "chat_id": chat,
        "menu_button": {"type": "web_app", "text": "Процеси", "web_app": {"url": desired}},
    },
)
kind = "tunnel" if is_quick_tunnel(desired) else "brokers-fallback"
print("fixed", kind, r.get("ok"), "->", desired)
PY
