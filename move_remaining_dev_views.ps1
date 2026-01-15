# PowerShell script to move remaining development tool views

$sourceDir = "resources\views\tools\utility"
$devDir = "resources\views\tools\development"

Write-Host "Checking for development tool views in utility..." -ForegroundColor Cyan

# Check what's actually in utility directory
$utilityFiles = Get-ChildItem -Path (Join-Path $PSScriptRoot $sourceDir) -Filter "*.blade.php" | Select-Object -ExpandProperty Name

# Development keywords
$devKeywords = @("json", "xml", "html", "css", "js", "code", "curl", "cron", "uuid", "md5", "url-encoder", "unicode", "jwt", "base64", "markdown", "viewer", "formatter", "parser", "minifier", "user-agent")

$moved = 0
foreach ($file in $utilityFiles) {
    $shouldMove = $false
    
    foreach ($keyword in $devKeywords) {
        if ($file -like "*$keyword*") {
            $shouldMove = $true
            break
        }
    }
    
    if ($shouldMove) {
        $sourcePath = Join-Path $PSScriptRoot "$sourceDir\$file"
        $destPath = Join-Path $PSScriptRoot "$devDir\$file"
        
        if (Test-Path $sourcePath) {
            Move-Item -Path $sourcePath -Destination $destPath -Force
            Write-Host "  Moved: $file" -ForegroundColor Green
            $moved++
        }
    }
}

Write-Host ""
Write-Host "Development views moved: $moved" -ForegroundColor Green
