<?php
$lines = file(__DIR__ . '/resources/lang/en/tools/utilities.php');
$tools = [
    'json-to-xml',
    'json-to-sql',
    'json-to-yaml',
    'md5-generator',
    'kebab-case-converter',
    'slug-generator',
    'text-reverser',
    'text-to-binary',
    'text-to-morse-converter',
    'tsv-to-csv',
    'unicode-encoder-decoder',
    'xml-formatter',
    'json-parser',
    'json-formatter',
    'html-viewer',
    'html-to-markdown',
    'html-minifier',
    'html-encoder-decoder',
    'tsv-csv-converter',
    'random-number-generator',
    'url-encoder',
    'qr-generator',
    'uuid-generator',
    'password-generator'
];

foreach ($tools as $tool) {
    foreach ($lines as $ln => $line) {
        if (strpos($line, "'$tool' => [") !== false) {
            echo "$tool: " . ($ln + 1) . "\n";
            // Found first occurrence, stop for this tool
            break;
        }
    }
}
