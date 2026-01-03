<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class YoutubeHandleCheckerSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'youtube-handle-checker'],
            [
                'name' => 'YouTube Handle Checker',
                'category' => 'youtube',
            'subcategory' => 'Channel Tools',
                'controller' => 'Tools\\YouTube\\HandleCheckerController',
                'route_name' => 'youtube.handle',
                'url' => '/tools/youtube-handle-checker',
                'meta_title' => 'YouTube Handle Checker - Free Youtube Tool | Optimizo',
                'meta_description' => 'Check if a YouTube handle is available for your channel.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 9,
            ]
        );
    }
}
