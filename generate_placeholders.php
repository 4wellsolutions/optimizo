<?php

$locales = ['id', 'ko', 'fi', 'vi', 'nl', 'pl', 'no', 'cs', 'sv', 'ro', 'da'];
$sourceLocale = 'en';
$langPath = __DIR__ . '/resources/lang';

function generatePlaceholders($sourceFile, $targetFile)
{
    if (!file_exists($sourceFile))
        return;
    $data = json_decode(file_get_contents($sourceFile), true);
    if (!$data)
        return;

    $placeholders = [];
    foreach ($data as $key => $value) {
        $placeholders[$key] = wrapValue($value);
    }

    $dir = dirname($targetFile);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }

    file_put_contents($targetFile, json_encode($placeholders, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    echo "Generated: $targetFile\n";
}

function wrapValue($value)
{
    if (is_array($value)) {
        $wrapped = [];
        foreach ($value as $k => $v) {
            $wrapped[$k] = wrapValue($v);
        }
        return $wrapped;
    }
    if (is_string($value)) {
        if (trim($value) === '')
            return '';
        return "[Pending Translation] " . $value;
    }
    return $value;
}

// 1. Generate core JSON files
foreach ($locales as $locale) {
    generatePlaceholders("$langPath/$sourceLocale.json", "$langPath/$locale.json");
}

// 2. Generate tool category JSON files
$toolsPath = "$langPath/$sourceLocale/tools";
$categories = scandir($toolsPath);

foreach ($categories as $category) {
    if ($category === '.' || $category === '..')
        continue;

    foreach ($locales as $locale) {
        generatePlaceholders("$toolsPath/$category", "$langPath/$locale/tools/$category");
    }
}
