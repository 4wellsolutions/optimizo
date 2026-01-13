<?php

$file = __DIR__ . '/resources/lang/en/tools/utilities.php';
$content = file_get_contents($file);

// Fix 1: Add h1 to ascii-converter  
$content = str_replace(
    "    'ascii-converter' => [\r\n        'meta' => [\r\n            'title' => 'Free ASCII Converter Online', // Fallback if \$tool->name not sufficient or for specific override\r\n            'subtitle' => 'Convert between text and ASCII codes instantly',",
    "    'ascii-converter' => [\r\n        'meta' => [\r\n            'h1' => 'Free ASCII Converter Online',\r\n            'title' => 'Free ASCII Converter Online', // Fallback if \$tool->name not sufficient or for specific override\r\n            'subtitle' => 'Convert between text and ASCII codes instantly',",
    $content
);

// Fix 2: Add seo.title to markdown-to-html-converter
$content = str_replace(
    "    'markdown-to-html-converter' => [\r\n        'meta' => [\r\n            'h1' => 'Markdown to HTML Converter',\r\n            'subtitle' => 'Convert Markdown to HTML instantly',\r\n        ],\r\n        'seo' => [\r\n            'description' => 'Convert Markdown to HTML instantly with this free tool.',\r\n        ],",
    "    'markdown-to-html-converter' => [\r\n        'meta' => [\r\n            'h1' => 'Markdown to HTML Converter',\r\n            'subtitle' => 'Convert Markdown to HTML instantly',\r\n        ],\r\n        'seo' => [\r\n            'title' => 'Markdown to HTML Converter - Free Online Tool',\r\n            'description' => 'Convert Markdown to HTML instantly with this free tool.',\r\n        ],",
    $content
);

// Fix 3: Add seo.title to base64-encoder-decoder
$content = str_replace(
    "    'base64-encoder-decoder' => [\r\n        'meta' => [\r\n            'h1' => 'Base64 Encoder/Decoder',\r\n            'subtitle' => 'Encode and decode Base64 data instantly',\r\n        ],\r\n        'seo' => [\r\n            'description' => 'Free online Base64 encoder and decoder. Convert text to Base64 or decode Base64 strings securely in your browser.',\r\n        ],",
    "    'base64-encoder-decoder' => [\r\n        'meta' => [\r\n            'h1' => 'Base64 Encoder/Decoder',\r\n            'subtitle' => 'Encode and decode Base64 data instantly',\r\n        ],\r\n        'seo' => [\r\n            'title' => 'Base64 Encoder/Decoder - Free Online Tool',\r\n            'description' => 'Free online Base64 encoder and decoder. Convert text to Base64 or decode Base64 strings securely in your browser.',\r\n        ],",
    $content
);

file_put_contents($file, $content);

echo "✅ Fixed all 3 utilities:\n";
echo "1. ascii-converter - added meta.h1\n";
echo "2. markdown-to-html-converter - added seo.title\n";
echo "3. base64-encoder-decoder - added seo.title\n";
