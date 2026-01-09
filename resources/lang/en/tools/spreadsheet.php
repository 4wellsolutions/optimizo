<?php

return [
    'csv-to-sql' => [
        'seo' => [
            'title' => 'CSV to SQL Converter - Generate INSERT Statements | Optimizo',
            'description' => 'Convert CSV files to SQL INSERT statements instantly. Free online tool to generate CREATE TABLE and bulk INSERT queries for MySQL, PostgreSQL, SQLite.',
        ],
        'form' => [
            'title' => 'Convert CSV to SQL INSERTs',
            'subtitle' => 'Upload CSV to generate SQL Create Table and Insert statements',
            'upload_label' => 'Click to upload or drag and drop',
            'upload_help' => 'CSV Files (.csv)',
            'table_name_label' => 'Table Name (Optional)',
            'table_name_placeholder' => 'e.g. users_table',
            'table_name_help' => 'Defaults to filename if left empty.',
            'button' => 'Generate SQL',
        ],
        'content' => [
            'hero_title' => 'Convert CSV to SQL INSERT Statement',
            'hero_description' => 'The ultimate developer tool for data migration. Instantly turn your CSV files into executable SQL scripts with CREATE TABLE and INSERT INTO commands.',

            'feature1_title' => 'Auto Schema',
            'feature1_desc' => 'Automatically detects column names from your first header row and generates the CREATE TABLE schema.',
            'feature2_title' => 'Bulk Insertions',
            'feature2_desc' => 'Generates clean, escaped SQL INSERT statements ready for bulk execution in any SQL client.',
            'feature3_title' => 'Universal SQL',
            'feature3_desc' => 'Generates SQL-92 compliant code that works on MySQL, PostgreSQL, SQLite, and MariaDB.',

            'databases_title' => 'Supported Databases',
            'databases_desc' => 'Our tool generates standard SQL (Structured Query Language) that is compatible with most relational database management systems (RDBMS):',

            'how_it_works_title' => 'How it works',
            'step1_title' => 'Analysis:',
            'step1_desc' => 'We scan your CSV file to determine columns and data types (text vs numbers).',
            'step2_title' => 'Schema Generation:',
            'step2_desc' => 'We create a CREATE TABLE user_table (...) statement defining the structure.',
            'step3_title' => 'Data Insertion:',
            'step3_desc' => 'We iterate through every row and generate INSERT INTO statements for the data.',
        ],
        'faq' => [
            'title' => 'Frequently Asked Questions',
            'q1' => 'How do I specify the table name?',
            'a1' => 'You can enter a custom table name in the input field above. If you leave it blank, we will default to using your uploaded file\'s name (e.g., "my_data.csv" becomes "my_data").',
            'q2' => 'Are quotes handled correctly?',
            'a2' => 'Yes! We automatically escape single quotes within your text data to prevent SQL syntax errors during importation.',
        ],
    ],

    'csv-to-excel' => [
        'seo' => [
            'title' => 'CSV to Excel Converter - Free Online Tool | Optimizo',
            'description' => 'Convert CSV to Excel (XLSX) online for free. Transform comma-separated files into formatted Excel spreadsheets instantly.',
        ],
        'form' => [
            'title' => 'Convert CSV to Excel',
            'subtitle' => 'Transform your CSV files into Excel spreadsheets',
            'upload_label' => 'Click to upload or drag and drop',
            'upload_help' => 'CSV Files (.csv)',
            'button' => 'Convert to Excel',
        ],
        'content' => [
            'hero_title' => 'CSV to Excel Converter',
            'hero_description' => 'Easily convert your CSV files to Excel format (XLSX). Perfect for creating professional spreadsheets from raw data.',

            'feature1_title' => 'Preserves Data',
            'feature1_desc' => 'Maintains all your data integrity during conversion with proper formatting.',
            'feature2_title' => 'Auto Formatting',
            'feature2_desc' => 'Automatically applies Excel formatting to make your data more readable.',
            'feature3_title' => 'Instant Download',
            'feature3_desc' => 'Get your Excel file instantly after conversion, ready to use.',
        ],
        'faq' => [
            'title' => 'Frequently Asked Questions',
            'q1' => 'What is the difference between CSV and Excel?',
            'a1' => 'CSV is a plain text format that stores data in rows and columns. Excel (XLSX) is a binary format with additional features like formatting, formulas, and multiple sheets.',
            'q2' => 'Will formatting be preserved?',
            'a2' => 'CSV files don\'t contain formatting. Our tool converts the data and applies basic Excel formatting for better readability.',
        ],
    ],

    'excel-to-csv' => [
        'seo' => [
            'title' => 'Excel to CSV Converter - Free XLSX to CSV Tool | Optimizo',
            'description' => 'Convert Excel files to CSV format online for free. Transform XLSX spreadsheets into comma-separated values instantly.',
        ],
        'form' => [
            'title' => 'Convert Excel to CSV',
            'subtitle' => 'Transform Excel spreadsheets to CSV format',
            'upload_label' => 'Click to upload or drag and drop',
            'upload_help' => 'Excel Files (.xlsx, .xls)',
            'button' => 'Convert to CSV',
        ],
        'content' => [
            'hero_title' => 'Excel to CSV Converter',
            'hero_description' => 'Convert Excel files to CSV format for compatibility with databases, data analysis tools, and programming languages.',

            'feature1_title' => 'Multi-Sheet Support',
            'feature1_desc' => 'Converts all sheets from your Excel file into separate CSV files.',
            'feature2_title' => 'Data Integrity',
            'feature2_desc' => 'Preserves all cell values while converting to plain text format.',
            'feature3_title' => 'Fast Processing',
            'feature3_desc' => 'Quick conversion with immediate download of CSV files.',
        ],
        'faq' => [
            'title' => 'Frequently Asked Questions',
            'q1' => 'Why convert Excel to CSV?',
            'a1' => 'CSV format is universal and compatible with most software, programming languages, and databases. It\'s perfect for data import/export.',
            'q2' => 'What happens to formulas?',
            'a2' => 'Formulas are converted to their calculated values. CSV format doesn\'t support formulas, only the resulting data.',
        ],
    ],

    'google-sheets-to-excel' => [
        'seo' => [
            'title' => 'Google Sheets to Excel Converter - Download as XLSX | Optimizo',
            'description' => 'Convert Google Sheets to Excel format online. Download your Google Spreadsheets as XLSX files for offline use.',
        ],
        'form' => [
            'title' => 'Convert Google Sheets to Excel',
            'subtitle' => 'Download Google Sheets as Excel files',
            'url_label' => 'Google Sheets Link',
            'url_help' => 'Paste your Google Sheets sharing link',
            'button' => 'Download as Excel',
        ],
        'content' => [
            'hero_title' => 'Google Sheets to Excel Converter',
            'hero_description' => 'Download your Google Sheets as Excel files for offline editing, sharing, or archiving.',

            'feature1_title' => 'Direct Download',
            'feature1_desc' => 'No need to open Google Sheets - convert directly from the link.',
            'feature2_title' => 'Maintains Formatting',
            'feature2_desc' => 'Preserves formatting, formulas, and styles when possible.',
            'feature3_title' => 'Offline Access',
            'feature3_desc' => 'Work on your spreadsheets without internet connection.',
        ],
        'faq' => [
            'title' => 'Frequently Asked Questions',
            'q1' => 'Do I need permission to convert?',
            'a1' => 'Yes, the Google Sheet must be publicly accessible or you must have view access via the sharing link.',
            'q2' => 'Will all features work in Excel?',
            'a2' => 'Most features transfer well, but some Google Sheets-specific functions may need adjustment in Excel.',
        ],
    ],

    'xls-to-xlsx' => [
        'seo' => [
            'title' => 'XLS to XLSX Converter - Upgrade Excel Format | Optimizo',
            'description' => 'Convert old XLS files to modern XLSX format online. Free tool to upgrade legacy Excel files.',
        ],
        'form' => [
            'title' => 'Convert XLS to XLSX',
            'subtitle' => 'Upgrade your Excel files to modern format',
            'upload_label' => 'Click to upload or drag and drop',
            'upload_help' => 'Excel 97-2003 Files (.xls)',
            'button' => 'Convert to XLSX',
        ],
        'content' => [
            'hero_title' => 'XLS to XLSX Converter',
            'hero_description' => 'Upgrade legacy Excel 97-2003 (XLS) files to the modern XLSX format for better compatibility and features.',

            'feature1_title' => 'Better Compression',
            'feature1_desc' => 'XLSX files are smaller due to ZIP compression technology.',
            'feature2_title' => 'More Rows',
            'feature2_desc' => 'XLSX supports 1 million+ rows vs XLS\'s 65,536 row limit.',
            'feature3_title' => 'Enhanced Security',
            'feature3_desc' => 'XLSX format has better security and corruption recovery.',
        ],
        'faq' => [
            'title' => 'Frequently Asked Questions',
            'q1' => 'What\'s the difference between XLS and XLSX?',
            'a1' => 'XLS is the older binary format (Excel 97-2003). XLSX is the modern XML-based format with better features, security, and smaller file sizes.',
            'q2' => 'Will my macros work?',
            'a2' => 'Macros will generally transfer, but complex VBA code should be tested after conversion.',
        ],
    ],

    'xlsx-to-xls' => [
        'seo' => [
            'title' => 'XLSX to XLS Converter - Legacy Excel Format | Optimizo',
            'description' => 'Convert XLSX files to XLS format for compatibility with older Excel versions. Free online converter.',
        ],
        'form' => [
            'title' => 'Convert XLSX to XLS',
            'subtitle' => 'Create files compatible with older Excel versions',
            'upload_label' => 'Click to upload or drag and drop',
            'upload_help' => 'Excel Files (.xlsx)',
            'button' => 'Convert to XLS',
        ],
        'content' => [
            'hero_title' => 'XLSX to XLS Converter',
            'hero_description' => 'Convert modern Excel files (XLSX) to legacy format (XLS) for compatibility with Excel 97-2003 and older systems.',

            'feature1_title' => 'Maximum Compatibility',
            'feature1_desc' => 'Ensures your files work on older computers and Excel versions.',
            'feature2_title' => 'Data Preservation',
            'feature2_desc' => 'Maintains your data while converting to older format.',
            'feature3_title' => 'Quick Conversion',
            'feature3_desc' => 'Fast processing with instant download.',
        ],
        'faq' => [
            'title' => 'Frequently Asked Questions',
            'q1' => 'Why convert to older format?',
            'a1' => 'Some legacy systems or organizations still use Excel 97-2003, requiring the XLS format.',
            'q2' => 'Will I lose data?',
            'a2' => 'Basic data transfers fine, but advanced XLSX features (more rows, newer functions) may not be supported in XLS.',
        ],
    ],
];
