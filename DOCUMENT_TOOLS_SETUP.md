# Document Converter Tools - Server Setup Commands

## 1. Install PHP Composer Packages
```bash
composer require phpoffice/phpword
composer require phpoffice/phpspreadsheet
composer require setasign/fpdi
composer require smalot/pdfparser
```

## 2. Install System Dependencies (Ubuntu/Debian)
```bash
# Install Imagick for PDF to Image conversions
sudo apt-get update
sudo apt-get install -y php-imagick imagemagick

# Install Ghostscript (required for PDF operations)
sudo apt-get install -y ghostscript

# Install LibreOffice (optional, for better Office file conversions)
sudo apt-get install -y libreoffice
```

## 3. Configure ImageMagick Policy (Important!)
```bash
# Edit ImageMagick policy to allow PDF operations
sudo nano /etc/ImageMagick-6/policy.xml

# Find this line:
#   <policy domain="coder" rights="none" pattern="PDF" />
# Change it to:
#   <policy domain="coder" rights="read|write" pattern="PDF" />

# Or run this command to fix it automatically:
sudo sed -i 's/<policy domain="coder" rights="none" pattern="PDF" \/>/<policy domain="coder" rights="read|write" pattern="PDF" \/>/g' /etc/ImageMagick-6/policy.xml
```

## 4. Verify PHP Extensions
```bash
# Check if Imagick is enabled
php -m | grep imagick

# If not enabled, install and enable it:
sudo apt-get install -y php8.2-imagick  # Adjust version to match your PHP
sudo phpenmod imagick
sudo service php8.2-fpm restart  # Or apache2/nginx
```

## 5. Set Permissions
```bash
# Ensure storage directory is writable
chmod -R 775 storage/
chown -R www-data:www-data storage/
```

## 6. Run Database Migration (if needed)
```bash
php artisan migrate
```

## 7. Clear Cache
```bash
php artisan optimize:clear
```

## Alternative: One-Line Installation (Ubuntu/Debian)
```bash
composer require phpoffice/phpword phpoffice/phpspreadsheet setasign/fpdi smalot/pdfparser && sudo apt-get update && sudo apt-get install -y php-imagick imagemagick ghostscript && sudo sed -i 's/<policy domain="coder" rights="none" pattern="PDF" \/>/<policy domain="coder" rights="read|write" pattern="PDF" \/>/g' /etc/ImageMagick-6/policy.xml && sudo service php8.2-fpm restart
```

## Notes:
- **PDF to Word/Excel/PowerPoint**: These conversions are "best effort" using PHP libraries. For production-quality conversions, consider using LibreOffice headless or external APIs.
- **Imagick**: Required for PDF ↔ Image conversions
- **Ghostscript**: Required for PDF compression and manipulation
- **Memory Limit**: Large file conversions may require increasing PHP memory_limit in php.ini
