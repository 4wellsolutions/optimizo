<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
try {
    $videoId = "dQw4w9WgXcQ";
    $url = "https://www.youtube.com/watch?v={$videoId}";

    // Test oEmbed
    $response = $client->request('GET', "https://www.youtube.com/oembed?url={$url}&format=json");
    echo "oEmbed Response:\n" . $response->getBody()->getContents() . "\n";

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
