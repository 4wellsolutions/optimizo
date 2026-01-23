<?php

$basePath = 'd:/workspace/optimizo/resources/lang';
$enPath = "$basePath/en";
$ptPath = "$basePath/pt";

$files = [
    'root' => ['en.json', 'pt.json'],
    'tools' => [
        'converters.json',
        'development.json',
        'document.json',
        'image.json',
        'network.json',
        'seo.json',
        'spreadsheet.json',
        'text.json',
        'time.json',
        'utility.json',
        'youtube.json'
    ]
];

$report = [];

// Analyze root files
analyzeFile('root', 'en.json', 'pt.json', $basePath, $basePath);

// Analyze tools files
foreach ($files['tools'] as $file) {
    analyzeFile('tools', $file, $file, "$enPath/tools", "$ptPath/tools");
}

function analyzeFile($category, $enFileName, $ptFileName, $enDir, $ptDir)
{
    global $report;

    $enContent = json_decode(file_get_contents("$enDir/$enFileName"), true);
    $ptContent = json_decode(file_get_contents("$ptDir/$ptFileName"), true);

    if (!$enContent || !$ptContent) {
        $report[] = "Error loading $category: $enFileName or $ptFileName";
        return;
    }

    $missingKeys = [];
    $emptyValues = [];
    $englishValues = [];

    checkKeys($enContent, $ptContent, $missingKeys, $emptyValues, $englishValues);

    $report[$category][$ptFileName] = [
        'missing' => $missingKeys,
        'empty' => $emptyValues,
        'english' => $englishValues
    ];
}

function checkKeys($en, $pt, &$missing, &$empty, &$english, $prefix = '')
{
    foreach ($en as $key => $value) {
        $fullKey = $prefix ? "$prefix.$key" : $key;

        if (!isset($pt[$key])) {
            $missing[] = $fullKey;
            continue;
        }

        if (is_array($value)) {
            checkKeys($value, $pt[$key], $missing, $empty, $english, $fullKey);
        } else {
            $ptValue = $pt[$key];

            if ($ptValue === "" || $ptValue === null || trim($ptValue) === "[Pending Translation]") {
                $empty[] = $fullKey;
            } elseif ($ptValue === $value && strlen($value) > 3 && !is_numeric($value)) {
                // Heuristic: if value is identical to English and long enough (to avoid short common words)
                // Also exclude numeric values and placeholders like :name
                if (strpos($value, ':') === false) {
                    $englishValues[] = [
                        'key' => $fullKey,
                        'value' => $value
                    ];
                }
            }
        }
    }
}

// Generate Text Report
echo "PT Translation Analysis Report\n";
echo "=============================\n\n";

foreach ($report as $category => $files) {
    echo "Category: $category\n";
    foreach ($files as $file => $results) {
        echo "  File: $file\n";
        echo "    Missing Keys: " . count($results['missing']) . "\n";
        echo "    Empty Values: " . count($results['empty']) . "\n";
        echo "    English Content (Potential): " . count($results['english']) . "\n";

        if (!empty($results['missing'])) {
            echo "    --- Missing ---\n";
            foreach (array_slice($results['missing'], 0, 10) as $k)
                echo "      $k\n";
            if (count($results['missing']) > 10)
                echo "      ...\n";
        }

        if (!empty($results['empty'])) {
            echo "    --- Empty ---\n";
            foreach (array_slice($results['empty'], 0, 10) as $k)
                echo "      $k\n";
            if (count($results['empty']) > 10)
                echo "      ...\n";
        }

        if (!empty($results['english'])) {
            echo "    --- English Content ---\n";
            foreach (array_slice($results['english'], 0, 10) as $item)
                echo "      {$item['key']}: {$item['value']}\n";
            if (count($results['english']) > 10)
                echo "      ...\n";
        }
        echo "\n";
    }
}
