<?php

// Fill specific missing DE keys identified by comparison script

$langs = 'resources/lang/de/tools';

// 1. document.json (2 keys)
$docFile = $langs . '/document.json';
$docData = json_decode(file_get_contents($docFile), true);
$docData['jpg-to-pdf.content.how_to_step3_title'] = 'PDF herunterladen';
$docData['jpg-to-pdf.content.how_to_step3_desc'] = 'Klicken Sie auf den Download-Button, um Ihr neu erstelltes PDF-Dokument zu speichern.';
file_put_contents($docFile, json_encode($docData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

// 2. spreadsheet.json (1 key)
$sheetFile = $langs . '/spreadsheet.json';
$sheetData = json_decode(file_get_contents($sheetFile), true);
$sheetData['csv-to-excel.content.step3_desc'] = 'Laden Sie Ihre konvertierte Excel-Datei (.xlsx) sofort herunter, wobei die Daten ordnungsgemäß in Spalten organisiert sind.';
file_put_contents($sheetFile, json_encode($sheetData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

// 3. text.json (3 keys)
$textFile = $langs . '/text.json';
$textData = json_decode(file_get_contents($textFile), true);
$textData['morse-to-text-converter.js.error_copy'] = 'Fehler beim Kopieren des Textes';
$textData['text-reverser.js.error_no_copy'] = 'Kein Text zum Kopieren!';
$textData['text-to-morse-converter.js.error_no_copy'] = 'Kein Morsecode zum Kopieren!';
file_put_contents($textFile, json_encode($textData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

// 4. time.json (1 key)
$timeFile = $langs . '/time.json';
$timeData = json_decode(file_get_contents($timeFile), true);
// This key was missing in comparison output: time-zone-converter.content.tips_title
// But array keys must be set carefully if parent doesn't exist? (Assuming parents exist as mostly translated)
$keys = explode('.', 'time-zone-converter.content.tips_title');
$current = &$timeData;
foreach ($keys as $key) {
    if (!isset($current[$key]))
        $current[$key] = [];
    $current = &$current[$key];
}
$current = 'Tipps für die Arbeit über Zeitzonen hinweg';
file_put_contents($timeFile, json_encode($timeData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));


// 5. image.json (16 keys - mostly meta.desc)
// Based on output pattern: x-converter.meta.desc for many image tools
$imgFile = $langs . '/image.json';
$imgData = json_decode(file_get_contents($imgFile), true);
$imgFills = [
    'bmp-to-jpg-converter.meta.desc' => 'Konvertieren Sie BMP-Bilder online kostenlos in das JPG-Format. Umwandlung von Bitmap zu JPG mit hoher Qualität.',
    'gif-to-jpg-converter.meta.desc' => 'Wandeln Sie GIF-Animationen oder Standbilder in das JPG-Format um. Kostenloses Online-Tool zur GIF-zu-JPG-Konvertierung.',
    'gif-to-png-converter.meta.desc' => 'Konvertieren Sie GIF-Dateien in das PNG-Format. Extrahieren Sie Frames oder wandeln Sie statische GIFs in transparente PNGs um.',
    'ico-to-png-converter.meta.desc' => 'Konvertieren Sie ICO-Icons in das PNG-Format. Extrahieren Sie hochauflösende Bilder aus Icon-Dateien.',
    'jpg-to-bmp-converter.meta.desc' => 'Konvertieren Sie JPG-Bilder in das unkomprimierte BMP-Format. Perfekt für Anwendungen, die Bitmap-Dateien benötigen.',
    'jpg-to-gif-converter.meta.desc' => 'Erstellen Sie GIFs aus JPG-Bildern. Konvertieren Sie Ihre Fotos ganz einfach in das GIF-Format.',
    'jpg-to-ico-converter.meta.desc' => 'Erstellen Sie ICO-Icons aus Ihren JPG-Bildern. Perfekt für Website-Favicons und Anwendungssymbole.',
    'jpg-to-png-converter.meta.desc' => 'Konvertieren Sie JPG-Bilder in das PNG-Format. Behalten Sie Qualität bei und bereiten Sie Bilder für Transparenzbearbeitung vor.',
    'jpg-to-webp-converter.meta.desc' => 'Modernisieren Sie Ihre Bilder durch Konvertierung von JPG zu WebP. Kleinere Dateigrößen bei besserer Qualität für das Web.',
    'png-to-bmp-converter.meta.desc' => 'Konvertieren Sie PNG-Bilder in das BMP-Format. Einfaches und schnelles Online-Tool für Rastergrafiken.',
    'png-to-gif-converter.meta.desc' => 'Konvertieren Sie PNG-Bilder in GIFs. Nützlich für einfache Grafiken und Web-Kompatibilität.',
    'png-to-ico-converter.meta.desc' => 'Erstellen Sie Icons aus PNG-Dateien. Wandeln Sie transparente PNGs in kompatible ICO-Favicons um.',
    'png-to-jpg-converter.meta.desc' => 'Wandeln Sie transparente PNGs in das JPG-Format um. Kostenloses Tool zum Konvertieren von PNG zu JPEG.',
    'png-to-webp-converter.meta.desc' => 'Konvertieren Sie PNG zu WebP für schnelleres Laden von Websites. Behalten Sie Transparenz bei drastisch reduzierter Dateigröße.',
    'svg-to-png-converter.meta.desc' => 'Rastern Sie SVG-Vektorgrafiken in PNG-Bilder. Hochauflösende Konvertierung für Web und Druck.',
    'webp-to-jpg-converter.meta.desc' => 'Konvertieren Sie WebP-Bilder zurück in das weit verbreitete JPG-Format für maximale Kompatibilität.',
    // Missing one? Comparison showed about 16. Let's add webp-to-png just in case if comparisons missing output truncated
    'webp-to-png-converter.meta.desc' => 'Wandeln Sie WebP-Bilder in das PNG-Format um. Ideal, wenn Sie verlustfreie Qualität benötigen.',
];

foreach ($imgFills as $key => $val) {
    // Helper to set deeper keys if needed, though meta.desc might be just 2 levels deep
    $keys = explode('.', $key);
    $current = &$imgData;
    foreach ($keys as $k) {
        if (!isset($current[$k]))
            $current[$k] = [];
        $current = &$current[$k];
    }
    $current = $val;
}
file_put_contents($imgFile, json_encode($imgData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));


echo "✅ Filled 23+ missing keys in German files.\n";
