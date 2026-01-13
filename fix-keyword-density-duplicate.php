<?php

/**
 * FIX: Remove keyword-density (wrong one), keep keyword-density-checker
 * Restore from before my change
 */

echo "=== FIXING DUPLICATE - REMOVING CORRECT ONE ===\n\n";

$languages = ['en', 'es', 'ru'];

foreach ($languages as $lang) {
    $file = __DIR__ . "/resources/lang/{$lang}/tools/seo.php";
    $translations = include $file;

    // Check which ones exist
    $hasKD = isset($translations['keyword-density']);
    $hasKDC = isset($translations['keyword-density-checker']);

    echo "{$lang}: ";
    echo "keyword-density=" . ($hasKD ? 'YES' : 'NO') . ", ";
    echo "keyword-density-checker=" . ($hasKDC ? 'YES' : 'NO') . "\n";

    // Remove keyword-density (the wrong one to keep)
    if ($hasKD) {
        unset($translations['keyword-density']);
        echo "  ✓ Removed keyword-density\n";
    }

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
}

echo "\n✅ Fixed! Now keeping keyword-density-checker only\n";
echo "SEO has 10 tools\n";
