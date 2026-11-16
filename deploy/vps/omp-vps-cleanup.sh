#!/bin/bash
# Weekly OMP VPS self-cleanup + Office Telegram report.
set -uo pipefail
ENV_FILE=/etc/omp-vps-cleanup.env
LOG_DIR=/var/log/omp-vps-cleanup
mkdir -p "$LOG_DIR"
STAMP=$(date -u +%Y%m%dT%H%M%SZ)
LOG="$LOG_DIR/cleanup-$STAMP.log"
exec > >(tee -a "$LOG") 2>&1

echo "=== OMP VPS cleanup $STAMP ==="
hostname
date -u

if [[ -f "$ENV_FILE" ]]; then
  # shellcheck disable=SC1090
  set -a
  # shellcheck disable=SC1091
  source "$ENV_FILE"
  set +a
fi

# Compact disk snapshot: size used avail usepct avail_bytes
disk_snapshot() {
  df -PB1 / | awk 'NR==2 {printf "%s %s %s %s %s\n", $2, $3, $4, $5, $4}'
}

df_before_raw=$(df -h / | awk 'NR==1 || /\/$/')
disk_before=$(disk_snapshot)
echo "-- disk before --"
echo "$df_before_raw"
echo "disk_before_bytes: $disk_before"

docker_before=$(docker system df 2>/dev/null || echo "docker unavailable")
echo "-- docker before --"
echo "$docker_before"

echo "-- docker system prune --"
# Do NOT use --volumes by default: md-access-db postgres data is a named volume.
# Only prune dangling/unused images/containers/networks; leave volumes alone.
docker system prune -af 2>&1 | tail -n 40 || echo "docker prune failed"

echo "-- dangling volumes only --"
docker volume ls -qf dangling=true | while read -r vol; do
  [[ -z "$vol" ]] && continue
  # never remove known app volumes
  case "$vol" in
    *md-access*|*postgres*|*office*|*omp*) echo "skip volume $vol";;
    *) docker volume rm "$vol" 2>&1 || true;;
  esac
done

echo "-- apt autoclean/autoremove --"
apt-get autoclean -y 2>&1 | tail -n 20 || true
DEBIAN_FRONTEND=noninteractive apt-get autoremove -y 2>&1 | tail -n 20 || true

echo "-- journal vacuum (7d) --"
journalctl --vacuum-time=7d 2>&1 | tail -n 20 || true

echo "-- tmp cleanup (safe, >7d) --"
find /tmp -xdev -type f -mtime +7 -delete 2>/dev/null || true
find /var/tmp -xdev -type f -mtime +7 -delete 2>/dev/null || true

echo "-- mddocimport prune --"
/usr/local/bin/omp-mddocimport-prune.sh || true

df_after_raw=$(df -h / | awk 'NR==1 || /\/$/')
disk_after=$(disk_snapshot)
echo "-- disk after --"
echo "$df_after_raw"
echo "disk_after_bytes: $disk_after"
docker_after=$(docker system df 2>/dev/null || echo "docker unavailable")
echo "-- docker after --"
echo "$docker_after"

# Build a mobile-friendly HTML Telegram report (Europe/Kyiv time).
summary=$(
  DISK_BEFORE="$disk_before" \
  DISK_AFTER="$disk_after" \
  DOCKER_AFTER="$docker_after" \
  HOST_RAW="$(hostname)" \
  python3 - <<'PY'
import html
import os
from datetime import datetime
from zoneinfo import ZoneInfo

def human_bytes(n: int) -> str:
    n = float(n)
    for unit in ("B", "KB", "MB", "GB", "TB"):
        if abs(n) < 1024 or unit == "TB":
            if unit == "B":
                return f"{int(n)} {unit}"
            return f"{n:.1f} {unit}"
        n /= 1024
    return f"{n:.1f} TB"

def parse_disk(raw: str):
    # size used avail usepct avail_bytes
    parts = (raw or "").split()
    if len(parts) < 5:
        return None
    try:
        size, used, avail = int(parts[0]), int(parts[1]), int(parts[2])
        usepct = parts[3].rstrip("%")
        return {"size": size, "used": used, "avail": avail, "pct": usepct}
    except ValueError:
        return None

def parse_docker_df(text: str):
    """Parse `docker system df` table into {type: {total, active, size, reclaimable}}."""
    out = {}
    if not text or "unavailable" in text.lower():
        return out
    for line in text.splitlines():
        line = line.strip()
        if not line or line.upper().startswith("TYPE"):
            continue
        # Columns: TYPE TOTAL ACTIVE SIZE RECLAIMABLE
        # SIZE/RECLAIMABLE may be "3.352GB" or "0B (0%)"
        parts = line.split()
        if len(parts) < 4:
            continue
        kind = parts[0]
        if kind not in ("Images", "Containers", "Local", "Build"):
            continue
        if kind == "Local":
            # "Local Volumes 1 1 67.95MB 0B (0%)"
            label = "Volumes"
            total, active = parts[2], parts[3]
            size = parts[4] if len(parts) > 4 else "?"
            reclaim = " ".join(parts[5:]) if len(parts) > 5 else ""
        elif kind == "Build":
            # "Build Cache 0 0 0B 0B"
            label = "Cache"
            total, active = parts[2], parts[3]
            size = parts[4] if len(parts) > 4 else "?"
            reclaim = " ".join(parts[5:]) if len(parts) > 5 else ""
        else:
            label = kind
            total, active = parts[1], parts[2]
            size = parts[3] if len(parts) > 3 else "?"
            reclaim = " ".join(parts[4:]) if len(parts) > 4 else ""
        out[label] = {
            "total": total,
            "active": active,
            "size": size,
            "reclaim": reclaim.strip(),
        }
    return out

def friendly_host(raw: str) -> str:
    # Short label only — avoid bare domains (Telegram auto-linkifies them).
    return "OMP VPS"

def reclaim_is_useful(reclaim: str) -> bool:
    """Hide 0B and the misleading 'all active images = 100% reclaimable' noise."""
    reclaim = (reclaim or "").strip()
    if not reclaim or reclaim.startswith("0B"):
        return False
    # e.g. "4.664GB (100%)" after prune while everything is still in use
    if "(100%)" in reclaim.replace(" ", ""):
        return False
    return True

kyiv = ZoneInfo("Europe/Kyiv")
now = datetime.now(tz=kyiv)
when = now.strftime("%d %b %Y, %H:%M")  # e.g. 15 Nov 2026, 09:34
tz_label = "Kyiv"

host = friendly_host(os.environ.get("HOST_RAW", ""))
before = parse_disk(os.environ.get("DISK_BEFORE", ""))
after = parse_disk(os.environ.get("DISK_AFTER", ""))
docker = parse_docker_df(os.environ.get("DOCKER_AFTER", ""))

lines = []
lines.append(f"<b>🧹 OMP VPS cleanup</b>")
lines.append(f"{html.escape(when)} ({tz_label})")
lines.append(f"🖥 {html.escape(host)}")
lines.append("")

if after:
    disk_line = (
        f"💾 Disk: <b>{human_bytes(after['used'])}</b> / {human_bytes(after['size'])} "
        f"({after['pct']}%) · free {human_bytes(after['avail'])}"
    )
    lines.append(disk_line)
    if before:
        freed = after["avail"] - before["avail"]
        # Skip noise under ~1 MiB
        if abs(freed) >= 1024 * 1024:
            sign = "+" if freed >= 0 else "−"
            lines.append(
                f"   free: {human_bytes(before['avail'])} → {human_bytes(after['avail'])} "
                f"({sign}{human_bytes(abs(freed))})"
            )
else:
    lines.append("💾 Disk: n/a")

lines.append("")
lines.append("<b>🐳 Docker</b>")
if docker:
    order = ("Images", "Containers", "Volumes", "Cache")
    for label in order:
        row = docker.get(label)
        if not row:
            continue
        reclaim = row.get("reclaim") or ""
        extra = f" · reclaimable {html.escape(reclaim)}" if reclaim_is_useful(reclaim) else ""
        lines.append(
            f"• {label}: {html.escape(row['total'])} · {html.escape(row['size'])}{extra}"
        )
else:
    lines.append("• unavailable")

lines.append("")
lines.append("<b>✅ Actions</b>")
actions = [
    "docker system prune -af",
    "dangling volumes (safe)",
    "apt autoclean / autoremove",
    "journal vacuum 7d",
    "tmp older than 7d",
    "mddocimport keep-latest",
]
for a in actions:
    lines.append(f"• {html.escape(a)}")

print("\n".join(lines))
PY
)

send_tg() {
  local token="$1" chat_id="$2" text="$3"
  curl -sS -X POST "https://api.telegram.org/bot${token}/sendMessage" \
    --data-urlencode "chat_id=${chat_id}" \
    --data-urlencode "text=${text}" \
    --data-urlencode "parse_mode=HTML" \
    --data-urlencode "disable_web_page_preview=true" >/tmp/omp-tg-resp.json || return 1
  python3 -c 'import json; r=json.load(open("/tmp/omp-tg-resp.json")); print(r); raise SystemExit(0 if r.get("ok") else 1)'
}

tg_status="skipped (missing TELEGRAM_BOT_TOKEN / TELEGRAM_CHAT_IDS)"
if [[ -n "${TELEGRAM_BOT_TOKEN:-}" && -n "${TELEGRAM_CHAT_IDS:-}" ]]; then
  tg_status="ok"
  IFS=',' read -ra CHATS <<< "$TELEGRAM_CHAT_IDS"
  for chat in "${CHATS[@]}"; do
    chat=$(echo "$chat" | xargs)
    [[ -z "$chat" ]] && continue
    if send_tg "$TELEGRAM_BOT_TOKEN" "$chat" "$summary"; then
      echo "telegram sent to $chat"
    else
      echo "telegram fail for $chat"
      tg_status="fail"
    fi
  done
else
  echo "WARN: set TELEGRAM_BOT_TOKEN and TELEGRAM_CHAT_IDS in $ENV_FILE"
fi

echo "telegram: $tg_status"
echo "--- telegram preview ---"
echo "$summary"
echo "--- end preview ---"
echo "log: $LOG"
find "$LOG_DIR" -type f -name 'cleanup-*.log' -mtime +56 -delete 2>/dev/null || true
