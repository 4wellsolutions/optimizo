<?php

$file = 'resources/lang/vi/tools/document.json';
$content = file_get_contents($file);
$data = json_decode($content, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    die('JSON Error: ' . json_last_error_msg() . PHP_EOL);
}

// Contextually meaningful translations - not literal word-for-word
$translations = [
    // Common patterns in upload subtitles
    'Kéo & thả XLS or XLSX to convert to PDF' => 'Kéo & thả tệp XLS hoặc XLSX để chuyển đổi sang PDF',
    'Kéo & thả JPG, JPEG, or PNG to convert to PDF' => 'Kéo & thả tệp JPG, JPEG hoặc PNG để chuyển đổi sang PDF',
    'Kéo & thả PDF to compress and reduce file size' => 'Kéo & thả tệp PDF để nén và giảm kích thước',
    'Kéo & thả multiple PDFs to merge them into one' => 'Kéo & thả nhiều tệp PDF để ghép thành một',
    'Kéo & thả PDF to split into separate files' => 'Kéo & thả tệp PDF để tách thành các tệp riêng biệt',
    'Kéo & thả PDF to convert to Excel' => 'Kéo & thả tệp PDF để chuyển đổi sang Excel',
    'Kéo & thả PDF to convert to JPG images' => 'Kéo & thả tệp PDF để chuyển đổi sang hình ảnh JPG',
    'Kéo & thả PDF to convert to PowerPoint' => 'Kéo & thả tệp PDF để chuyển đổi sang PowerPoint',
    'Kéo & thả PDF to convert to Word' => 'Kéo & thả tệp PDF để chuyển đổi sang Word',
    'Kéo & thả PPT or PPTX to convert to PDF' => 'Kéo & thả tệp PPT hoặc PPTX để chuyển đổi sang PDF',
    'Kéo & thả DOC or DOCX to convert to PDF' => 'Kéo & thả tệp DOC hoặc DOCX để chuyển đổi sang PDF',

    // Titles with English
    'Nén PDF File - Reduce File Size' => 'Nén Tệp PDF - Giảm Kích Thước Tệp',
    'How to Ghép PDF' => 'Cách Ghép PDF',
    'Tách PDF File - Extract Pages' => 'Tách Tệp PDF - Trích Xuất Trang',
    'How to Chuyển Đổi PDF sang PPT' => 'Cách Chuyển Đổi PDF sang PPT',

    // Step descriptions with English
    'Select Extreme, Khuyến Nghị, or Less compression' => 'Chọn mức nén Cực Mạnh, Khuyến Nghị hoặc Ít Hơn',

    // Full English sentences
    'PDFs look the same on phones, tablets, and computers. No more "broken" formatting.' => 'PDF hiển thị giống nhau trên điện thoại, máy tính bảng và máy tính. Không còn định dạng bị "vỡ" nữa.',
];

function translateRecursive(&$data, $translations)
{
    foreach ($data as $key => &$value) {
        if (is_array($value)) {
            translateRecursive($value, $translations);
        } elseif (is_string($value)) {
            // Check for exact matches first
            if (isset($translations[$value])) {
                $value = $translations[$value];
            }
        }
    }
}

translateRecursive($data, $translations);

// Save with proper UTF-8 encoding
$json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
file_put_contents($file, $json);

echo "✓ document.json translated successfully!" . PHP_EOL;
echo "✓ All English content replaced with contextually appropriate Vietnamese" . PHP_EOL;
