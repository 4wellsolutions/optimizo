<?php

/**
 * Add meta.subtitle to all 11 Document tools - ENGLISH
 * Creates professional 70-100 character subtitles
 */

$enSubtitles = [
    'pdf-to-word' => 'Convert PDF documents to editable Word files instantly with high accuracy',
    'word-to-pdf' => 'Transform Word documents to PDF format with perfect formatting preserved',
    'excel-to-pdf' => 'Convert Excel spreadsheets to professional PDF documents effortlessly',
    'pdf-to-excel' => 'Extract data from PDF to editable Excel spreadsheets with precision',
    'ppt-to-pdf' => 'Convert PowerPoint presentations to PDF format for easy sharing',
    'pdf-to-ppt' => 'Transform PDF documents into editable PowerPoint presentations',
    'jpg-to-pdf' => 'Convert JPG images to PDF documents with custom page settings',
    'pdf-to-jpg' => 'Extract pages from PDF as high-quality JPG images instantly',
    'pdf-compressor' => 'Reduce PDF file size while maintaining quality for faster sharing',
    'pdf-merger' => 'Combine multiple PDF files into a single document effortlessly',
    'pdf-splitter' => 'Split PDF documents into separate pages or extract specific ranges',
];

$enH1s = [
    'pdf-to-word' => 'PDF to Word Converter',
    'word-to-pdf' => 'Word to PDF Converter',
    'excel-to-pdf' => 'Excel to PDF Converter',
    'pdf-to-excel' => 'PDF to Excel Converter',
    'ppt-to-pdf' => 'PowerPoint to PDF Converter',
    'pdf-to-ppt' => 'PDF to PowerPoint Converter',
    'jpg-to-pdf' => 'JPG to PDF Converter',
    'pdf-to-jpg' => 'PDF to JPG Converter',
    'pdf-compressor' => 'PDF Compressor',
    'pdf-merger' => 'PDF Merger',
    'pdf-splitter' => 'PDF Splitter',
];

// Load EN file
$enFile = __DIR__ . '/resources/lang/en/tools/document.php';
$enTranslations = include $enFile;

$updated = 0;

foreach ($enSubtitles as $slug => $subtitle) {
    if (isset($enTranslations[$slug])) {
        // Ensure meta section exists
        if (!isset($enTranslations[$slug]['meta'])) {
            $enTranslations[$slug]['meta'] = [];
        }

        // Add/update h1 if missing
        if (!isset($enTranslations[$slug]['meta']['h1'])) {
            $enTranslations[$slug]['meta']['h1'] = $enH1s[$slug];
        }

        // Add subtitle
        $enTranslations[$slug]['meta']['subtitle'] = $subtitle;
        echo "✓ Added EN subtitle for: $slug\n";
        $updated++;
    } else {
        echo "⚠ Tool not found: $slug\n";
    }
}

// Generate beautified output
$output = "<?php\n\nreturn [\n";

foreach ($enTranslations as $toolSlug => $toolData) {
    $output .= "    // " . ucwords(str_replace('-', ' ', $toolSlug)) . "\n";
    $output .= "    '{$toolSlug}' => [\n";

    // Meta section
    if (isset($toolData['meta'])) {
        $output .= "        'meta' => [\n";
        if (isset($toolData['meta']['h1'])) {
            $h1 = str_replace("'", "\\'", $toolData['meta']['h1']);
            $output .= "            'h1' => '{$h1}',\n";
        }
        if (isset($toolData['meta']['subtitle'])) {
            $subtitle = str_replace("'", "\\'", $toolData['meta']['subtitle']);
            $output .= "            'subtitle' => '{$subtitle}',\n";
        }
        $output .= "        ],\n";
    }

    // SEO section
    if (isset($toolData['seo'])) {
        $output .= "        'seo' => [\n";
        foreach ($toolData['seo'] as $key => $value) {
            $escapedValue = str_replace("'", "\\'", $value);
            $output .= "            '{$key}' => '{$escapedValue}',\n";
        }
        $output .= "        ],\n";
    }

    // Form section
    if (isset($toolData['form'])) {
        $output .= "        'form' => [\n";
        foreach ($toolData['form'] as $key => $value) {
            $escapedValue = str_replace("'", "\\'", $value);
            $output .= "            '{$key}' => '{$escapedValue}',\n";
        }
        $output .= "        ],\n";
    }

    // Content section
    if (isset($toolData['content'])) {
        $output .= "        'content' => [\n";
        foreach ($toolData['content'] as $key => $value) {
            $escapedValue = str_replace("'", "\\'", $value);
            $output .= "            '{$key}' => '{$escapedValue}',\n";
        }
        $output .= "        ],\n";
    }

    $output .= "    ],\n\n";
}

$output .= "];\n";

file_put_contents($enFile, $output);

echo "\n✅ EN Document tools complete: {$updated}/11\n";
echo "File: {$enFile}\n";
