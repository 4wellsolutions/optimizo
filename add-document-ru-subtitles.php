<?php

/**
 * Add meta.subtitle to all 11 Document tools - RUSSIAN
 */

$ruSubtitles = [
    'pdf-to-word' => 'Конвертируйте PDF в редактируемые файлы Word мгновенно с высокой точностью',
    'word-to-pdf' => 'Преобразуйте документы Word в PDF с сохранением идеального форматирования',
    'excel-to-pdf' => 'Конвертируйте таблицы Excel в профессиональные PDF-документы легко',
    'pdf-to-excel' => 'Извлекайте данные из PDF в редактируемые таблицы Excel с точностью',
    'ppt-to-pdf' => 'Конвертируйте презентации PowerPoint в PDF для удобного обмена',
    'pdf-to-ppt' => 'Преобразуйте PDF-документы в редактируемые презентации PowerPoint',
    'jpg-to-pdf' => 'Конвертируйте изображения JPG в PDF с пользовательскими настройками страниц',
    'pdf-to-jpg' => 'Извлекайте страницы из PDF как высококачественные JPG изображения мгновенно',
    'pdf-compressor' => 'Уменьшайте размер PDF файлов сохраняя качество для быстрого обмена',
    'pdf-merger' => 'Объединяйте несколько PDF файлов в один документ без усилий',
    'pdf-splitter' => 'Разделяйте PDF документы на отдельные страницы или извлекайте диапазоны',
];

$ruH1s = [
    'pdf-to-word' => 'Конвертер PDF в Word',
    'word-to-pdf' => 'Конвертер Word в PDF',
    'excel-to-pdf' => 'Конвертер Excel в PDF',
    'pdf-to-excel' => 'Конвертер PDF в Excel',
    'ppt-to-pdf' => 'Конвертер PowerPoint в PDF',
    'pdf-to-ppt' => 'Конвертер PDF в PowerPoint',
    'jpg-to-pdf' => 'Конвертер JPG в PDF',
    'pdf-to-jpg' => 'Конвертер PDF в JPG',
    'pdf-compressor' => 'Сжатие PDF',
    'pdf-merger' => 'Объединение PDF',
    'pdf-splitter' => 'Разделение PDF',
];

$ruFile = __DIR__ . '/resources/lang/ru/tools/document.php';
$ruTranslations = include $ruFile;

$updated = 0;

foreach ($ruSubtitles as $slug => $subtitle) {
    if (isset($ruTranslations[$slug])) {
        if (!isset($ruTranslations[$slug]['meta'])) {
            $ruTranslations[$slug]['meta'] = [];
        }
        if (!isset($ruTranslations[$slug]['meta']['h1'])) {
            $ruTranslations[$slug]['meta']['h1'] = $ruH1s[$slug];
        }
        $ruTranslations[$slug]['meta']['subtitle'] = $subtitle;
        echo "✓ Added RU subtitle for: $slug\n";
        $updated++;
    }
}

// Generate output
$output = "<?php\n\nreturn [\n";

foreach ($ruTranslations as $toolSlug => $toolData) {
    $output .= "    // " . ucwords(str_replace('-', ' ', $toolSlug)) . "\n";
    $output .= "    '{$toolSlug}' => [\n";

    if (isset($toolData['meta'])) {
        $output .= "        'meta' => [\n";
        if (isset($toolData['meta']['h1'])) {
            $h1 = str_replace("'", "\\'", $toolData['meta']['h1']);
            $output .= "            'h1' => '{$h1}',\n";
        }
        if (isset($toolData['meta']['subtitle'])) {
            $subtitle = str_replace("'", "\\'", $toolData['meta']['subtitle']);
            $output .= "            'subtitle' => '{$subtitle}',\n";
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

file_put_contents($ruFile, $output);

echo "\n✅ RU Document tools complete: {$updated}/11\n";
