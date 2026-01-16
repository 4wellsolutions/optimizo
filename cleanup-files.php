<?php

/**
 * Safely remove tools from translation files
 * This uses PHP's include to load the array, removes keys, then writes back
 */

function cleanupFile($file, $toolsToRemove)
{
    // Load the current data
    $data = include $file;

    $removed = [];
    foreach ($toolsToRemove as $tool) {
        if (isset($data[$tool])) {
            unset($data[$tool]);
            $removed[] = $tool;
        }
    }

    // Write the file using a simple approach
    $content = "<?php\n\nreturn [\n";

    foreach ($data as $key => $value) {
        $content .= "  '$key' => " . var_export($value, true) . ",\n";
    }

    $content .= "];\n";

    // Convert array( to [
    $content = str_replace('array (', '[', $content);

    // Convert ) to ] at end of arrays (simple regex for closing arrays)
    $content = preg_replace('/\),(\s*[\]\)])/', '],$1', $content);
    $content = preg_replace('/\)(\s*\])/', ']$1', $content);
    $content = str_replace('),', '],', $content);

    file_put_contents($file, $content);

    return $removed;
}

// Clean up text.php
echo "Cleaning text.php...\n";
$removed = cleanupFile('resources/lang/en/tools/text.php', [
    'camel-case-converter',
    'pascal-case-converter',
    'snake-case-converter',
    'kebab-case-converter',
    'sentence-case-converter',
    'studly-case-converter',
    'case-converter',
    'markdown-to-html-converter',
    'html-to-markdown-converter',
]);

foreach ($removed as $tool) {
    echo "  ✓ Removed: $tool\n";
}

// Clean up development.php
echo "\nCleaning development.php...\n";
$removed = cleanupFile('resources/lang/en/tools/development.php', [
    'file-difference-checker',
]);

foreach ($removed as $tool) {
    echo "  ✓ Removed: $tool\n";
}

echo "\nDone!\n";
