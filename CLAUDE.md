# Slayd by Jade — Claude Code Project Notes

## How to Deploy PHP Changes to Live Site

Git push → GitHub Actions FTP deploys to real path:
`/home/u734858704/public_html/wp-content/themes/slaydbyjade/`
GitHub secret `REMOTE_PATH` = `wp-content/themes/slaydbyjade/`
(FTP root is already inside public_html — no prefix needed)

After every deploy: **WP Admin → LiteSpeed Cache → Dashboard → Purge All** (clears OPcache + page cache — mandatory or PHP changes won't show).

### If a PHP change isn't showing after deploy:
- Run Purge All in WP Admin → LiteSpeed Cache
- If still stuck: WP Admin → Theme File Editor → paste file → Update File (confirmed working, bypasses everything)

### Theme File Editor (always works for PHP):
https://slaydbyjade.com/wp-admin/theme-editor.php

---

## Credentials

**NEVER commit credentials here.** All credentials are stored in GitHub Secrets and Claude memory (`reference_slayd_deployment.md`).

- FTP: `u734858704` @ `ftp://slaydbyjade.com` port 21 (plain FTP, not FTPS)
- WP Admin: https://slaydbyjade.com/wp-admin/ (user: slaydjade)
- WP REST: https://slaydbyjade.com/wp-json/

---

## Gallery Images

Live at `https://slaydbyjade.com/wp-content/uploads/2026/05/`:
- `gallery-1.webp` through `gallery-10.webp`
- `gallery-video-1.mp4`, `gallery-video-2.mp4`

**Always hardcode image names in templates — do NOT use glob().** Glob fails on this server.

---

## Local Dev
- URL: http://slayd.local
- Theme path: `C:\Users\unit_\Local Sites\slayd\app\public\wp-content\themes\slaydbyjade`
- Gallery images: `C:\Users\unit_\Local Sites\slayd\app\public\wp-content\uploads\2026\05\`
