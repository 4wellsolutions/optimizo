<?php

use App\Models\Post;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Support\Str;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

echo "--- Creating Sample Multilingual Content ---\n";

$admin = User::first();
if (!$admin) {
    echo "❌ No user found to be author.\n";
    exit;
}

// 1. Create Categories
$catEn = BlogCategory::updateOrCreate(['slug' => 'tech-en'], [
    'name' => 'Tech English',
    'language_code' => 'en'
]);

$catAr = BlogCategory::updateOrCreate(['slug' => 'tech-ar'], [
    'name' => 'تقنية',
    'language_code' => 'ar'
]);

// 2. Create Posts
Post::updateOrCreate(['slug' => 'test-post-en'], [
    'title' => 'Test Post EN',
    'content' => 'Content in English',
    'language_code' => 'en',
    'author_id' => $admin->id,
    'status' => 'published',
    'published_at' => now()
]);

Post::updateOrCreate(['slug' => 'test-post-ar'], [
    'title' => 'مقال تجريبي',
    'content' => 'محتوى بالعربية',
    'language_code' => 'ar',
    'author_id' => $admin->id,
    'status' => 'published',
    'published_at' => now()
]);

echo "✅ Created sample posts and categories.\n\n";

// 3. Verify Filtering
echo "--- Verifying Filtering ---\n";

app()->setLocale('en');
$enPosts = Post::published()->language('en')->get();
echo "Active Locale: en | Posts count: " . $enPosts->count() . " | First post: " . ($enPosts->first()->title ?? 'None') . "\n";

app()->setLocale('ar');
$arPosts = Post::published()->language('ar')->get();
echo "Active Locale: ar | Posts count: " . $arPosts->count() . " | First post: " . ($arPosts->first()->title ?? 'None') . "\n";

echo "\n--- Verification Finished ---\n";
