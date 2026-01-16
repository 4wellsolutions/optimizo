<?php

/**
 * Script to remove specific tools from a translation file
 * Uses the reliable var_export method
 */

$file = $argv[1] ?? null;
$toolsToRemove = array_slice($argv, 2);

if (!$file || empty($toolsToRemove)) {
    echo "Usage: php remove-tools-reliable.php <file> <tool1> <tool2> ...\n";
    exit(1);
}

if (!file_exists($file)) {
    echo "Error: File not found: $file\n";
    exit(1);
}

// Load the file
$data = include $file;

if (!is_array($data)) {
    echo "Error: File does not return an array\n";
    exit(1);
}

$originalCount = count($data);
$removedCount = 0;

foreach ($toolsToRemove as $tool) {
    if (isset($data[$tool])) {
        unset($data[$tool]);
        $removedCount++;
        echo "✓ Removed: $tool\n";
    } else {
        echo "✗ Not found: $tool\n";
    }
}

// Export the data using var_export
$export = var_export($data, true);

// Convert array( to [
$export = preg_replace('/array \(/', '[', $export);

// Now convert closing ) to ] using character-by-character parsing
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

echo "\n" . str_repeat('=', 50) . "\n";
echo "Summary for " . basename($file) . "\n";
echo str_repeat('=', 50) . "\n";
echo "Original count: $originalCount\n";
echo "Removed: $removedCount\n";
echo "Remaining: " . count($data) . "\n";
