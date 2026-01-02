<?php

use Illuminate\Support\Str;

$dir = __DIR__ . '/resources/views/tools';
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

$updatedCount = 0;

foreach ($iterator as $file) {
    if ($file->getExtension() === 'php') {
        $content = file_get_contents($file->getPathname());
        $originalContent = $content;

        // Replace Title
        $content = preg_replace(
            "/@section\('title',\s*['\"].*?['\"]\)/",
            "@section('title', \$tool->meta_title)",
            $content
        );

        // Replace Meta Description
        $content = preg_replace(
            "/@section\('meta_description',\s*['\"].*?['\"]\)/",
            "@section('meta_description', \$tool->meta_description)",
            $content
        );

        // Replace Meta Keywords (Standard)
        $content = preg_replace(
            "/@section\('meta_keywords',\s*['\"].*?['\"]\)/",
            "@section('meta_keywords', \$tool->meta_keywords)",
            $content
        );

        // Handling multi-line keywords if any
        // Note: The simple regex above handles most standard one-liners.
        // Complex cases might need manual check, but standard layout is consistent.

        if ($content !== $originalContent) {
            file_put_contents($file->getPathname(), $content);
            echo "Updated: " . $file->getFilename() . "\n";
            $updatedCount++;
        }
    }
}

echo "\nTotal files updated: $updatedCount\n";
