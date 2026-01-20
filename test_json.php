<?php
$file = 'd:/workspace/optimizo/converters_test.json';
$content = file_get_contents($file);
$json = json_decode($content, true);
if (json_last_error() === JSON_ERROR_NONE) {
    echo "VALID\n";
} else {
    echo "INVALID: " . json_last_error_msg() . "\n";
}
