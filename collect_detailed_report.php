<?php

$locales = ['en', 'ru', 'es'];
$categories = ['development', 'converters', 'spreadsheet', 'youtube', 'seo', 'utility', 'time', 'text', 'image', 'document', 'network'];

$tools = [];

foreach ($categories as $cat) {
    $dir = "resources/views/tools/$cat";
    if (is_dir($dir)) {
        foreach (glob("$dir/*.blade.php") as $file) {
            $slug = basename($file, '.blade.php');

            $tools[$slug] = [
                'name' => ucwords(str_replace('-', ' ', $slug)),
                'slug' => $slug,
                'category' => $cat,
                'view' => $file,
                'locales' => []
            ];

            $viewContent = file_get_contents($file);
            $requiredKeys = [];
            preg_match_all('/__tool\s*\(\s*[\'"]' . preg_quote($slug) . '[\'"]\s*,\s*[\'"](.+?)[\'"]\s*\)/', $viewContent, $matches);
            foreach ($matches[1] as $k)
                $requiredKeys[] = $k;
            preg_match_all('/__t\s*\(\s*[\'"](.+?)[\'"]\s*\)/', $viewContent, $matches);
            foreach ($matches[1] as $k)
                $requiredKeys[] = $k;
            $requiredKeys = array_unique(array_merge($requiredKeys, ['meta.title', 'meta.description', 'meta.h1', 'meta.subtitle']));
            $tools[$slug]['keys_in_view'] = count($requiredKeys);

            foreach ($locales as $locale) {
                $jsonPath = "resources/lang/$locale/tools/$cat.json";
                $exists = false;
                $count = 0;
                if (file_exists($jsonPath)) {
                    $langData = json_decode(file_get_contents($jsonPath), true) ?: [];
                    if (isset($langData[$slug])) {
                        $exists = true;
                        $count = count_recursive_keys($langData[$slug]);
                    }
                }

                $tools[$slug]['locales'][$locale] = [
                    'count' => $count,
                    'file' => $jsonPath,
                    'status' => ($count == $tools[$slug]['keys_in_view']) ? 'Match' : 'Mismatch'
                ];
            }
        }
    }
}

function count_recursive_keys($array)
{
    if (!is_array($array))
        return 1;
    $count = 0;
    foreach ($array as $val) {
        if (is_array($val)) {
            $count += count_recursive_keys($val);
        } else {
            $count++;
        }
    }
    return $count;
}

file_put_contents('detailed_report_data.json', json_encode(array_values($tools), JSON_PRETTY_PRINT));
echo "Report data collected from JSON sources!\n";
