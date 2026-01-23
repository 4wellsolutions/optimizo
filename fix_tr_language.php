<?php

/**
 * Turkish Language Files - Comprehensive Fix Script
 * Fixes empty values, English wording, and missing keys
 */

// Turkish translations for common empty values and English text
$translations = [
    // Common step 5 translations (empty in TR files)
    'step_5_camelCase' => 'Dönüştürülen camelCase metnini kodunuzda, değişken adlarınızda veya API uç noktalarınızda tutarlı adlandırma kuralları için kullanın.',
    'step_5_case_converter' => 'Kodunuzda okunabilirliği artırmak ve tutarlılığı korumak için durum dönüştürmeyi kullanın.',

    // Number base converter empty values
    'base_8' => 'Sekizli (Taban-8): Unix dosya izinleri ve eski bilgisayar sistemlerinde kullanılır.',
    'base_10' => 'Onluk (Taban-10): Günlük kullanımda standart sayı sistemi.',
    'base_16' => 'Onaltılı (Taban-16): Bellek adresleri, renk kodları ve bayt temsili için kullanılır.',

    // Common English placeholders
    'Enter a decimal number (e.g., 255)...' => 'Bir onluk sayı girin (örn. 255)...',
    'An error occurred: ' => 'Bir hata oluştu: ',
    'Pint (US)' => 'Pint (ABD)',
    'Quart (US)' => 'Quart (ABD)',
    'Gallon (US)' => 'Galon (ABD)',
    'Cup (US)' => 'Bardak (ABD)',
    'Tablespoon (US)' => 'Yemek Kaşığı (ABD)',
    'Teaspoon (US)' => 'Çay Kaşığı (ABD)',
];

$enPath = __DIR__ . '/resources/lang/en/tools/';
$trPath = __DIR__ . '/resources/lang/tr/tools/';

$files = [
    'converters.json',
    'development.json',
    'image.json',
    'document.json',
    'network.json',
    'seo.json',
    'spreadsheet.json',
    'text.json',
    'time.json',
    'utility.json',
    'youtube.json'
];

function fixEmptyAndEnglish(&$trData, $enData, $path = '', &$fixCount = 0)
{
    global $translations;

    foreach ($enData as $key => $value) {
        $currentPath = $path ? "$path.$key" : $key;

        // If key doesn't exist in TR, add it
        if (!isset($trData[$key])) {
            if (is_array($value)) {
                $trData[$key] = $value; // Will be translated recursively
                $fixCount++;
            } else {
                // Try to find translation, otherwise use English as placeholder
                $trData[$key] = $translations[$value] ?? $value;
                $fixCount++;
            }
            continue;
        }

        // If nested, recurse
        if (is_array($value) && is_array($trData[$key])) {
            fixEmptyAndEnglish($trData[$key], $value, $currentPath, $fixCount);
            continue;
        }

        // Fix empty values
        if (is_string($trData[$key]) && trim($trData[$key]) === '') {
            if (is_string($value)) {
                // Check if we have a specific translation
                $trData[$key] = $translations[$value] ?? translateText($value);
                $fixCount++;
                echo "  Fixed empty: $currentPath\n";
            }
            continue;
        }

        // Fix English wording (TR identical to EN)
        if (is_string($value) && is_string($trData[$key]) && $value === $trData[$key]) {
            // Skip very short strings and URLs
            if (strlen($value) > 3 && !preg_match('/^https?:\/\//', $value)) {
                // Check if we have a specific translation
                if (isset($translations[$value])) {
                    $trData[$key] = $translations[$value];
                    $fixCount++;
                    echo "  Fixed English: $currentPath = \"$value\"\n";
                }
            }
        }
    }
}

function translateText($text)
{
    // Basic translation mapping for common technical terms
    $commonTranslations = [
        'Enter' => 'Girin',
        'Result' => 'Sonuç',
        'Output' => 'Çıkış',
        'Input' => 'Giriş',
        'Convert' => 'Dönüştür',
        'Copy' => 'Kopyala',
        'Clear' => 'Temizle',
        'Download' => 'İndir',
        'Upload' => 'Yükle',
        'Example' => 'Örnek',
        'Error' => 'Hata',
        'Success' => 'Başarılı',
        'Warning' => 'Uyarı',
        'Info' => 'Bilgi',
        'Please' => 'Lütfen',
        'Click' => 'Tıklayın',
        'Select' => 'Seçin',
        'Choose' => 'Seçin',
        'Use' => 'Kullanın',
        'Type' => 'Yazın',
        'Paste' => 'Yapıştırın',
        'will appear here' => 'burada görünecek',
        'e.g.' => 'örn.',
        'for example' => 'örneğin',
    ];

    // Try simple word replacement
    $translated = $text;
    foreach ($commonTranslations as $en => $tr) {
        $translated = str_ireplace($en, $tr, $translated);
    }

    // If translation changed, return it; otherwise return original
    return $translated !== $text ? $translated : $text;
}

echo "Turkish Language Files - Comprehensive Fix\n";
echo "==========================================\n\n";

$totalFixed = 0;

foreach ($files as $file) {
    echo "Processing: $file\n";

    $enFile = $enPath . $file;
    $trFile = $trPath . $file;

    if (!file_exists($enFile) || !file_exists($trFile)) {
        echo "  ⚠️  Skipping (file not found)\n\n";
        continue;
    }

    $enContent = file_get_contents($enFile);
    $trContent = file_get_contents($trFile);

    $enData = json_decode($enContent, true);
    $trData = json_decode($trContent, true);

    if ($enData === null || $trData === null) {
        echo "  ⚠️  Skipping (invalid JSON)\n\n";
        continue;
    }

    $fixCount = 0;
    fixEmptyAndEnglish($trData, $enData, '', $fixCount);

    if ($fixCount > 0) {
        // Save with proper UTF-8 encoding
        $newContent = json_encode($trData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        file_put_contents($trFile, $newContent);
        echo "  ✅ Fixed $fixCount issues\n";
        $totalFixed += $fixCount;
    } else {
        echo "  ✓ No issues to fix\n";
    }

    echo "\n";
}

echo "==========================================\n";
echo "Total issues fixed: $totalFixed\n";
echo "Re-run analyze_tr_language.php to verify\n";
