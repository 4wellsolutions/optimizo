<?php

/**
 * Restore keyword-density-checker to all SEO files
 * This is the correct tool slug
 */

$subtitles = [
    'en' => 'Check keyword usage and density for better search rankings',
    'es' => 'Verifique uso y densidad de palabras clave para mejores rankings',
    'ru' => 'Проверяйте использование и плотность ключевых слов для лучших рейтингов',
];

$h1s = [
    'en' => 'Keyword Density Checker',
    'es' => 'Verificador de Densidad de Palabras Clave',
    'ru' => 'Проверка плотности ключевых слов',
];

$seoData = [
    'en' => [
        'title' => 'Keyword Density Checker - Check Keyword Frequency',
        'description' => 'Free keyword density checker tool. Analyze word frequency and keyword usage to optimize your content.',
    ],
    'es' => [
        'title' => 'Verificador de Densidad de Palabras Clave',
        'description' => 'Herramienta gratuita para verificar densidad de palabras clave. Analice frecuencia de palabras.',
    ],
    'ru' => [
        'title' => 'Проверка плотности ключевых слов',
        'description' => 'Бесплатный инструмент проверки плотности ключевых слов.',
    ],
];

echo "=== RESTORING keyword-density-checker ===\n\n";

foreach (['en', 'es', 'ru'] as $lang) {
    $file = __DIR__ . "/resources/lang/{$lang}/tools/seo.php";
    $translations = include $file;

    // Add keyword-density-checker entry
    $translations['keyword-density-checker'] = [
        'meta' => [
            'h1' => $h1s[$lang],
            'subtitle' => $subtitles[$lang],
        ],
        'seo' => $seoData[$lang],
        'form' => [
            'label' => $lang === 'en' ? 'Paste Text or URL' : ($lang === 'es' ? 'Pegue texto o URL' : 'Вставьте текст или URL'),
            'placeholder' => $lang === 'en' ? 'Paste your text here...' : ($lang === 'es' ? 'Pegue su texto aquí...' : 'Вставьте текст здесь...'),
            'button' => $lang === 'en' ? 'Check Density' : ($lang === 'es' ? 'Verificar Densidad' : 'Проверить плотность'),
        ],
    ];

    // Rebuild file
    $output = "<?php\n\nreturn [\n";

    foreach ($translations as $slug => $data) {
        $output .= "    // " . ucwords(str_replace('-', ' ', $slug)) . "\n";
        $output .= "    '{$slug}' => [\n";

        if (isset($data['meta'])) {
            $output .= "        'meta' => [\n";
            foreach ($data['meta'] as $k => $v) {
                $v = str_replace("'", "\\'", $v);
                $output .= "            '{$k}' => '{$v}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($data['seo'])) {
            $output .= "        'seo' => [\n";
            foreach ($data['seo'] as $k => $v) {
                $v = str_replace("'", "\\'", $v);
                $output .= "            '{$k}' => '{$v}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($data['form'])) {
            $output .= "        'form' => [\n";
            foreach ($data['form'] as $k => $v) {
                $v = str_replace("'", "\\'", $v);
                $output .= "            '{$k}' => '{$v}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($data['content'])) {
            $output .= "        'content' => [\n";
            foreach ($data['content'] as $k => $v) {
                $v = str_replace("'", "\\'", $v);
                $output .= "            '{$k}' => '{$v}',\n";
            }
            $output .= "        ],\n";
        }

        $output .= "    ],\n\n";
    }

    $output .= "];\n";
    file_put_contents($file, $output);

    echo "✓ Restored to {$lang}\n";
}

echo "\n✅ keyword-density-checker restored to all files\n";
echo "SEO now has 10 tools with correct slug\n";
