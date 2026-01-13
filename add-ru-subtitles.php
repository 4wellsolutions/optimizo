<?php

/**
 * Script to add all 20 Russian subtitles to converters.php
 * This will programmatically update the file to add meta sections
 */

$ruSubtitles = [
    'angle-converter' => 'Конвертируйте градусы, радианы, грады, угловые минуты & секунды мгновенно',
    'area-converter' => 'Конвертируйте квадратные метры, акры, гектары & квадратные футы с точностью',
    'cooking-unit-converter' => 'Конвертируйте чашки, ложки, чайные ложки, мл & жид. унции для рецептов',
    'data-transfer-rate-converter' => 'Конвертируйте Мбит/с, Гбит/с, МБ/с & КБ/с для скорости интернета',
    'density-converter' => 'Конвертируйте кг/м³, г/см³ & фунт/фт³ для материаловедения',
    'digital-storage-converter' => 'Конвертируйте байты, КБ, МБ, ГБ & ТБ для размеров файлов и хранилища',
    'energy-converter' => 'Конвертируйте джоули, калории, кВт⋅ч & БТЕ для расчетов энергии',
    'force-converter' => 'Конвертируйте ньютоны, фунт-силу & килограмм-силу мгновенно',
    'frequency-converter' => 'Конвертируйте Гц, кГц, МГц & ГГц для электроники и сигналов',
    'fuel-consumption-converter' => 'Конвертируйте MPG, км/л & л/100км для топливной эффективности',
    'length-converter' => 'Конвертируйте метры, футы, дюймы, км & мили с высокой точностью',
    'molar-mass-converter' => 'Конвертируйте г/моль, кг/моль & фунт/моль для химических расчетов',
    'power-converter' => 'Конвертируйте ватты, киловатты, лошадиные силы & БТЕ/ч мгновенно',
    'pressure-converter' => 'Конвертируйте PSI, бар, паскаль, атм & мм рт. ст. для разных применений',
    'speed-converter' => 'Конвертируйте миль/ч, км/ч, узлы, м/с & числа Маха мгновенно',
    'temperature-converter' => 'Конвертируйте Цельсий, Фаренгейт & Кельвин с точными формулами',
    'time-unit-converter' => 'Конвертируйте секунды, минуты, часы, дни, недели & годы',
    'torque-converter' => 'Конвертируйте Н⋅м, фунт-фут & кг⋅м для механических значений крутящего момента',
    'volume-converter' => 'Конвертируйте литры, галлоны, чашки, мл & кубические метры',
    'weight-converter' => 'Конвертируйте кг, фунты, унции, граммы & стоуны точно',
];

$ruH1s = [
    'angle-converter' => 'Конвертер углов',
    'area-converter' => 'Конвертер площади',
    'cooking-unit-converter' => 'Кулинарный конвертер',
    'data-transfer-rate-converter' => 'Конвертер скорости передачи данных',
    'density-converter' => 'Конвертер плотности',
    'digital-storage-converter' => 'Конвертер цифрового хранилища',
    'energy-converter' => 'Конвертер энергии',
    'force-converter' => 'Конвертер силы',
    'frequency-converter' => 'Конвертер частоты',
    'fuel-consumption-converter' => 'Конвертер расхода топлива',
    'length-converter' => 'Конвертер длины',
    'molar-mass-converter' => 'Конвертер молярной массы',
    'power-converter' => 'Конвертер мощности',
    'pressure-converter' => 'Конвертер давления',
    'speed-converter' => 'Конвертер скорости',
    'temperature-converter' => 'Конвертер температуры',
    'time-unit-converter' => 'Конвертер единиц времени',
    'torque-converter' => 'Конвертер крутящего момента',
    'volume-converter' => 'Конвертер объема',
    'weight-converter' => 'Конвертер веса',
];

// Load the current RU file
$ruFile = __DIR__ . '/resources/lang/ru/tools/converters.php';
$ruTranslations = include $ruFile;

$updated = 0;
$created = 0;

foreach ($ruSubtitles as $slug => $subtitle) {
    if (isset($ruTranslations[$slug])) {
        // Ensure meta section exists
        if (!isset($ruTranslations[$slug]['meta'])) {
            $ruTranslations[$slug]['meta'] = [];
            echo "Created meta section for: $slug\n";
            $created++;
        }

        // Add/update h1
        if (!isset($ruTranslations[$slug]['meta']['h1'])) {
            $ruTranslations[$slug]['meta']['h1'] = $ruH1s[$slug];
        }

        // Add subtitle
        $ruTranslations[$slug]['meta']['subtitle'] = $subtitle;
        echo "✓ Updated subtitle for: $slug\n";
        $updated++;
    } else {
        echo "⚠ Translation key not found: $slug\n";
    }
}

// Generate the PHP file content
$output = "<?php\n\nreturn [\n";

foreach ($ruTranslations as $key => $value) {
    $output .= "    '$key' => " . var_export($value, true) . ",\n\n";
}

$output .= "];\n";

// Save the updated file
file_put_contents($ruFile, $output);

echo "\n=== COMPLETION ===\n";
echo "Updated: $updated tools\n";
echo "Created meta sections: $created tools\n";
echo "File saved: $ruFile\n";
