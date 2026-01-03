<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class YoutubeChannelIdFinderSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'youtube-channel-id-finder'],
            [
                'name' => 'YouTube Channel ID Finder',
                'category' => 'youtube',
            'subcategory' => 'Channel Tools',
                'controller' => 'Tools\\YouTube\\ChannelIdFinderController',
                'route_name' => 'youtube.channel-id',
                'url' => '/tools/youtube-channel-id-finder',
                'meta_title' => 'YouTube Channel ID Finder - Free Youtube Tool | Optimizo',
                'meta_description' => 'Find the unique channel ID for any YouTube channel.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 3,
            ]
        );
    }
}
