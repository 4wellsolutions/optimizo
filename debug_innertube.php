<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
try {
    // 1. Parameters (Found in the HTML)
    $apiKey = "AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8";
    $clientVersion = "2.20251222.04.00";
    $videoId = "dQw4w9WgXcQ";

    $response = $client->request('POST', "https://www.youtube.com/youtubei/v1/player?key={$apiKey}", [
        'json' => [
            'videoId' => $videoId,
            'context' => [
                'client' => [
                    'clientName' => 'WEB',
                    'clientVersion' => $clientVersion,
                ]
            ]
        ]
    ]);

    $json = $response->getBody()->getContents();
    $data = json_decode($json, true);

    if (isset($data['videoDetails'])) {
        echo "SUCCESS! Found title: " . $data['videoDetails']['title'] . "\n";
        echo "Microformat Length: " . ($data['microformat']['playerMicroformatRenderer']['lengthSeconds'] ?? 'N/A') . "\n";
    } else {
        echo "FAILED. Response keys: " . implode(', ', array_keys($data)) . "\n";
    }

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
