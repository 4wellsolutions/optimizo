<?php
$helperContent = file_get_contents('app/Helpers/TranslationHelper.php');
$webContent = file_get_contents('routes/web_content.php');

// Extract all slugs from web_content.php
preg_match_all("/Route::get\('([^']+)'/", $webContent, $matches);
$slugs = array_unique($matches[1]);

echo "Found " . count($slugs) . " unique slugs in web_content.php\n";

$missing = [];
foreach ($slugs as $slug) {
    if (strpos($helperContent, "'$slug'") === false && strpos($helperContent, '"' . $slug . '"') === false) {
        $missing[] = $slug;
    }
}

echo "Missing slugs in TranslationHelper.php:\n";
print_r($missing);
