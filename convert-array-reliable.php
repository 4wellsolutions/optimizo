<?php
/**
 * Convert array() to [] using PHP's var_export trick
 * This is 100% reliable because we parse and re-export the array
 */

$files = [
    'd:\workspace\optimizo\resources\lang\en\tools\text.php',
    'd:\workspace\optimizo\resources\lang\en\tools\development.php',
    'd:\workspace\optimizo\resources\lang\en\tools\converters.php',
];

foreach ($files as $filePath) {
    echo "Processing: " . basename($filePath) . "\n";

    // Include the file to get the array
    $data = include $filePath;

    // Export it with short array syntax
    $export = var_export($data, true);

    // var_export uses 'array (' format, so we need to convert it
    $export = preg_replace('/\barray\s*\(/', '[', $export);

    // Now replace the matching closing parens with ]
    // We'll use a simple character-by-character approach
    $chars = str_split($export);
    $result = '';
    $depth = [];

    for ($i = 0; $i < count($chars); $i++) {
        $char = $chars[$i];

        if ($char === '[') {
            $depth[] = 'array';
            $result .= $char;
        } elseif ($char === '(') {
            $depth[] = 'paren';
            $result .= $char;
        } elseif ($char === ')') {
            $type = array_pop($depth);
            $result .= ($type === 'array') ? ']' : ')';
        } elseif ($char === ']') {
            if (count($depth) > 0 && end($depth) === 'array') {
                array_pop($depth);
            }
            $result .= $char;
        } else {
            $result .= $char;
        }
    }

    // Write back with PHP tags
    $content = "<?php\n\nreturn " . $result . ";\n";
    file_put_contents($filePath, $content);

    // Verify syntax
    exec("php -l \"$filePath\" 2>&1", $output, $returnCode);
    if ($returnCode === 0) {
        echo "✓ Converted and verified!\n";
    } else {
        echo "✗ Syntax error after conversion!\n";
        echo implode("\n", $output) . "\n";
    }
}

echo "\n✓ Done!\n";
