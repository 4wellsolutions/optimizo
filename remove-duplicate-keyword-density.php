<?php

/**
 * Remove duplicate keyword-density-checker from all SEO translation files
 */

$languages = ['en', 'es', 'ru'];
echo "=== REMOVING DUPLICATE keyword-density-checker ===\n\n";

foreach ($languages as $lang) {
    $file = __DIR__ . "/resources/lang/{$lang}/tools/seo.php";
    $translations = include $file;

    // Check if duplicate exists
    if (isset($translations['keyword-density-checker'])) {
        // Remove it
        unset($translations['keyword-density-checker']);
        echo "✓ Removed from {$lang}\n";

        // Rebuild file
        $output = "<?php\n\nreturn [\n";

        foreach ($translations as $slug => $data) {
            $output .= "    // " . ucwords(str_replace('-', ' ', $slug)) . "\n";
            $output .= "    '{$slug}' => [\n";

            if (isset($data['meta'])) {
                $output .= "        'meta' => [\n";
                foreach ($data['meta'] as $k => $v) {
                    $v = str_replace("'", "\\'", $v);
                    $output .= "            '{$k}' => '{$v}',\n";
                }
                $output .= "        ],\n";
            }

            if (isset($data['seo'])) {
                $output .= "        'seo' => [\n";
                foreach ($data['seo'] as $k => $v) {
                    $v = str_replace("'", "\\'", $v);
                    $output .= "            '{$k}' => '{$v}',\n";
                }
                $output .= "        ],\n";
            }

            if (isset($data['form'])) {
                $output .= "        'form' => [\n";
                foreach ($data['form'] as $k => $v) {
                    $v = str_replace("'", "\\'", $v);
                    $output .= "            '{$k}' => '{$v}',\n";
                }
                $output .= "        ],\n";
            }

            if (isset($data['content'])) {
                $output .= "        'content' => [\n";
                foreach ($data['content'] as $k => $v) {
                    $v = str_replace("'", "\\'", $v);
                    $output .= "            '{$k}' => '{$v}',\n";
                }
                $output .= "        ],\n";
            }

            $output .= "    ],\n\n";
        }

        $output .= "];\n";
        file_put_contents($file, $output);
    } else {
        echo "  {$lang}: not found (already removed)\n";
    }
}

echo "\n✅ Duplicate removed from all files\n";
echo "SEO now has 10 tools (not 11)\n";
