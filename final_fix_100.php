<?php

// DEFINITIVE FIX FOR 100% GERMAN TRANSLATION

$base = 'resources/lang/de/tools';

function fillKey($file, $key, $value)
{
    global $base;
    $path = "$base/$file";
    $json = json_decode(file_get_contents($path), true);

    // Check if key exists
    $parts = explode('.', $key);
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

// 1. IMAGE.JSON
fillKey('image.json', 'ico-converter.meta.desc', 'Erstellen Sie ICO-Favicon-Dateien aus PNG, JPG oder anderen Bildformaten. Kostenloser Online-ICO-Konverter für Website-Favicons und Windows-Icons.');

// Note: svg-to-png had missing FAQ content (STEP 462). This is an array structure.
$svgFaq = [
    'title' => 'Häufig gestellte Fragen',
    'q1' => 'Warum SVG in PNG konvertieren?',
    'a1' => 'Das PNG-Format wird universell von allen Browsern und Anwendungen unterstützt, während SVG Kompatibilitätsprobleme haben kann. Die Konvertierung in PNG ist nützlich für E-Mail-Signaturen, soziale Medien und Anwendungen, die keine Vektorgrafiken unterstützen.',
    'q2' => 'Unterstützt PNG Transparenz wie SVG?',
    'a2' => 'Ja! PNG unterstützt Transparenz und ist daher perfekt für Logos und Grafiken mit transparentem Hintergrund. Unser Konverter behält die Transparenz bei der Konvertierung von SVG in PNG bei.'
];
fillKey('image.json', 'svg-to-png-converter.content.faq', $svgFaq);


// 2. DOCUMENT.JSON - pdf-to-excel step 3
fillKey('document.json', 'pdf-to-excel.content.step3_title', 'Herunterladen:');
fillKey('document.json', 'pdf-to-excel.content.step3_desc', 'Holen Sie sich Ihre XLSX-Datei bereit für die Bearbeitung.');

// 3. TEXT.JSON
fillKey('text.json', 'morse-to-text-converter.content.examples_title', 'Konvertierungsbeispiele');

echo "Done fixing all indentified missing keys.\n";
