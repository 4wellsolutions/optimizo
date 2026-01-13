<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\App;

// Force locale to 'es'
App::setLocale('es');

echo "Current Locale: " . App::getLocale() . "\n";

$slug = 'youtube-video-data-extractor';
$key = 'meta.h1';

echo "Slug: $slug\n";
echo "Key: $key\n";

// Helper logic simulation or direct call if available globally
// TranslationHelper is auto-loaded by composer typically or in app start.
// Let's rely on the global function if defined, or recreate logic.

if (function_exists('__tool')) {
    echo "__tool function exists.\n";
    $result = __tool($slug, $key);
    echo "Result from __tool: " . var_export($result, true) . "\n";
} else {
    echo "__tool function NOT found. Manually requiring helper.\n";
    require_once __DIR__ . '/app/Helpers/TranslationHelper.php';
    $result = __tool($slug, $key);
    echo "Result from __tool after require: " . var_export($result, true) . "\n";
}

// Debug file path resolution
$prefix = explode('-', $slug)[0];
$category = $prefix;
// check exceptions... logic from helper...
// Assuming 'youtube' category
$path = resource_path("lang/es/tools/{$category}.php");
echo "Expected File Path: $path\n";
echo "File Exists: " . (file_exists($path) ? 'YES' : 'NO') . "\n";

if (file_exists($path)) {
    $data = require $path;
    echo "Key exists in file: " . (isset($data[$slug]['meta']['h1']) ? 'YES' : 'NO') . "\n";
    if (isset($data[$slug]['meta']['h1'])) {
        echo "Value in file: " . $data[$slug]['meta']['h1'] . "\n";
    }
}
