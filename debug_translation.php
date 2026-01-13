<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

app()->setLocale('ru');

echo "Testing TranslationHelper for 'ru' locale...\n";
echo "------------------------------------------------\n";

$toolsToTest = [
    'json-to-xml' => 'utilities',
    'word-to-pdf' => 'document',
    'time-zone-converter' => 'time',
    'url-encoder' => 'utilities',
    'xml-formatter' => 'utilities',
    'user-agent-parser' => 'utilities',
    'yaml-to-json' => 'utilities',
];

foreach ($toolsToTest as $slug => $expectedCat) {
    echo "Tool: $slug\n";

    // We can't easily check the internal $category variable of __tool without modifying it,
    // but we can check if it returns the correct translation.

    $h1 = __tool($slug, 'meta.h1');
    echo "  meta.h1: " . ($h1 ?: "MISSING/EMPTY") . "\n";

    // Also check partial keys to see if file is loaded
    // $catHelper = __tool($slug, 'meta');
    // echo "  meta dump: " . (is_array($catHelper) ? 'Array' : 'Not Array') . "\n";

    echo "\n";
}

echo "Done.\n";
