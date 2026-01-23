<?php

// Fill empty keys in converters.json with SEO-optimized content

$file = 'resources/lang/en/tools/converters.json';
$content = file_get_contents($file);
$data = json_decode($content, true);

// Define the content to fill
$fills = [
    'camel-case-converter.content.how_steps.5' => 'Use the converted camelCase text in your code, variable names, or API endpoints for consistent naming conventions.',
    'case-converter.content.tips_list.5' => 'Use case conversion to maintain consistency across your codebase and improve code readability.',
    'number-base-converter.editor.bases.8' => 'Octal',
    'number-base-converter.editor.bases.10' => 'Decimal',
    'number-base-converter.editor.bases.16' => 'Hexadecimal'
];

// Function to set nested array value
function setNestedValue(&$array, $path, $value)
{
    $keys = explode('.', $path);
    $current = &$array;

    foreach ($keys as $key) {
        if (!isset($current[$key])) {
            $current[$key] = [];
        }
        $current = &$current[$key];
    }

    $current = $value;
}

// Fill the empty keys
foreach ($fills as $path => $value) {
    setNestedValue($data, $path, $value);
}

// Save the file
$json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
file_put_contents($file, $json);

echo "✅ converters.json: Filled 5 empty keys\n";
echo "  - camel-case-converter.content.how_steps.5\n";
echo "  - case-converter.content.tips_list.5\n";
echo "  - number-base-converter.editor.bases.8/10/16\n";
