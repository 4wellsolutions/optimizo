<?php

/**
 * Turkish Language Translation - Final Phase
 * Comprehensive translation of all remaining English text
 */

$enPath = __DIR__ . '/resources/lang/en/tools/';
$trPath = __DIR__ . '/resources/lang/tr/tools/';

// Comprehensive translation dictionary
$translations = [
    // Fix inconsistencies - standardize to ABD
    'Bardak (US)' => 'Bardak (ABD)',
    'Yemek Kaşığı (US)' => 'Yemek Kaşığı (ABD)',
    'Çay Kaşığı (US)' => 'Çay Kaşığı (ABD)',
    'Galon (US)' => 'Galon (ABD)',

    // Common technical terms
    'Hardward Logic' => 'Donanım Mantığı',
    'Cross-Platform' => 'Platformlar Arası',
    'Client-Side Security' => 'İstemci Tarafı Güvenliği',
    'Quick Copy' => 'Hızlı Kopyalama',
    'Completely Free' => 'Tamamen Ücretsiz',
    'Instant Processing' => 'Anında İşleme',
    'Bidirectional' => 'Çift Yönlü',
    'High Speed' => 'Yüksek Hız',
    'Fast' => 'Hızlı',
    'Efficient' => 'Verimli',
    'Accurate' => 'Doğru',
    'Precise' => 'Hassas',
    'Reliable' => 'Güvenilir',
    'Secure' => 'Güvenli',
    'Private' => 'Özel',
    'Free' => 'Ücretsiz',
    'Easy' => 'Kolay',
    'Simple' => 'Basit',
    'Quick' => 'Hızlı',
    'Instant' => 'Anında',

    // Tool features
    'Real-Time Conversion' => 'Gerçek Zamanlı Dönüşüm',
    'Full Bidirectional Support' => 'Tam Çift Yönlü Destek',
    '100% Privacy' => '%100 Gizlilik',
    'Instant Copy' => 'Anında Kopyalama',
    'Privacy Guaranteed' => 'Gizlilik Garantili',
    'Instant Conversion' => 'Anında Dönüşüm',
    'Bidirectional Support' => 'Çift Yönlü Destek',

    // Professional applications
    'Memory Addressing' => 'Bellek Adresleme',
    'Color Representation' => 'Renk Temsili',
    'Data Encoding' => 'Veri Kodlama',
    'Software Engineering' => 'Yazılım Mühendisliği',
    'Academic Excellence' => 'Akademik Mükemmellik',
    'Network Debugging' => 'Ağ Hata Ayıklama',
    'Game Development' => 'Oyun Geliştirme',
    'Cryptography' => 'Kriptografi',
    'Hardware Logic' => 'Donanım Mantığı',

    // Steps and instructions
    'Select Mode' => 'Mod Seçin',
    'Input Value' => 'Değeri Girin',
    'Review' => 'İncele',
    'Basic Conversion' => 'Temel Dönüşüm',
    'Typical 8-bit' => 'Tipik 8-bit',
    'Full Byte' => 'Tam Bayt',
    'Back to Decimal' => 'Onluğa Geri Dönüş',

    // FAQ and descriptions
    'Understanding Hexadecimal' => 'Onaltılı Sistemi Anlamak',
    'Tool Features' => 'Araç Özellikleri',
    'Professional Applications' => 'Profesyonel Uygulamalar',
    'User Manual' => 'Kullanım Kılavuzu',
    'Common Examples' => 'Yaygın Örnekler',
    'Common Questions' => 'Yaygın Sorular',
    'Efficient numbers system translation for professional workflows.' => 'Profesyonel iş akışları için verimli sayı sistemi çevirisi.',

    // More technical terms
    'Get results instantly with our optimized conversion engine.' => 'Optimize edilmiş dönüşüm motorumuzla anında sonuç alın.',
    'Practical Applications' => 'Pratik Uygulamalar',
    'Use Cases' => 'Kullanım Durumları',
    'Features' => 'Özellikler',
    'Examples' => 'Örnekler',
    'FAQ' => 'SSS',
    'Frequently Asked Questions' => 'Sıkça Sorulan Sorular',
];

function translateAllEnglish(&$trData, $enData, $translations, $path = '', &$fixCount = 0)
{
    foreach ($enData as $key => $value) {
        $currentPath = $path ? "$path.$key" : $key;

        if (!isset($trData[$key])) {
            continue;
        }

        // If nested, recurse
        if (is_array($value) && is_array($trData[$key])) {
            translateAllEnglish($trData[$key], $value, $translations, $currentPath, $fixCount);
            continue;
        }

        // Check if we need to translate
        if (is_string($trData[$key])) {
            // Direct translation lookup
            if (isset($translations[$trData[$key]])) {
                $oldValue = $trData[$key];
                $trData[$key] = $translations[$oldValue];
                $fixCount++;
                echo "  Fixed: $currentPath = \"$oldValue\" → \"{$trData[$key]}\"\n";
            }
            // Also check if TR matches EN (English wording)
            elseif (is_string($value) && $value === $trData[$key]) {
                // Skip very short strings and URLs
                if (strlen($value) > 3 && !preg_match('/^https?:\/\//', $value)) {
                    if (isset($translations[$value])) {
                        $trData[$key] = $translations[$value];
                        $fixCount++;
                        echo "  Translated: $currentPath\n";
                    }
                }
            }
        }
    }
}

echo "Turkish Language Translation - Final Phase\n";
echo "==========================================\n\n";

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
    translateAllEnglish($trData, $enData, $translations, '', $fixCount);

    if ($fixCount > 0) {
        // Save with proper UTF-8 encoding
        $newContent = json_encode($trData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        file_put_contents($trFile, $newContent);
        echo "  ✅ Fixed $fixCount items\n";
        $totalFixed += $fixCount;
    } else {
        echo "  ✓ No items to fix\n";
    }

    echo "\n";
}

echo "==========================================\n";
echo "Total items fixed: $totalFixed\n\n";
echo "Running final analysis...\n\n";

// Run analysis automatically
include 'analyze_tr_language.php';
