<?php

$langPath = 'd:/workspace/optimizo/resources/lang';
$locales = array_filter(glob($langPath . '/*'), 'is_dir');
$referenceLocale = 'en';

function getKeysRecursive($array, $prefix = '')
{
    $keys = [];
    foreach ($array as $key => $value) {
        $fullKey = $prefix . ($prefix ? '.' : '') . $key;
        if (is_array($value)) {
            $keys = array_merge($keys, getKeysRecursive($value, $fullKey));
        } else {
            $keys[] = $fullKey;
        }
    }
    return $keys;
}

function loadAllKeys($localeDir, $langPath, $locale)
{
    $allKeys = [];

    // Main JSON
    $mainJson = $langPath . '/' . $locale . '.json';
    if (file_exists($mainJson)) {
        $content = json_decode(file_get_contents($mainJson), true) ?? [];
        $allKeys[$locale . '.json'] = getKeysRecursive($content);
    }

    // Sub directories
    if (is_dir($localeDir)) {
        $directory = new RecursiveDirectoryIterator($localeDir);
        $iterator = new RecursiveIteratorIterator($directory);
        $jsonFiles = new RegexIterator($iterator, '/^.+\.json$/i', RecursiveRegexIterator::GET_MATCH);

        foreach ($jsonFiles as $file) {
            $filePath = $file[0];
            $relativePath = str_replace($localeDir . DIRECTORY_SEPARATOR, '', $filePath);
            $allKeys[$relativePath] = getKeysRecursive(json_decode(file_get_contents($filePath), true) ?? []);
        }
    }

    return $allKeys;
}

$englishKeys = loadAllKeys($langPath . '/en', $langPath, 'en');
$allLocalesData = [];

// Reference Data (English)
$allLocalesData['en'] = ['files' => []];
foreach ($englishKeys as $fileName => $keys) {
    $allLocalesData['en']['files'][$fileName] = count($keys);
}

// Compare others
foreach ($locales as $localeDir) {
    $locale = basename($localeDir);
    if ($locale === 'en')
        continue;

    $localeKeys = loadAllKeys($localeDir, $langPath, $locale);
    $allLocalesData[$locale] = ['files' => []];

    foreach ($englishKeys as $fileName => $refKeys) {
        $translated = 0;
        if (isset($localeKeys[$fileName])) {
            foreach ($refKeys as $key) {
                if (in_array($key, $localeKeys[$fileName])) {
                    $translated++;
                }
            }
        }
        $allLocalesData[$locale]['files'][$fileName] = $translated;
    }
}

// Locale sorting list
$sortedLocaleCodes = array_map('basename', $locales);
sort($sortedLocaleCodes);

// Generate HTML
$html = '<!DOCTYPE html><html><head><title>Transposed Translation Audit</title>';
$html .= '<style>
    body { font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; padding: 30px; background: #f0f2f5; color: #1c1e21; }
    .container { max-width: 1400px; margin: 0 auto; }
    h1 { color: #1c1e21; text-align: center; margin-bottom: 40px; }
    .file-section { background: white; border-radius: 8px; box-shadow: 0 1px 2px rgba(0,0,0,0.1); margin-bottom: 40px; padding: 25px; overflow-x: auto; }
    h2 { color: #1877f2; border-bottom: 2px solid #e4e6eb; padding-bottom: 15px; margin-bottom: 20px; font-family: monospace; }
    table { width: 100%; border-collapse: collapse; min-width: 1200px; }
    th { background: #f5f6f7; color: #65676b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.5px; padding: 12px 8px; border: 1px solid #e4e6eb; position: sticky; left: 0; z-index: 10; }
    td { padding: 12px 8px; text-align: center; border: 1px solid #e4e6eb; font-size: 0.85rem; }
    .metric-header { background: #f5f6f7; color: #1c1e21; font-weight: bold; text-align: left; min-width: 120px; }
    .source-col { background: #e7f3ff; font-weight: bold; }
    .percentage-row td { font-weight: bold; }
    .perfect { color: #42b72a; }
    .good { color: #f7b928; }
    .poor { color: #fa3e3e; }
    .lang-header { min-width: 60px; }
</style></head><body><div class="container">';

$html .= '<h1>Optimizo: Multilingual Comparison Matrix (Transposed)</h1>';

foreach ($englishKeys as $fileName => $refKeys) {
    if (strpos($fileName, 'tools') === false && $fileName !== 'en.json')
        continue;

    $refCount = count($refKeys);
    $html .= '<div class="file-section"><h2>' . $fileName . ' (' . $refCount . ' Source Keys)</h2>';
    $html .= '<table><thead><tr><th class="metric-header">Locale</th>';

    // Header row with languages
    foreach ($sortedLocaleCodes as $code) {
        $class = ($code === 'en') ? 'source-col' : '';
        $html .= '<th class="' . $class . ' lang-header">' . strtoupper($code) . '</th>';
    }
    $html .= '</tr></thead><tbody>';

    // Count row
    $html .= '<tr><th class="metric-header">Keys Count</th>';
    foreach ($sortedLocaleCodes as $code) {
        $count = ($code === 'en') ? $refCount : ($allLocalesData[$code]['files'][$fileName] ?? 0);
        $class = ($code === 'en') ? 'source-col' : '';
        $html .= '<td class="' . $class . '">' . $count . '</td>';
    }
    $html .= '</tr>';

    // Percentage row
    $html .= '<tr class="percentage-row"><th class="metric-header">Completion %</th>';
    foreach ($sortedLocaleCodes as $code) {
        $count = ($code === 'en') ? $refCount : ($allLocalesData[$code]['files'][$fileName] ?? 0);
        $perc = $refCount > 0 ? round(($count / $refCount) * 100, 1) : 100;
        $class = ($code === 'en') ? 'source-col' : '';
        $colorClass = ($code === 'en') ? 'perfect' : ($perc >= 100 ? 'perfect' : ($perc > 90 ? 'good' : 'poor'));
        $html .= '<td class="' . $class . ' ' . $colorClass . '">' . $perc . '%</td>';
    }
    $html .= '</tr>';

    $html .= '</tbody></table></div>';
}

$html .= '</div></body></html>';

file_put_contents('d:/workspace/optimizo/translation_comparison.html', $html);
echo "New Transposed report generated at d:/workspace/optimizo/translation_comparison.html\n";
