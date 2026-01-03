<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class YoutubeVideoDataExtractorSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'youtube-video-data-extractor'],
            [
                'name' => 'YouTube Video Data Extractor',
                'category' => 'youtube',
            'subcategory' => 'Video Tools',
                'controller' => 'Tools\\YouTube\\VideoDataExtractorController',
                'route_name' => 'youtube.extractor',
                'url' => '/tools/youtube-video-data-extractor',
                'meta_title' => 'YouTube Video Data Extractor - Free Youtube Tool | Optimizo',
                'meta_description' => 'Extract detailed metadata and information from YouTube videos.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 5,
            ]
        );
    }
}
