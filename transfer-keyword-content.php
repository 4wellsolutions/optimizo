<?php

/**
 * Transfer complete content from keyword-density to keyword-density-checker
 * Then remove keyword-density
 */

echo "=== TRANSFERRING COMPLETE CONTENT ===\n\n";

$languages = ['en', 'es', 'ru'];

foreach ($languages as $lang) {
    $file = __DIR__ . "/resources/lang/{$lang}/tools/seo.php";
    $translations = include $file;

    $hasKD = isset($translations['keyword-density']);
    $hasKDC = isset($translations['keyword-density-checker']);

    echo "{$lang}:\n";

    // If keyword-density exists and has more content than keyword-density-checker
    if ($hasKD) {
        $kdSections = count($translations['keyword-density']);
        $kdcSections = $hasKDC ? count($translations['keyword-density-checker']) : 0;

        echo "  keyword-density sections: {$kdSections}\n";
        echo "  keyword-density-checker sections: {$kdcSections}\n";

        // Copy all content from keyword-density to keyword-density-checker
        $translations['keyword-density-checker'] = $translations['keyword-density'];

        // Update the meta subtitle to the checker version
        $translations['keyword-density-checker']['meta']['subtitle'] = $lang === 'en'
            ? 'Check keyword usage and density for better search rankings'
            : ($lang === 'es'
                ? 'Verifique uso y densidad de palabras clave para mejores rankings'
                : 'Проверяйте использование и плотность ключевых слов для лучших рейтингов');

        // Remove keyword-density
        unset($translations['keyword-density']);

        echo "  ✓ Transferred and removed keyword-density\n\n";
    } else {
        echo "  No keyword-density found\n\n";
    }

    // Save
    $output = "<?php\n\nreturn [\n";

    foreach ($translations as $slug => $data) {
        $output .= "    // " . ucwords(str_replace('-', ' ', $slug)) . "\n";
        $output .= "    '{$slug}' => [\n";

        foreach ($data as $section => $content) {
            if (is_array($content)) {
                $output .= "        '{$section}' => [\n";
                foreach ($content as $k => $v) {
                    $v = str_replace("'", "\\'", $v);
                    $output .= "            '{$k}' => '{$v}',\n";
                }
                $output .= "        ],\n";
            }
        }

        $output .= "    ],\n\n";
    }

    $output .= "];\n";
    file_put_contents($file, $output);
}

echo "✅ Complete! All content transferred to keyword-density-checker\n";
