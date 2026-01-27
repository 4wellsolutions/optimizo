<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Post;

try {
    $post = Post::create([
        'title' => 'Test Post ' . time(),
        'content' => 'Test content',
        'status' => 'published',
        'published_at' => now(),
        'author_id' => 1,
    ]);
    echo "CREATED_ID:" . $post->id . "\n";
} catch (\Exception $e) {
    echo "ERROR:" . $e->getMessage() . "\n";
}
