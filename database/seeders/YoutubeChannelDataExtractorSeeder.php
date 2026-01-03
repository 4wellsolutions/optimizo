<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class YoutubeChannelDataExtractorSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'youtube-channel-data-extractor'],
            [
                'name' => 'YouTube Channel Data Extractor',
                'category' => 'youtube',
            'subcategory' => 'Channel Tools',
                'controller' => 'Tools\\YouTube\\ChannelDataExtractorController',
                'route_name' => 'youtube.channel',
                'url' => '/tools/youtube-channel-data-extractor',
                'meta_title' => 'YouTube Channel Data Extractor - Free Youtube Tool | Optimizo',
                'meta_description' => 'Extract comprehensive data and statistics from YouTube channels.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 2,
            ]
        );
    }
}
