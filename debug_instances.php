<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    'timeout' => 5,
    'http_errors' => false
]);

$videoId = "dQw4w9WgXcQ";

$apis = [
    "https://pipedapi.kavin.rocks/streams/{$videoId}",
    "https://api.invidious.io/instances", // Helper to find instances, but let's try direct first
    "https://inv.tux.pizza/api/v1/videos/{$videoId}",
    "https://vid.puffyan.us/api/v1/videos/{$videoId}",
    "https://invidious.projectsegfau.lt/api/v1/videos/{$videoId}"
];

foreach ($apis as $url) {
    echo "Testing: $url ... ";
    try {
        $response = $client->get($url);
        echo "Status: " . $response->getStatusCode() . "\n";

        if ($response->getStatusCode() === 200) {
            $json = json_decode($response->getBody(), true);
            $title = $json['title'] ?? 'N/A';
            echo "SUCCESS! Title: $title\n";
            echo "Description Length: " . strlen($json['description'] ?? '') . "\n";
            break;
        }
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}
