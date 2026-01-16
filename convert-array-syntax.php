<?php
/**
 * Convert array() syntax to [] in ALL PHP files in resources/lang/en
 * This uses PHP's own tokenizer for 100% accuracy
 */

// Get all PHP files in the directory
$directory = 'd:\workspace\optimizo\resources\lang\en';
$files = [];

// Recursively find all PHP files
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($directory)
);

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $files[] = $file->getPathname();
    }
}

echo "Found " . count($files) . " PHP files to process\n\n";

foreach ($files as $file) {
    echo "Processing: " . basename($file) . "...";

    $content = file_get_contents($file);

    // Check if file has array( syntax
    if (strpos($content, 'array (') === false && strpos($content, 'array(') === false) {
        echo " (already using [] syntax)\n";
        continue;
    }

    // Use PHP tokenizer for accurate conversion
    $tokens = token_get_all($content);
    $output = '';
    $arrayDepth = [];

    for ($i = 0; $i < count($tokens); $i++) {
        $token = $tokens[$i];

        if (is_array($token)) {
            // Check if this is T_ARRAY
            if ($token[0] === T_ARRAY) {
                // Skip 'array' keyword, we'll add '[' when we see the '('
                // But first, skip any whitespace after 'array'
                $j = $i + 1;
                while ($j < count($tokens) && is_array($tokens[$j]) && $tokens[$j][0] === T_WHITESPACE) {
                    $output .= $tokens[$j][1];
                    $j++;
                }

                // Next should be '('
                if ($j < count($tokens) && $tokens[$j] === '(') {
                    $output .= '[';
                    array_push($arrayDepth, true);
                    $i = $j;
                    continue;
                }
            } else {
                $output .= $token[1];
            }
        } else {
            // Single character token
            if ($token === '(') {
                array_push($arrayDepth, false);
                $output .= $token;
            } elseif ($token === ')') {
                $isArray = array_pop($arrayDepth);
                $output .= $isArray ? ']' : ')';
            } else {
                $output .= $token;
            }
        }
    }

    file_put_contents($file, $output);
    echo " ✓ Converted!\n";
}

echo "\n✓ All files processed!\n";
