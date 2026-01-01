$routesContent = Get-Content "d:\workspace\optimizo\routes\web.php" -Raw

# Extract all utility tool routes
$utilityRoutes = [regex]::Matches($routesContent, "Route::get\('/([\w-]+)',")

Write-Host "Utility Tool Routes Found: $($utilityRoutes.Count)"
Write-Host ""

$routePaths = @()
foreach ($match in $utilityRoutes) {
    $routePaths += $match.Groups[1].Value
}

# Find duplicate routes
$duplicateRoutes = $routePaths | Group-Object | Where-Object { $_.Count -gt 1 }

if ($duplicateRoutes) {
    Write-Host "DUPLICATE ROUTES FOUND:" -ForegroundColor Red
    foreach ($dup in $duplicateRoutes) {
        Write-Host "  - /$($dup.Name) appears $($dup.Count) times" -ForegroundColor Yellow
    }
}
else {
    Write-Host "NO DUPLICATE ROUTES FOUND!" -ForegroundColor Green
}

Write-Host ""
Write-Host "Checking for old unidirectional converter routes..."

$oldRoutes = @(
    'json-to-xml',
    'xml-to-json',
    'json-to-yaml',
    'yaml-to-json',
    'csv-to-xml',
    'xml-to-csv',
    'json-to-sql',
    'sql-to-json',
    'tsv-to-csv',
    'csv-to-tsv'
)

$foundOldRoutes = @()
foreach ($oldRoute in $oldRoutes) {
    if ($routesContent -match "Route::get\('/$oldRoute'") {
        $foundOldRoutes += $oldRoute
    }
}

if ($foundOldRoutes.Count -gt 0) {
    Write-Host "OLD UNIDIRECTIONAL ROUTES FOUND (should be removed):" -ForegroundColor Yellow
    $foundOldRoutes | ForEach-Object { Write-Host "  - $_" -ForegroundColor Yellow }
}
else {
    Write-Host "No old unidirectional routes found - CLEAN!" -ForegroundColor Green
}
