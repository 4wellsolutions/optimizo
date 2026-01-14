<?php

$tools = [
    'rgb-hex-converter',
    'json-formatter',
    'base64-encoder-decoder',
    'html-viewer',
    'json-parser',
    'code-formatter',
    'css-minifier',
    'js-minifier',
    'html-minifier',
    'xml-formatter',
    'file-difference-checker',
    'cron-job-generator',
    'curl-command-builder'
];

$languages = ['en', 'es', 'ru'];

foreach ($languages as $lang) {
    echo "Processing $lang...\n";

    $utilFile = "resources/lang/$lang/tools/utilities.php";
    $devFile = "resources/lang/$lang/tools/development.php";

    // Load utilities.php
    $utilData = include $utilFile;

    // Create development array
    $devData = [];

    // Extract tools
    foreach ($tools as $tool) {
        if (isset($utilData[$tool])) {
            $devData[$tool] = $utilData[$tool];
            unset($utilData[$tool]);
            echo "  ✓ Moved $tool\n";
        } else {
            echo "  ✗ Warning: $tool not found\n";
        }
    }

    // Write development.php
    $devContent = "<?php\n\nreturn " . var_export($devData, true) . ";\n";
    file_put_contents($devFile, $devContent);

    // Write updated utilities.php
    $utilContent = "<?php\n\nreturn " . var_export($utilData, true) . ";\n";
    file_put_contents($utilFile, $utilContent);

    echo "  ✓ Created $devFile\n";
}

echo "\nDone! Created development.php for all languages\n";
