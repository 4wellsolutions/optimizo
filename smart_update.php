<?php

require __DIR__ . '/vendor/autoload.php';

// 1. Parse web.php to build Route -> Subcategory map
$webContent = file_get_contents(__DIR__ . '/routes/web.php');
$lines = explode("\n", $webContent);

$routeMap = []; // route_name => subcategory
$currentPrefix = '';
$currentSubcategory = 'General';

foreach ($lines as $line) {
    echo $line . "\n";
    $trim = trim($line);

    // Detect Prefix/Category group
    if (preg_match("/Route::prefix\('tools'\)->name\('([^']+)'\)/", $trim, $m)) {
        $currentPrefix = $m[1]; // e.g., 'utility.'
        continue;
    }

    // Detect Subcategory Comments (simple heuristic)
    if (str_starts_with($trim, '//') && !str_contains($trim, 'Routes') && strlen($trim) > 5) {
        $comment = trim(substr($trim, 2));
        // simple filter to avoid unrelated comments
        if ($comment !== 'GET Routes' && $comment !== 'POST Routes') {
            $currentSubcategory = $comment;
        }
    }

    // Detect Route Names
    // Route::get('...', [...])->name('foo');
    if (str_contains($trim, "->name('")) {
        if (preg_match("/->name\('([^']+)'\)/", $trim, $m)) {
            $routeName = $m[1];
            // If prefix matches standard pattern, append it
            // In web.php names are usually 'base64', 'image-compressor' inside the group
            $fullRoute = $currentPrefix . $routeName;

            $routeMap[$fullRoute] = $currentSubcategory;
        }
    }
}

print_r($routeMap);

// 2. Update Seeders
$seeders = glob(__DIR__ . '/database/seeders/*.php');
$skip = ['DatabaseSeeder.php', 'AdminUserSeeder.php', 'ToolsSeeder.php']; // We WILL update ToolSeeder too if we can, but maybe complex. Let's focus on individual files first.

foreach ($seeders as $file) {
    if (in_array(basename($file), $skip))
        continue;

    $content = file_get_contents($file);

    // Find route_name in file
    if (preg_match("/'route_name'\s*=>\s*'([^']+)'/", $content, $m)) {
        $route = $m[1];

        // Find matching subcategory
        $subcategory = null;
        if (isset($routeMap[$route])) {
            $subcategory = $routeMap[$route];
        } else {
            // Fallback: try to find by similarity or if exact match failed
            // Maybe route in seeder is old/wrong?
            // Use the script to Fix route name? That's risky if we can't match slug.
            echo "[WARN] No map for route '$route' in " . basename($file) . "\n";
            continue;
        }

        // Update File
        $modified = false;

        // Add/Update Subcategory
        if (!str_contains($content, "'subcategory'")) {
            $pattern = "/('category'\s*=>\s*'[^']+',)/";
            // Fallback if category line structure varies
            if (!preg_match($pattern, $content)) {
                $pattern = "/('name'\s*=>\s*'[^']+',)/";
            }

            $replacement = "$1\n            'subcategory' => '" . $subcategory . "',";
            $newContent = preg_replace($pattern, $replacement, $content);
            if ($newContent !== $content) {
                $content = $newContent;
                $modified = true;
                echo "[UPDATE] Added subcategory '$subcategory' to " . basename($file) . "\n";
            }
        }

        // If modified, write back
        if ($modified) {
            file_put_contents($file, $content);
        }
    }
}
