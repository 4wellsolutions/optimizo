# PowerShell script to move development and converter tool views to their respective directories

$sourceDir = "resources\views\tools\utility"
$devDir = "resources\views\tools\development"
$convertersDir = "resources\views\tools\converters"

# Development tool view files
$devFiles = @(
    "json-parser.blade.php",
    "xml-formatter.blade.php",
    "html-minifier.blade.php",
    "js-minifier.blade.php",
    "css-minifier.blade.php",
    "code-formatter.blade.php",
    "curl-command-builder.blade.php",
    "cron-job-generator.blade.php",
    "uuid-generator.blade.php",
    "md5-generator.blade.php",
    "url-encoder-decoder.blade.php",
    "unicode-encoder-decoder.blade.php",
    "jwt-decoder.blade.php",
    "base64-encoder-decoder.blade.php",
    "html-encoder-decoder.blade.php",
    "json-to-yaml-converter.blade.php",
    "json-yaml-converter.blade.php",
    "json-to-xml-converter.blade.php",
    "json-xml-converter.blade.php",
    "json-to-sql-converter.blade.php",
    "json-sql-converter.blade.php",
    "markdown-to-html-converter.blade.php",
    "html-to-markdown-converter.blade.php",
    "html-viewer.blade.php",
    "json-formatter.blade.php"
)

# Converter tool view files
$converterFiles = @(
    "frequency-converter.blade.php",
    "molar-mass-converter.blade.php",
    "density-converter.blade.php",
    "torque-converter.blade.php",
    "cooking-unit-converter.blade.php",
    "data-transfer-rate-converter.blade.php",
    "fuel-consumption-converter.blade.php",
    "angle-converter.blade.php",
    "force-converter.blade.php",
    "power-converter.blade.php",
    "pressure-converter.blade.php",
    "energy-converter.blade.php",
    "digital-storage-converter.blade.php",
    "speed-converter.blade.php",
    "area-converter.blade.php",
    "volume-converter.blade.php",
    "temperature-converter.blade.php",
    "weight-converter.blade.php",
    "length-converter.blade.php",
    "number-base-converter.blade.php",
    "decimal-octal-converter.blade.php",
    "decimal-hex-converter.blade.php",
    "decimal-binary-converter.blade.php",
    "binary-hex-converter.blade.php",
    "ascii-converter.blade.php",
    "rgb-hex-converter.blade.php",
    "studly-case-converter.blade.php",
    "snake-case-converter.blade.php",
    "sentence-case-converter.blade.php",
    "pascal-case-converter.blade.php",
    "kebab-case-converter.blade.php",
    "camel-case-converter.blade.php",
    "case-converter.blade.php"
)

Write-Host "Moving Development tool views..." -ForegroundColor Cyan
$movedDev = 0
foreach ($file in $devFiles) {
    $sourcePath = Join-Path $PSScriptRoot "$sourceDir\$file"
    $destPath = Join-Path $PSScriptRoot "$devDir\$file"
    
    if (Test-Path $sourcePath) {
        Move-Item -Path $sourcePath -Destination $destPath -Force
        Write-Host "  ✓ Moved: $file" -ForegroundColor Green
        $movedDev++
    }
    else {
        Write-Host "  ✗ Not found: $file" -ForegroundColor Yellow
    }
}

Write-Host "`nMoving Converter tool views..." -ForegroundColor Cyan
$movedConverters = 0
foreach ($file in $converterFiles) {
    $sourcePath = Join-Path $PSScriptRoot "$sourceDir\$file"
    $destPath = Join-Path $PSScriptRoot "$convertersDir\$file"
    
    if (Test-Path $sourcePath) {
        Move-Item -Path $sourcePath -Destination $destPath -Force
        Write-Host "  ✓ Moved: $file" -ForegroundColor Green
        $movedConverters++
    }
    else {
        Write-Host "  ✗ Not found: $file" -ForegroundColor Yellow
    }
}

Write-Host "`n=== Summary ===" -ForegroundColor Cyan
Write-Host "Development views moved: $movedDev" -ForegroundColor Green
Write-Host "Converter views moved: $movedConverters" -ForegroundColor Green
Write-Host "`nDone!" -ForegroundColor Green
