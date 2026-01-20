<?php

$file = __DIR__ . '/resources/lang/sv/tools/network.json';

if (!file_exists($file)) {
    echo "File not found: $file\n";
    exit(1);
}

$content = file_get_contents($file);
$json = json_decode($content, true);

if (json_last_error() === JSON_ERROR_NONE) {
    echo "VALID\n";
    exit(0);
} else {
    echo "INVALID\n";
    echo json_last_error_msg() . "\n";
    exit(1);
}
