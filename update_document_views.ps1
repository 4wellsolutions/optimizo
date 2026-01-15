# PowerShell script to update all document tool views from utility.* to document.* routes

$files = @(
    "resources\views\tools\document\pdf-to-word.blade.php",
    "resources\views\tools\document\word-to-pdf.blade.php",
    "resources\views\tools\document\pdf-to-excel.blade.php",
    "resources\views\tools\document\excel-to-pdf.blade.php",
    "resources\views\tools\document\pdf-to-jpg.blade.php",
    "resources\views\tools\document\jpg-to-pdf.blade.php",
    "resources\views\tools\document\ppt-to-pdf.blade.php",
    "resources\views\tools\document\pdf-to-ppt.blade.php",
    "resources\views\tools\document\pdf-compressor.blade.php",
    "resources\views\tools\document\pdf-merger.blade.php",
    "resources\views\tools\document\pdf-splitter.blade.php"
)

foreach ($file in $files) {
    $fullPath = Join-Path $PSScriptRoot $file
    
    if (Test-Path $fullPath) {
        Write-Host "Updating: $file"
        
        # Read file content
        $content = Get-Content $fullPath -Raw
        
        # Replace utility. with document. for all route references
        $content = $content -replace "route\('utility\.", "route('document."
        $content = $content -replace 'route\("utility\.', 'route("document.'
        
        # Write back to file
        Set-Content $fullPath -Value $content -NoNewline
        
        Write-Host "  Updated successfully"
    }
    else {
        Write-Host "  File not found: $fullPath"
    }
}

Write-Host ""
Write-Host "All document tool views have been updated!"
Write-Host "Changed: utility.* to document.*"
