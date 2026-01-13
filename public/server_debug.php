<?php

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "<pre>";
echo "Current Locale: " . app()->getLocale() . "\n";
echo "Setting Locale to 'ru'...\n";
app()->setLocale('ru');
echo "New Locale: " . app()->getLocale() . "\n\n";

$slugs = ['csv-to-xml', 'url-encoder', 'json-to-xml'];

foreach ($slugs as $slug) {
    echo "Testing Slug: [$slug]\n";
    $val = __tool($slug, 'meta.h1');
    echo "  __tool output: " . ($val ? htmlspecialchars($val) : "NULL/EMPTY") . "\n";

    // Check raw file access
    $category = \App\Helpers\TranslationHelper::getCategoryForDebug($slug) ?? 'UNKNOWN';
    // We can't access private logic easily without reflection or adding a debug method, 
    // so let's try to infer if utilities is loaded.

    echo "\n";
}

echo "Checking resources/lang/ru/tools directory:\n";
$path = resource_path('lang/ru/tools');
if (is_dir($path)) {
    $files = scandir($path);
    print_r($files);
} else {
    echo "Directory not found: $path\n";
}

echo "\nTranslationHelper Check:\n";
// Print valid prefixes from code if possible, or just check reflection
try {
    $rc = new ReflectionFunction('__tool');
    echo "Function __tool exists.\n";
    $filename = $rc->getFileName();
    echo "File defined in: $filename\n";
    // Read file content snippet to see if 'url' => 'utilities' is present
    $content = file_get_contents($filename);
    if (strpos($content, "'url' => 'utilities'") !== false) {
        echo "Source code contains 'url' => 'utilities' mapping: YES\n";
        if (strpos($content, "'csv-to-xml' => 'utilities'") !== false) {
            echo "Source code contains 'csv-to-xml' => 'utilities' exception: YES\n";
        }
    } else {
        echo "Source code contains 'url' => 'utilities' mapping: NO (Old Code on Server?)\n";
    }
} catch (Exception $e) {
    echo "Error reflecting: " . $e->getMessage();
}

echo "</pre>";
