<?php

// Add file-difference-checker to English development.php

$utilFile = 'resources/lang/en/tools/utilities.php';
$devFile = 'resources/lang/en/tools/development.php';

echo "Loading files...\n";

$utilData = include $utilFile;
$devData = include $devFile;

if (isset($utilData['file-difference-checker'])) {
    echo "✓ Found file-difference-checker in utilities.php\n";

    // Add to development.php
    $devData['file-difference-checker'] = $utilData['file-difference-checker'];

    // Remove from utilities.php
    unset($utilData['file-difference-checker']);

    // Save both files
    $devContent = "<?php\n\nreturn " . var_export($devData, true) . ";\n";
    file_put_contents($devFile, $devContent);

    $utilContent = "<?php\n\nreturn " . var_export($utilData, true) . ";\n";
    file_put_contents($utilFile, $utilContent);

    echo "✅ Added file-difference-checker to development.php\n";
    echo "✅ Removed from utilities.php\n";
} else {
    echo "✗ file-difference-checker not found in utilities.php\n";
}
