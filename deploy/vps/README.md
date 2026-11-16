# OMP VPS (omp.net.ua) — downloads + cleanup

Host: `185.251.25.179` (Cloudflare → nginx → omp container).

## MDDocImport public downloads

Artifacts live on the **host** at `/var/www/downloads/mddocimport` (publish script SCPs here).

Host nginx serves them directly:

- `https://omp.net.ua/downloads/mddocimport/latest.json`
- `https://omp.net.ua/downloads/mddocimport/MDDocImport-Setup.exe`

See `omp-proxy.conf` (`location /downloads/` → `alias /var/www/downloads/`).

Do **not** rely on a bind-mount into the `omp` container for this path.

## Keep-latest prune

`/usr/local/bin/omp-mddocimport-prune.sh` deletes old `MDDocImport*` Setup/ZIP files not referenced by `latest.json`.

Call it after every publish (see patch for `MDDocImport/scripts/publish-omp-download.ps1`).

## Weekly cleanup + Office Telegram

- Cron: `/etc/cron.d/omp-vps-cleanup` — Sunday 04:15 UTC
- Script: `/usr/local/bin/omp-vps-cleanup.sh`
- Env: `/etc/omp-vps-cleanup.env` from `omp-vps-cleanup.env.example`

Env vars (required for Telegram report):

- `TELEGRAM_BOT_TOKEN` — Office bot token
- `TELEGRAM_CHAT_IDS` — Andrii only (`120352595`). Do not add Any / other chats.
- `OMP_DOWNLOAD_DIR` — optional, default `/var/www/downloads/mddocimport`

Cleanup reports: Telegram only (no email). Safe cleanup: `docker system prune -af` (no `--volumes`), dangling volumes excluding known app volumes, apt autoclean/autoremove, journal 7d, tmp >7d, mddocimport prune.

## Daily backups (email → Andrii only)

- Cron: `/etc/cron.d/office-backup` — `0 4 * * *`
- Script: `/usr/local/bin/office-backup.sh`
- Mail helper: `/usr/local/bin/send-backup-mail.php` → `andrey18051@gmail.com` only (no Any)
- No Telegram for backups currently; if added later, Andrii only.

## Windows publish SSH (`omp-prod`)

Update `~/.ssh/config` HostName to the new VPS:

```
Host omp-prod
  HostName 185.251.25.179
  User ubuntu
  IdentityFile ~/.ssh/id_taxi_prod
```

Install the public key into `/home/ubuntu/.ssh/authorized_keys` on the VPS (BatchMode SCP requires key auth). Rotate the root password after setup.


## Office Telegram menu + keyboard (durable)

CTTF-43: bottom keyboard is restored **only** by Office bot commands (`/start`, `/buttons`) on the VPS — not by MDDocImport PCs.

| Control | Behavior |
|--------|----------|
| Menu **Процеси** | Living `broker_board_source` trycloudflare `/board`; `/start` falls back to `/md-access/brokers` if tunnel dead |
| `/start` / `/buttons` | Quiet `sendMessage` `"."` + ReplyKeyboard web_app: OMP→`/board`, МДдок→`/brokers` (deduped stamp) |
| Menu guard cron | **setChatMenuButton only** — promotes living tunnel; never `sendMessage`; never force-brokers downgrade |

- Webhook: `omp-telegram-webhook.service` `127.0.0.1:8791`, nginx `/telegram-office-hook/`
- **Never** chatty «Кнопки дошки» loops; **never** `deleteMessage` on keyboard messages
