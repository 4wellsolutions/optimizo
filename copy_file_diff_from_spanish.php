<?php

// Copy file-difference-checker from Spanish to English development.php

$esDevFile = 'resources/lang/es/tools/development.php';
$enDevFile = 'resources/lang/en/tools/development.php';

echo "Loading files...\n";

$esData = include $esDevFile;
$enData = include $enDevFile;

if (isset($esData['file-difference-checker'])) {
    echo "✓ Found file-difference-checker in Spanish development.php\n";

    // Copy the structure and translate key fields
    $tool = $esData['file-difference-checker'];

    // Translate meta fields
    if (isset($tool['meta'])) {
        $tool['meta']['h1'] = 'File Difference Checker';
        $tool['meta']['subtitle'] = 'Compare two text files and find differences instantly';
        $tool['meta']['title'] = 'File Difference Checker';
        $tool['meta']['description'] = 'Compare two text files and find differences instantly';
    }

    // Add to English development.php
    $enData['file-difference-checker'] = $tool;

    // Save English file
    $enContent = "<?php\n\nreturn " . var_export($enData, true) . ";\n";
    file_put_contents($enDevFile, $enContent);

    echo "✅ Added file-difference-checker to English development.php\n";
    echo "Total tools in English development.php: " . count($enData) . "\n";
} else {
    echo "✗ file-difference-checker not found in Spanish development.php\n";
}
