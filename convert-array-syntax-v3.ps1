# Simple and reliable array() to [] converter for PHP files
# This version uses a two-pass approach

$files = @(
    "d:\workspace\optimizo\resources\lang\en\tools\text.php",
    "d:\workspace\optimizo\resources\lang\en\tools\development.php",
    "d:\workspace\optimizo\resources\lang\en\tools\converters.php"
)

foreach ($filePath in $files) {
    Write-Host "Processing: $(Split-Path $filePath -Leaf)" -ForegroundColor Cyan
    
    # Read file
    $content = Get-Content -Path $filePath -Raw
    
    # Step 1: Replace 'array (' and 'array(' with '['
    $content = $content -replace '\barray\s*\(', '['
    
    # Step 2: Now we need to replace matching closing ) with ]
    # We'll use a stack-based approach
    $lines = $content -split "`n"
    $result = @()
    
    foreach ($line in $lines) {
        $newLine = ""
        $stack = @()
        $chars = $line.ToCharArray()
        
        for ($i = 0; $i -lt $chars.Length; $i++) {
            $char = $chars[$i]
            
            if ($char -eq '[') {
                $stack += 'bracket'
                $newLine += $char
            }
            elseif ($char -eq '(') {
                $stack += 'paren'
                $newLine += $char
            }
            elseif ($char -eq ']') {
                if ($stack.Length -gt 0 -and $stack[-1] -eq 'bracket') {
                    $stack = $stack[0..($stack.Length - 2)]
                }
                $newLine += $char
            }
            elseif ($char -eq ')') {
                # Check if we're closing a bracket or paren
                if ($stack.Length -gt 0) {
                    $last = $stack[-1]
                    $stack = $stack[0..($stack.Length - 2)]
                    
                    if ($last -eq 'bracket') {
                        $newLine += ']'
                    }
                    else {
                        $newLine += $char
                    }
                }
                else {
                    $newLine += $char
                }
            }
            else {
                $newLine += $char
            }
        }
        
        $result += $newLine
    }
    
    # Join lines back
    $finalContent = $result -join "`n"
    
    # Write back
    Set-Content -Path $filePath -Value $finalContent -NoNewline
    
    Write-Host "Converted successfully!" -ForegroundColor Green
}

Write-Host ""
Write-Host "All files processed!" -ForegroundColor Green
