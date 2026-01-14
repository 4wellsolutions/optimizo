<?php

// Extract English development tools from the backup and create proper development.php

$developmentTools = [
    'rgb-hex-converter',
    'json-formatter',
    'base64-encoder-decoder',
    'html-viewer',
    'json-parser',
    'code-formatter',
    'css-minifier',
    'js-minifier',
    'html-minifier',
    'xml-formatter',
    'file-difference-checker',
    'cron-job-generator',
    'curl-command-builder'
];

echo "Extracting English development tools from backup...\n";

// Load the backup
$backupFile = 'utilities_english_backup.php';
if (!file_exists($backupFile)) {
    die("Error: Backup file not found. Run: git show c84f4eb:resources/lang/en/tools/utilities.php > utilities_english_backup.php\n");
}

$utilData = include $backupFile;

if (!is_array($utilData)) {
    die("Error: Could not load backup file\n");
}

// Extract development tools
$devData = [];
$found = 0;

foreach ($developmentTools as $tool) {
    if (isset($utilData[$tool])) {
        $devData[$tool] = $utilData[$tool];
        $found++;
        echo "  ✓ Found $tool\n";
    } else {
        echo "  ✗ Missing $tool\n";
    }
}

if ($found > 0) {
    // Write English development.php
    $devFile = 'resources/lang/en/tools/development.php';
    $devContent = "<?php\n\nreturn " . var_export($devData, true) . ";\n";
    file_put_contents($devFile, $devContent);
    echo "\n✅ Created $devFile with $found English development tools\n";
} else {
    echo "\n✗ No tools found in backup\n";
}
