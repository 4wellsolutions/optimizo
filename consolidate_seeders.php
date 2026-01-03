<?php

$toolSeederPath = __DIR__ . '/database/seeders/ToolSeeder.php';
$toolSeederContent = file_get_contents($toolSeederPath);

// 1. Get existing slugs in ToolSeeder
preg_match_all("/'slug' => '([^']+)'/", $toolSeederContent, $matches);
$existingSlugs = array_flip($matches[1]);
echo "Found " . count($existingSlugs) . " existing slugs in ToolSeeder.\n";

// 2. Scan individual seeders
$seeders = glob(__DIR__ . '/database/seeders/*.php');
$skip = ['ToolSeeder.php', 'DatabaseSeeder.php', 'AdminUserSeeder.php', 'ToolsSeeder.php'];

$newTools = [];

foreach ($seeders as $file) {
    if (in_array(basename($file), $skip))
        continue;

    $content = file_get_contents($file);

    // Extract Slug
    if (preg_match("/'slug' => '([^']+)'/", $content, $slugMatch)) {
        $slug = $slugMatch[1];
        if (isset($existingSlugs[$slug]))
            continue; // Already exists

        // Extract Attributes
        // We look for the second array in updateOrCreate
        if (preg_match("/Tool::updateOrCreate\s*\(\s*\[[^\]]+\],\s*\[(.*?)\]\s*\)/s", $content, $attrMatch)) {
            $attrBlock = $attrMatch[1];

            // Parse attributes manually to be safe
            $tool = ['slug' => $slug];

            $keys = ['name', 'category', 'subcategory', 'controller', 'route_name', 'url', 'meta_title', 'meta_description', 'meta_keywords', 'priority', 'change_frequency', 'order'];

            foreach ($keys as $key) {
                if (preg_match("/'$key'\s*=>\s*'(.*?)'/", $attrBlock, $valMatch)) { // simplified quote handling
                    // Handle escaped single quotes? Assuming simple for now
                    $tool[$key] = $valMatch[1];
                } elseif (preg_match("/'$key'\s*=>\s*(true|false|\d+(\.\d+)?)/", $attrBlock, $valMatch)) {
                    $tool[$key] = $valMatch[1]; // boolean/number literal
                }
            }

            if (empty($tool['subcategory'])) {
                // Try to fallback to web.php map if missing in file (shouldn't be, since we just fixed them)
                // Or just set default
                $tool['subcategory'] = 'Utility Tools';
            }

            $newTools[] = $tool;
            echo "Found new tool: $slug\n";
        }
    }
}

// 3. Append to ToolSeeder
if (!empty($newTools)) {
    // Generate PHP array code
    $appendCode = "\n            // Consolidate Missing Tools\n";
    foreach ($newTools as $tool) {
        $appendCode .= "            [\n";
        foreach ($tool as $key => $val) {
            if (in_array($val, ['true', 'false']) || is_numeric($val)) {
                $appendCode .= "                '$key' => $val,\n";
            } else {
                $val = str_replace("'", "\'", $val); // basic escaping
                $appendCode .= "                '$key' => '$val',\n";
            }
        }
        $appendCode .= "            ],\n";
    }

    // Insert before the closing array bracket of $tools
    // We look for where ]; is likely ending the tools array, or just before 'foreach'
    // In ToolSeeder.php: 
    //         ];
    // 
    //         foreach ($tools as $tool) {

    $pos = strpos($toolSeederContent, 'foreach ($tools');
    if ($pos !== false) {
        // Find the specific '];' before this loop
        $insertPos = strrpos(substr($toolSeederContent, 0, $pos), '];');
        if ($insertPos !== false) {
            $newContent = substr_replace($toolSeederContent, $appendCode, $insertPos, 0);
            file_put_contents($toolSeederPath, $newContent);
            echo "Added " . count($newTools) . " tools to ToolSeeder.php.\n";
        } else {
            echo "Could not find insertion point (];).\n";
        }
    } else {
        echo "Could not find foreach loop.\n";
    }
} else {
    echo "No new tools to add.\n";
}
