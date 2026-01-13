<?php

/**
 * Add seo.title and seo.description to all EN utilities that are missing them
 * Keep existing meta.h1 and meta.subtitle
 */

echo "=== ADDING SEO SECTIONS TO UTILITIES ===\n\n";

$enFile = __DIR__ . '/resources/lang/en/tools/utilities.php';
$utilities = include $enFile;

$fixed = 0;

foreach ($utilities as $slug => &$data) {
    $needsFix = false;

    // Ensure meta.h1 exists
    if (!isset($data['meta']['h1'])) {
        // Extract from meta.title if available
        if (isset($data['meta']['title'])) {
            $data['meta']['h1'] = $data['meta']['title'];
        } else {
            // Generate from slug
            $data['meta']['h1'] = ucwords(str_replace(['-', '_'], ' ', $slug));
        }
        $needsFix = true;
    }

    // Ensure meta.subtitle exists
    if (!isset($data['meta']['subtitle']) && isset($data['meta']['desc'])) {
        $data['meta']['subtitle'] = $data['meta']['desc'];
        $needsFix = true;
    } elseif (!isset($data['meta']['subtitle']) && isset($data['content']['subtitle'])) {
        $data['meta']['subtitle'] = $data['content']['subtitle'];
        $needsFix = true;
    }

    // Add seo.title if missing
    if (!isset($data['seo']['title'])) {
        $h1 = $data['meta']['h1'] ?? ucwords(str_replace(['-', '_'], ' ', $slug));
        $data['seo']['title'] = $h1 . ' - Free Online Tool';
        $needsFix = true;
    }

    // Add seo.description if missing
    if (!isset($data['seo']['description'])) {
        $subtitle = $data['meta']['subtitle'] ?? $data['meta']['desc'] ?? '';
        if ($subtitle) {
            $data['seo']['description'] = 'Free ' . strtolower($data['meta']['h1']) . ' - ' . $subtitle . '. No registration required.';
        } else {
            $data['seo']['description'] = 'Free online ' . strtolower($data['meta']['h1']) . ' tool. Fast, secure, and easy to use.';
        }
        $needsFix = true;
    }

    if ($needsFix) {
        $fixed++;
    }
}

// Save updated file
function saveUtilitiesFile($file, $utilities)
{
    $output = "<?php\n\nreturn [\n";

    foreach ($utilities as $slug => $data) {
        $output .= "    '{$slug}' => [\n";

        // Meta section
        $output .= "        'meta' => [\n";
        if (isset($data['meta']['h1'])) {
            $output .= "            'h1' => '" . addslashes($data['meta']['h1']) . "',\n";
        }
        if (isset($data['meta']['subtitle'])) {
            $output .= "            'subtitle' => '" . addslashes($data['meta']['subtitle']) . "',\n";
        }
        // Keep other meta fields
        foreach ($data['meta'] as $k => $v) {
            if ($k != 'h1' && $k != 'subtitle' && !is_array($v)) {
                $output .= "            '{$k}' => '" . addslashes($v) . "',\n";
            }
        }
        $output .= "        ],\n";

        // SEO section
        if (isset($data['seo'])) {
            $output .= "        'seo' => [\n";
            if (isset($data['seo']['title'])) {
                $output .= "            'title' => '" . addslashes($data['seo']['title']) . "',\n";
            }
            if (isset($data['seo']['description'])) {
                $output .= "            'description' => '" . addslashes($data['seo']['description']) . "',\n";
            }
            // Keep other SEO fields
            foreach ($data['seo'] as $k => $v) {
                if ($k != 'title' && $k != 'description' && !is_array($v)) {
                    $output .= "            '{$k}' => '" . addslashes($v) . "',\n";
                }
            }
            $output .= "        ],\n";
        }

        // Keep all other sections as is
        foreach ($data as $section => $content) {
            if ($section != 'meta' && $section != 'seo') {
                $output .= "        '{$section}' => " . var_export($content, true) . ",\n";
            }
        }

        $output .= "    ],\n";
    }

    $output .= "];\n";
    file_put_contents($file, $output);
}

// This approach won't work well due to var_export formatting
// Better to manually add only to those missing
echo "Fixed: $fixed tools\n";
echo "Total: " . count($utilities) . " tools\n\n";

// Just identify what's needed for now
$incomplete = [];
foreach ($utilities as $slug => $data) {
    $issues = [];
    if (!isset($data['meta']['h1']))
        $issues[] = 'meta.h1';
    if (!isset($data['meta']['subtitle']))
        $issues[] = 'meta.subtitle';
    if (!isset($data['seo']['title']))
        $issues[] = 'seo.title';
    if (!isset($data['seo']['description']))
        $issues[] = 'seo.description';

    if (count($issues) > 0) {
        $incomplete[$slug] = $issues;
    }
}

if (count($incomplete) > 0) {
    echo "Tools needing fixes:\n";
    foreach ($incomplete as $slug => $issues) {
        echo "- $slug: " . implode(', ', $issues) . "\n";
    }
}

echo "\n✅ Analysis complete - need to manually add SEO sections\n";
