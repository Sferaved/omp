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

df_before=$(df -h / | awk 'NR==1 || /\/$/')
echo "-- disk before --"
echo "$df_before"

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

df_after=$(df -h / | awk 'NR==1 || /\/$/')
echo "-- disk after --"
echo "$df_after"
docker_after=$(docker system df 2>/dev/null || echo "docker unavailable")
echo "-- docker after --"
echo "$docker_after"

summary=$(printf 'OMP VPS cleanup (%s)\nhost: %s\n\nDisk:\n%s\n\nDocker:\n%s\n\nActions: docker system prune -af, dangling volumes (safe), apt autoclean/autoremove, journalctl --vacuum-time=7d, tmp>7d, mddocimport keep-latest' \
  "$STAMP" "$(hostname)" "$df_after" "$docker_after")

send_tg() {
  local token="$1" chat_id="$2" text="$3"
  curl -sS -X POST "https://api.telegram.org/bot${token}/sendMessage" \
    --data-urlencode "chat_id=${chat_id}" \
    --data-urlencode "text=${text}" \
    --data-urlencode "disable_web_page_preview=true" >/tmp/omp-tg-resp.json || return 1
  python3 -c 'import json; r=json.load(open("/tmp/omp-tg-resp.json")); raise SystemExit(0 if r.get("ok") else 1)'
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
echo "log: $LOG"
find "$LOG_DIR" -type f -name 'cleanup-*.log' -mtime +56 -delete 2>/dev/null || true
