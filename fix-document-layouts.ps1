# PowerShell script to fix all document converter blade files
# Replaces x-tool-layout with @extends('layouts.app')

$files = @(
    'pdf-to-excel',
    'excel-to-pdf',
    'ppt-to-pdf',
    'pdf-to-ppt',
    'pdf-to-jpg',
    'jpg-to-pdf',
    'pdf-compressor',
    'pdf-merger',
    'pdf-splitter'
)

$basePath = "d:\workspace\optimizo\resources\views\tools\document"

foreach ($file in $files) {
    $filePath = Join-Path $basePath "$file.blade.php"
    
    if (Test-Path $filePath) {
        Write-Host "Processing: $file.blade.php"
        
        # Read the file
        $content = Get-Content $filePath -Raw
        
        # Replace x-tool-layout opening tag with @extends
        $content = $content -replace '<x-tool-layout[^>]*>', "@extends('layouts.app')`r`n`r`n@section('title', `$tool->meta_title ?? `$tool->name)`r`n@section('meta_description', `$tool->meta_description ?? `$tool->description)`r`n`r`n@section('content')`r`n    <div class=`"max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8`">`r`n        {{-- Header --}}`r`n        <div class=`"text-center mb-8`">`r`n            <h1 class=`"text-3xl font-bold text-gray-900 dark:text-white mb-4`">{{ `$tool->name }}</h1>`r`n            <p class=`"text-lg text-gray-600 dark:text-gray-400 mb-8`">{{ `$tool->description }}</p>`r`n        </div>`r`n"
        
        # Remove x-slot header_content section
        $content = $content -replace '(?s)<x-slot name="header_content">.*?</x-slot>\s*', ''
        
        # Replace closing tag
        $content = $content -replace '</x-tool-layout>', "    </div>`r`n@endsection"
        
        # Fix indentation for the main content div
        $content = $content -replace '(?m)^    <div class="max-w-3xl mx-auto">', '        <div class="max-w-3xl mx-auto">'
        
        # Write back
        Set-Content $filePath $content -NoNewline
        
        Write-Host "  ✓ Fixed: $file.blade.php"
    } else {
        Write-Host "  ✗ Not found: $file.blade.php" -ForegroundColor Red
    }
}

Write-Host "`nAll files processed!" -ForegroundColor Green
