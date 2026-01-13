<?php

/**
 * Update Utility controllers to reference renamed view files
 */

echo "=== UPDATING UTILITY CONTROLLERS ===\n\n";

$renames = [
    'qr-generator' => 'qr-code-generator',
    'markdown-to-html' => 'markdown-to-html-converter',
    'url-encoder' => 'url-encoder-decoder',
];

$controllersDir = __DIR__ . '/app/Http/Controllers/Tools/Utility/';
$updated = 0;

// Map view names to controller files
$controllerMap = [
    'qr-generator' => 'QrGeneratorController.php',
    'markdown-to-html' => 'MarkdownToHtmlController.php',
    'url-encoder' => 'UrlEncoderController.php',
];

foreach ($renames as $old => $new) {
    if (!isset($controllerMap[$old])) {
        echo "⚠️  No controller mapping for: $old\n";
        continue;
    }

    $controllerFile = $controllersDir . $controllerMap[$old];

    if (!file_exists($controllerFile)) {
        echo "⚠️  Controller not found: {$controllerMap[$old]}\n";
        continue;
    }

    $content = file_get_contents($controllerFile);
    $oldView = "tools.utility.$old";
    $newView = "tools.utility.$new";

    if (strpos($content, $oldView) !== false) {
        $content = str_replace($oldView, $newView, $content);
        file_put_contents($controllerFile, $content);
        echo "✅ Updated: {$controllerMap[$old]} ($old → $new)\n";
        $updated++;
    } else {
        echo "⚠️  View reference not found in: {$controllerMap[$old]}\n";
    }
}

echo "\n" . str_repeat("=", 60) . "\n";
echo "Controllers updated: $updated\n";
echo str_repeat("=", 60) . "\n";

if ($updated > 0) {
    echo "\n✅ Controller updates complete!\n";
}
