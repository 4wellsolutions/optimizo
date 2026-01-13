<?php

/**
 * Final cleanup: Remove ONLY the duplicate keyword-density entry
 * Keep keyword-density-checker with all its content
 */

echo "=== REMOVING DUPLICATE keyword-density ENTRY ===\n\n";

$languages = ['en', 'es', 'ru'];

foreach ($languages as $lang) {
    $file = __DIR__ . "/resources/lang/{$lang}/tools/seo.php";
    $translations = include $file;

    // Count before
    $beforeCount = count($translations);

    // Remove ONLY keyword-density (the duplicate)
    if (isset($translations['keyword-density'])) {
        unset($translations['keyword-density']);
        echo "✓ Removed keyword-density from {$lang}\n";
    } else {
        echo "  {$lang}: keyword-density not found (already removed)\n";
    }

    // Verify keyword-density-checker still exists
    if (isset($translations['keyword-density-checker'])) {
        echo "  ✓ keyword-density-checker retained in {$lang}\n";
    } else {
        echo "  ⚠ WARNING: keyword-density-checker missing in {$lang}!\n";
    }

    $afterCount = count($translations);
    echo "  Count: {$beforeCount} → {$afterCount}\n\n";

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

        if (isset($data['guidelines'])) {
            $output .= "        'guidelines' => [\n";
            foreach ($data['guidelines'] as $k => $v) {
                $v = str_replace("'", "\\'", $v);
                $output .= "            '{$k}' => '{$v}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($data['features'])) {
            $output .= "        'features' => [\n";
            foreach ($data['features'] as $k => $v) {
                $v = str_replace("'", "\\'", $v);
                $output .= "            '{$k}' => '{$v}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($data['best_practices'])) {
            $output .= "        'best_practices' => [\n";
            foreach ($data['best_practices'] as $k => $v) {
                $v = str_replace("'", "\\'", $v);
                $output .= "            '{$k}' => '{$v}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($data['faq'])) {
            $output .= "        'faq' => [\n";
            foreach ($data['faq'] as $k => $v) {
                $v = str_replace("'", "\\'", $v);
                $output .= "            '{$k}' => '{$v}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($data['results'])) {
            $output .= "        'results' => [\n";
            foreach ($data['results'] as $k => $v) {
                $v = str_replace("'", "\\'", $v);
                $output .= "            '{$k}' => '{$v}',\n";
            }
            $output .= "        ],\n";
        }

        if (isset($data['alerts'])) {
            $output .= "        'alerts' => [\n";
            foreach ($data['alerts'] as $k => $v) {
                $v = str_replace("'", "\\'", $v);
                $output .= "            '{$k}' => '{$v}',\n";
            }
            $output .= "        ],\n";
        }

        $output .= "    ],\n\n";
    }

    $output .= "];\n";
    file_put_contents($file, $output);
}

echo "\n✅ COMPLETE! keyword-density duplicate removed from all files\n";
echo "SEO now has 10 tools with keyword-density-checker as the correct one\n";
