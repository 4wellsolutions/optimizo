<?php

$en = include __DIR__ . '/resources/lang/en/tools/utilities.php';
$slugs = array_keys($en);
$views = glob(__DIR__ . '/resources/views/tools/utility/*.blade.php');
$viewNames = array_map(fn($v) => basename($v, '.blade.php'), $views);

$extra = [];
foreach ($viewNames as $view) {
    if (!in_array($view, $slugs)) {
        $extra[] = $view;
    }
}

echo "Extra view files (not in translation):\n";
foreach ($extra as $e) {
    echo "  - $e.blade.php\n";
}

// Check if they're similar to base64-encoder-decoder
foreach ($extra as $e) {
    similar_text('base64-encoder-decoder', $e, $percent);
    if ($percent > 50) {
        echo "\n'{$e}' is " . round($percent, 1) . "% similar to 'base64-encoder-decoder'\n";
    }
}
