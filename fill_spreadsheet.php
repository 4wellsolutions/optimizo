<?php

// Fill empty keys in spreadsheet.json with SEO-optimized content

$file = 'resources/lang/en/tools/spreadsheet.json';
$content = file_get_contents($file);
$data = json_decode($content, true);

// Define the content to fill - FAQ sections for various converters
$fills = [
    // CSV to Excel
    'csv-to-excel.faq.title' => 'Frequently Asked Questions',
    'csv-to-excel.faq.q1' => 'Can I convert large CSV files to Excel?',
    'csv-to-excel.faq.a1' => 'Yes! Our tool handles CSV files of various sizes. For very large files (100MB+), the conversion may take a bit longer, but the process is optimized for performance.',
    'csv-to-excel.faq.q2' => 'Will formatting be preserved during conversion?',
    'csv-to-excel.faq.a2' => 'CSV files contain only raw data without formatting. The Excel file will have the data properly organized in cells, but you\'ll need to apply formatting (colors, fonts, borders) manually in Excel after conversion.',

    // CSV to SQL
    'csv-to-sql.faq.title' => 'Frequently Asked Questions',
    'csv-to-sql.faq.q1' => 'What SQL databases are supported?',
    'csv-to-sql.faq.a1' => 'Our tool generates standard SQL INSERT statements compatible with MySQL, PostgreSQL, SQL Server, SQLite, and other major database systems. You can customize the table name and column names as needed.',
    'csv-to-sql.faq.q2' => 'How do I handle special characters in my CSV data?',
    'csv-to-sql.faq.a2' => 'The converter automatically escapes special characters (quotes, backslashes) to prevent SQL injection and syntax errors. Your data will be safely converted to properly formatted SQL statements.',

    // CSV to XML
    'csv-to-xml-converter.content.how_steps.3.title' => 'Download XML File',
    'csv-to-xml-converter.content.how_steps.3.desc' => 'Click the download button to save your converted XML file, ready to use in applications, APIs, or data exchange systems.',
    'csv-to-xml-converter.content.tips_list.5' => 'Validate your XML output using an XML validator to ensure proper structure and compatibility with your target system.',

    // Excel to CSV
    'excel-to-csv.faq.title' => 'Frequently Asked Questions',
    'excel-to-csv.faq.q1' => 'Will formulas be converted to CSV?',
    'excel-to-csv.faq.a1' => 'CSV format only supports plain text values. When converting Excel to CSV, formulas will be replaced with their calculated values. If you need to preserve formulas, keep a copy of the original Excel file.',
    'excel-to-csv.faq.q2' => 'Can I convert multiple Excel sheets at once?',
    'excel-to-csv.faq.a2' => 'Each Excel worksheet needs to be converted separately to CSV. If your Excel file has multiple sheets, you\'ll get a separate CSV file for each sheet, or you can choose which sheet to convert.',

    // Google Sheets to Excel
    'google-sheets-to-excel.faq.title' => 'Frequently Asked Questions',
    'google-sheets-to-excel.faq.q1' => 'Do I need to download from Google Sheets first?',
    'google-sheets-to-excel.faq.a1' => 'Yes, you\'ll need to download your Google Sheet as an Excel file (.xlsx) or CSV first. In Google Sheets, go to File > Download > Microsoft Excel (.xlsx) to get the file for conversion.',
    'google-sheets-to-excel.faq.q2' => 'Will Google Sheets formulas work in Excel?',
    'google-sheets-to-excel.faq.a2' => 'Most common formulas (SUM, AVERAGE, IF, VLOOKUP) are compatible between Google Sheets and Excel. However, some Google-specific functions may not work in Excel and will need to be adjusted.',

    // XLS to XLSX
    'xls-to-xlsx.faq.title' => 'Frequently Asked Questions',
    'xls-to-xlsx.faq.q1' => 'What is the difference between XLS and XLSX?',
    'xls-to-xlsx.faq.a1' => 'XLS is the older Excel format (Excel 97-2003) with a 65,536 row limit. XLSX is the modern XML-based format (Excel 2007+) with 1,048,576 rows, better compression, and improved security. Converting to XLSX is recommended for better compatibility.',
    'xls-to-xlsx.faq.q2' => 'Will macros be preserved when converting XLS to XLSX?',
    'xls-to-xlsx.faq.a2' => 'Yes, macros and VBA code are preserved during conversion. However, if your file contains macros, save it as .XLSM (macro-enabled) instead of .XLSX to ensure macros remain functional.',

    // XLSX to XLS
    'xlsx-to-xls.faq.title' => 'Frequently Asked Questions',
    'xlsx-to-xls.faq.q1' => 'Why would I convert XLSX back to XLS?',
    'xlsx-to-xls.faq.a1' => 'Converting to XLS format is useful for compatibility with older Excel versions (Excel 97-2003) or legacy systems that don\'t support the newer XLSX format. However, XLS has limitations like fewer rows and larger file sizes.',
    'xlsx-to-xls.faq.q2' => 'Will I lose data when converting XLSX to XLS?',
    'xlsx-to-xls.faq.a2' => 'If your XLSX file has more than 65,536 rows or 256 columns, data will be truncated when converting to XLS format. Also, some newer Excel features may not be supported in the older XLS format.'
];

// Function to set nested array value
function setNestedValue(&$array, $path, $value)
{
    $keys = explode('.', $path);
    $current = &$array;

    foreach ($keys as $key) {
        if (!isset($current[$key])) {
            $current[$key] = [];
        }
        $current = &$current[$key];
    }

    $current = $value;
}

// Fill the empty keys
foreach ($fills as $path => $value) {
    setNestedValue($data, $path, $value);
}

// Save the file
$json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
file_put_contents($file, $json);

echo "✅ spreadsheet.json: Filled 33 empty keys\n";
echo "  - CSV to Excel FAQ (5 keys)\n";
echo "  - CSV to SQL FAQ (5 keys)\n";
echo "  - CSV to XML steps and tips (3 keys)\n";
echo "  - Excel to CSV FAQ (5 keys)\n";
echo "  - Google Sheets to Excel FAQ (5 keys)\n";
echo "  - XLS to XLSX FAQ (5 keys)\n";
echo "  - XLSX to XLS FAQ (5 keys)\n";
