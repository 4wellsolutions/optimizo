<?php
$pending = json_decode(file_get_contents('pending_strings.json'), true);
$utility_ru = $pending['ru']['utility'] ?? [];
$utility_es = $pending['es']['utility'] ?? [];

echo "RU Utility Keys: " . count($utility_ru) . "\n";
echo "ES Utility Keys: " . count($utility_es) . "\n";

file_put_contents('utility_ru.json', json_encode($utility_ru, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
file_put_contents('utility_es.json', json_encode($utility_es, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
