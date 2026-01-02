<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
try {
    $response = $client->request('GET', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', [
        'headers' => [
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            'Accept-Language' => 'en-US,en;q=0.9',
        ]
    ]);

    $html = $response->getBody()->getContents();
    file_put_contents(__DIR__ . '/storage/debug_yt.html', $html);
    echo "Saved " . strlen($html) . " bytes to storage/debug_yt.html\n";

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
