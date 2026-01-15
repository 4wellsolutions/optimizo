# Document Category Setup - Complete Guide

## Summary
This guide contains all SQL queries and steps to create the Document category and migrate all PDF/document tools from Utility to Document category.

## Step 1: Run the SQL to Create Category and Update Tools

Execute the SQL file: `create_document_category.sql`

This will:
1. Create the "Document" category with slug "document"
2. Update all 11 document tools to use the new category
3. Update their route_name to use "document." prefix

## Step 2: Routes Updated

The following changes have been made to `routes/web.php`:

### Added Document Routes Section
- All document converter routes moved from `utility.*` to `document.*` prefix
- Route names now match tool slugs exactly

### Added Category Page Route
- `/document-tools` route added to display the document category page

### Document Tools with New Routes:
1. `document.pdf-to-word` - PDF to Word Converter
2. `document.word-to-pdf` - Word to PDF Converter
3. `document.pdf-to-excel` - PDF to Excel Converter
4. `document.excel-to-pdf` - Excel to PDF Converter
5. `document.pdf-to-jpg` - PDF to JPG Converter
6. `document.jpg-to-pdf` - JPG to PDF Converter
7. `document.ppt-to-pdf` - PowerPoint to PDF Converter
8. `document.pdf-to-ppt` - PDF to PowerPoint Converter
9. `document.pdf-compressor` - PDF Compressor
10. `document.pdf-merger` - PDF Merger
11. `document.pdf-splitter` - PDF Splitter

## Step 3: Clear Caches

After running the SQL and updating routes, clear the caches:

```bash
php artisan view:clear
php artisan route:clear
php artisan cache:clear
```

## Step 4: Add CategoryController Method

You need to add a `document()` method to `CategoryController.php`:

```php
public function document()
{
    return $this->showCategory('document');
}
```

## Verification

After completing all steps:
1. Visit `/document-tools` to see the document category page
2. All document tools should now use `document.*` routes
3. Category dropdown will show "Document" category (if is_active = true)
