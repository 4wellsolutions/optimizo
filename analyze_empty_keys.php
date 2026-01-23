<?php

$files = [
    'converters.json',
    'development.json',
    'document.json',
    'image.json',
    'network.json',
    'seo.json',
    'spreadsheet.json',
    'text.json',
    'time.json',
    'utility.json',
    'youtube.json'
];

$emptyKeys = [];

function findEmptyKeys($data, $path = '', $file = '')
{
    global $emptyKeys;

    foreach ($data as $key => $value) {
        $currentPath = $path ? $path . '.' . $key : $key;

        if (is_array($value)) {
            findEmptyKeys($value, $currentPath, $file);
        } else {
            // Check for empty values
            if ($value === '' || $value === null) {
                $emptyKeys[] = [
                    'file' => $file,
                    'key' => $currentPath,
                    'value' => $value === null ? 'null' : 'empty string'
                ];
            }
        }
    }
}

foreach ($files as $file) {
    $filePath = 'resources/lang/en/tools/' . $file;
    if (file_exists($filePath)) {
        $content = file_get_contents($filePath);
        $data = json_decode($content, true);

        if (json_last_error() === JSON_ERROR_NONE) {
            findEmptyKeys($data, '', $file);
        } else {
            echo 'Error parsing ' . $file . ': ' . json_last_error_msg() . PHP_EOL;
        }
    }
}

// Output results
echo '=== EMPTY TRANSLATION KEYS ANALYSIS ===' . PHP_EOL . PHP_EOL;
echo 'Total empty keys found: ' . count($emptyKeys) . PHP_EOL . PHP_EOL;

$byFile = [];
foreach ($emptyKeys as $item) {
    if (!isset($byFile[$item['file']])) {
        $byFile[$item['file']] = [];
    }
    $byFile[$item['file']][] = $item;
}

foreach ($byFile as $file => $keys) {
    echo '--- ' . $file . ' (' . count($keys) . ' empty keys) ---' . PHP_EOL;
    foreach ($keys as $item) {
        echo '  - ' . $item['key'] . ' => ' . $item['value'] . PHP_EOL;
    }
    echo PHP_EOL;
}

// Generate HTML report
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empty Translation Keys Report - English</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            padding: 40px;
        }
        h1 {
            color: #2d3748;
            margin-bottom: 10px;
            font-size: 2.5em;
        }
        .summary {
            background: #f7fafc;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #667eea;
        }
        .summary h2 {
            margin-top: 0;
            color: #4a5568;
        }
        .file-section {
            margin: 30px 0;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            overflow: hidden;
        }
        .file-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 20px;
            font-weight: bold;
            font-size: 1.2em;
        }
        .file-content {
            padding: 20px;
        }
        .empty-key {
            background: #fff5f5;
            border-left: 3px solid #fc8181;
            padding: 12px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .key-path {
            font-family: "Courier New", monospace;
            color: #c53030;
            font-weight: bold;
        }
        .key-value {
            color: #718096;
            font-style: italic;
            margin-left: 10px;
        }
        .no-issues {
            color: #38a169;
            font-weight: bold;
            padding: 20px;
            text-align: center;
        }
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .stat-number {
            font-size: 2.5em;
            font-weight: bold;
        }
        .stat-label {
            font-size: 0.9em;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔍 Empty Translation Keys Report</h1>
        <p style="color: #718096; font-size: 1.1em;">English Language Files Analysis</p>
        
        <div class="stats">
            <div class="stat-card">
                <div class="stat-number">' . count($emptyKeys) . '</div>
                <div class="stat-label">Total Empty Keys</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">' . count($byFile) . '</div>
                <div class="stat-label">Files with Issues</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">' . count($files) . '</div>
                <div class="stat-label">Total Files Analyzed</div>
            </div>
        </div>';

if (count($emptyKeys) === 0) {
    $html .= '<div class="summary"><h2>✅ No Issues Found</h2><p>All English language files have complete translations with no empty keys.</p></div>';
} else {
    $html .= '<div class="summary">
        <h2>⚠️ Issues Found</h2>
        <p>Found ' . count($emptyKeys) . ' empty translation keys across ' . count($byFile) . ' files that need attention.</p>
    </div>';

    foreach ($byFile as $file => $keys) {
        $html .= '<div class="file-section">
            <div class="file-header">' . htmlspecialchars($file) . ' (' . count($keys) . ' empty keys)</div>
            <div class="file-content">';

        foreach ($keys as $item) {
            $html .= '<div class="empty-key">
                <span class="key-path">' . htmlspecialchars($item['key']) . '</span>
                <span class="key-value">(' . htmlspecialchars($item['value']) . ')</span>
            </div>';
        }

        $html .= '</div></div>';
    }
}

$html .= '
    </div>
</body>
</html>';

file_put_contents('empty_keys_report_en.html', $html);
echo PHP_EOL . 'HTML report generated: empty_keys_report_en.html' . PHP_EOL;
