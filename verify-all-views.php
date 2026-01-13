<?php

$en = include __DIR__ . '/resources/lang/en/tools/utilities.php';
$slugs = array_keys($en);
$views = glob(__DIR__ . '/resources/views/tools/utility/*.blade.php');

echo "Translation slugs: " . count($slugs) . "\n";
echo "View files: " . count($views) . "\n\n";

$viewNames = array_map(fn($v) => basename($v, '.blade.php'), $views);

$perfect = 0;
$missing = [];

foreach ($slugs as $slug) {
    if (in_array($slug, $viewNames)) {
        $perfect++;
    } else {
        $missing[] = $slug;
    }
}

echo "✅ Perfect matches: $perfect/" . count($slugs) . "\n";
echo "❌ Missing views: " . count($missing) . "\n\n";

if (count($missing) > 0) {
    echo "Missing view files:\n";
    foreach ($missing as $m) {
        echo "  - $m\n";
    }
}

if ($perfect == count($slugs)) {
    echo "\n🎉 ALL 69 UTILITY VIEW FILES MATCH THEIR SLUGS!\n";
    echo "Next step: Update controllers to reference correct view names.\n";
}
