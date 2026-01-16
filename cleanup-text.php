<?php

/**
 * Remove tools from text.php that belong in other categories
 * Based on user's authoritative list
 */

$file = 'resources/lang/en/tools/text.php';
$data = include $file;

// Tools to remove from text.php (they belong in converters.php or development.php)
$toRemove = [
    // Case converters - belong in Converters
    'camel-case-converter',
    'pascal-case-converter',
    'snake-case-converter',
    'kebab-case-converter',
    'sentence-case-converter',
    'studly-case-converter',
    'case-converter',

    // Markdown converters - belong in Development
    'markdown-to-html-converter',
    'html-to-markdown-converter',
];

$removed = [];
foreach ($toRemove as $tool) {
    if (isset($data[$tool])) {
        unset($data[$tool]);
        $removed[] = $tool;
    }
}

// Export using var_export
$export = var_export($data, true);

// Convert array( to [
$export = preg_replace('/array \(/', '[', $export);

// Convert closing ) to ] using character-by-character parsing
$result = '';
$depth = 0;

for ($i = 0; $i < strlen($export); $i++) {
    $char = $export[$i];

    if ($char === '[') {
        $depth++;
        $result .= $char;
    } elseif ($char === ')') {
        if ($depth > 0) {
            $depth--;
            $result .= ']';
        } else {
            $result .= $char;
        }
    } else {
        $result .= $char;
    }
}

// Write back to file
file_put_contents($file, "<?php\n\nreturn " . $result . ";\n");

echo "Removed from text.php:\n";
foreach ($removed as $tool) {
    echo "  ✓ $tool\n";
}
echo "\nRemaining tools: " . count($data) . "\n";
