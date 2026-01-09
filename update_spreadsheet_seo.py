import re

# Define tool slugs and their filenames
tools = {
    'csv-to-excel': 'csv-to-excel.blade.php',
    'excel-to-csv': 'excel-to-csv.blade.php',
    'google-sheets-to-excel': 'google-sheets-to-excel.blade.php',
    'xls-to-xlsx': 'xls-to-xlsx.blade.php',
    'xlsx-to-xls': 'xlsx-to-xls.blade.php'
}

base_path = 'd:/workspace/optimizo/resources/views/tools/spreadsheet/'

for slug, filename in tools.items():
    filepath = base_path + filename
    
    print(f"Processing {slug}...")
    
    try:
        with open(filepath, 'r', encoding='utf-8') as f:
            content = f.read()
        
        original_content = content
        
        # Replace SEO meta tags
        content = re.sub(
            r"@section\('title', \$tool->meta_title \?\? \$tool->name\)",
            f"@section('title', __tool('{slug}', 'seo.title', $tool->meta_title ?? $tool->name))",
            content
        )
        content = re.sub(
            r"@section\('meta_description', \$tool->meta_description \?\? \$tool->description\)",
            f"@section('meta_description', __tool('{slug}', 'seo.description', $tool->meta_description ?? $tool->description))",
            content
        )
        
        # Remove hardcoded hero title/description if present
        content = re.sub(
            r'<h1 class="[^"]*">\s*\{\{ \$tool->name \}\}\s*</h1>',
            '',
            content,
            flags=re.DOTALL
        )
        content = re.sub(
            r'<p class="[^"]*">\s*\{\{ \$tool->description \}\}\s*</p>\s*<div class="mt-8">',
            '<div class="mt-8">',
            content,
            flags=re.DOTALL
        )
        
        # Replace common hardcodedpatterns with __tool() calls
        # This is a simplified approach - manual review may be needed
        
        if content != original_content:
            with open(filepath, 'w', encoding='utf-8') as f:
                f.write(content)
            print(f"  ✓ Updated {slug}")
        else:
            print(f"  - No changes needed for {slug}")
            
    except Exception as e:
        print(f"  ✗ Error processing {slug}: {e}")

print("\nDone!")
