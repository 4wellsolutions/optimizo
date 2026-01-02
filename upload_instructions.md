# 🚀 Deployment Manifest (Latest Changes)

Follow this guide to update your production server.

## 1. 📂 File System Actions (Do Once)
**Correct Folder Name:**
- Rename `app/Http/Controllers/Tools/SEO` ➡️ `app/Http/Controllers/Tools/Seo`
  *(Must be "Seo" with capital S only. Linux is case-sensitive!)*

**Delete Redundant Migration:**
- Delete `database/migrations/2026_01_01_120257_add_redirect_checker_tool.php`

## 2. 📤 Files to Upload
Upload and overwrite these files.

### 🆕 New Feature: Sitemap Manager
- `app/Http/Controllers/Admin/AdminSitemapController.php`
- `resources/views/admin/sitemap/index.blade.php`

### 🔧 Critical Fix: YouTube Extractor (Hybrid Mode)
- `app/Http/Controllers/Tools/YouTube/VideoDataExtractorController.php`

### 🔧 Other Logic Updates
- `app/Http/Controllers/Tools/Seo/GoogleSerpCheckerController.php`
- `app/Http/Controllers/Admin/AdminToolController.php`
- `routes/web.php` (Added Sitemap Routes)

### 🎨 Design & Layout
- `resources/views/auth/login.blade.php` (New Login Page)
- `resources/views/layouts/admin.blade.php` (Added Sitemap Link)

### ⚙️ System
- `database/seeders/DatabaseSeeder.php`

## 3. 🖥️ Terminal Commands
Run these commands via SSH to apply changes:

```bash
# 1. Update Class Map
composer dump-autoload -o

# 2. Reset Database (Applies Seeder Fixes)
# CAUTION: This will wipe current data!
php artisan migrate:fresh --seed

# 3. Clear Caches
php artisan route:clear
php artisan view:clear
php artisan config:clear
```
