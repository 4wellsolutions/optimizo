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

// Process Spanish and Russian only (English already done)
$languages = ['es', 'ru'];

foreach ($languages as $lang) {
    echo "Processing $lang...\n";

    $utilFile = "resources/lang/$lang/tools/utilities.php";
    $devFile = "resources/lang/$lang/tools/development.php";

    // Load utilities.php
    $utilData = include $utilFile;

    if ($utilData === false || !is_array($utilData)) {
        echo "  ✗ Error loading $utilFile\n";
        continue;
    }

    // Create development array
    $devData = [];

    // Extract tools
    $moved = 0;
    foreach ($tools as $tool) {
        if (isset($utilData[$tool])) {
            $devData[$tool] = $utilData[$tool];
            unset($utilData[$tool]);
            $moved++;
            echo "  ✓ Moved $tool\n";
        } else {
            echo "  ⚠ Warning: $tool not found\n";
        }
    }

    if ($moved > 0) {
        // Write development.php
        $devContent = "<?php\n\nreturn " . var_export($devData, true) . ";\n";
        file_put_contents($devFile, $devContent);
        echo "  ✓ Created $devFile with $moved tools\n";

        // Write updated utilities.php
        $utilContent = "<?php\n\nreturn " . var_export($utilData, true) . ";\n";
        file_put_contents($utilFile, $utilContent);
        echo "  ✓ Updated $utilFile\n";
    } else {
        echo "  ✗ No tools moved for $lang\n";
    }
}

echo "\nDone!\n";
