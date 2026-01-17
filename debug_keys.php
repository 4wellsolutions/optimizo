<?php
$data = json_decode(file_get_contents('resources/lang/en/tools/seo.json'), true);
if ($data) {
    echo implode("\n", array_keys($data)) . "\n";
} else {
    echo "Failed to decode JSON\n";
}
