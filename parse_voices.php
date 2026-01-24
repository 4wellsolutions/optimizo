<?php

$raw = file_get_contents('storage/app/tts_voices.raw');
$lines = explode("\n", $raw);
$voices = [];
$currentVoice = [];

foreach ($lines as $line) {
    $line = trim($line);
    if (empty($line))
        continue;

    if (strpos($line, 'Name:') === 0) {
        $currentVoice['name'] = trim(substr($line, 5));
    } elseif (strpos($line, 'Gender:') === 0) {
        $currentVoice['gender'] = trim(substr($line, 7));
    } elseif (strpos($line, 'ShortName:') === 0) {
        $id = trim(substr($line, 10)); // e.g., af-ZA-AdriNeural
        $name = $currentVoice['name'] ?? 'Unknown';
        $gender = $currentVoice['gender'] ?? 'Unknown';

        // Extract locale from ID (e.g., af-ZA)
        $parts = explode('-', $id);
        $locale = $parts[0] . '-' . $parts[1];

        if (!isset($voices[$locale])) {
            $voices[$locale] = [];
        }

        // Format: "Name (Gender)"
        $voices[$locale][$id] = "$name ($gender)";
        $currentVoice = [];
    }
}

file_put_contents('storage/app/tts_voices.json', json_encode($voices, JSON_PRETTY_PRINT));
echo "Parsed " . count($voices) . " languages.\n";
