<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class YoutubeVideoTagsExtractorSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'youtube-video-tags-extractor'],
            [
                'name' => 'YouTube Video Tags Extractor',
                'category' => 'youtube',
            'subcategory' => 'Video Tools',
                'controller' => 'Tools\\YouTube\\VideoTagsExtractorController',
                'route_name' => 'youtube.video-tags',
                'url' => '/tools/youtube-video-tags-extractor',
                'meta_title' => 'YouTube Video Tags Extractor - Free Youtube Tool | Optimizo',
                'meta_description' => 'Extract tags from any YouTube video to analyze competitor strategies.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 7,
            ]
        );
    }
}
