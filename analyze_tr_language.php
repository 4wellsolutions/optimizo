<?php

/**
 * Turkish Language Files Analysis Script
 * Checks for missing keys, empty values, and English wording
 */

$enPath = __DIR__ . '/resources/lang/en/tools/';
$trPath = __DIR__ . '/resources/lang/tr/tools/';

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

$issues = [];
$stats = [
    'total_files' => 0,
    'missing_keys' => 0,
    'empty_values' => 0,
    'english_wording' => 0,
    'pending_translations' => 0
];

function analyzeJson($enData, $trData, $path = '')
{
    $issues = [];

    foreach ($enData as $key => $value) {
        $currentPath = $path ? "$path.$key" : $key;

        // Check if key exists in TR
        if (!isset($trData[$key])) {
            $issues[] = [
                'type' => 'missing_key',
                'path' => $currentPath,
                'en_value' => is_string($value) ? $value : '[nested]'
            ];
            continue;
        }

        // If nested, recurse
        if (is_array($value) && is_array($trData[$key])) {
            $nestedIssues = analyzeJson($value, $trData[$key], $currentPath);
            $issues = array_merge($issues, $nestedIssues);
            continue;
        }

        // Check for empty values
        if (is_string($trData[$key]) && trim($trData[$key]) === '') {
            $issues[] = [
                'type' => 'empty_value',
                'path' => $currentPath,
                'en_value' => $value
            ];
            continue;
        }

        // Check for [Pending Translation] marker
        if (is_string($trData[$key]) && strpos($trData[$key], '[Pending Translation]') !== false) {
            $issues[] = [
                'type' => 'pending_translation',
                'path' => $currentPath,
                'en_value' => $value,
                'tr_value' => $trData[$key]
            ];
            continue;
        }

        // Check if TR value is identical to EN value (potential untranslated)
        if (is_string($value) && is_string($trData[$key]) && $value === $trData[$key]) {
            // Skip if it's a technical term, URL, or very short
            if (strlen($value) > 3 && !preg_match('/^https?:\/\//', $value)) {
                $issues[] = [
                    'type' => 'english_wording',
                    'path' => $currentPath,
                    'value' => $value
                ];
            }
        }
    }

    return $issues;
}

echo "Turkish Language Files Analysis\n";
echo "================================\n\n";

foreach ($files as $file) {
    $enFile = $enPath . $file;
    $trFile = $trPath . $file;

    echo "Analyzing: $file\n";

    if (!file_exists($enFile)) {
        echo "  ⚠️  English file not found: $enFile\n\n";
        continue;
    }

    if (!file_exists($trFile)) {
        echo "  ❌ Turkish file missing!\n\n";
        $issues[$file] = [
            ['type' => 'file_missing', 'message' => 'Turkish translation file does not exist']
        ];
        $stats['total_files']++;
        continue;
    }

    $enContent = file_get_contents($enFile);
    $trContent = file_get_contents($trFile);

    $enData = json_decode($enContent, true);
    $trData = json_decode($trContent, true);

    if ($enData === null) {
        echo "  ⚠️  Invalid JSON in English file\n\n";
        continue;
    }

    if ($trData === null) {
        echo "  ❌ Invalid JSON in Turkish file\n\n";
        $issues[$file] = [
            ['type' => 'invalid_json', 'message' => 'Turkish file contains invalid JSON']
        ];
        $stats['total_files']++;
        continue;
    }

    $fileIssues = analyzeJson($enData, $trData);

    if (!empty($fileIssues)) {
        $issues[$file] = $fileIssues;

        $missingCount = count(array_filter($fileIssues, fn($i) => $i['type'] === 'missing_key'));
        $emptyCount = count(array_filter($fileIssues, fn($i) => $i['type'] === 'empty_value'));
        $englishCount = count(array_filter($fileIssues, fn($i) => $i['type'] === 'english_wording'));
        $pendingCount = count(array_filter($fileIssues, fn($i) => $i['type'] === 'pending_translation'));

        $stats['missing_keys'] += $missingCount;
        $stats['empty_values'] += $emptyCount;
        $stats['english_wording'] += $englishCount;
        $stats['pending_translations'] += $pendingCount;

        echo "  ❌ Found " . count($fileIssues) . " issues:\n";
        echo "     - Missing keys: $missingCount\n";
        echo "     - Empty values: $emptyCount\n";
        echo "     - Pending translations: $pendingCount\n";
        echo "     - English wording: $englishCount\n";
    } else {
        echo "  ✅ No issues found\n";
    }

    echo "\n";
    $stats['total_files']++;
}

echo "\n================================\n";
echo "Summary Statistics\n";
echo "================================\n";
echo "Total files analyzed: {$stats['total_files']}\n";
echo "Missing keys: {$stats['missing_keys']}\n";
echo "Empty values: {$stats['empty_values']}\n";
echo "Pending translations: {$stats['pending_translations']}\n";
echo "English wording: {$stats['english_wording']}\n";
echo "Total issues: " . ($stats['missing_keys'] + $stats['empty_values'] + $stats['pending_translations'] + $stats['english_wording']) . "\n\n";

// Generate detailed report
$reportPath = __DIR__ . '/tr_language_analysis_report.html';
$html = generateHtmlReport($issues, $stats);
file_put_contents($reportPath, $html);

echo "Detailed HTML report generated: $reportPath\n";

function generateHtmlReport($issues, $stats)
{
    $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turkish Language Files Analysis Report</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 1200px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; border-bottom: 3px solid #e74c3c; padding-bottom: 10px; }
        h2 { color: #555; margin-top: 30px; }
        .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin: 20px 0; }
        .stat-card { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 8px; text-align: center; }
        .stat-card.error { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .stat-card h3 { margin: 0; font-size: 2em; }
        .stat-card p { margin: 5px 0 0 0; opacity: 0.9; }
        .file-section { margin: 20px 0; border: 1px solid #ddd; border-radius: 8px; overflow: hidden; }
        .file-header { background: #e74c3c; color: white; padding: 15px; font-weight: bold; font-size: 1.1em; }
        .file-header.success { background: #27ae60; }
        .issue { padding: 15px; border-bottom: 1px solid #eee; }
        .issue:last-child { border-bottom: none; }
        .issue-type { display: inline-block; padding: 4px 8px; border-radius: 4px; font-size: 0.85em; font-weight: bold; margin-right: 10px; }
        .missing_key { background: #e74c3c; color: white; }
        .empty_value { background: #f39c12; color: white; }
        .pending_translation { background: #3498db; color: white; }
        .english_wording { background: #9b59b6; color: white; }
        .path { font-family: monospace; color: #2c3e50; font-weight: bold; }
        .value { color: #7f8c8d; font-style: italic; margin-top: 5px; }
        .filter-buttons { margin: 20px 0; }
        .filter-btn { padding: 8px 16px; margin-right: 10px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .filter-btn.active { box-shadow: 0 0 0 3px rgba(0,0,0,0.2); }
    </style>
</head>
<body>
    <div class="container">
        <h1>🇹🇷 Turkish Language Files Analysis Report</h1>
        <p>Generated: ' . date('Y-m-d H:i:s') . '</p>
        
        <div class="stats">
            <div class="stat-card">
                <h3>' . $stats['total_files'] . '</h3>
                <p>Files Analyzed</p>
            </div>
            <div class="stat-card error">
                <h3>' . $stats['missing_keys'] . '</h3>
                <p>Missing Keys</p>
            </div>
            <div class="stat-card error">
                <h3>' . $stats['empty_values'] . '</h3>
                <p>Empty Values</p>
            </div>
            <div class="stat-card error">
                <h3>' . $stats['pending_translations'] . '</h3>
                <p>Pending Translations</p>
            </div>
            <div class="stat-card error">
                <h3>' . $stats['english_wording'] . '</h3>
                <p>English Wording</p>
            </div>
        </div>
        
        <h2>Detailed Issues by File</h2>';

    if (empty($issues)) {
        $html .= '<div class="file-section"><div class="file-header success">✅ No issues found in any files!</div></div>';
    } else {
        foreach ($issues as $file => $fileIssues) {
            $html .= '<div class="file-section">';
            $html .= '<div class="file-header">' . htmlspecialchars($file) . ' (' . count($fileIssues) . ' issues)</div>';

            foreach ($fileIssues as $issue) {
                $html .= '<div class="issue">';
                $html .= '<span class="issue-type ' . $issue['type'] . '">' . strtoupper(str_replace('_', ' ', $issue['type'])) . '</span>';

                if (isset($issue['path'])) {
                    $html .= '<div class="path">' . htmlspecialchars($issue['path']) . '</div>';
                }

                if (isset($issue['en_value'])) {
                    $html .= '<div class="value">EN: ' . htmlspecialchars($issue['en_value']) . '</div>';
                }

                if (isset($issue['tr_value'])) {
                    $html .= '<div class="value">TR: ' . htmlspecialchars($issue['tr_value']) . '</div>';
                }

                if (isset($issue['value'])) {
                    $html .= '<div class="value">' . htmlspecialchars($issue['value']) . '</div>';
                }

                if (isset($issue['message'])) {
                    $html .= '<div class="value">' . htmlspecialchars($issue['message']) . '</div>';
                }

                $html .= '</div>';
            }

            $html .= '</div>';
        }
    }

    $html .= '
    </div>
</body>
</html>';

    return $html;
}
