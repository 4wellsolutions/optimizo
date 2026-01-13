<?php

/**
 * Beautify/Format the Russian converters.php file
 * Makes it match the formatting of EN and ES files
 */

function formatArray($array, $indent = 0)
{
    $output = "[\n";
    $spaces = str_repeat(' ', ($indent + 1) * 4);
    $closeSpaces = str_repeat(' ', $indent * 4);

    foreach ($array as $key => $value) {
        $output .= $spaces;

        if (is_string($key)) {
            $output .= "'{$key}' => ";
        }

        if (is_array($value)) {
            $output .= formatArray($value, $indent + 1);
        } else {
            $escapedValue = str_replace("'", "\\'", $value);
            $output .= "'{$escapedValue}'";
        }

        $output .= ",\n";
    }

    $output .= $closeSpaces . "]";
    return $output;
}

// Load the Russian file
$ruFile = __DIR__ . '/resources/lang/ru/tools/converters.php';
$translations = include $ruFile;

// Start building formatted output
$output = "<?php\n\nreturn [\n";

foreach ($translations as $toolSlug => $toolData) {
    $output .= "    // " . ucwords(str_replace('-', ' ', $toolSlug)) . "\n";
    $output .= "    '{$toolSlug}' => [\n";

    // Meta section
    if (isset($toolData['meta'])) {
        $output .= "        'meta' => [\n";
        if (isset($toolData['meta']['h1'])) {
            $h1 = str_replace("'", "\\'", $toolData['meta']['h1']);
            $output .= "            'h1' => '{$h1}',\n";
        }
        if (isset($toolData['meta']['subtitle'])) {
            $subtitle = str_replace("'", "\\'", $toolData['meta']['subtitle']);
            $output .= "            'subtitle' => '{$subtitle}',\n";
        }
        $output .= "        ],\n";
    }

    // SEO section
    if (isset($toolData['seo'])) {
        $output .= "        'seo' => [\n";
        foreach ($toolData['seo'] as $key => $value) {
            $escapedValue = str_replace("'", "\\'", $value);
            $output .= "            '{$key}' => '{$escapedValue}',\n";
        }
        $output .= "        ],\n";
    }

    // Form section
    if (isset($toolData['form'])) {
        $output .= "        'form' => [\n";
        foreach ($toolData['form'] as $key => $value) {
            $escapedValue = str_replace("'", "\\'", $value);
            $output .= "            '{$key}' => '{$escapedValue}',\n";
        }
        $output .= "        ],\n";
    }

    // Content section
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

// Save the beautified file
file_put_contents($ruFile, $output);

echo "✅ Russian converter file beautified successfully!\n";
echo "File: {$ruFile}\n";
