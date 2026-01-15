# MASTER EXECUTION PLAN - Category Reorganization

## ✅ COMPLETED TASKS

### 1. View Files Organization
- ✅ Moved Image views (13 files) to `resources/views/tools/image/`
- ✅ Moved Development views (38 files) to `resources/views/tools/development/`
- ✅ Moved Converter views (20 files) to `resources/views/tools/converters/`
- ✅ Time views already in place (6 files) in `resources/views/tools/time/`
- ✅ Text views directory created `resources/views/tools/text/`
- ✅ Document views already in place (11 files) in `resources/views/tools/document/`

### 2. Category Routes & Controllers
- ✅ Added `/image-tools` route and `image()` controller method
- ✅ Added `/document-tools` route and `document()` controller method
- ✅ Added `/time-tools` route and `time()` controller method
- ✅ Added `/text-tools` route and `text()` controller method
- ✅ Added `/development-tools` route and `development()` controller method
- ✅ Added `/converters-tools` route and `converters()` controller method
- ✅ Added `/spreadsheet-tools` route and `spreadsheet()` controller method

### 3. Route Groups Created
- ✅ Image route group (`image.*`) - lines 405-420
- ✅ Document route group (`document.*`) - lines 428-476
- ✅ Time route group (`time.*`) - lines 483-501
- ✅ Text route group (`text.*`) - lines 508-534

### 4. SQL Files Created
- ✅ `update_image_routes.sql` - Update image tools
- ✅ `create_document_category.sql` - Create document category
- ✅ `create_time_category.sql` - Create time category
- ✅ `create_text_category.sql` - Create text category
- ✅ `create_dev_converters_categories.sql` - Create development & converters categories
- ✅ `create_spreadsheet_category.sql` - Create spreadsheet category

## ⏳ REMAINING TASKS

### CRITICAL: Run SQL Files (IN THIS ORDER)
```sql
1. create_document_category.sql
2. create_time_category.sql
3. create_text_category.sql
4. create_dev_converters_categories.sql
5. create_spreadsheet_category.sql
6. update_image_routes.sql
```

### CRITICAL: Create Missing Route Groups

The following categories have views and category pages but NO route groups yet:

#### 1. Development Route Group (22 tools)
**Status**: Views ✅, Category page ✅, Routes ❌

Tools need routes:
- json-parser, xml-formatter, html-minifier, js-minifier, css-minifier
- code-formatter, curl-command-builder, cron-job-generator
- uuid-generator, md5-generator, url-encoder-decoder
- unicode-encoder-decoder, jwt-decoder, base64-encoder-decoder
- html-encoder-decoder, json-to-yaml-converter, json-to-xml-converter
- json-to-sql-converter, markdown-to-html-converter
- html-to-markdown-converter, html-viewer, json-formatter

#### 2. Converters Route Group (33 tools)
**Status**: Views ✅, Category page ✅, Routes ❌

Tools need routes:
- frequency-converter, molar-mass-converter, density-converter
- torque-converter, cooking-unit-converter, data-transfer-rate-converter
- fuel-consumption-converter, angle-converter, force-converter
- power-converter, pressure-converter, energy-converter
- digital-storage-converter, speed-converter, area-converter
- volume-converter, temperature-converter, weight-converter
- length-converter, number-base-converter, decimal-octal-converter
- decimal-hex-converter, decimal-binary-converter, binary-hex-converter
- ascii-converter, rgb-hex-converter, studly-case-converter
- snake-case-converter, sentence-case-converter, pascal-case-converter
- kebab-case-converter, camel-case-converter, case-converter

#### 3. Spreadsheet Route Group (7 tools)
**Status**: Views ✅, Category page ✅, Routes ❌

Tools need routes:
- csv-to-sql, google-sheets-to-excel, xlsx-to-xls
- xls-to-xlsx, csv-to-excel, excel-to-csv, tsv-csv

### Update Controllers
After creating route groups, need to update controllers to use new view paths:
- Development controllers → `tools.development.*`
- Converter controllers → `tools.converters.*`
- Spreadsheet controllers → `tools.spreadsheet.*`
- Image controllers → `tools.image.*`

### Clear Caches
```bash
php artisan view:clear
php artisan route:clear
php artisan cache:clear
```

## NEXT IMMEDIATE STEP

**I will now create the three missing route groups in web.php**

This is a large task because I need to:
1. Find all existing route definitions for these tools
2. Move them from utility group to their respective groups
3. Update route names to use correct prefixes
