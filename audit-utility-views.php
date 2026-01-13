<?php

/**
 * Audit Utility View Files - Check if view file names match tool slugs
 */

echo "=== UTILITY VIEW FILES AUDIT ===\n\n";

// Get all utility tool slugs from database
$dbHost = 'localhost';
$dbName = 'optimizo';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get all utilities from database
    $stmt = $pdo->query("SELECT slug, name FROM tools WHERE category_id = (SELECT id FROM categories WHERE slug = 'utilities') ORDER BY slug");
    $dbTools = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "Database tools: " . count($dbTools) . "\n\n";

    // Get all view files
    $viewsDir = __DIR__ . '/resources/views/tools/utilities/';

    if (!is_dir($viewsDir)) {
        die("ERROR: Views directory not found: $viewsDir\n");
    }

    $viewFiles = glob($viewsDir . '*.blade.php');
    $viewFileNames = [];

    foreach ($viewFiles as $file) {
        $basename = basename($file, '.blade.php');
        $viewFileNames[$basename] = $file;
    }

    echo "View files found: " . count($viewFiles) . "\n\n";

    // Compare
    $matches = [];
    $mismatches = [];
    $missingViews = [];
    $extraViews = array_keys($viewFileNames);

    foreach ($dbTools as $tool) {
        $slug = $tool['slug'];
        $name = $tool['name'];

        if (isset($viewFileNames[$slug])) {
            $matches[] = $slug;
            // Remove from extra views
            $key = array_search($slug, $extraViews);
            if ($key !== false) {
                unset($extraViews[$key]);
            }
        } else {
            // View file doesn't match slug - check for similar names
            $found = false;
            foreach ($viewFileNames as $viewName => $viewPath) {
                $similarity = 0;
                similar_text($slug, $viewName, $similarity);
                if ($similarity > 70) {
                    $mismatches[] = [
                        'slug' => $slug,
                        'name' => $name,
                        'view_file' => $viewName,
                        'similarity' => round($similarity, 1),
                    ];
                    $found = true;
                    // Remove from extra views
                    $key = array_search($viewName, $extraViews);
                    if ($key !== false) {
                        unset($extraViews[$key]);
                    }
                    break;
                }
            }
            if (!$found) {
                $missingViews[] = ['slug' => $slug, 'name' => $name];
            }
        }
    }

    echo "✅ MATCHES: " . count($matches) . " tools\n";
    echo "⚠️  MISMATCHES: " . count($mismatches) . " tools need renaming\n";
    echo "❌ MISSING VIEWS: " . count($missingViews) . " tools\n";
    echo "📄 EXTRA VIEW FILES: " . count($extraViews) . " files\n\n";

    if (count($mismatches) > 0) {
        echo str_repeat("=", 100) . "\n";
        echo "MISMATCHES - View files that need renaming:\n";
        echo str_repeat("=", 100) . "\n";
        printf("%-40s %-40s %s\n", "TOOL SLUG", "CURRENT VIEW FILE", "SIMILARITY");
        echo str_repeat("-", 100) . "\n";

        foreach ($mismatches as $mismatch) {
            printf(
                "%-40s %-40s %s%%\n",
                $mismatch['slug'],
                $mismatch['view_file'],
                $mismatch['similarity']
            );
        }

        echo "\n";
        echo "RENAME COMMANDS:\n";
        echo str_repeat("-", 100) . "\n";
        foreach ($mismatches as $mismatch) {
            $oldFile = $mismatch['view_file'] . '.blade.php';
            $newFile = $mismatch['slug'] . '.blade.php';
            echo "mv resources/views/tools/utilities/$oldFile resources/views/tools/utilities/$newFile\n";
        }
    }

    if (count($missingViews) > 0) {
        echo "\n" . str_repeat("=", 100) . "\n";
        echo "MISSING VIEW FILES:\n";
        echo str_repeat("=", 100) . "\n";
        foreach ($missingViews as $missing) {
            echo "- {$missing['slug']} ({$missing['name']})\n";
        }
    }

    if (count($extraViews) > 0) {
        echo "\n" . str_repeat("=", 100) . "\n";
        echo "EXTRA VIEW FILES (not in database):\n";
        echo str_repeat("=", 100) . "\n";
        foreach ($extraViews as $extra) {
            echo "- $extra.blade.php\n";
        }
    }

    // Save results for processing
    if (count($mismatches) > 0) {
        $renameScript = [];
        foreach ($mismatches as $mismatch) {
            $renameScript[] = [
                'old' => $mismatch['view_file'],
                'new' => $mismatch['slug'],
            ];
        }
        file_put_contents(__DIR__ . '/utility-view-renames.json', json_encode($renameScript, JSON_PRETTY_PRINT));
        echo "\n✅ Rename list saved to: utility-view-renames.json\n";
    }

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage() . "\n");
}
