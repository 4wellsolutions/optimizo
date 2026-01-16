# Convert array() syntax to [] syntax in PHP files
# This script properly handles nested arrays

$files = @(
    "d:\workspace\optimizo\resources\lang\en\tools\text.php",
    "d:\workspace\optimizo\resources\lang\en\tools\development.php",
    "d:\workspace\optimizo\resources\lang\en\tools\converters.php"
)

foreach ($file in $files) {
    Write-Host "Processing: $file" -ForegroundColor Cyan
    
    # Read the file
    $content = Get-Content -Path $file -Raw
    
    # Convert array( to [
    $modified = $content -replace '\barray\s*\(', '['
    
    # Now we need to find and replace the matching closing parentheses
    # We'll do this by tracking bracket depth
    $chars = $modified.ToCharArray()
    $result = [System.Collections.ArrayList]::new()
    $stack = [System.Collections.Stack]::new()
    
    for ($i = 0; $i -lt $chars.Length; $i++) {
        $char = $chars[$i]
        
        # Check if this '[' was converted from 'array('
        if ($char -eq '[') {
            # Look back to see if this was an array conversion
            $lookback = ""
            $start = [Math]::Max(0, $i - 20)
            for ($j = $start; $j -lt $i; $j++) {
                $lookback += $chars[$j]
            }
            
            # If we find 'array' followed by whitespace before '[', this is a converted array
            if ($lookback -match 'array\s*$') {
                $stack.Push('array')
            }
            else {
                $stack.Push('bracket')
            }
            [void]$result.Add($char)
        }
        elseif ($char -eq '(') {
            $stack.Push('paren')
            [void]$result.Add($char)
        }
        elseif ($char -eq ')') {
            if ($stack.Count -gt 0) {
                $top = $stack.Pop()
                if ($top -eq 'array') {
                    # Replace with ]
                    [void]$result.Add(']')
                }
                else {
                    [void]$result.Add($char)
                }
            }
            else {
                [void]$result.Add($char)
            }
        }
        elseif ($char -eq ']') {
            if ($stack.Count -gt 0 -and $stack.Peek() -eq 'bracket') {
                [void]$stack.Pop()
            }
            [void]$result.Add($char)
        }
        else {
            [void]$result.Add($char)
        }
    }
    
    $finalContent = -join $result
    
    # Write back
    Set-Content -Path $file -Value $finalContent -NoNewline
    
    $filename = Split-Path $file -Leaf
    Write-Host "Converted array() to [] in: $filename" -ForegroundColor Green
}

Write-Host ""
Write-Host "All files converted successfully!" -ForegroundColor Green
