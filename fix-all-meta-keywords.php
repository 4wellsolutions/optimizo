<?php
// Fix all blade files with meta_keywords issue
$bladeFiles = [
    'md5-generator.blade.php',
    'slug-generator.blade.php',
    'text-to-morse-converter.blade.php',
    'tsv-csv-converter.blade.php',
    'tsv-to-csv.blade.php',
    'unicode-encoder-decoder.blade.php',
    'xml-formatter.blade.php',
    'text-to-binary.blade.php',
    'text-reverser.blade.php',
    'json-parser.blade.php',
    'json-formatter.blade.php',
    'js-minifier.blade.php',
    'html-viewer.blade.php',
    'html-minifier.blade.php',
    'html-encoder-decoder.blade.php',
    'duplicate-line-remover.blade.php',
    'diff-checker.blade.php',
    'decimal-octal-converter.blade.php',
    'decimal-hex-converter.blade.php',
    'curl-command-builder.blade.php',
    'decimal-binary-converter.blade.php',
    'csv-to-xml-converter.blade.php',
    'css-minifier.blade.php',
    'cron-job-generator.blade.php',
    'code-formatter.blade.php',
    'case-converter.blade.php',
    'binary-hex-converter.blade.php',
    'base64.blade.php',
    'csv-xml-converter.blade.php',
];

$basePath = 'd:\workspace\optimizo\resources\views\tools\utility\\';
$fixed = 0;

foreach ($bladeFiles as $file) {
    $filePath = $basePath . $file;
    if (!file_exists($filePath)) {
        echo "Skipping $file - not found\n";
        continue;
    }

    $content = file_get_contents($filePath);

    // Remove the meta_keywords conditional block (accounting for Windows line endings)
    $newContent = preg_replace(
        "/@if\(\\\$tool->meta_keywords\)[\r\n]+@section\('meta_keywords',\s*\\\$tool->meta_keywords\)[\r\n]+@endif[\r\n]+/",
        '',
        $content
    );

    if ($newContent !== $content) {
        file_put_contents($filePath, $newContent);
        echo "Fixed: $file\n";
        $fixed++;
    } else {
        echo "No changes: $file\n";
    }
}

echo "\nTotal files fixed: $fixed\n";
