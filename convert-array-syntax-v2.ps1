# Convert array() to [] in PHP files - Improved version
# Uses a simpler token-based approach

function Convert-ArraySyntax {
    param([string]$content)
    
    # Replace 'array (' or 'array(' with '['
    $result = $content -replace '\barray\s*\(', '['
    
    # Now we need to match closing parens
    # We'll track depth and convert matching parens to brackets
    $chars = $result.ToCharArray()
    $output = New-Object System.Text.StringBuilder
    $depth = 0
    $arrayDepths = @()
    
    for ($i = 0; $i -lt $chars.Length; $i++) {
        $char = $chars[$i]
        
        if ($char -eq '[') {
            # Check if this came from array conversion
            $lookback = ""
            for ($j = [Math]::Max(0, $i - 10); $j -lt $i; $j++) {
                $lookback += $chars[$j]
            }
            
            if ($lookback -match 'array\s*$' -or $lookback -match '=\s*$' -or $lookback -match '>\s*$' -or $lookback -match ',\s*$' -or $lookback -match '\(\s*$') {
                # This is likely from array conversion
                $arrayDepths += $depth
            }
            $depth++
            [void]$output.Append($char)
        }
        elseif ($char -eq '(') {
            $depth++
            [void]$output.Append($char)
        }
        elseif ($char -eq ')') {
            $depth--
            # Check if this closes an array bracket
            if ($arrayDepths.Count -gt 0 -and $arrayDepths[-1] -eq $depth) {
                # This closes an array, use ]
                [void]$output.Append(']')
                $arrayDepths = $arrayDepths[0..($arrayDepths.Length - 2)]
            }
            else {
                [void]$output.Append($char)
            }
        }
        elseif ($char -eq ']') {
            $depth--
            [void]$output.Append($char)
        }
        else {
            [void]$output.Append($char)
        }
    }
    
    return $output.ToString()
}

$files = @(
    "d:\workspace\optimizo\resources\lang\en\tools\text.php",
    "d:\workspace\optimizo\resources\lang\en\tools\development.php",
    "d:\workspace\optimizo\resources\lang\en\tools\converters.php"
)

foreach ($file in $files) {
    Write-Host "Processing: $(Split-Path $file -Leaf)" -ForegroundColor Cyan
    
    $content = Get-Content -Path $file -Raw
    $converted = Convert-ArraySyntax -content $content
    
    Set-Content -Path $file -Value $converted -NoNewline
    
    Write-Host "Converted successfully" -ForegroundColor Green
}

Write-Host ""
Write-Host "All files converted!" -ForegroundColor Green
