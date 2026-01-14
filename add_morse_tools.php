<?php

// Move the 2 morse code tools with correct slugs
$morseTools = [
    'text-to-morse-converter',
    'morse-to-text-converter'
];

$languages = ['en', 'es', 'ru'];

foreach ($languages as $lang) {
    echo "Processing $lang...\n";

    $utilFile = "resources/lang/$lang/tools/utilities.php";
    $textFile = "resources/lang/$lang/tools/text.php";

    // Load both files
    $utilData = include $utilFile;
    $textData = include $textFile;

    if ($utilData === false || !is_array($utilData)) {
        echo "  ✗ Error loading $utilFile\n";
        continue;
    }

    if ($textData === false || !is_array($textData)) {
        echo "  ✗ Error loading $textFile\n";
        continue;
    }

    // Extract and move tools
    $moved = 0;
    foreach ($morseTools as $tool) {
        if (isset($utilData[$tool])) {
            $textData[$tool] = $utilData[$tool];
            unset($utilData[$tool]);
            $moved++;
            echo "  ✓ Moved $tool\n";
        } else {
            echo "  ⚠ Warning: $tool not found in utilities.php\n";
        }
    }

    if ($moved > 0) {
        // Write updated text.php
        $textContent = "<?php\n\nreturn " . var_export($textData, true) . ";\n";
        file_put_contents($textFile, $textContent);
        echo "  ✓ Updated $textFile (now has " . count($textData) . " tools)\n";

        // Write updated utilities.php
        $utilContent = "<?php\n\nreturn " . var_export($utilData, true) . ";\n";
        file_put_contents($utilFile, $utilContent);
        echo "  ✓ Updated $utilFile\n";
    } else {
        echo "  ✗ No tools moved for $lang\n";
    }
}

echo "\n✅ Done! Morse code tools added to text.php\n";
echo "\nFinal tool counts in text.php:\n";
foreach ($languages as $lang) {
    $textFile = "resources/lang/$lang/tools/text.php";
    if (file_exists($textFile)) {
        $count = count(include $textFile);
        echo "  $lang: $count tools\n";
    }
}
