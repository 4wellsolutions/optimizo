<?php

$base = 'resources/lang/de/tools';

function fillKey($file, $key, $value)
{
    global $base;
    $path = "$base/$file";
    $json = json_decode(file_get_contents($path), true);

    // Check if key exists
    $parts = explode('.', $key);
    $current = &$json;
    $exists = true;
    foreach ($parts as $part) {
        if (!isset($current[$part])) {
            $exists = false;
            break;
        }
        $current = &$current[$part];
    }

    if ($exists && !empty($current)) {
        echo "Example key already exists in $file: $key\n";
        return;
    }

    // Fill it
    $current = &$json;
    foreach ($parts as $part) {
        if (!isset($current[$part]))
            $current[$part] = [];
        $current = &$current[$part];
    }
    $current = $value;

    file_put_contents($path, json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    echo "✅ Filled in $file: $key\n";
}

// 1. TEXT.JSON
fillKey('text.json', 'morse-to-text-converter.js.error_copy', 'Fehler beim Kopieren des Textes');
fillKey('text.json', 'text-reverser.js.error_no_copy', 'Kein Text zum Kopieren!');
fillKey('text.json', 'text-to-morse-converter.js.error_no_copy', 'Kein Morsecode zum Kopieren!');

// 2. TIME.JSON
fillKey('time.json', 'time-zone-converter.content.tips_title', 'Tipps für die Arbeit über Zeitzonen hinweg');

// 3. IMAGE.JSON (The many meta descriptions)
$imageKeys = [
    'bmp-to-jpg-converter.meta.desc' => 'Konvertieren Sie BMP-Bilder online kostenlos in das JPG-Format.',
    'gif-to-jpg-converter.meta.desc' => 'Wandeln Sie GIF-Animationen in JPG-Standbilder um.',
    'gif-to-png-converter.meta.desc' => 'Konvertieren Sie GIF-Dateien in das PNG-Format mit Transparenz.',
    'ico-to-png-converter.meta.desc' => 'Konvertieren Sie ICO-Icons in das PNG-Format.',
    'jpg-to-bmp-converter.meta.desc' => 'Konvertieren Sie JPG-Bilder in das BMP-Format.',
    'jpg-to-gif-converter.meta.desc' => 'Erstellen Sie GIFs aus JPG-Bildern.',
    'jpg-to-ico-converter.meta.desc' => 'Erstellen Sie ICO-Icons aus Ihren JPG-Bildern.',
    'jpg-to-png-converter.meta.desc' => 'Konvertieren Sie JPG-Bilder in das PNG-Format.',
    'jpg-to-webp-converter.meta.desc' => 'Konvertieren Sie JPG zu WebP für das Web.',
    'png-to-bmp-converter.meta.desc' => 'Konvertieren Sie PNG-Bilder in das BMP-Format.',
    'png-to-gif-converter.meta.desc' => 'Konvertieren Sie PNG-Bilder in GIFs.',
    'png-to-ico-converter.meta.desc' => 'Erstellen Sie Icons aus PNG-Dateien.',
    'png-to-jpg-converter.meta.desc' => 'Wandeln Sie transparente PNGs in das JPG-Format um.',
    'png-to-webp-converter.meta.desc' => 'Konvertieren Sie PNG zu WebP.',
    'svg-to-jpg-converter.meta.desc' => 'Rastern Sie SVG-Vektorgrafiken in JPG-Bilder.',
    'svg-to-png-converter.meta.desc' => 'Konvertieren Sie SVG in PNG mit Transparenz.',
    'webp-to-jpg-converter.meta.desc' => 'Konvertieren Sie WebP-Bilder in das JPG-Format.',
    'image-converter.meta.desc' => 'Kostenloser Online-Bildkonverter für alle Formate.',
    'base64-to-image-converter.meta.desc' => 'Konvertieren Sie Base64-Strings zurück in Bilder.',
    'image-to-base64-converter.meta.desc' => 'Konvertieren Sie Bilder in Base64-Strings.',
    'image-compressor.meta.desc' => 'Komprimieren Sie Bilder ohne Qualitätsverlust.',
    'heic-to-jpg-converter.meta.desc' => 'Konvertieren Sie HEIC-Fotos in JPG.',
];

foreach ($imageKeys as $k => $v) {
    fillKey('image.json', $k, $v);
}
