# Slayd by Jade — Claude Code Project Notes

## Deploy Workflow

1. `git push` to main (version control only — does NOT auto-deploy to live site)
2. Copy changed files via **WP Admin → Appearance → Theme File Editor** → Update File
3. **WP Admin → LiteSpeed Cache → Purge All**

**WARNING — hPanel Git auto-deploy is DISABLED.** It deploys theme files to public_html root and overwrites WordPress core files (index.php), breaking the entire site. Do not re-enable.

**FTP also does NOT work** — FTP path is disconnected from real WordPress files on Hostinger Managed WordPress.

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
