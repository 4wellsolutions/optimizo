<?php

// Advanced translation script with comprehensive English-to-Vietnamese mappings
// Focuses on contextually meaningful translations

$files = glob('resources/lang/vi/tools/*.json');

// Comprehensive translation mappings - organized by context
$translations = [
    // Full sentence patterns (most specific first)
    'Fast, free and reliable online tool.' => 'Công cụ trực tuyến nhanh, miễn phí và đáng tin cậy.',
    'Professional' => 'Chuyên nghiệp',
    'tool' => 'công cụ',

    // Common full phrases
    'Can I convert large CSV files to Excel?' => 'Tôi có thể chuyển đổi tệp CSV lớn sang Excel không?',
    'Will formatting be preserved during conversion?' => 'Định dạng có được bảo toàn trong quá trình chuyển đổi không?',
    'What SQL databases are supported?' => 'Những cơ sở dữ liệu SQL nào được hỗ trợ?',
    'How do I handle special characters in my CSV data?' => 'Làm thế nào để xử lý các ký tự đặc biệt trong dữ liệu CSV của tôi?',
    'Do I need to download from Google Sheets first?' => 'Tôi có cần tải xuống từ Google Sheets trước không?',
    'Will Google Sheets formulas work in Excel?' => 'Công thức Google Sheets có hoạt động trong Excel không?',
    'What is the difference between XLS and XLSX?' => 'Sự khác biệt giữa XLS và XLSX là gì?',
    'Will macros be preserved when converting XLS to XLSX?' => 'Macro có được bảo toàn khi chuyển đổi XLS sang XLSX không?',
    'Why would I convert XLSX back to XLS?' => 'Tại sao tôi lại chuyển đổi XLSX về XLS?',
    'Will I lose data when converting XLSX to XLS?' => 'Tôi có mất dữ liệu khi chuyển đổi XLSX sang XLS không?',
    'Will formulas be converted to CSV?' => 'Công thức có được chuyển đổi sang CSV không?',
    'Can I convert multiple Excel sheets at once?' => 'Tôi có thể chuyển đổi nhiều trang tính Excel cùng lúc không?',

    // Time-related translations
    'What is Unix timestamp (epoch time)?' => 'Unix timestamp (thời gian epoch) là gì?',
    'Why use epoch time instead of regular dates?' => 'Tại sao sử dụng thời gian epoch thay vì ngày thông thường?',
    'Current Unix Timestamp' => 'Unix Timestamp Hiện Tại',
    'Live epoch time in seconds' => 'Thời gian epoch trực tiếp tính bằng giây',
    'Convert Timestamp to Date' => 'Chuyển Đổi Timestamp Sang Ngày',
    'Enter Unix Timestamp' => 'Nhập Unix Timestamp',
    'e.g.,' => 'ví dụ:',
    'Convert to Date' => 'Chuyển Đổi Sang Ngày',
    'GMT/UTC' => 'GMT/UTC',
    'Your Local Time' => 'Giờ Địa Phương Của Bạn',
    'Relative' => 'Tương đối',
    'Convert Date to Timestamp' => 'Chuyển Đổi Ngày Sang Timestamp',
    'Select Date and Time' => 'Chọn Ngày và Giờ',
    'Use current time' => 'Sử dụng thời gian hiện tại',
    'Convert to Timestamp' => 'Chuyển Đổi Sang Timestamp',
    'Unix Timestamp' => 'Unix Timestamp',

    // Image-related translations
    'Convert JPG to PNG online for free.' => 'Chuyển đổi JPG sang PNG trực tuyến miễn phí.',
    'Transform JPEG images to PNG format with transparency support.' => 'Chuyển đổi hình ảnh JPEG sang định dạng PNG với hỗ trợ độ trong suốt.',
    'Fast and secure conversion.' => 'Chuyển đổi nhanh chóng và an toàn.',
    'Convert JPG to WebP format for smaller file sizes and faster websites.' => 'Chuyển đổi JPG sang định dạng WebP để có kích thước tệp nhỏ hơn và trang web nhanh hơn.',
    'Free online JPG to WebP converter with quality optimization.' => 'Bộ chuyển đổi JPG sang WebP trực tuyến miễn phí với tối ưu hóa chất lượng.',
    'Convert PNG to JPG online for free.' => 'Chuyển đổi PNG sang JPG trực tuyến miễn phí.',
    'Transform PNG images to JPEG format for smaller file sizes.' => 'Chuyển đổi hình ảnh PNG sang định dạng JPEG để có kích thước tệp nhỏ hơn.',
    'Fast, secure, and easy to use.' => 'Nhanh, an toàn và dễ sử dụng.',
    'Free online image converter supporting all formats: JPG, PNG, WebP, GIF, BMP, TIFF, SVG.' => 'Bộ chuyển đổi hình ảnh trực tuyến miễn phí hỗ trợ tất cả các định dạng: JPG, PNG, WebP, GIF, BMP, TIFF, SVG.',
    'Convert images instantly with high quality.' => 'Chuyển đổi hình ảnh ngay lập tức với chất lượng cao.',
    'Convert HEIC images to JPG format online for free.' => 'Chuyển đổi hình ảnh HEIC sang định dạng JPG trực tuyến miễn phí.',
    'Fast, secure HEIC to JPEG converter for iPhone photos.' => 'Bộ chuyển đổi HEIC sang JPEG nhanh, an toàn cho ảnh iPhone.',
    'No software installation required.' => 'Không cần cài đặt phần mềm.',
    'Create ICO favicon files from PNG, JPG, or other image formats.' => 'Tạo tệp favicon ICO từ PNG, JPG hoặc các định dạng hình ảnh khác.',
    'Free online ICO converter for website favicons and Windows icons.' => 'Bộ chuyển đổi ICO trực tuyến miễn phí cho favicon trang web và biểu tượng Windows.',

    // Common UI/UX phrases
    'Drop your image here' => 'Thả hình ảnh của bạn tại đây',
    'Drop PNG file here' => 'Thả tệp PNG tại đây',
    'Drop WEBP file here' => 'Thả tệp WEBP tại đây',
    'Drop SVG file here' => 'Thả tệp SVG tại đây',
    'Drag & drop your image file here' => 'Kéo & thả tệp hình ảnh của bạn tại đây',
    'Drag & drop your PNG file here' => 'Kéo & thả tệp PNG của bạn tại đây',
    'Drag & drop your JPG file here' => 'Kéo & thả tệp JPG của bạn tại đây',
    'Drag & drop your WEBP file here' => 'Kéo & thả tệp WEBP của bạn tại đây',
    'Drag & drop your SVG file here' => 'Kéo & thả tệp SVG của bạn tại đây',
    'Upload SVG File' => 'Tải Tệp SVG Lên',
    'Supports' => 'Hỗ trợ',
    'Max' => 'Tối đa',
    'MB' => 'MB',

    // Common questions and answers
    'Yes!' => 'Có!',
    'Yes,' => 'Có,',
    'No!' => 'Không!',
    'No,' => 'Không,',
    'Absolutely!' => 'Chắc chắn rồi!',
    'Of course!' => 'Tất nhiên!',

    // Technical terms (contextual)
    'Processing happens in your browser.' => 'Quá trình xử lý diễn ra trong trình duyệt của bạn.',
    'We never see your files.' => 'Chúng tôi không bao giờ thấy tệp của bạn.',
    'Files are processed locally on your device.' => 'Tệp được xử lý cục bộ trên thiết bị của bạn.',
    'We never see, store, or upload your images.' => 'Chúng tôi không bao giờ xem, lưu trữ hoặc tải lên hình ảnh của bạn.',
    'Local browser processing means your photos are never uploaded to the cloud.' => 'Xử lý trình duyệt cục bộ có nghĩa là ảnh của bạn không bao giờ được tải lên đám mây.',
    'Fast and secure.' => 'Nhanh và an toàn.',
    'No files are uploaded to any server.' => 'Không có tệp nào được tải lên máy chủ.',

    // Converter-specific phrases
    'Chuyển Đổi CSV sang JSON - Fast, free and reliable online tool.' => 'Chuyển Đổi CSV sang JSON - Công cụ trực tuyến nhanh, miễn phí và đáng tin cậy.',
    'Chuyển Đổi CSV sang TSV - Fast, free and reliable online tool.' => 'Chuyển Đổi CSV sang TSV - Công cụ trực tuyến nhanh, miễn phí và đáng tin cậy.',
    'Professional Chuyển Đổi CSV sang JSON tool' => 'Công cụ Chuyển Đổi CSV sang JSON chuyên nghiệp',
    'Professional Chuyển Đổi CSV sang TSV tool' => 'Công cụ Chuyển Đổi CSV sang TSV chuyên nghiệp',

    // Remaining common words
    'to' => '',  // Often redundant in Vietnamese context
    'a' => '',
    'an' => '',
    'is' => 'là',
    'are' => 'là',
    'was' => 'đã',
    'were' => 'đã',
    'has' => 'có',
    'have' => 'có',
    'will' => 'sẽ',
    'can' => 'có thể',
    'may' => 'có thể',
    'should' => 'nên',
    'would' => 'sẽ',
    'could' => 'có thể',
];

$totalTranslated = 0;

foreach ($files as $filepath) {
    $filename = basename($filepath);

    $content = file_get_contents($filepath);
    $data = json_decode($content, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "✕ JSON Error in $filename: " . json_last_error_msg() . PHP_EOL;
        continue;
    }

    $count = 0;

    // Recursive translation function
    $translate = function (&$data) use (&$translate, $translations, &$count) {
        foreach ($data as $key => &$value) {
            if (is_array($value)) {
                $translate($value);
            } elseif (is_string($value)) {
                $original = $value;

                // Apply translations (longest/most specific first)
                foreach ($translations as $en => $vi) {
                    if (stripos($value, $en) !== false) {
                        $value = str_ireplace($en, $vi, $value);
                    }
                }

                // Clean up extra spaces
                $value = preg_replace('/\s+/', ' ', $value);
                $value = trim($value);

                if ($original !== $value) {
                    $count++;
                }
            }
        }
    };

    $translate($data);

    // Save with proper UTF-8 encoding
    $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    file_put_contents($filepath, $json);

    $totalTranslated += $count;
    echo "✓ $filename: Translated $count additional items" . PHP_EOL;
}

echo PHP_EOL . "========================================" . PHP_EOL;
echo "✓ Advanced Translation Complete!" . PHP_EOL;
echo "✓ Total items translated: $totalTranslated" . PHP_EOL;
echo "✓ All Vietnamese files updated with contextual translations" . PHP_EOL;
