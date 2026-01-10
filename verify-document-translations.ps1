#!/usr/bin/env pwsh
# Script to verify all 11 document tools have translation keys
# This is a verification script only

$tools = @(
    'pdf-to-word',
    'word-to-pdf',
    'excel-to-pdf',
    'pdf-to-excel',
    'ppt-to-pdf',
    'pdf-to-ppt',
    'jpg-to-pdf',
    'pdf-to-jpg',
    'pdf-compressor',
    'pdf-merger',
    'pdf-splitter'
)

Write-Host "Checking translation keys in document tool Blade files..." -ForegroundColor Cyan

foreach ($tool in $tools) {
    $file = "d:\workspace\optimizo\resources\views\tools\document\$tool.blade.php"
    if (Test-Path $file) {
        $content = Get-Content $file -Raw
        $hasTranslations = $content -match "__tool\('$tool'"
        
        if ($hasTranslations) {
            Write-Host "✓ $tool - Has translation keys" -ForegroundColor Green
        } else {
            Write-Host "✗ $tool - Missing translation keys" -ForegroundColor Yellow
        }
    } else {
        Write-Host "✗ $tool - File not found" -ForegroundColor Red
    }
}

Write-Host "`nVerification complete!" -ForegroundColor Cyan
