<?php

use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Define the correct route mappings based on web.php
$routeMappings = [
    // YouTube Tools
    'youtube-monetization-checker' => 'youtube.monetization',
    'youtube-thumbnail' => 'youtube.thumbnail',
    'youtube-extractor' => 'youtube.extractor',
    'youtube-tags' => 'youtube.tags',
    'youtube-channel' => 'youtube.channel',
    'youtube-handle-checker' => 'youtube.handle',
    'youtube-video-tags-extractor' => 'youtube.video-tags',
    'youtube-channel-id-finder' => 'youtube.channel-id',
    'youtube-earnings-calculator' => 'youtube.earnings',

    // SEO Tools
    'meta-analyzer' => 'seo.meta-analyzer',
    'keyword-density' => 'seo.keyword-density',
    'word-counter' => 'seo.word-counter',
    'redirect-checker' => 'network.redirect-checker',

    // Utility Tools
    'image-compressor' => 'utility.image-compressor',
    'rgb-hex-converter' => 'utility.rgb-hex-converter',
    'slug-generator' => 'utility.slug-generator',
    'internet-speed-test' => 'utility.speed-test',
    'md5-generator' => 'utility.md5-generator',
    'case-converter' => 'utility.case-converter',
    'username-checker' => 'utility.username-checker',
    'password-generator' => 'utility.password-generator',
    'json-formatter' => 'utility.json-formatter',
    'base64' => 'utility.base64',
    'qr-generator' => 'utility.qr-generator',
    'html-viewer' => 'utility.html-viewer',
    'json-parser' => 'utility.json-parser',
    'code-formatter' => 'utility.code-formatter',
    'css-minifier' => 'utility.css-minifier',
    'js-minifier' => 'utility.js-minifier',
    'html-minifier' => 'utility.html-minifier',

    // Network Tools
    'what-is-my-ip' => 'network.what-is-my-ip',
    'what-is-my-isp' => 'network.what-is-my-isp',
    'domain-to-ip' => 'network.domain-to-ip',
    'ip-lookup' => 'network.ip-lookup',
    'dns-lookup' => 'network.dns-lookup',
    'whois-lookup' => 'network.whois-lookup',
    'ping-test' => 'network.ping-test',
    'traceroute' => 'network.traceroute',
    'port-checker' => 'network.port-checker',
    'reverse-dns' => 'network.reverse-dns',
];

// Update each tool with the correct route name
foreach ($routeMappings as $slug => $routeName) {
    DB::table('tools')
        ->where('slug', $slug)
        ->update(['route_name' => $routeName]);
    echo "Updated {$slug} to {$routeName}\n";
}

echo "\nAll route names updated successfully!\n";
