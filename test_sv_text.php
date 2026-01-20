<?php

$file = 'resources/lang/sv/tools/text.json';
$content = file_get_contents($file);
$json = json_decode($content, true);

if (json_last_error() === JSON_ERROR_NONE) {
    echo "VALID";
} else {
    echo "INVALID: " . json_last_error_msg();
}
