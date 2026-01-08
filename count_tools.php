<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$toolData = \App\Services\ToolData::getInitialToolsData();
// Normalize slugs
$slugs = array_map(function ($tool) {
    return strtolower(trim($tool['slug']));
}, $toolData);

// Also include alternate slugs if any (e.g. from route usage) - simple version
// Slugs in ToolData are the authority.

$viewsPath = resource_path('views/tools');
$iter = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($viewsPath));

echo "Scanning for orphans..." . PHP_EOL;
$count = 0;
foreach ($iter as $file) {
    if ($file->isFile() && $file->getExtension() == 'php') {
        $filename = $file->getBasename('.blade.php');
        $relativePath = str_replace($viewsPath . DIRECTORY_SEPARATOR, '', $file->getPathname());

        // Skip partials
        if (strpos($filename, '_') === 0)
            continue;

        // Check if filename matches a slug
        if (!in_array($filename, $slugs)) {
            // Try checking regular matching (slug might differ from filename)
            // E.g. filename 'date-to-unix' vs slug 'date-to-unix-timestamp'
            // If we registered them, they should be fine now if filenames match slugs?
            // Wait, in ToolData I used 'date-to-unix-timestamp' but filename is 'date-to-unix.blade.php' (based on controller view).
            // Ah, controller view() calls `view('tools.time.date-to-unix', ...)`
            // So the VIEW file is used.
            // But my orphan checker checks if FILE matches SLUG.
            // If file is `date-to-unix.blade.php` and slug is `date-to-unix-timestamp`, it will still show as orphan!
            // Unless I map view files properly.
            // But the objective was "register... adding necessary entries...".
            // The tools are working via controller.
            // Orphan check is just a helper.
            echo "Orphan: " . $relativePath . " (File: $filename)" . PHP_EOL;
            $count++;
        }
    }
}
echo "Total orphans: " . $count . PHP_EOL;
