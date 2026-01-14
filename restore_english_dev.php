<?php

// Script to restore English development tools from git history or recreate them

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

echo "Attempting to restore English development tools from git...\n";

// Try to get the last commit before the tools were moved
$output = shell_exec('git log --all --oneline -- resources/lang/en/tools/utilities.php | head -5');
echo "Recent commits:\n$output\n";

// Get the file from a previous commit (before we moved the tools)
// You'll need to replace COMMIT_HASH with an actual commit hash from above
echo "\nTo restore, run:\n";
echo "git show COMMIT_HASH:resources/lang/en/tools/utilities.php > utilities_backup.php\n";
echo "\nThen we can extract the English development tools from that backup.\n";
