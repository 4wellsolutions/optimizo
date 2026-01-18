<?php
$file = $argv[1] ?? 'resources/lang/de/tools/document.json';
if (!file_exists($file)) {
    echo "File not found: $file\n";
    exit(1);
}
$json = file_get_contents($file);
if (json_decode($json) === null) {
    echo "Invalid JSON in $file: " . json_last_error_msg() . "\n";
    exit(1);
} else {
    echo "Valid JSON in $file\n";
}
