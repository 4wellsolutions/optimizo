<?php

// Extract all 13 development tools from git backup and create proper English development.php

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

echo "Extracting English development tools from git...\n";

// Get the utilities.php from commit c84f4eb
$command = 'git show c84f4eb:resources/lang/en/tools/utilities.php';
$output = shell_exec($command);

if (!$output) {
    die("Error: Could not get file from git\n");
}

// Save to temp file
file_put_contents('temp_utilities_backup.php', $output);

// Load the backup
$utilData = include 'temp_utilities_backup.php';

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

    // Clean up temp file
    unlink('temp_utilities_backup.php');
} else {
    echo "\n✗ No tools found in backup\n";
}
