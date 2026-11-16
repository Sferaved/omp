#!/bin/bash
set -euo pipefail
DAY=$(date +%F)
DEST=/var/backups/office
DIR="$DEST/$DAY"
TOKEN=$(cat /root/backup-token)
mkdir -p "$DIR/logs"

: > "$DEST/latest.txt"
dump_mysql() {
  local name="$1"
  mysqldump --single-transaction --routines --triggers --databases "$name" | gzip -1 > "$DIR/${name}.sql.gz"
  echo "$DAY/${name}.sql.gz" >> "$DEST/latest.txt"
}
dump_mysql db_office_2026
dump_mysql omp_base
dump_mysql omp_shipments
if docker ps --format '{{.Names}}' | grep -qx md-access-db; then
  docker exec md-access-db pg_dump -U md_access -d md_access | gzip -1 > "$DIR/md_access.sql.gz"
  echo "$DAY/md_access.sql.gz" >> "$DEST/latest.txt"
fi
docker logs office --tail 5000 > "$DIR/logs/office-docker.log" 2>&1 || true
docker logs omp --tail 3000 > "$DIR/logs/omp-docker.log" 2>&1 || true
docker logs md-access-api --tail 2000 > "$DIR/logs/md-access-api.log" 2>&1 || true
cp -a /var/log/nginx/access.log "$DIR/logs/access.log" 2>/dev/null || true
cp -a /var/log/nginx/error.log "$DIR/logs/error.log" 2>/dev/null || true
docker cp office:/var/log/cron_invoice.log "$DIR/logs/cron_invoice.log" 2>/dev/null || true
find "$DIR/logs" -type f -printf '%P\n' | while read -r name; do
  echo "$DAY/logs/$name" >> "$DEST/latest.txt"
done
chmod -R a+rX "$DIR"
chmod 644 "$DEST/latest.txt"
find "$DEST" -mindepth 1 -maxdepth 1 -type d -regextype posix-extended -regex '.*/[0-9]{4}-[0-9]{2}-[0-9]{2}' -mtime +6 -exec rm -rf {} +
{
  echo "Копии баз за ${DAY} лежат отдельными файлами."
  echo
  while IFS= read -r rel; do
    [ -n "$rel" ] || continue
    echo "http://185.251.25.179:8088/${TOKEN}/${rel}"
  done < "$DEST/latest.txt"
  echo
  echo "Скрипт для компьютера:"
  echo "http://185.251.25.179:8088/${TOKEN}/download-backups.ps1"
} > /tmp/backup-mail-body.txt
docker cp /tmp/backup-mail-body.txt office:/tmp/backup-mail-body.txt
docker cp /usr/local/bin/send-backup-mail.php office:/tmp/send-backup-mail.php
docker exec -w /usr/share/nginx/html/office office php /tmp/send-backup-mail.php
echo "BACKUP $DAY"
