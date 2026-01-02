<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();
try {
    $videoId = "dQw4w9WgXcQ";

    // Mimic a real browser visiting the EMBED page
    $response = $client->request('GET', "https://www.youtube.com/embed/{$videoId}", [
        'headers' => [
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            'Referer' => 'https://www.youtube.com/',
        ]
    ]);

    $html = $response->getBody()->getContents();

    // Check for ytInitialPlayerResponse
    if (preg_match('/ytInitialPlayerResponse\s*=\s*(\{.+?\});/s', $html, $matches)) {
        echo "SUCCESS! Found valid JSON on Embed Page.\n";
        $json = json_decode($matches[1], true);
        echo "Title: " . ($json['videoDetails']['title'] ?? 'N/A') . "\n";
        echo "Description Length: " . strlen($json['videoDetails']['shortDescription'] ?? '') . "\n";
    } else {
        echo "FAILED. JSON not found in Embed Page.\n";
        file_put_contents('storage/debug_embed.html', $html);
        echo "Saved HTML to storage/debug_embed.html\n";
    }

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
