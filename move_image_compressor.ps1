# PowerShell script to move image-compressor from utilities.php to image.php

$languages = @('en', 'es', 'ru')
$lineRanges = @{
    'en' = @{start = 8148; end = 8241 }
    'es' = @{start = 8129; end = 8222 }  # Approximate, will verify
    'ru' = @{start = 8082; end = 8175 }  # Approximate, will verify
}

foreach ($lang in $languages) {
    Write-Host "Processing $lang..." -ForegroundColor Cyan
    
    $utilFile = "resources\lang\$lang\tools\utilities.php"
    $imageFile = "resources\lang\$lang\tools\image.php"
    
    # Read files
    $utilLines = Get-Content $utilFile
    $imageLines = Get-Content $imageFile
    
    # Extract image-compressor entry
    $start = $lineRanges[$lang].start
    $end = $lineRanges[$lang].end
    $entry = $utilLines[$start..$end]
    
    # Add to image.php (before the closing );)
    $newImageLines = $imageLines[0..($imageLines.Length - 3)] + $entry + $imageLines[($imageLines.Length - 2)..($imageLines.Length - 1)]
    
    # Remove from utilities.php
    $newUtilLines = $utilLines[0..($start - 1)] + $utilLines[($end + 1)..($utilLines.Length - 1)]
    
    # Write files
    $newImageLines | Set-Content $imageFile -Encoding UTF8
    $newUtilLines | Set-Content $utilFile -Encoding UTF8
    
    Write-Host "  ✓ Moved image-compressor to $imageFile" -ForegroundColor Green
}

Write-Host "`nDone!" -ForegroundColor Green
