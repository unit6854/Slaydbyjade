# Slayd by Jade — Claude Code Project Notes

## Deploy Workflow (3 steps every time)

1. `git push` to main
2. **hPanel → Git → click Deploy** (Hostinger hPanel Git integration)
3. **WP Admin → LiteSpeed Cache → Purge All** — https://slaydbyjade.com/wp-admin/admin.php?page=litespeed-cache

**FTP does NOT work** for deploying to this site. The FTP credentials expose a directory that is completely disconnected from the real WordPress file system on Hostinger Managed WordPress.

### If a change still isn't showing after deploy + purge:
- WP Admin → Appearance → Theme File Editor → paste the file → Update File
- This writes directly to the real PHP path and always works as a fallback

---

## Credentials

**Never commit credentials to this file.** Stored in Claude memory (`reference_slayd_deployment.md`).

- FTP: `u734858704` @ `ftp://slaydbyjade.com` port 21 — **dead for deploys, do not use**
- WP Admin: https://slaydbyjade.com/wp-admin/ (user: slaydjade)
- WP REST: https://slaydbyjade.com/wp-json/

---

## Gallery Images

Live at `https://slaydbyjade.com/wp-content/uploads/2026/05/`:
- `gallery-1.webp` through `gallery-10.webp`
- `gallery-video-1.mp4`, `gallery-video-2.mp4`

**Always hardcode image names in templates — never use glob().** Glob fails on this server.

---

## Local Dev
- URL: http://slayd.local
- Theme path: `C:\Users\unit_\Local Sites\slayd\app\public\wp-content\themes\slaydbyjade`
- Gallery images: `C:\Users\unit_\Local Sites\slayd\app\public\wp-content\uploads\2026\05\`
