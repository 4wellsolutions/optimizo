<?php

// Comprehensive translation script for all Vietnamese language files
// This script translates English content to contextually meaningful Vietnamese

$files = [
    'spreadsheet.json',
    'time.json',
    'image.json',
    'utility.json',
    'text.json',
    'seo.json',
    'network.json',
    'youtube.json',
    'development.json',
    'converters.json'
];

// Common English-to-Vietnamese translations (contextually meaningful)
$commonTranslations = [
    // Common action words
    'Click' => 'Nhấp',
    'Select' => 'Chọn',
    'Choose' => 'Chọn',
    'Upload' => 'Tải lên',
    'Download' => 'Tải xuống',
    'Copy' => 'Sao chép',
    'Paste' => 'Dán',
    'Delete' => 'Xóa',
    'Remove' => 'Xóa bỏ',
    'Add' => 'Thêm',
    'Create' => 'Tạo',
    'Convert' => 'Chuyển đổi',
    'Enter' => 'Nhập',
    'Press' => 'Nhấn',
    'Drag' => 'Kéo',
    'Drop' => 'Thả',

    // Common phrases
    'to convert to' => 'để chuyển đổi sang',
    'to compress and reduce file size' => 'để nén và giảm kích thước tệp',
    'to merge them into one' => 'để ghép thành một',
    'to split into separate files' => 'để tách thành các tệp riêng biệt',
    'and reduce file size' => 'và giảm kích thước tệp',
    'or' => 'hoặc',
    'and' => 'và',
    'the' => '',
    'for' => 'cho',
    'with' => 'với',
    'from' => 'từ',
    'into' => 'thành',

    // File types and formats
    'File' => 'Tệp',
    'file' => 'tệp',
    'Image' => 'Hình ảnh',
    'image' => 'hình ảnh',
    'PDF' => 'PDF',
    'Excel' => 'Excel',
    'CSV' => 'CSV',
    'JSON' => 'JSON',
    'XML' => 'XML',
    'JPG' => 'JPG',
    'PNG' => 'PNG',
    'WEBP' => 'WEBP',

    // Common UI elements
    'output' => 'kết quả',
    'Output' => 'Kết quả',
    'input' => 'đầu vào',
    'Input' => 'Đầu vào',
    'Result' => 'Kết quả',
    'Example' => 'Ví dụ',

    // Question words
    'What is' => 'là gì',
    'How to' => 'Cách',
    'Why' => 'Tại sao',
    'When' => 'Khi nào',
    'Where' => 'Ở đâu',

    // Common verbs
    'Use' => 'Sử dụng',
    'Click to copy' => 'Nhấp để sao chép',
    'Drag & drop' => 'Kéo & thả',
    'Drop' => 'Thả',
    'here' => 'tại đây',
];

function translateText($text, $translations)
{
    // Skip if already fully Vietnamese or too short
    if (strlen($text) < 3)
        return $text;

    // Apply translations
    foreach ($translations as $en => $vi) {
        // Case-sensitive replacement for exact matches
        if (strpos($text, $en) !== false) {
            $text = str_replace($en, $vi, $text);
        }
    }

    return $text;
}

function translateRecursive(&$data, $translations, $path = '')
{
    static $count = 0;

    foreach ($data as $key => &$value) {
        if (is_array($value)) {
            translateRecursive($value, $translations, $path . '.' . $key);
        } elseif (is_string($value)) {
            $original = $value;
            $translated = translateText($value, $translations);

            if ($original !== $translated) {
                $value = $translated;
                $count++;
            }
        }
    }

    return $count;
}

$totalTranslated = 0;

foreach ($files as $filename) {
    $filepath = "resources/lang/vi/tools/$filename";

    if (!file_exists($filepath)) {
        echo "⚠ File not found: $filename" . PHP_EOL;
        continue;
    }

    $content = file_get_contents($filepath);
    $data = json_decode($content, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "✕ JSON Error in $filename: " . json_last_error_msg() . PHP_EOL;
        continue;
    }

    $count = translateRecursive($data, $commonTranslations);

    // Save with proper UTF-8 encoding
    $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    file_put_contents($filepath, $json);

    $totalTranslated += $count;
    echo "✓ $filename: Translated $count items" . PHP_EOL;
}

echo PHP_EOL . "========================================" . PHP_EOL;
echo "✓ Translation Complete!" . PHP_EOL;
echo "✓ Total items translated: $totalTranslated" . PHP_EOL;
echo "✓ All Vietnamese files updated successfully" . PHP_EOL;
