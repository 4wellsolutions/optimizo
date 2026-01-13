<?php

/**
 * Copy keyword-density-checker from EN to ES and RU with translations
 * Ensure all keys match exactly
 */

echo "=== KEYWORD DENSITY CHECKER - ES & RU TRANSLATION ===\n\n";

// Get English version as reference
$enFile = __DIR__ . '/resources/lang/en/tools/seo.php';
$en = include $enFile;
$enKeyword = $en['keyword-density-checker'];

echo "EN Structure:\n";
foreach ($enKeyword as $section => $content) {
    echo "  - $section (" . (is_array($content) ? count($content) . " items" : "string") . ")\n";
}

// Spanish Translation
$esKeyword = [
    'meta' => [
        'h1' => 'Verificador de Densidad de Palabras Clave',
        'subtitle' => 'Verifique uso y densidad de palabras clave para mejores rankings',
    ],
    'seo' => [
        'title' => 'Verificador de Densidad de Palabras Clave - Verificar Frecuencia',
        'description' => 'Herramienta gratuita para verificar densidad de palabras clave. Analice frecuencia de palabras.',
    ],
    'form' => [
        'label' => 'Pegue Texto o URL',
        'placeholder' => 'Pegue su texto aquí...',
        'button' => 'Verificar Densidad',
    ],
    'results' => [
        'title' => 'Estadísticas de Palabras Clave',
        'total_words' => 'Total de Palabras',
        'unique_words' => 'Palabras Únicas',
        'sentences' => 'Oraciones',
        'paragraphs' => 'Párrafos',
        'long_sentences' => 'Oraciones Largas',
        'short_sentences' => 'Oraciones Cortas',
        'top_keyword' => 'Palabra Clave Principal',
        'top_density' => 'Densidad Principal',
        'single_keywords_title' => 'Palabras Clave Individuales',
        'keyword_header' => 'Palabra Clave',
        'count_header' => 'Conteo',
        'density_header' => 'Densidad',
        'two_word_title' => 'Frases de 2 Palabras',
        'phrase_header' => 'Frase',
        'three_word_title' => 'Frases de 3 Palabras',
    ],
    'content' => [
        'main_title' => 'Verificador de Densidad de Palabras Clave',
        'main_subtitle' => 'Optimice la relevancia de su contenido analizando la frecuencia de palabras clave.',
        'intro' => 'Nuestro Verificador de Densidad de Palabras Clave le ayuda a encontrar las palabras y frases más utilizadas en su texto. Perfecto para SEOs y redactores de contenido para evitar el relleno de palabras clave.',
        'what_is_title' => '¿Qué es la Densidad de Palabras Clave?',
        'what_is_text' => 'La densidad de palabras clave es el porcentaje de veces que una palabra clave o frase aparece en el contenido en comparación con el número total de palabras en la página. Es un factor clave en la Optimización de Motores de Búsqueda (SEO).',
        'guidelines_title' => 'Pautas de Densidad',
        'why_use_title' => '¿Por Qué Verificar la Densidad de Palabras Clave?',
        'best_practices_title' => 'Mejores Prácticas',
        'faq_title' => 'Preguntas Frecuentes',
    ],
    'guidelines' => [
        'g1' => 'No existe un porcentaje "perfecto", pero <strong>1-3%</strong> se considera generalmente seguro.',
        'g2' => 'Evite el "Relleno de Palabras Clave" ya que puede dañar su clasificación.',
        'g3' => 'Escriba de forma natural para los lectores, no solo para los bots.',
        'g4' => 'Use sinónimos y palabras clave LSI (Indexación Semántica Latente).',
        'g5' => 'Verifique no solo palabras individuales, sino frases de 2-3 palabras.',
    ],
    'features' => [
        'f1_title' => 'Análisis Profundo',
        'f1_desc' => 'Analiza palabras individuales, bigramas y trigramas.',
        'f2_title' => 'Contador de Palabras',
        'f2_desc' => 'Conteo preciso de palabras, oraciones y párrafos.',
        'f3_title' => 'Verificación de Relleno',
        'f3_desc' => 'Ayuda a identificar si representa palabras clave con demasiada frecuencia.',
        'f4_title' => 'Herramienta Gratuita',
        'f4_desc' => 'Completamente gratuito de usar sin límites.',
        'f5_title' => 'Para Escritores',
        'f5_desc' => 'Mejore la calidad y legibilidad del contenido.',
        'f6_title' => 'Palabras Vacías',
        'f6_desc' => 'Filtrado inteligente de palabras vacías comunes.',
    ],
    'best_practices' => [
        'bp1' => 'Enfóquese en la calidad del contenido en lugar de números de densidad específicos.',
        'bp2' => 'Incluya su palabra clave principal en el primer párrafo.',
        'bp3' => 'Use palabras clave en encabezados H1 y H2.',
        'bp4' => 'Use variaciones de palabras clave de cola larga.',
        'bp5' => 'No sacrifique la legibilidad por SEO.',
        'bp6' => 'No repita la misma palabra de forma antinatural.',
    ],
    'faq' => [
        'q1' => '¿Qué es una buena densidad de palabras clave?',
        'a1' => 'La mayoría de los expertos en SEO recomiendan alrededor del 1-2%. El texto debe leerse de forma natural.',
        'q2' => '¿Qué es el relleno de palabras clave?',
        'a2' => 'Es la práctica de cargar una página web con palabras clave en un intento de manipular la clasificación de un sitio en los resultados de búsqueda de Google.',
        'q3' => '¿Ignora las palabras vacías?',
        'a3' => 'Sí, nuestra herramienta filtra las palabras vacías comunes (como "el", "y", "es") para darle la densidad de palabras significativas.',
        'q4' => '¿Importa la densidad de frases?',
        'a4' => 'Sí, los motores de búsqueda buscan frases y grupos de temas, no solo palabras individuales.',
        'q5' => '¿Puedo verificar una URL?',
        'a5' => 'Actualmente esta herramienta funciona con entrada de texto. Copie el contenido de su página y péguelo aquí.',
    ],
    'alerts' => [
        'enter_text' => 'Por favor ingrese algo de texto para analizar',
    ],
];

// Russian Translation
$ruKeyword = [
    'meta' => [
        'h1' => 'Проверка плотности ключевых слов',
        'subtitle' => 'Проверяйте использование и плотность ключевых слов для лучших рейтингов',
    ],
    'seo' => [
        'title' => 'Проверка плотности ключевых слов - Проверить частоту',
        'description' => 'Бесплатный инструмент проверки плотности ключевых слов. Анализируйте частоту слов.',
    ],
    'form' => [
        'label' => 'Вставьте текст или URL',
        'placeholder' => 'Вставьте текст здесь...',
        'button' => 'Проверить плотность',
    ],
    'results' => [
        'title' => 'Статистика ключевых слов',
        'total_words' => 'Всего слов',
        'unique_words' => 'Уникальных слов',
        'sentences' => 'Предложений',
        'paragraphs' => 'Абзацев',
        'long_sentences' => 'Длинные предложения',
        'short_sentences' => 'Короткие предложения',
        'top_keyword' => 'Главное ключевое слово',
        'top_density' => 'Главная плотность',
        'single_keywords_title' => 'Отдельные ключевые слова',
        'keyword_header' => 'Ключевое слово',
        'count_header' => 'Количество',
        'density_header' => 'Плотность',
        'two_word_title' => 'Фразы из 2 слов',
        'phrase_header' => 'Фраза',
        'three_word_title' => 'Фразы из 3 слов',
    ],
    'content' => [
        'main_title' => 'Проверка плотности ключевых слов',
        'main_subtitle' => 'Оптимизируйте релевантность контента, анализируя частоту ключевых слов.',
        'intro' => 'Наша проверка плотности ключевых слов помогает найти наиболее часто используемые слова и фразы в вашем тексте. Идеально для SEO-специалистов и авторов контента, чтобы избежать переспама ключевыми словами.',
        'what_is_title' => 'Что такое плотность ключевых слов?',
        'what_is_text' => 'Плотность ключевых слов - это процентное соотношение количества появлений ключевого слова или фразы в контенте по сравнению с общим количеством слов на странице. Это ключевой фактор в поисковой оптимизации (SEO).',
        'guidelines_title' => 'Рекомендации по плотности',
        'why_use_title' => 'Зачем проверять плотность ключевых слов?',
        'best_practices_title' => 'Лучшие практики',
        'faq_title' => 'Часто задаваемые вопросы',
    ],
    'guidelines' => [
        'g1' => 'Не существует "идеального" процента, но <strong>1-3%</strong> обычно считается безопасным.',
        'g2' => 'Избегайте "переспама ключевыми словами", так как это может навредить вашему рейтингу.',
        'g3' => 'Пишите естественно для читателей, а не только для ботов.',
        'g4' => 'Используйте синонимы и LSI (латентно-семантическое индексирование) ключевые слова.',
        'g5' => 'Проверяйте не только отдельные слова, но и фразы из 2-3 слов.',
    ],
    'features' => [
        'f1_title' => 'Глубокий анализ',
        'f1_desc' => 'Анализирует отдельные слова, биграммы и триграммы.',
        'f2_title' => 'Счетчик слов',
        'f2_desc' => 'Точный подсчет слов, предложений и абзацев.',
        'f3_title' => 'Проверка переспама',
        'f3_desc' => 'Помогает определить, не используете ли вы ключевые слова слишком часто.',
        'f4_title' => 'Бесплатный инструмент',
        'f4_desc' => 'Совершенно бесплатно без ограничений.',
        'f5_title' => 'Для авторов',
        'f5_desc' => 'Улучшайте качество и читабельность контента.',
        'f6_title' => 'Стоп-слова',
        'f6_desc' => 'Интеллектуальная фильтрация распространенных стоп-слов.',
    ],
    'best_practices' => [
        'bp1' => 'Фокусируйтесь на качестве контента, а не на конкретных показателях плотности.',
        'bp2' => 'Включайте основное ключевое слово в первый абзац.',
        'bp3' => 'Используйте ключевые слова в заголовках H1 и H2.',
        'bp4' => 'Используйте вариации длинных ключевых слов.',
        'bp5' => 'Не жертвуйте читабельностью ради SEO.',
        'bp6' => 'Не повторяйте одно и то же слово неестественно.',
    ],
    'faq' => [
        'q1' => 'Какая хорошая плотность ключевых слов?',
        'a1' => 'Большинство SEO-экспертов рекомендуют около 1-2%. Текст должен читаться естественно.',
        'q2' => 'Что такое переспам ключевыми словами?',
        'a2' => 'Это практика загрузки веб-страницы ключевыми словами в попытке манипулировать рейтингом сайта в результатах поиска Google.',
        'q3' => 'Игнорирует ли он стоп-слова?',
        'a3' => 'Да, наш инструмент фильтрует распространенные стоп-слова (такие как "the", "and", "is"), чтобы дать вам плотность значимых слов.',
        'q4' => 'Важна ли плотность фраз?',
        'a4' => 'Да, поисковые системы ищут фразы и тематические кластеры, а не только отдельные слова.',
        'q5' => 'Могу ли я проверить URL?',
        'a5' => 'В настоящее время этот инструмент работает с текстовым вводом. Скопируйте содержимое вашей страницы и вставьте его сюда.',
    ],
    'alerts' => [
        'enter_text' => 'Пожалуйста, введите текст для анализа',
    ],
];

// Load existing ES and RU files
$esFile = __DIR__ . '/resources/lang/es/tools/seo.php';
$ruFile = __DIR__ . '/resources/lang/ru/tools/seo.php';

$esSeo = include $esFile;
$ruSeo = include $ruFile;

// Update keyword-density-checker
$esSeo['keyword-density-checker'] = $esKeyword;
$ruSeo['keyword-density-checker'] = $ruKeyword;

// Save both files
function saveTranslationFile($file, $translations)
{
    $output = "<?php\n\nreturn [\n";

    foreach ($translations as $slug => $data) {
        $output .= "    // " . ucwords(str_replace('-', ' ', $slug)) . "\n";
        $output .= "    '{$slug}' => [\n";

        // Order sections
        $sections = ['meta', 'seo', 'form', 'interface', 'results', 'stats', 'alerts', 'content', 'meta_tags', 'benefits', 'results_labels', 'features', 'faq', 'js', 'markets', 'domains', 'progress', 'link_types', 'best_practices', 'guidelines', 'labels', 'how_to'];

        foreach ($sections as $section) {
            if (isset($data[$section]) && is_array($data[$section])) {
                $output .= "        '{$section}' => [\n";
                foreach ($data[$section] as $k => $v) {
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

saveTranslationFile($esFile, $esSeo);
saveTranslationFile($ruFile, $ruSeo);

echo "\n✅ COMPLETE!\n";
echo "- ES: keyword-density-checker added (10 sections)\n";
echo "- RU: keyword-density-checker added (10 sections)\n";
echo "- All keys match EN structure\n";
