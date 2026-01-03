# 🚀 Deployment Manifest (Seeder Overhaul & Admin Build Fix)

Follow this guide to update your production server.

## 1. 📂 File System Actions
**Correct Folder Name:**
- Rename `app/Http/Controllers/Tools/SEO` ➡️ `app/Http/Controllers/Tools/Seo`

## 2. � Files to Upload
Upload and overwrite these files to apply fixes and features.

### 🛠️ Admin Build Fix (Logging & Pathing)
*   `app/Http/Controllers/Admin/AdminToolController.php`
    *   *Improved to log build output to `storage/logs/build.log` and handle working directories correctly.*

### 🚨 Critical Fixes (Broken Links 500 Error)
*   `app/Http/Controllers/Tools/Seo/BrokenLinksCheckerController.php`
*   `resources/views/tools/seo/broken-links-checker.blade.php`

### ✨ new Features & Database Updates
*   `app/Models/Tool.php`
*   `routes/web.php`
*   `resources/views/admin/tools/index.blade.php`
*   **UPLOAD ENTIRE FOLDER:** `database/seeders/`

### 🛠️ Cache Management System
*   `app/Http/Controllers/Admin/SettingController.php` (Added cache methods)
*   `resources/views/layouts/admin.blade.php` (Added sidebar link)
*   `resources/views/admin/settings/cache.blade.php` (New view)

## 3. 🖥️ Terminal Commands
```bash
# 1. Update Class Map
composer dump-autoload -o

# 2. Fresh Migration & Seed (REQUIRED for Subcategories)
php artisan migrate:fresh --seed

# 3. Clear Caches
php artisan route:clear
php artisan view:clear
php artisan config:clear
```

## 4. ⚡ Troubleshooting the Build Button
If the "Build Assets" button still fails:
1.  Check the log file: `storage/logs/build.log`
2.  If it says `npm: command not found`, you may need to add the full path to npm in `AdminToolController.php` (e.g., `/usr/bin/npm` or `/home/user/.nvm/versions/node/v18.../bin/npm`).
