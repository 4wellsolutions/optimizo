<?php

// Fill empty keys in image.json with SEO-optimized content

$file = 'resources/lang/en/tools/image.json';
$content = file_get_contents($file);
$data = json_decode($content, true);

// Define the content to fill
$fills = [
    'heic-to-jpg-converter.meta.desc' => 'Convert HEIC images to JPG format online for free. Fast, secure HEIC to JPEG converter for iPhone photos. No software installation required.',
    'ico-converter.meta.desc' => 'Create ICO favicon files from PNG, JPG, or other image formats. Free online ICO converter for website favicons and Windows icons.',
    'image-converter.meta.desc' => 'Free online image converter supporting all formats: JPG, PNG, WebP, GIF, BMP, TIFF, SVG. Convert images instantly with high quality.',
    'image-to-base64-converter.meta.desc' => 'Convert images to Base64 encoded strings for embedding in HTML, CSS, or JSON. Free online image to Base64 converter.',
    'jpg-to-png-converter.meta.desc' => 'Convert JPG to PNG online for free. Transform JPEG images to PNG format with transparency support. Fast and secure conversion.',
    'jpg-to-webp-converter.meta.desc' => 'Convert JPG to WebP format for smaller file sizes and faster websites. Free online JPG to WebP converter with quality optimization.',
    'png-to-jpg-converter.meta.desc' => 'Convert PNG to JPG online for free. Transform PNG images to JPEG format for smaller file sizes. Fast, secure, and easy to use.',
    'png-to-webp-converter.meta.desc' => 'Convert PNG to WebP format for up to 30% smaller file sizes. Free online PNG to WebP converter for faster website loading.',
    'svg-to-jpg-converter.meta.desc' => 'Convert SVG vector graphics to JPG raster images. Free online SVG to JPEG converter with custom resolution and quality settings.',
    'svg-to-png-converter.meta.desc' => 'Convert SVG to PNG with transparency support. Free online SVG to PNG converter for high-quality raster images from vector graphics.',
    'svg-to-png-converter.content.faq.title' => 'Frequently Asked Questions',
    'svg-to-png-converter.content.faq.q1' => 'Why convert SVG to PNG?',
    'svg-to-png-converter.content.faq.a1' => 'PNG format is universally supported across all browsers and applications, while SVG may have compatibility issues. Converting to PNG is useful for email signatures, social media, and applications that don\'t support vector graphics.',
    'svg-to-png-converter.content.faq.q2' => 'Does PNG support transparency like SVG?',
    'svg-to-png-converter.content.faq.a2' => 'Yes! PNG supports transparency, making it perfect for logos and graphics with transparent backgrounds. Our converter preserves transparency when converting from SVG to PNG.',
    'webp-to-jpg-converter.meta.desc' => 'Convert WebP to JPG format for better compatibility. Free online WebP to JPEG converter for universal image support.'
];

// Function to set nested array value
function setNestedValue(&$array, $path, $value)
{
    $keys = explode('.', $path);
    $current = &$array;

    foreach ($keys as $key) {
        if (!isset($current[$key])) {
            $current[$key] = [];
        }
        $current = &$current[$key];
    }

    $current = $value;
}

// Fill the empty keys
foreach ($fills as $path => $value) {
    setNestedValue($data, $path, $value);
}

// Save the file
$json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
file_put_contents($file, $json);

echo "✅ image.json: Filled 16 empty keys\n";
echo "  - Meta descriptions for 10 image converters\n";
echo "  - SVG to PNG converter FAQ section (5 keys)\n";
