# Slayd by Jade — Claude Code Project Notes

## CRITICAL: How to Deploy PHP Changes to Live Site

**GitHub Actions FTP deploy now targets the correct path** (fixed 2026-05-25).

Real server path: `/home/u734858704/public_html/wp-content/themes/slaydbyjade/`
GitHub secret `REMOTE_PATH` = `public_html/wp-content/themes/slaydbyjade/`

### Normal deploy workflow (git push):
1. Push to `main` → GitHub Actions FTP-deploys to the real path
2. After deploy completes, run **LiteSpeed Cache → Dashboard → Purge All** to clear page cache

### If a PHP change isn't showing after deploy:
- Run Purge All in WP Admin → LiteSpeed Cache
- If still stuck: WP Admin → Theme File Editor → paste the file content → Update File (bypasses everything)

### To clear the live site cache:
- **Only works:** WP Admin → LiteSpeed Cache → Dashboard → Purge All (orange button)
- **Does NOT work reliably:** hPanel "Clear Cache" button, programmatic REST purge

---

## Credentials

### FTP (for static assets — CSS/JS may work, PHP does not)
- Host: ftp://slaydbyjade.com (IP: 82.25.87.171)
- Username: u734858704
- Password: Ping1928!
- Port: 21, plain FTP (not FTPS)

### WordPress
- Admin: https://slaydbyjade.com/wp-admin/
- User: slaydjade
- App Password: `65Pe mmeS T8M6 LyMo MZ6t UpIm`
- REST API base: https://slaydbyjade.com/wp-json/

### Key Page IDs
- Homepage: ID 5
- Gallery: ID 9

---

## Gallery Images

Live at `https://slaydbyjade.com/wp-content/uploads/2026/05/`:
- `gallery-1.webp` through `gallery-10.webp`
- `gallery-video-1.mp4`, `gallery-video-2.mp4`

**Template must hardcode image names — do NOT use glob().** Glob fails on this server.

---

## Local Dev
- URL: http://slayd.local
- Theme path: `C:\Users\unit_\Local Sites\slayd\app\public\wp-content\themes\slaydbyjade`
- Gallery images: `C:\Users\unit_\Local Sites\slayd\app\public\wp-content\uploads\2026\05\`
