<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class YoutubeThumbnailDownloaderSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'youtube-thumbnail-downloader'],
            [
                'name' => 'YouTube Thumbnail Downloader',
                'category' => 'youtube',
            'subcategory' => 'Video Tools',
                'controller' => 'Tools\\YouTube\\ThumbnailDownloaderController',
                'route_name' => 'youtube.thumbnail',
                'url' => '/tools/youtube-thumbnail-downloader',
                'meta_title' => 'YouTube Thumbnail Downloader - Free Youtube Tool | Optimizo',
                'meta_description' => 'Download high-quality YouTube video thumbnails in various resolutions.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 8,
            ]
        );
    }
}
