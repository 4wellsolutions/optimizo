<?php
// Script to move image-compressor from utilities.php to image.php for all languages

$languages = ['en', 'es', 'ru'];

foreach ($languages as $lang) {
    $utilFile = "resources/lang/{$lang}/tools/utilities.php";
    $imageFile = "resources/lang/{$lang}/tools/image.php";

    echo "Processing {$lang}...\n";

    // Read utilities.php
    $utilContent = file_get_contents($utilFile);

    // Extract image-compressor entry using regex
    $pattern = "/'image-compressor'\s*=>\s*array\((.*?)\n  \),\n  '[^']+'\s*=>/s";

    if (preg_match($pattern, $utilContent, $matches)) {
        $imageCompressorEntry = "  'image-compressor' => array(" . $matches[1] . "\n  ),\n";

        // Read image.php
        $imageContent = file_get_contents($imageFile);

        // Add to end of image.php (before the closing );)
        $imageContent = rtrim($imageContent);
        if (substr($imageContent, -2) === ');') {
            // Insert before the final );
            $imageContent = substr($imageContent, 0, -2) . $imageCompressorEntry . ");";
        }

        // Write updated image.php
        file_put_contents($imageFile, $imageContent);

        // Remove from utilities.php
        $utilContent = preg_replace($pattern, "  '$1' =>", $utilContent, 1);
        $utilContent = preg_replace("/'image-compressor'\s*=>\s*array\((.*?)\n  \),\n/s", "", $utilContent, 1);

        // Write updated utilities.php
        file_put_contents($utilFile, $utilContent);

        echo "  ✓ Moved image-compressor to {$imageFile}\n";
    } else {
        echo "  ✗ Could not find image-compressor in {$utilFile}\n";
    }
}

echo "\nDone!\n";
