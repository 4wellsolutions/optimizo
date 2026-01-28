<?php

use App\Models\Post;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

echo "--- Testing Multilingual Blog Logic ---\n\n";

// 1. Check if Tag model is really gone
if (class_exists('App\Models\Tag')) {
    echo "❌ Error: Tag model still exists!\n";
} else {
    echo "✅ Success: Tag model removed.\n";
}

// 2. Check blog routes
$routes = Route::getRoutes();
$tagRoute = $routes->getByName('en.blog.tag') ?: $routes->getByName('blog.tag');
if ($tagRoute) {
    echo "❌ Error: blog.tag route still exists!\n";
} else {
    echo "✅ Success: blog.tag route removed.\n";
}

// 3. Check language scope
$enPostCount = Post::language('en')->count();
$arPostCount = Post::language('ar')->count();
echo "Posts in English: $enPostCount\n";
echo "Posts in Arabic: $arPostCount\n";

// 4. Check sitemap logic (simulated)
$sitemapController = app(\App\Http\Controllers\SitemapController::class);
echo "\n--- Sitemap Verification (Manual check of SitemapController logic recommended) ---\n";
echo "Localized blog posts should now appear in sitemap.\n";

echo "\n--- Verification Finished ---\n";
