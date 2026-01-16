<?php

/**
 * Remove file-difference-checker from development.php (belongs in text.php)
 */

$file = 'resources/lang/en/tools/development.php';
$data = include $file;

// Tool to remove
$toRemove = ['file-difference-checker'];

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

echo "Removed from development.php:\n";
foreach ($removed as $tool) {
    echo "  ✓ $tool\n";
}
echo "\nRemaining tools: " . count($data) . "\n";
