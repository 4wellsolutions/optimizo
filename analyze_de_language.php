<?php

// Comprehensive analysis of German (DE) language files
// Checks for: empty keys, English text, translation completeness

$deFiles = [
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

$results = [
    'empty_keys' => [],
    'english_text' => [],
    'total_keys' => 0,
    'translated_keys' => 0,
    'files_analyzed' => 0
];

// Common English words to detect (case-insensitive)
$englishIndicators = [
    // Common English words that shouldn't appear in German translations
    'the',
    'and',
    'for',
    'with',
    'this',
    'that',
    'from',
    'your',
    'you',
    'click',
    'enter',
    'button',
    'here',
    'free',
    'tool',
    'online',
    'check',
    'generate',
    'convert',
    'download',
    'upload',
    'copy',
    'paste',
    'select',
    'choose',
    'start',
    'stop',
    'search',
    // Phrases
    'click here',
    'enter your',
    'free tool',
    'online tool',
    'check your',
    'generate your',
    'convert your'
];

function analyzeValue($value, $path, $file, &$results, $englishIndicators)
{
    global $results;

    // Check for empty values
    if ($value === '' || $value === null) {
        $results['empty_keys'][] = [
            'file' => $file,
            'key' => $path,
            'type' => $value === null ? 'null' : 'empty string'
        ];
        return;
    }

    // Skip if not a string
    if (!is_string($value)) {
        return;
    }

    $results['translated_keys']++;

    // Check for English text (basic detection)
    $lowerValue = strtolower($value);

    // Check for common English indicators
    foreach ($englishIndicators as $indicator) {
        if (strpos($lowerValue, strtolower($indicator)) !== false) {
            // Additional check: if it's a short word, make sure it's a whole word
            if (strlen($indicator) <= 4) {
                if (preg_match('/\b' . preg_quote($indicator, '/') . '\b/i', $value)) {
                    $results['english_text'][] = [
                        'file' => $file,
                        'key' => $path,
                        'value' => substr($value, 0, 100) . (strlen($value) > 100 ? '...' : ''),
                        'indicator' => $indicator
                    ];
                    break;
                }
            } else {
                $results['english_text'][] = [
                    'file' => $file,
                    'key' => $path,
                    'value' => substr($value, 0, 100) . (strlen($value) > 100 ? '...' : ''),
                    'indicator' => $indicator
                ];
                break;
            }
        }
    }
}

function analyzeArray($data, $path, $file, &$results, $englishIndicators)
{
    global $results;

    foreach ($data as $key => $value) {
        $currentPath = $path ? $path . '.' . $key : $key;

        if (is_array($value)) {
            analyzeArray($value, $currentPath, $file, $results, $englishIndicators);
        } else {
            $results['total_keys']++;
            analyzeValue($value, $currentPath, $file, $results, $englishIndicators);
        }
    }
}

echo "=== GERMAN (DE) LANGUAGE FILES ANALYSIS ===\n\n";
echo "Analyzing " . count($deFiles) . " files...\n\n";

foreach ($deFiles as $file) {
    $filePath = 'resources/lang/de/tools/' . $file;

    if (!file_exists($filePath)) {
        echo "⚠️  File not found: $file\n";
        continue;
    }

    $content = file_get_contents($filePath);
    $data = json_decode($content, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        echo "❌ Error parsing $file: " . json_last_error_msg() . "\n";
        continue;
    }

    analyzeArray($data, '', $file, $results, $englishIndicators);
    $results['files_analyzed']++;
    echo "✓ Analyzed: $file\n";
}

echo "\n=== ANALYSIS RESULTS ===\n\n";

// Summary
echo "📊 SUMMARY:\n";
echo "  Files analyzed: " . $results['files_analyzed'] . "/" . count($deFiles) . "\n";
echo "  Total keys: " . $results['total_keys'] . "\n";
echo "  Translated keys: " . $results['translated_keys'] . "\n";
echo "  Empty keys: " . count($results['empty_keys']) . "\n";
echo "  Potential English text: " . count($results['english_text']) . "\n";

$completeness = $results['total_keys'] > 0
    ? round(($results['translated_keys'] / $results['total_keys']) * 100, 2)
    : 0;
echo "  Translation completeness: {$completeness}%\n\n";

// Empty keys details
if (count($results['empty_keys']) > 0) {
    echo "⚠️  EMPTY KEYS FOUND (" . count($results['empty_keys']) . "):\n";

    $byFile = [];
    foreach ($results['empty_keys'] as $item) {
        if (!isset($byFile[$item['file']])) {
            $byFile[$item['file']] = [];
        }
        $byFile[$item['file']][] = $item;
    }

    foreach ($byFile as $file => $keys) {
        echo "\n  --- $file (" . count($keys) . " empty keys) ---\n";
        foreach ($keys as $item) {
            echo "    - " . $item['key'] . " => " . $item['type'] . "\n";
        }
    }
    echo "\n";
} else {
    echo "✅ NO EMPTY KEYS FOUND\n\n";
}

// English text details
if (count($results['english_text']) > 0) {
    echo "⚠️  POTENTIAL ENGLISH TEXT FOUND (" . count($results['english_text']) . "):\n";
    echo "  (These may need review for proper German translation)\n";

    $byFile = [];
    foreach ($results['english_text'] as $item) {
        if (!isset($byFile[$item['file']])) {
            $byFile[$item['file']] = [];
        }
        $byFile[$item['file']][] = $item;
    }

    foreach ($byFile as $file => $items) {
        echo "\n  --- $file (" . count($items) . " potential issues) ---\n";
        $count = 0;
        foreach ($items as $item) {
            $count++;
            if ($count <= 10) { // Show first 10 per file
                echo "    - " . $item['key'] . "\n";
                echo "      Detected: '" . $item['indicator'] . "'\n";
                echo "      Value: " . $item['value'] . "\n";
            }
        }
        if (count($items) > 10) {
            echo "    ... and " . (count($items) - 10) . " more\n";
        }
    }
    echo "\n";
} else {
    echo "✅ NO OBVIOUS ENGLISH TEXT DETECTED\n\n";
}

// Generate HTML report
$html = '<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>German (DE) Language Analysis Report</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .container {
            max-width: 1400px;
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
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
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
        .section {
            margin: 30px 0;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            overflow: hidden;
        }
        .section-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 20px;
            font-weight: bold;
            font-size: 1.2em;
        }
        .section-content {
            padding: 20px;
        }
        .issue-item {
            background: #fff5f5;
            border-left: 3px solid #fc8181;
            padding: 12px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .success {
            background: #f0fff4;
            border-left: 3px solid #48bb78;
            color: #22543d;
        }
        .key-path {
            font-family: "Courier New", monospace;
            color: #c53030;
            font-weight: bold;
        }
        .value-preview {
            color: #4a5568;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🇩🇪 German Language Analysis Report</h1>
        <p style="color: #718096; font-size: 1.1em;">Comprehensive analysis of DE translation files</p>
        
        <div class="stats">
            <div class="stat-card">
                <div class="stat-number">' . $results['files_analyzed'] . '</div>
                <div class="stat-label">Files Analyzed</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">' . $results['total_keys'] . '</div>
                <div class="stat-label">Total Keys</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">' . count($results['empty_keys']) . '</div>
                <div class="stat-label">Empty Keys</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">' . count($results['english_text']) . '</div>
                <div class="stat-label">Potential English Text</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">' . $completeness . '%</div>
                <div class="stat-label">Completeness</div>
            </div>
        </div>';

if (count($results['empty_keys']) > 0) {
    $byFile = [];
    foreach ($results['empty_keys'] as $item) {
        if (!isset($byFile[$item['file']])) {
            $byFile[$item['file']] = [];
        }
        $byFile[$item['file']][] = $item;
    }

    $html .= '<div class="section">
        <div class="section-header">⚠️ Empty Keys (' . count($results['empty_keys']) . ')</div>
        <div class="section-content">';

    foreach ($byFile as $file => $keys) {
        $html .= '<h3>' . htmlspecialchars($file) . ' (' . count($keys) . ' empty)</h3>';
        foreach ($keys as $item) {
            $html .= '<div class="issue-item">
                <span class="key-path">' . htmlspecialchars($item['key']) . '</span>
                <div class="value-preview">(' . htmlspecialchars($item['type']) . ')</div>
            </div>';
        }
    }

    $html .= '</div></div>';
} else {
    $html .= '<div class="section">
        <div class="section-header">✅ Empty Keys Check</div>
        <div class="section-content">
            <div class="issue-item success">No empty keys found! All translation keys have values.</div>
        </div>
    </div>';
}

if (count($results['english_text']) > 0) {
    $byFile = [];
    foreach ($results['english_text'] as $item) {
        if (!isset($byFile[$item['file']])) {
            $byFile[$item['file']] = [];
        }
        $byFile[$item['file']][] = $item;
    }

    $html .= '<div class="section">
        <div class="section-header">⚠️ Potential English Text (' . count($results['english_text']) . ')</div>
        <div class="section-content">
        <p><strong>Note:</strong> These are automated detections and may include false positives. Manual review recommended.</p>';

    foreach ($byFile as $file => $items) {
        $html .= '<h3>' . htmlspecialchars($file) . ' (' . count($items) . ' detections)</h3>';
        $count = 0;
        foreach ($items as $item) {
            $count++;
            if ($count <= 20) {
                $html .= '<div class="issue-item">
                    <span class="key-path">' . htmlspecialchars($item['key']) . '</span>
                    <div class="value-preview">Detected: "' . htmlspecialchars($item['indicator']) . '"</div>
                    <div class="value-preview">' . htmlspecialchars($item['value']) . '</div>
                </div>';
            }
        }
        if (count($items) > 20) {
            $html .= '<p><em>... and ' . (count($items) - 20) . ' more detections</em></p>';
        }
    }

    $html .= '</div></div>';
}

$html .= '
    </div>
</body>
</html>';

file_put_contents('de_language_analysis.html', $html);
echo "📄 HTML report generated: de_language_analysis.html\n";
