<?php

$textTools = [
    'markdown-to-html-converter',
    'html-to-markdown-converter',
    'sentence-case-converter',
    'camel-case-converter',
    'pascal-case-converter',
    'snake-case-converter',
    'kebab-case-converter',
    'studly-case-converter',
    'text-reverser',
    'text-to-morse-code',
    'morse-code-to-text',
    'url-slug-generator',
    'case-converter',
    'duplicate-line-remover'
];

$languages = ['en', 'es', 'ru'];

foreach ($languages as $lang) {
    echo "Processing $lang...\n";

    $utilFile = "resources/lang/$lang/tools/utilities.php";
    $textFile = "resources/lang/$lang/tools/text.php";

    // Load utilities.php
    $utilData = include $utilFile;

    if ($utilData === false || !is_array($utilData)) {
        echo "  ✗ Error loading $utilFile\n";
        continue;
    }

    // Create text array
    $textData = [];

    // Extract tools
    $moved = 0;
    foreach ($textTools as $tool) {
        if (isset($utilData[$tool])) {
            $textData[$tool] = $utilData[$tool];
            unset($utilData[$tool]);
            $moved++;
            echo "  ✓ Moved $tool\n";
        } else {
            echo "  ⚠ Warning: $tool not found\n";
        }
    }

    if ($moved > 0) {
        // Write text.php
        $textContent = "<?php\n\nreturn " . var_export($textData, true) . ";\n";
        file_put_contents($textFile, $textContent);
        echo "  ✓ Created $textFile with $moved tools\n";

        // Write updated utilities.php
        $utilContent = "<?php\n\nreturn " . var_export($utilData, true) . ";\n";
        file_put_contents($utilFile, $utilContent);
        echo "  ✓ Updated $utilFile\n";
    } else {
        echo "  ✗ No tools moved for $lang\n";
    }
}

echo "\n✅ Done! Created text.php for all languages\n";
echo "\nVerifying tool counts:\n";
foreach ($languages as $lang) {
    $textFile = "resources/lang/$lang/tools/text.php";
    if (file_exists($textFile)) {
        $count = count(include $textFile);
        echo "  $lang: $count tools in text.php\n";
    }
}
