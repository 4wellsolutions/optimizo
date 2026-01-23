<?php

// Fill empty keys in German converters.json with authentic German translations

$file = 'resources/lang/de/tools/converters.json';
$content = file_get_contents($file);
$data = json_decode($content, true);

// Define authentic German translations
$fills = [
    'camel-case-converter.content.how_steps.5' => 'Verwenden Sie den konvertierten camelCase-Text in Ihrem Code, Variablennamen oder API-Endpunkten für konsistente Namenskonventionen.',
    'case-converter.content.tips_list.5' => 'Verwenden Sie die Groß-/Kleinschreibungskonvertierung, um die Konsistenz in Ihrer Codebasis zu wahren und die Lesbarkeit des Codes zu verbessern.',
    'number-base-converter.editor.bases.8' => 'Oktal',
    'number-base-converter.editor.bases.10' => 'Dezimal',
    'number-base-converter.editor.bases.16' => 'Hexadezimal'
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

echo "✅ DE converters.json: 5 leere Schlüssel gefüllt\n";
echo "  - camel-case-converter.content.how_steps.5\n";
echo "  - case-converter.content.tips_list.5\n";
echo "  - number-base-converter.editor.bases (Oktal, Dezimal, Hexadezimal)\n";
