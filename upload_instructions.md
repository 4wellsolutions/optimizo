# 🚀 Deployment Manifest

Follow this guide to update your production server.

## 1. 📂 Files to Upload
Upload and overwrite these files to apply fixes and features.

### 🚨 Critical Fixes
*   `app/Http/Controllers/Tools/Seo/BrokenLinksCheckerController.php` (Fixes 500 Error - now handles missing classes politely)
*   `vendor/` (FOLDER) - **Required** to fix "Class HtmlDomParser not found". Run `composer install` on server if possible, or upload your local `vendor` folder.

### 🛠️ Admin Sidebar & Cache System
*   `resources/views/layouts/admin.blade.php` (Refactored Sidebar: "Blog" & "Settings" submenus)
*   `resources/views/admin/settings/cache.blade.php` (New file for Cache UI)
*   `app/Http/Controllers/Admin/SettingController.php` (Backend logic for Cache)
*   `routes/web.php` (New routes)

## 2. 🖥️ Terminal Commands
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
