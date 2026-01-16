<?php

/**
 * Script to remove specific tools from a translation file
 */

$file = $argv[1] ?? null;
$toolsToRemove = array_slice($argv, 2);

if (!$file || empty($toolsToRemove)) {
    echo "Usage: php remove-tools.php <file> <tool1> <tool2> ...\n";
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

$removedCount = 0;
foreach ($toolsToRemove as $tool) {
    if (isset($data[$tool])) {
        unset($data[$tool]);
        $removedCount++;
        echo "Removed: $tool\n";
    } else {
        echo "Not found: $tool\n";
    }
}

// Export the data
$export = var_export($data, true);

// Convert array syntax
$export = preg_replace('/^([ ]*)(.*?)array \(/m', '$1$2[', $export);

// Convert closing parentheses to brackets
$lines = explode("\n", $export);
$result = [];
$stack = [];

foreach ($lines as $line) {
    // Track opening brackets
    $openCount = substr_count($line, '[');
    for ($i = 0; $i < $openCount; $i++) {
        $stack[] = '[';
    }

    // Check for closing parentheses that should be brackets
    $newLine = '';
    for ($i = 0; $i < strlen($line); $i++) {
        $char = $line[$i];
        if ($char === ')' && !empty($stack)) {
            array_pop($stack);
            $newLine .= ']';
        } else {
            $newLine .= $char;
        }
    }

    $result[] = $newLine;
}

$export = implode("\n", $result);

// Write back to file
file_put_contents($file, "<?php\n\nreturn " . $export . ";\n");

echo "\nRemoved $removedCount tools from " . basename($file) . "\n";
echo "Remaining tools: " . count($data) . "\n";
