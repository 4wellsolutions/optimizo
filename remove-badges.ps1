# Script to remove badge sections from tool files
$files = @(
    "resources/views/tools/network/port-checker.blade.php",
    "resources/views/tools/network/reverse-dns.blade.php",
    "resources/views/tools/utility/html-minifier.blade.php",
    "resources/views/tools/utility/js-minifier.blade.php",
    "resources/views/tools/utility/css-minifier.blade.php",
    "resources/views/tools/utility/code-formatter.blade.php",
    "resources/views/tools/utility/base64.blade.php",
    "resources/views/tools/utility/json-formatter.blade.php",
    "resources/views/tools/utility/html-viewer.blade.php",
    "resources/views/tools/utility/qr-generator.blade.php",
    "resources/views/tools/seo/word-counter.blade.php",
    "resources/views/tools/seo/meta-analyzer.blade.php",
    "resources/views/tools/seo/keyword-density.blade.php",
    "resources/views/tools/youtube/video-tags-extractor.blade.php",
    "resources/views/tools/youtube/thumbnail.blade.php",
    "resources/views/tools/youtube/tags.blade.php",
    "resources/views/tools/youtube/handle-checker.blade.php",
    "resources/views/tools/youtube/extractor.blade.php",
    "resources/views/tools/youtube/earnings-calculator.blade.php",
    "resources/views/tools/youtube/downloader.blade.php",
    "resources/views/tools/youtube/channel.blade.php",
    "resources/views/tools/youtube/channel-id-finder.blade.php"
)

foreach ($file in $files) {
    $path = "d:/workspace/optimizo/$file"
    if (Test-Path $path) {
        $content = Get-Content $path -Raw -Encoding UTF8
        
        # Pattern to match badge section
        $pattern = '(?s)(\s*<div class="flex flex-wrap items-center justify-center gap-3 mt-4">.*?</div>\s*</div>\s*</div>\s*)(\s*@include\(''components\.hero-actions''\))'
        
        if ($content -match $pattern) {
            $newContent = $content -replace $pattern, '$2'
            Set-Content $path -Value $newContent -NoNewline -Encoding UTF8
            Write-Host "✓ Updated: $file"
        } else {
            Write-Host "- Skipped (no match): $file"
        }
    } else {
        Write-Host "✗ Not found: $file"
    }
}

Write-Host "`nDone!"
