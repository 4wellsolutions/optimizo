<?php

// Final aggressive translation pass for remaining English content
// Handles technical terms, complex sentences, and context-specific phrases

$files = glob('resources/lang/vi/tools/*.json');

// Comprehensive translation dictionary - organized by specificity
$translations = [
    // === FULL SENTENCES (Most specific - translate first) ===

    // FAQ Answers - Spreadsheet
    'Yes! Our tool handles CSV files of various sizes. For very large files (100MB+), the conversion may take a bit longer, but the process is optimized for performance.' => 'Có! Công cụ của chúng tôi xử lý tệp CSV với nhiều kích thước khác nhau. Đối với các tệp rất lớn (100MB+), quá trình chuyển đổi có thể mất nhiều thời gian hơn một chút, nhưng quá trình được tối ưu hóa để đạt hiệu suất tốt.',
    'CSV files contain only raw data without formatting. The Excel file will have the data properly organized in cells, but you\'ll need to apply formatting (colors, fonts, borders) manually in Excel after conversion.' => 'Tệp CSV chỉ chứa dữ liệu thô không có định dạng. Tệp Excel sẽ có dữ liệu được tổ chức đúng cách trong các ô, nhưng bạn sẽ cần áp dụng định dạng (màu sắc, phông chữ, đường viền) theo cách thủ công trong Excel sau khi chuyển đổi.',
    'Our tool generates standard SQL INSERT statements compatible with MySQL, PostgreSQL, SQL Server, SQLite, and other major database systems. You can customize the table name and column names as needed.' => 'Công cụ của chúng tôi tạo các câu lệnh SQL INSERT tiêu chuẩn tương thích với MySQL, PostgreSQL, SQL Server, SQLite và các hệ thống cơ sở dữ liệu chính khác. Bạn có thể tùy chỉnh tên bảng và tên cột theo nhu cầu.',
    'The converter automatically escapes special characters (quotes, backslashes) to prevent SQL injection and syntax errors. Your data will be safely converted to properly formatted SQL statements.' => 'Bộ chuyển đổi tự động escape các ký tự đặc biệt (dấu ngoặc kép, dấu gạch chéo ngược) để ngăn chặn SQL injection và lỗi cú pháp. Dữ liệu của bạn sẽ được chuyển đổi an toàn thành các câu lệnh SQL được định dạng đúng.',
    'CSV format only supports plain text values. When converting Excel to CSV, formulas will be replaced with their calculated values. If you need to preserve formulas, keep a copy of the original Excel file.' => 'Định dạng CSV chỉ hỗ trợ các giá trị văn bản thuần túy. Khi chuyển đổi Excel sang CSV, các công thức sẽ được thay thế bằng các giá trị đã tính toán của chúng. Nếu bạn cần bảo toàn công thức, hãy giữ một bản sao của tệp Excel gốc.',
    'Each Excel worksheet needs to be converted separately to CSV. If your Excel file has multiple sheets, you\'ll get a separate CSV file for each sheet, or you can choose which sheet to convert.' => 'Mỗi trang tính Excel cần được chuyển đổi riêng sang CSV. Nếu tệp Excel của bạn có nhiều trang tính, bạn sẽ nhận được một tệp CSV riêng cho mỗi trang tính, hoặc bạn có thể chọn trang tính nào để chuyển đổi.',
    'Yes, you\'ll need to download your Google Sheet as an Excel file (.xlsx) or CSV first. In Google Sheets, go to File > Download > Microsoft Excel (.xlsx) to get the file for conversion.' => 'Có, bạn sẽ cần tải xuống Google Sheet của mình dưới dạng tệp Excel (.xlsx) hoặc CSV trước. Trong Google Sheets, vào File > Download > Microsoft Excel (.xlsx) để lấy tệp để chuyển đổi.',
    'Most common formulas (SUM, AVERAGE, IF, VLOOKUP) are compatible between Google Sheets and Excel. However, some Google-specific functions may not work in Excel and will need to be adjusted.' => 'Hầu hết các công thức phổ biến (SUM, AVERAGE, IF, VLOOKUP) đều tương thích giữa Google Sheets và Excel. Tuy nhiên, một số hàm đặc thù của Google có thể không hoạt động trong Excel và sẽ cần được điều chỉnh.',
    'XLS is the older Excel format (Excel 97-2003) with a 65,536 row limit. XLSX is the modern XML-based format (Excel 2007+) with 1,048,576 rows, better compression, and improved security. Converting to XLSX is recommended for better compatibility.' => 'XLS là định dạng Excel cũ hơn (Excel 97-2003) với giới hạn 65.536 hàng. XLSX là định dạng dựa trên XML hiện đại (Excel 2007+) với 1.048.576 hàng, khả năng nén tốt hơn và bảo mật được cải thiện. Chuyển đổi sang XLSX được khuyến nghị để có khả năng tương thích tốt hơn.',
    'Yes, macros and VBA code are preserved during conversion. However, if your file contains macros, save it as .XLSM (macro-enabled) instead of .XLSX to ensure macros remain functional.' => 'Có, macro và mã VBA được bảo toàn trong quá trình chuyển đổi. Tuy nhiên, nếu tệp của bạn chứa macro, hãy lưu nó dưới dạng .XLSM (hỗ trợ macro) thay vì .XLSX để đảm bảo macro vẫn hoạt động.',
    'Converting to XLS format is useful for compatibility with older Excel versions (Excel 97-2003) or legacy systems that don\'t support the newer XLSX format. However, XLS has limitations like fewer rows and larger file sizes.' => 'Chuyển đổi sang định dạng XLS hữu ích cho khả năng tương thích với các phiên bản Excel cũ hơn (Excel 97-2003) hoặc các hệ thống cũ không hỗ trợ định dạng XLSX mới hơn. Tuy nhiên, XLS có những hạn chế như ít hàng hơn và kích thước tệp lớn hơn.',
    'If your XLSX file has more than 65,536 rows or 256 columns, data will be truncated when converting to XLS format. Also, some newer Excel features may not be supported in the older XLS format.' => 'Nếu tệp XLSX của bạn có nhiều hơn 65.536 hàng hoặc 256 cột, dữ liệu sẽ bị cắt bớt khi chuyển đổi sang định dạng XLS. Ngoài ra, một số tính năng Excel mới hơn có thể không được hỗ trợ trong định dạng XLS cũ hơn.',

    // Time-related full sentences
    'Unix timestamp (also known as epoch time or POSIX time) is the number of seconds that have elapsed since January 1, 1970, 00:00:00 UTC. It\'s a widely used standard for representing time in computer systems and programming.' => 'Unix timestamp (còn được gọi là thời gian epoch hoặc thời gian POSIX) là số giây đã trôi qua kể từ ngày 1 tháng 1 năm 1970, 00:00:00 UTC. Đây là một tiêu chuẩn được sử dụng rộng rãi để biểu diễn thời gian trong các hệ thống máy tính và lập trình.',
    'Epoch time is timezone-independent, making it perfect for storing dates in databases and APIs. It\'s a simple integer that\'s easy to compare, sort, and calculate time differences. Most programming languages have built-in functions to convert between epoch time and human-readable dates.' => 'Thời gian Epoch độc lập với múi giờ, làm cho nó hoàn hảo để lưu trữ ngày tháng trong cơ sở dữ liệu và API. Đây là một số nguyên đơn giản dễ dàng so sánh, sắp xếp và tính toán sự khác biệt về thời gian. Hầu hết các ngôn ngữ lập trình đều có các hàm tích hợp để chuyển đổi giữa thời gian epoch và ngày tháng dễ đọc.',
    'Unix time (or Epoch time) is the system checking the heartbeat of the digital world. It tracks the number of seconds that have elapsed since the "Unix Epoch" — 00:00:00 UTC on 1 January 1970.' => 'Thời gian Unix (hoặc thời gian Epoch) là hệ thống kiểm tra nhịp tim của thế giới kỹ thuật số. Nó theo dõi số giây đã trôi qua kể từ "Unix Epoch" — 00:00:00 UTC vào ngày 1 tháng 1 năm 1970.',
    'On January 19, 2038, 32-bit systems will run out of numbers to store the time, causing the "Unix Y2K". Most modern 64-bit systems are already safe for the next 292 billion years.' => 'Vào ngày 19 tháng 1 năm 2038, các hệ thống 32-bit sẽ hết số để lưu trữ thời gian, gây ra "Unix Y2K". Hầu hết các hệ thống 64-bit hiện đại đã an toàn cho 292 tỷ năm tiếp theo.',

    // Image-related full sentences
    'PNG format is universally supported across all browsers and applications, while SVG may have compatibility issues. Converting to PNG is useful for email signatures, social media, and applications that don\'t support vector graphics.' => 'Định dạng PNG được hỗ trợ phổ biến trên tất cả các trình duyệt và ứng dụng, trong khi SVG có thể gặp vấn đề về khả năng tương thích. Chuyển đổi sang PNG hữu ích cho chữ ký email, mạng xã hội và các ứng dụng không hỗ trợ đồ họa vector.',

    // === COMMON PHRASES ===
    'Press "Chuyển Đổi sang XML" to transform your CSV into structured XML format.' => 'Nhấn "Chuyển Đổi sang XML" để chuyển đổi CSV của bạn thành định dạng XML có cấu trúc.',
    'Press "Chuyển Đổi sang CSV" to transform your TSV into CSV format.' => 'Nhấn "Chuyển Đổi sang CSV" để chuyển đổi TSV của bạn thành định dạng CSV.',
    'The XML output appears on the right. Click "Sao Chép" to use it in your application.' => 'Kết quả XML xuất hiện ở bên phải. Nhấp "Sao Chép" để sử dụng nó trong ứng dụng của bạn.',
    'The CSV output appears on the right. Click "Sao Chép" to use it in your application.' => 'Kết quả CSV xuất hiện ở bên phải. Nhấp "Sao Chép" để sử dụng nó trong ứng dụng của bạn.',
    'Click the download button to save your converted XML file, ready to use in applications, APIs, or data exchange systems.' => 'Nhấp vào nút tải xuống để lưu tệp XML đã chuyển đổi của bạn, sẵn sàng sử dụng trong các ứng dụng, API hoặc hệ thống trao đổi dữ liệu.',
    'Copy your Tab-Separated Values data and paste it into the left input field.' => 'Sao chép dữ liệu Giá trị Phân tách bằng Tab của bạn và dán vào trường nhập bên trái.',
    'Use the "Ví Dụ" button to understand the conversion format.' => 'Sử dụng nút "Ví Dụ" để hiểu định dạng chuyển đổi.',
    'Validate your XML output using an XML validator to ensure proper structure and compatibility with your target system.' => 'Xác thực kết quả XML của bạn bằng trình xác thực XML để đảm bảo cấu trúc phù hợp và khả năng tương thích với hệ thống đích của bạn.',

    // === SHORTER PHRASES ===
    'Adjusted for Múi Giờ Difference' => 'Đã Điều Chỉnh theo Chênh Lệch Múi Giờ',
    'supports' => 'hỗ trợ',
    'Max' => 'Tối đa',

    // === INDIVIDUAL WORDS (Least specific - translate last) ===
    'Professional' => 'Chuyên nghiệp',
    'Fast' => 'Nhanh',
    'free' => 'miễn phí',
    'reliable' => 'đáng tin cậy',
    'online' => 'trực tuyến',
    'tool' => 'công cụ',
];

$totalTranslated = 0;
$fileResults = [];

foreach ($files as $filepath) {
    $filename = basename($filepath);

    $content = file_get_contents($filepath);
    $data = json_decode($content, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "✕ JSON Error in $filename: " . json_last_error_msg() . PHP_EOL;
        continue;
    }

    $count = 0;

    // Recursive translation with longest-match-first approach
    $translate = function (&$data) use (&$translate, $translations, &$count) {
        foreach ($data as $key => &$value) {
            if (is_array($value)) {
                $translate($value);
            } elseif (is_string($value)) {
                $original = $value;

                // Sort translations by length (longest first) for better matching
                $sortedTranslations = $translations;
                uksort($sortedTranslations, function ($a, $b) {
                    return strlen($b) - strlen($a);
                });

                // Apply translations
                foreach ($sortedTranslations as $en => $vi) {
                    if (stripos($value, $en) !== false) {
                        $value = str_ireplace($en, $vi, $value);
                    }
                }

                // Clean up extra spaces and trim
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
    $fileResults[$filename] = $count;

    if ($count > 0) {
        echo "✓ $filename: $count items translated" . PHP_EOL;
    }
}

echo PHP_EOL . "========================================" . PHP_EOL;
echo "✓ Final Aggressive Translation Complete!" . PHP_EOL;
echo "✓ Total items translated: $totalTranslated" . PHP_EOL;
echo PHP_EOL;

// Show summary
echo "File-by-file results:" . PHP_EOL;
arsort($fileResults);
foreach ($fileResults as $file => $count) {
    if ($count > 0) {
        echo "  • $file: $count items" . PHP_EOL;
    }
}
