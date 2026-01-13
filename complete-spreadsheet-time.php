<?php
// Verify SEO + add Spreadsheet & Time subtitles in one batch
echo "=== VERIFICATION & BATCH COMPLETION ===\n\n";

// Verify SEO
echo "SEO Verification:\n";
$seoLangs = ['en', 'es', 'ru'];
foreach ($seoLangs as $lang) {
    $trans = include __DIR__ . "/resources/lang/{$lang}/tools/seo.php";
    $count = 0;
    foreach ($trans as $t)
        if (isset($t['meta']['subtitle']))
            $count++;
    echo "  {$lang}: {$count}/11\n";
}

// Spreadsheet & Time subtitles
$allSubtitles = [
    'spreadsheet' => [
        'en' => [
            'csv-to-sql' => 'Convert CSV files to SQL INSERT statements for database import instantly',
            'csv-to-excel' => 'Transform CSV data to Excel format with proper formatting & sheets',
            'excel-to-csv' => 'Convert Excel spreadsheets to CSV format for data portability',
            'google-sheets-to-excel' => 'Download Google Sheets as Excel files for offline editing',
            'xls-to-xlsx' => 'Upgrade legacy XLS files to modern XLSX format effortlessly',
            'xlsx-to-xls' => 'Convert XLSX to XLS format for compatibility with older systems',
        ],
        'es' => [
            'csv-to-sql' => 'Convierta archivos CSV a declaraciones SQL INSERT para importación a base de datos',
            'csv-to-excel' => 'Transforme datos CSV a formato Excel con formato y hojas apropiados',
            'excel-to-csv' => 'Convierta hojas de Excel a formato CSV para portabilidad de datos',
            'google-sheets-to-excel' => 'Descargue Google Sheets como archivos Excel para edición offline',
            'xls-to-xlsx' => 'Actualice archivos XLS antiguos a formato XLSX moderno sin esfuerzo',
            'xlsx-to-xls' => 'Convierta XLSX a formato XLS para compatibilidad con sistemas antiguos',
        ],
        'ru' => [
            'csv-to-sql' => 'Конвертируйте CSV файлы в SQL INSERT операторы для импорта в базу данных',
            'csv-to-excel' => 'Преобразуйте CSV данные в формат Excel с правильным форматированием и листами',
            'excel-to-csv' => 'Конвертируйте таблицы Excel в формат CSV для переносимости данных',
            'google-sheets-to-excel' => 'Скачивайте Google Sheets как Excel файлы для автономного редактирования',
            'xls-to-xlsx' => 'Обновляйте устаревшие XLS файлы в современный формат XLSX легко',
            'xlsx-to-xls' => 'Конвертируйте XLSX в формат XLS для совместимости со старыми системами',
        ],
    ],
    'time' => [
        'en' => [
            'epoch-time-converter' => 'Convert Unix timestamps to human-readable dates and vice versa',
            'date-to-unix' => 'Transform dates to Unix epoch timestamps for programming & databases',
            'unix-to-date' => 'Convert Unix timestamps to readable date formats across timezones',
            'local-to-utc' => 'Convert local time to UTC for global time synchronization',
            'utc-to-local' => 'Transform UTC time to your local timezone instantly',
            'time-zone-converter' => 'Convert time between different timezones worldwide accurately',
        ],
        'es' => [
            'epoch-time-converter' => 'Convierta timestamps Unix a fechas legibles y viceversa',
            'date-to-unix' => 'Transforme fechas a timestamps época Unix para programación y bases de datos',
            'unix-to-date' => 'Convierta timestamps Unix a formatos de fecha legibles entre zonas horarias',
            'local-to-utc' => 'Convierta hora local a UTC para sincronización horaria global',
            'utc-to-local' => 'Transforme hora UTC a su zona horaria local instantáneamente',
            'time-zone-converter' => 'Convierta hora entre diferentes zonas horarias mundiales con precisión',
        ],
        'ru' => [
            'epoch-time-converter' => 'Конвертируйте Unix timestamps в читаемые даты и обратно',
            'date-to-unix' => 'Преобразуйте даты в Unix epoch timestamps для программирования и баз данных',
            'unix-to-date' => 'Конвертируйте Unix timestamps в читаемые форматы дат между часовыми поясами',
            'local-to-utc' => 'Конвертируйте локальное время в UTC для глобальной синхронизации',
            'utc-to-local' => 'Преобразуйте UTC время в ваш локальный часовой пояс мгновенно',
            'time-zone-converter' => 'Конвертируйте время между разными часовыми поясами мира точно',
        ],
    ],
];

function addSubtitles($category, $subtitles)
{
    $total = 0;
    foreach (['en', 'es', 'ru'] as $lang) {
        $file = __DIR__ . "/resources/lang/{$lang}/tools/{$category}.php";
        $trans = include $file;
        $updated = 0;

        foreach ($subtitles[$lang] as $slug => $subtitle) {
            if (isset($trans[$slug])) {
                if (!isset($trans[$slug]['meta']))
                    $trans[$slug]['meta'] = [];
                $trans[$slug]['meta']['subtitle'] = $subtitle;
                $updated++;
            }
        }

        $output = "<?php\n\nreturn [\n";
        foreach ($trans as $slug => $data) {
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
        $total += $updated;
        echo "  {$category} {$lang}: {$updated}\n";
    }
    return $total;
}

echo "\nSpreadsheet Tools:\n";
$s = addSubtitles('spreadsheet', $allSubtitles['spreadsheet']);

echo "\nTime Tools:\n";
$t = addSubtitles('time', $allSubtitles['time']);

echo "\n✅ Total: " . ($s + $t) . " subtitles added\n";
echo "Spreadsheet (6) & Time (6) complete!\n";
