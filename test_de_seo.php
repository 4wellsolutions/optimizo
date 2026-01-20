<?php
$file = 'd:/workspace/optimizo/resources/lang/de/tools/seo.json';
if (!file_exists($file)) {
    echo "File not found: $file\n";
    exit(1);
}
$content = file_get_contents($file);
$json = json_decode($content, true);
if (json_last_error() === JSON_ERROR_NONE) {
    echo "VALID\n";
} else {
    echo "INVALID: " . json_last_error_msg() . "\n";
}
