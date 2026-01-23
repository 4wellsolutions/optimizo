<?php

// Fill empty keys in German youtube.json with authentic German translations

$file = 'resources/lang/de/tools/youtube.json';
$content = file_get_contents($file);
$data = json_decode($content, true);

// Define authentic German translations
$fills = [
    'youtube-monetization-checker.content.revenue6_title' => 'YouTube Premium-Einnahmen',
    'youtube-monetization-checker.content.revenue6_desc' => 'Verdienen Sie einen Anteil an den Abonnementgebühren, wenn YouTube Premium-Mitglieder Ihre Inhalte ansehen. Dies bietet ein stabiles Einkommen unabhängig von Werbung.',
    'youtube-monetization-checker.content.notice_title' => 'Wichtiger Hinweis',
    'youtube-monetization-checker.content.notice_text' => 'Die Monetarisierungsberechtigung erfordert 1.000 Abonnenten und 4.000 Wiedergabestunden in den letzten 12 Monaten. Die tatsächlichen Einnahmen variieren je nach CPM, Standort des Publikums, Inhaltskategorie und Werbetreibenden-Nachfrage. Dieses Tool liefert nur Schätzungen.'
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

echo "✅ DE youtube.json: 4 leere Schlüssel gefüllt\n";
echo "  - youtube-monetization-checker revenue6 Abschnitt (2 Schlüssel)\n";
echo "  - youtube-monetization-checker Hinweis-Abschnitt (2 Schlüssel)\n";
