$slugs = @()

# Extract all slugs from ToolsSeeder.php
$seederContent = Get-Content "d:\workspace\optimizo\database\seeders\ToolsSeeder.php" -Raw
$matches = [regex]::Matches($seederContent, "'slug'\s*=>\s*'([^']+)'")

foreach ($match in $matches) {
    $slugs += $match.Groups[1].Value
}

Write-Host "Total tools in seeder: $($slugs.Count)"
Write-Host ""

# Find duplicates
$duplicates = $slugs | Group-Object | Where-Object { $_.Count -gt 1 }

if ($duplicates) {
    Write-Host "DUPLICATES FOUND:" -ForegroundColor Red
    foreach ($dup in $duplicates) {
        Write-Host "  - $($dup.Name) appears $($dup.Count) times" -ForegroundColor Yellow
    }
}
else {
    Write-Host "NO DUPLICATES FOUND in ToolsSeeder!" -ForegroundColor Green
}

Write-Host ""
Write-Host "All utility tool slugs:"
$utilityTools = $slugs | Where-Object { $_ -match "converter|encoder|decoder|formatter|minifier|generator|checker|parser|viewer|compressor" }
$utilityTools | Sort-Object | ForEach-Object { Write-Host "  - $_" }
