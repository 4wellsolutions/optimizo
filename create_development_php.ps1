# PowerShell script to create development.php and move 13 development tools

$tools = @(
    'rgb-hex-converter',
    'json-formatter',
    'base64-encoder-decoder',
    'html-viewer',
    'json-parser',
    'code-formatter',
    'css-minifier',
    'js-minifier',
    'html-minifier',
    'xml-formatter',
    'file-difference-checker',
    'cron-job-generator',
    'curl-command-builder'
)

$languages = @('en', 'es', 'ru')

foreach ($lang in $languages) {
    Write-Host "Processing $lang..." -ForegroundColor Cyan
    
    $utilFile = "resources\lang\$lang\tools\utilities.php"
    $devFile = "resources\lang\$lang\tools\development.php"
    
    # Load utilities.php
    $utilData = include $utilFile
    
    # Create development array
    $devData = @{}
    
    # Extract tools
    foreach ($tool in $tools) {
        if ($utilData.ContainsKey($tool)) {
            $devData[$tool] = $utilData[$tool]
            $utilData.Remove($tool)
            Write-Host "  Moved $tool" -ForegroundColor Green
        }
        else {
            Write-Host "  Warning: $tool not found" -ForegroundColor Yellow
        }
    }
    
    # Write development.php
    $devContent = "<?php`n`nreturn " + (ConvertTo-Json $devData -Depth 100) + ";"
    Set-Content $devFile $devContent -Encoding UTF8
    
    # Write updated utilities.php
    $utilContent = "<?php`n`nreturn " + (ConvertTo-Json $utilData -Depth 100) + ";"
    Set-Content $utilFile $utilContent -Encoding UTF8
    
    Write-Host "  Created $devFile" -ForegroundColor Green
}

Write-Host "`nDone! Created development.php for all languages" -ForegroundColor Green
