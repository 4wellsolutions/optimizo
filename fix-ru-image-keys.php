<?php

/**
 * Fix RU image keys to match EN exactly
 */

$ruFile = __DIR__ . '/resources/lang/ru/tools/images.php';
$ruTranslations = include $ruFile;

// Key mapping: OLD RU key => NEW EN-matching key
$keyMap = [
    'base64-to-image' => 'base64-to-image-converter',
    'heic-to-jpg' => 'heic-to-jpg-converter',
    // ico-converter - already correct
    // image-converter - already correct  
    'image-to-base64' => 'image-to-base64-converter',
    'jpg-to-png' => 'jpg-to-png-converter',
    'jpg-to-webp' => 'jpg-to-webp-converter',
    'png-to-jpg' => 'png-to-jpg-converter',
    'png-to-webp' => 'png-to-webp-converter',
    'svg-to-jpg' => 'svg-to-jpg-converter',
    'svg-to-png' => 'svg-to-png-converter',
    'webp-to-jpg' => 'webp-to-jpg-converter',
];

// Create new translations array with updated keys
$newTranslations = [];

foreach ($ruTranslations as $oldKey => $data) {
    // Use new key if mapping exists, otherwise keep old key
    $newKey = isset($keyMap[$oldKey]) ? $keyMap[$oldKey] : $oldKey;
    $newTranslations[$newKey] = $data;

    if (isset($keyMap[$oldKey])) {
        echo "✓ Renamed: $oldKey → $newKey\n";
    }
}

// Beautify output
function beautifyOutput($translations)
{
    $output = "<?php\n\nreturn [\n";

    foreach ($translations as $toolSlug => $toolData) {
        $output .= "    // " . ucwords(str_replace('-', ' ', $toolSlug)) . "\n";
        $output .= "    '{$toolSlug}' => [\n";

        if (isset($toolData['meta'])) {
            $output .= "        'meta' => [\n";
            foreach ($toolData['meta'] as $key => $value) {
                $escapedValue = str_replace("'", "\\'", $value);
                $output .= "            '{$key}' => '{$escapedValue}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($toolData['seo'])) {
            $output .= "        'seo' => [\n";
            foreach ($toolData['seo'] as $key => $value) {
                $escapedValue = str_replace("'", "\\'", $value);
                $output .= "            '{$key}' => '{$escapedValue}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($toolData['form'])) {
            $output .= "        'form' => [\n";
            foreach ($toolData['form'] as $key => $value) {
                $escapedValue = str_replace("'", "\\'", $value);
                $output .= "            '{$key}' => '{$escapedValue}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($toolData['content'])) {
            $output .= "        'content' => [\n";
            foreach ($toolData['content'] as $key => $value) {
                $escapedValue = str_replace("'", "\\'", $value);
                $output .= "            '{$key}' => '{$escapedValue}',\n";
            }
            $output .= "        ],\n";
        }

        $output .= "    ],\n\n";
    }

    $output .= "];\n";
    return $output;
}

// Save updated file
file_put_contents($ruFile, beautifyOutput($newTranslations));

echo "\n✅ RU keys fixed! All keys now match EN format.\n";
echo "File updated: $ruFile\n";
