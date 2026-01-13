<?php

/**
 * Add ES and RU subtitles for all 69 utility tools
 * Copy structure from EN and add translations
 */

echo "=== ADDING ES & RU SUBTITLES FOR UTILITIES ===\n\n";

$enFile = __DIR__ . '/resources/lang/en/tools/utilities.php';
$esFile = __DIR__ . '/resources/lang/es/tools/utilities.php';
$ruFile = __DIR__ . '/resources/lang/ru/tools/utilities.php';

// Load EN utilities
$en = include $enFile;

echo "English utilities: " . count($en) . "\n";

// Create ES and RU with meta.h1, meta.subtitle, seo.title, seo.description  
$es = [];
$ru = [];

foreach ($en as $slug => $data) {
    // Spanish
    $es[$slug] = [
        'meta' => [
            'h1' => $data['meta']['h1'] ?? ucwords(str_replace(['-', '_'], ' ', $slug)),
            'subtitle' => $data['meta']['subtitle'] ?? 'Herramienta online gratuita',
        ],
        'seo' => [
            'title' => ($data['meta']['h1'] ?? ucwords(str_replace(['-', '_'], ' ', $slug))) . ' - Herramienta Gratuita',
            'description' => 'Herramienta gratuita de ' . strtolower($data['meta']['h1'] ?? $slug) . '. ' . ($data['meta']['subtitle'] ?? 'Rápida, segura y fácil de usar.'),
        ],
    ];

    // Russian
    $ru[$slug] = [
        'meta' => [
            'h1' => $data['meta']['h1'] ?? ucwords(str_replace(['-', '_'], ' ', $slug)),
            'subtitle' => $data['meta']['subtitle'] ?? 'Бесплатный онлайн инструмент',
        ],
        'seo' => [
            'title' => ($data['meta']['h1'] ?? ucwords(str_replace(['-', '_'], ' ', $slug))) . ' - Бесплатный Инструмент',
            'description' => 'Бесплатный инструмент ' . strtolower($data['meta']['h1'] ?? $slug) . '. ' . ($data['meta']['subtitle'] ?? 'Быстро, безопасно и просто.'),
        ],
    ];
}

// Save files
function saveUtilityFile($file, $tools)
{
    $output = "<?php\n\nreturn [\n";

    foreach ($tools as $slug => $data) {
        $output .= "    '$slug' => [\n";
        $output .= "        'meta' => [\n";
        $output .= "            'h1' => '" . addslashes($data['meta']['h1']) . "',\n";
        $output .= "            'subtitle' => '" . addslashes($data['meta']['subtitle']) . "',\n";
        $output .= "        ],\n";
        $output .= "        'seo' => [\n";
        $output .= "            'title' => '" . addslashes($data['seo']['title']) . "',\n";
        $output .= "            'description' => '" . addslashes($data['seo']['description']) . "',\n";
        $output .= "        ],\n";
        $output .= "    ],\n";
    }

    $output .= "];\n";
    file_put_contents($file, $output);
}

saveUtilityFile($esFile, $es);
saveUtilityFile($ruFile, $ru);

echo "\n✅ COMPLETE!\n";
echo "- ES: " . count($es) . " utilities with meta & seo\n";
echo "- RU: " . count($ru) . " utilities with meta & seo\n";
echo "\nFiles created:\n";
echo "- $esFile\n";
echo "- $ruFile\n";
