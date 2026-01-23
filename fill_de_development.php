<?php

// Fill empty keys in German development.json with authentic German translations

$file = 'resources/lang/de/tools/development.json';
$content = file_get_contents($file);
$data = json_decode($content, true);

// Define authentic German translations
$fills = [
    'css-minifier.content.how_steps.5' => 'Laden Sie das minifizierte CSS herunter oder kopieren Sie es und verwenden Sie es auf Ihrer Produktions-Website, um die Dateigröße zu reduzieren und die Ladezeiten zu verbessern.',
    'css-minifier.content.best_practices_list.5' => 'Bewahren Sie eine nicht-minifizierte Version für Entwicklung und Debugging auf.',
    'html-encoder-decoder.content.how_steps.4' => 'Kopieren Sie das kodierte/dekodierte Ergebnis und verwenden Sie es in Ihrem HTML, XML oder Webanwendungen.',
    'html-encoder-decoder.content.examples.3.title' => 'Kodierung von Sonderzeichen',
    'html-encoder-decoder.content.examples.3.code' => '&lt;script&gt;alert("XSS")&lt;/script&gt; → &amp;lt;script&amp;gt;alert(&amp;quot;XSS&amp;quot;)&amp;lt;/script&amp;gt;',
    'html-minifier.content.how_steps.4' => 'Verwenden Sie das minifizierte HTML in Ihrer Produktionsumgebung, um die Bandbreite zu reduzieren und die Seitenladegeschwindigkeit zu verbessern.',
    'html-to-markdown-converter.content.features_list.6' => 'Bewahrt Codeblöcke und Syntax-Hervorhebung für technische Dokumentation.',
    'html-viewer.content.how_steps.5' => 'Analysieren Sie die gerenderte Ausgabe und DOM-Struktur, um Layout-Probleme zu debuggen oder das HTML-Rendering zu überprüfen.',
    'json-formatter.content.how_steps.3.title' => 'Formatieren oder Minifizieren',
    'json-formatter.content.how_steps.3.desc' => 'Wählen Sie, ob Sie Ihre JSON-Daten verschönern (mit Einrückung formatieren) oder minifizieren (auf eine Zeile komprimieren) möchten, je nach Ihren Anforderungen.'
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

echo "✅ DE development.json: 10 leere Schlüssel gefüllt\n";
echo "  - CSS-Minifier Schritte und Best Practices (2)\n";
echo "  - HTML-Encoder-Decoder Schritte und Beispiele (3)\n";
echo "  - HTML-Minifier, HTML-zu-Markdown, HTML-Viewer (3)\n";
echo "  - JSON-Formatter Schritte (2)\n";
