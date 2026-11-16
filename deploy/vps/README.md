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

- Menu guard: `/usr/local/bin/omp-telegram-menu-guard.sh` + `/etc/cron.d/omp-telegram-menu-guard` (every minute)
  - Forces chat menu button text **Процеси** with web_app **`/md-access/brokers?t=…`**
- Webhook: `omp-telegram-webhook.service` on `127.0.0.1:8791`, nginx `location /telegram-office-hook/`
  - `/start` restores menu + bottom ReplyKeyboardMarkup (`Процеси · OMP` + `МДдок імпорт`, both → brokers)
  - **Never** `deleteMessage` on the keyboard message (Telegram drops reply keyboard)
- Clear chat history also removes reply keyboard — user should `/start` again
- Director Windows `BlueProcessMenu` spam/wrong label: see `patches/MDDocImport-blue-menu-spam-fix.md`
