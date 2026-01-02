# 🚀 Deployment Manifest (Final "Hybrid V11" Version)

Follow this guide to update your production server.

## 1. 📂 File System Actions
**Correct Folder Name:**
- Rename `app/Http/Controllers/Tools/SEO` ➡️ `app/Http/Controllers/Tools/Seo`

**Delete Redundant Migration:**
- Delete `database/migrations/2026_01_01_120257_add_redirect_checker_tool.php`

## 2. 📤 Files to Upload
Upload and overwrite these files.

### 🔧 Critical Fix: YouTube Extractor (V11 - Hybrid Mobile + Social)
**Updates:** FIXES "Missing Data" (N/A) on restricted videos.
- **Problem:** Some servers block the Mobile Scraper (returning generic keywords), while Social bots get truncated descriptions.
- **Solution (V11):** Implements a **Dual-Tier Strategy** in one controller:
    1.  **Tier 1 (Mobile):** Attempts to fetch FULL description/duration via Mobile Site.
    2.  **Tier 2 (Social):** If Tier 1 is blocked, automatically falls back to **Facebook Crawler** headers to retrieve Title/Views/Tags and partial Description.
- **Benefit:** Ensures *something* always returns, prioritizing full data when possible, but accepting partial data over "N/A".
- **Pure Code:** Guzzle + Regex. No libraries.
*   `app/Http/Controllers/Tools/YouTube/VideoDataExtractorController.php`

### 🆕 New Feature: Sitemap Manager
- `app/Http/Controllers/Admin/AdminSitemapController.php`
- `resources/views/admin/sitemap/index.blade.php`

### 🔧 Other Updates
- `app/Http/Controllers/Tools/Seo/GoogleSerpCheckerController.php`
- `app/Http/Controllers/Admin/AdminToolController.php`
- `routes/web.php`
- `resources/views/auth/login.blade.php`
- `resources/views/layouts/admin.blade.php`

## 3. 🖥️ Terminal Commands
Run these commands via SSH to apply changes:

```bash
# 1. Update Class Map
composer dump-autoload -o

# 2. Reset Database
php artisan migrate:fresh --seed

# 3. Clear Caches
php artisan route:clear
php artisan view:clear
php artisan config:clear
```
