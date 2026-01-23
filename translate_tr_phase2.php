<?php

/**
 * Turkish Language Translation Script - Phase 2
 * Translates remaining English wording using comprehensive translation mappings
 */

$enPath = __DIR__ . '/resources/lang/en/tools/';
$trPath = __DIR__ . '/resources/lang/tr/tools/';

// Comprehensive Turkish translations for common English phrases
$phraseTranslations = [
    // Units and measurements
    'Pint (US)' => 'Pint (ABD)',
    'Quart (US)' => 'Quart (ABD)',
    'Gallon (US)' => 'Galon (ABD)',
    'Cup (US)' => 'Bardak (ABD)',
    'Tablespoon (US)' => 'Yemek Kaşığı (ABD)',
    'Teaspoon (US)' => 'Çay Kaşığı (ABD)',
    'Fluid Ounce (fl oz)' => 'Sıvı Ons (fl oz)',
    'Milliliter (ml)' => 'Mililitre (ml)',

    // Placeholders
    'Enter a decimal number (e.g., 255)...' => 'Bir onluk sayı girin (örn. 255)...',
    'Enter a number (e.g., 255)...' => 'Bir sayı girin (örn. 255)...',
    'Result will appear here...' => 'Sonuç burada görünecek...',
    'Enter text here...' => 'Metni buraya girin...',
    'Type or paste your text here...' => 'Metninizi buraya yazın veya yapıştırın...',

    // Error messages
    'An error occurred: ' => 'Bir hata oluştu: ',
    'An error occurred during conversion: ' => 'Dönüşüm sırasında bir hata oluştu: ',
    'Please enter a number to convert' => 'Lütfen dönüştürülecek bir sayı girin',
    'Please enter some text to convert' => 'Lütfen dönüştürülecek bir metin girin',
    'Please enter some data to convert' => 'Lütfen dönüştürülecek bir veri girin',
    'Nothing to copy! Please convert a number first.' => 'Kopyalanacak bir şey yok! Lütfen önce bir sayıyı dönüştürün.',
    'Nothing to copy! Please convert some text first.' => 'Kopyalanacak bir şey yok! Lütfen önce metni dönüştürün.',
    'Nothing to copy! Please perform a conversion first.' => 'Kopyalanacak bir şey yok! Lütfen önce bir dönüşüm yapın.',

    // Success messages
    '✓ Converted to hexadecimal successfully!' => '✓ Onaltılıya başarıyla dönüştürüldü!',
    '✓ Converted to decimal successfully!' => '✓ Onluğa başarıyla dönüştürüldü!',
    '✓ Copied to clipboard!' => '✓ Panoya kopyalandı!',
    '✓ Copied to clipboard successfully!' => '✓ Panoya başarıyla kopyalandı!',

    // Common words and phrases
    'Enter' => 'Girin',
    'Result' => 'Sonuç',
    'Output' => 'Çıkış',
    'Input' => 'Giriş',
    'Convert' => 'Dönüştür',
    'Copy' => 'Kopyala',
    'Clear' => 'Temizle',
    'Clear All' => 'Hepsini Temizle',
    'Download' => 'İndir',
    'Upload' => 'Yükle',
    'Example' => 'Örnek',
    'Load Example' => 'Örnek Yükle',
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
    'Copy Result' => 'Sonucu Kopyala',
    'Copy Output' => 'Çıkışı Kopyala',
    'Download Text' => 'Metni İndir',

    // Technical terms
    'Decimal Number' => 'Onluk Sayı',
    'Binary Number' => 'İkili Sayı',
    'Hexadecimal Number' => 'Onaltılı Sayı',
    'Decimal Output' => 'Onluk Çıkış',
    'Binary Output' => 'İkili Çıkış',
    'Hexadecimal Output' => 'Onaltılı Çıkış',
    'Text Output' => 'Metin Çıkışı',
    'Binary Input' => 'İkili Giriş',
    'Hexadecimal Input' => 'Onaltılı Giriş',

    // Descriptions and labels
    'Invalid decimal number. Please use digits 0-9.' => 'Geçersiz onluk sayı. Lütfen 0-9 rakamlarını kullanın.',
    'Invalid hexadecimal number. Please use 0-9 and A-F.' => 'Geçersiz onaltılı sayı. Lütfen 0-9 ve A-F kullanın.',
    'Invalid binary number. Please use only 0s and 1s.' => 'Geçersiz ikili sayı. Lütfen sadece 0 ve 1 kullanın.',

    // Number base descriptions
    'Octal (Base-8): Used in Unix file permissions and legacy computer systems.' => 'Sekizli (Taban-8): Unix dosya izinleri ve eski bilgisayar sistemlerinde kullanılır.',
    'Decimal (Base-10): The standard number system in everyday use.' => 'Onluk (Taban-10): Günlük kullanımda standart sayı sistemi.',
    'Hexadecimal (Base-16): Used for memory addresses, color codes, and byte representation.' => 'Onaltılı (Taban-16): Bellek adresleri, renk kodları ve bayt temsili için kullanılır.',

    // Step 5 translations
    'Use the converted camelCase text in your code, variable names, or API endpoints for consistent naming conventions.' => 'Dönüştürülen camelCase metnini kodunuzda, değişken adlarınızda veya API uç noktalarınızda tutarlı adlandırma kuralları için kullanın.',
    'Use case conversion to maintain consistency across your codebase and improve code readability.' => 'Kodunuzda tutarlılığı korumak ve kod okunabilirliğini artırmak için durum dönüştürmeyi kullanın.',
];

function translateEnglishText(&$trData, $enData, $phraseTranslations, $path = '', &$fixCount = 0)
{
    foreach ($enData as $key => $value) {
        $currentPath = $path ? "$path.$key" : $key;

        if (!isset($trData[$key])) {
            continue; // Skip missing keys for now
        }

        // If nested, recurse
        if (is_array($value) && is_array($trData[$key])) {
            translateEnglishText($trData[$key], $value, $phraseTranslations, $currentPath, $fixCount);
            continue;
        }

        // Check if TR value is identical to EN (English wording)
        if (is_string($value) && is_string($trData[$key]) && $value === $trData[$key]) {
            // Skip very short strings, URLs, and technical abbreviations
            if (strlen($value) <= 3 || preg_match('/^https?:\/\//', $value) || preg_match('/^[A-Z]{2,}$/', $value)) {
                continue;
            }

            // Check if we have an exact translation
            if (isset($phraseTranslations[$value])) {
                $trData[$key] = $phraseTranslations[$value];
                $fixCount++;
                echo "  Translated: $currentPath\n";
            }
        }
    }
}

echo "Turkish Language Translation - Phase 2\n";
echo "======================================\n\n";

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
    translateEnglishText($trData, $enData, $phraseTranslations, '', $fixCount);

    if ($fixCount > 0) {
        // Save with proper UTF-8 encoding
        $newContent = json_encode($trData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        file_put_contents($trFile, $newContent);
        echo "  ✅ Translated $fixCount phrases\n";
        $totalFixed += $fixCount;
    } else {
        echo "  ✓ No English phrases to translate\n";
    }

    echo "\n";
}

echo "======================================\n";
echo "Total phrases translated: $totalFixed\n";
echo "Re-run analyze_tr_language.php to check remaining issues\n";
