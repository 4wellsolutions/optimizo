<?php

/**
 * Translation Manager Utility
 * Usage:
 *   php translation_manager.php export
 *   php translation_manager.php import
 */

define('LANG_PATH', __DIR__ . '/resources/lang');
define('CSV_FILE', __DIR__ . '/translations.csv');

function getLocales()
{
    $locales = [];
    foreach (scandir(LANG_PATH) as $dir) {
        if ($dir !== '.' && $dir !== '..' && is_dir(LANG_PATH . '/' . $dir)) {
            $locales[] = $dir;
        }
    }
    return $locales;
}

function flattenArray($array, $prefix = '')
{
    $result = [];
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, flattenArray($value, $prefix . $key . '.'));
        } else {
            $result[$prefix . $key] = $value;
        }
    }
    return $result;
}

function unflattenArray($data)
{
    $result = [];
    foreach ($data as $key => $value) {
        $parts = explode('.', $key);
        $temp = &$result;
        foreach ($parts as $part) {
            if (!isset($temp[$part])) {
                $temp[$part] = [];
            }
            $temp = &$temp[$part];
        }
        $temp = $value;
    }
    return $result;
}

function export()
{
    $locales = getLocales();
    $enPath = LANG_PATH . '/en/tools';
    $files = glob($enPath . '/*.json');

    $fp = fopen(CSV_FILE, 'w');
    if (!$fp)
        die("Cannot open CSV file for writing\n");

    $headers = array_merge(['file', 'tool', 'key'], $locales);
    fputcsv($fp, $headers);

    foreach ($files as $file) {
        $basename = basename($file, '.json');
        $content = json_decode(file_get_contents($file), true);

        foreach ($content as $tool => $data) {
            $flat = flattenArray($data);
            foreach ($flat as $key => $enValue) {
                $row = [$basename, $tool, $key];

                // For each locale, check if translation exists, otherwise use English
                foreach ($locales as $locale) {
                    $localeFile = LANG_PATH . '/' . $locale . '/tools/' . $basename . '.json';
                    $val = $enValue; // Default to English

                    if (file_exists($localeFile)) {
                        $localeContent = json_decode(file_get_contents($localeFile), true);
                        $parts = explode('.', $key);
                        $current = $localeContent[$tool] ?? null;
                        if ($current !== null) {
                            foreach ($parts as $p) {
                                if (isset($current[$p])) {
                                    $current = $current[$p];
                                } else {
                                    $current = null;
                                    break;
                                }
                            }
                        }
                        if ($current !== null && !is_array($current)) {
                            $val = $current;
                        }
                    }
                    $row[] = $val;
                }
                fputcsv($fp, $row);
            }
        }
    }
    fclose($fp);
    echo "Exported to " . CSV_FILE . "\n";
}

function import()
{
    if (!file_exists(CSV_FILE))
        die("CSV file not found\n");

    $fp = fopen(CSV_FILE, 'r');
    $headers = fgetcsv($fp);
    $locales = array_slice($headers, 3);

    $data = []; // [locale][file][tool][key] = value

    while (($row = fgetcsv($fp)) !== false) {
        $file = $row[0];
        $tool = $row[1];
        $key = $row[2];

        foreach ($locales as $i => $locale) {
            $val = $row[$i + 3];
            $data[$locale][$file][$tool][$key] = $val;
        }
    }
    fclose($fp);

    foreach ($data as $locale => $files) {
        $localeDir = LANG_PATH . '/' . $locale . '/tools';
        if (!is_dir($localeDir))
            mkdir($localeDir, 0755, true);

        foreach ($files as $fileName => $tools) {
            $output = [];
            foreach ($tools as $toolName => $keys) {
                $output[$toolName] = unflattenArray($keys);
            }

            $jsonFile = $localeDir . '/' . $fileName . '.json';
            file_put_contents($jsonFile, json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
    }
    echo "Imported from " . CSV_FILE . " to JSON files\n";
}

$command = $argv[1] ?? null;

if ($command === 'export') {
    export();
} elseif ($command === 'import') {
    import();
} else {
    echo "Usage: php translation_manager.php [export|import]\n";
}
