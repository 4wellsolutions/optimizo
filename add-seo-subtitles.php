<?php

/**
 * Complete SEO Tools Implementation
 * - Creates meta sections where missing
 * - Adds h1 and subtitle to all 11 tools across EN, ES, RU
 */

$subtitles = [
    'en' => [
        'meta-analyzer' => 'Analyze meta tags, title, description & keywords for SEO optimization',
        'meta-tag-analyzer' => 'Comprehensive analysis of meta tags for search engine optimization',
        'bing-serp-checker' => 'Check Bing search rankings for your keywords across different locations',
        'keyword-density' => 'Analyze keyword density and frequency to optimize content for SEO',
        'keyword-density-checker' => 'Check keyword usage and density for better search rankings',
        'word-counter' => 'Count words, characters, sentences & paragraphs in your text instantly',
        'google-serp-checker' => 'Check Google search rankings and track keyword positions globally',
        'yahoo-serp-checker' => 'Monitor Yahoo search rankings for your keywords and competitors',
        'broken-links-checker' => 'Find and fix broken links on your website for better SEO & UX',
        'on-page-seo-checker' => 'Complete on-page SEO audit with actionable recommendations',
        'pdf-report' => 'Generate detailed PDF reports for SEO analysis and audits',
    ],
    'es' => [
        'meta-analyzer' => 'Analice meta tags, título, descripción y palabras clave para optimización SEO',
        'meta-tag-analyzer' => 'Análisis completo de etiquetas meta para optimización de motores de búsqueda',
        'bing-serp-checker' => 'Verifique rankings de búsqueda de Bing para palabras clave en diferentes ubicaciones',
        'keyword-density' => 'Analice densidad y frecuencia de palabras clave para optimizar contenido SEO',
        'keyword-density-checker' => 'Verifique uso y densidad de palabras clave para mejores rankings',
        'word-counter' => 'Cuente palabras, caracteres, oraciones y párrafos en su texto al instante',
        'google-serp-checker' => 'Verifique rankings de Google y rastree posiciones de palabras clave globalmente',
        'yahoo-serp-checker' => 'Monitoree rankings de Yahoo para palabras clave y competidores',
        'broken-links-checker' => 'Encuentre y corrija enlaces rotos en su sitio para mejor SEO y UX',
        'on-page-seo-checker' => 'Auditoría completa de SEO on-page con recomendaciones accionables',
        'pdf-report' => 'Genere informes PDF detallados para análisis y auditorías SEO',
    ],
    'ru' => [
        'meta-analyzer' => 'Анализируйте meta теги, заголовок, описание и ключевые слова для SEO оптимизации',
        'meta-tag-analyzer' => 'Комплексный анализ meta тегов для оптимизации поисковых систем',
        'bing-serp-checker' => 'Проверяйте позиции в Bing для ключевых слов в разных локациях',
        'keyword-density' => 'Анализируйте плотность и частоту ключевых слов для оптимизации контента SEO',
        'keyword-density-checker' => 'Проверяйте использование и плотность ключевых слов для лучших рейтингов',
        'word-counter' => 'Считайте слова, символы, предложения и абзацы в тексте мгновенно',
        'google-serp-checker' => 'Проверяйте позиции в Google и отслеживайте ключевые слова глобально',
        'yahoo-serp-checker' => 'Отслеживайте позиции в Yahoo для ваших ключевых слов и конкурентов',
        'broken-links-checker' => 'Находите и исправляйте битые ссылки на сайте для лучшего SEO и UX',
        'on-page-seo-checker' => 'Полный аудит on-page SEO с практическими рекомендациями',
        'pdf-report' => 'Генерируйте детальные PDF отчеты для SEO анализа и аудитов',
    ],
];

$h1s = [
    'en' => [
        'meta-analyzer' => 'Meta Analyzer',
        'meta-tag-analyzer' => 'Meta Tag Analyzer',
        'bing-serp-checker' => 'Bing SERP Checker',
        'keyword-density' => 'Keyword Density Analyzer',
        'keyword-density-checker' => 'Keyword Density Checker',
        'word-counter' => 'Word Counter',
        'google-serp-checker' => 'Google SERP Checker',
        'yahoo-serp-checker' => 'Yahoo SERP Checker',
        'broken-links-checker' => 'Broken Links Checker',
        'on-page-seo-checker' => 'On-Page SEO Checker',
        'pdf-report' => 'SEO PDF Report Generator',
    ],
    'es' => [
        'meta-analyzer' => 'Analizador de Meta',
        'meta-tag-analyzer' => 'Analizador de Etiquetas Meta',
        'bing-serp-checker' => 'Verificador SERP de Bing',
        'keyword-density' => 'Analizador de Densidad de Palabras Clave',
        'keyword-density-checker' => 'Verificador de Densidad de Palabras Clave',
        'word-counter' => 'Contador de Palabras',
        'google-serp-checker' => 'Verificador SERP de Google',
        'yahoo-serp-checker' => 'Verificador SERP de Yahoo',
        'broken-links-checker' => 'Verificador de Enlaces Rotos',
        'on-page-seo-checker' => 'Verificador SEO On-Page',
        'pdf-report' => 'Generador de Informes PDF SEO',
    ],
    'ru' => [
        'meta-analyzer' => 'Анализатор Meta',
        'meta-tag-analyzer' => 'Анализатор Meta тегов',
        'bing-serp-checker' => 'Проверка позиций Bing',
        'keyword-density' => 'Анализатор плотности ключевых слов',
        'keyword-density-checker' => 'Проверка плотности ключевых слов',
        'word-counter' => 'Счетчик слов',
        'google-serp-checker' => 'Проверка позиций Google',
        'yahoo-serp-checker' => 'Проверка позиций Yahoo',
        'broken-links-checker' => 'Проверка битых ссылок',
        'on-page-seo-checker' => 'Проверка On-Page SEO',
        'pdf-report' => 'Генератор PDF отчетов SEO',
    ],
];

function beautifyOutput($translations)
{
    $output = "<?php\n\nreturn [\n";

    foreach ($translations as $toolSlug => $toolData) {
        $output .= "    // " . ucwords(str_replace('-', ' ', $toolSlug)) . "\n";
        $output .= "    '{$toolSlug}' => [\n";

        if (isset($toolData['meta'])) {
            $output .= "        'meta' => [\n";
            foreach ($toolData['meta'] as $key => $value) {
                $escapedValue = str_replace("'", "\\'", $value);
                $output .= "            '{$key}' => '{$escapedValue}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($toolData['seo'])) {
            $output .= "        'seo' => [\n";
            foreach ($toolData['seo'] as $key => $value) {
                $escapedValue = str_replace("'", "\\'", $value);
                $output .= "            '{$key}' => '{$escapedValue}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($toolData['form'])) {
            $output .= "        'form' => [\n";
            foreach ($toolData['form'] as $key => $value) {
                $escapedValue = str_replace("'", "\\'", $value);
                $output .= "            '{$key}' => '{$escapedValue}',\n";
            }
            $output .= "        ],\n";
        }

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
    return $output;
}

$languages = ['en', 'es', 'ru'];
$totalUpdated = 0;
$metaCreated = 0;

echo "\n=== ADDING SEO SUBTITLES ===\n\n";

foreach ($languages as $lang) {
    echo "Processing {$lang}...\n";

    $file = __DIR__ . "/resources/lang/{$lang}/tools/seo.php";
    $translations = include $file;
    $updated = 0;
    $created = 0;

    foreach ($subtitles[$lang] as $slug => $subtitle) {
        if (isset($translations[$slug])) {
            // Create meta section if missing
            if (!isset($translations[$slug]['meta'])) {
                $translations[$slug]['meta'] = [];
                $created++;
                echo "  + Created meta for: $slug\n";
            }

            // Add h1 if missing
            if (!isset($translations[$slug]['meta']['h1'])) {
                $translations[$slug]['meta']['h1'] = $h1s[$lang][$slug];
            }

            // Add subtitle
            $translations[$slug]['meta']['subtitle'] = $subtitle;
            $updated++;
        } else {
            echo "  ⚠ Tool not found: $slug\n";
        }
    }

    file_put_contents($file, beautifyOutput($translations));
    echo "✅ {$lang}: {$updated}/11 complete ($created meta sections created)\n";
    $totalUpdated += $updated;
    $metaCreated += $created;
}

echo "\n=== FINAL SUMMARY ===\n";
echo "Total subtitles added: {$totalUpdated}/33\n";
echo "Meta sections created: {$metaCreated}\n";
echo "All 11 SEO tools complete!\n";
