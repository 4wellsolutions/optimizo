<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class YoutubeMonetizationCheckerSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'youtube-monetization-checker'],
            [
                'name' => 'YouTube Monetization Checker',
                'category' => 'youtube',
            'subcategory' => 'Monetization & Analytics',
                'controller' => 'Tools\\YouTube\\MonetizationCheckerController',
                'route_name' => 'youtube.monetization',
                'url' => '/tools/youtube-monetization-checker',
                'meta_title' => 'YouTube Monetization Checker - Free Youtube Tool | Optimizo',
                'meta_description' => 'Check if a YouTube channel is monetized and eligible for ads.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 1,
            ]
        );
    }
}
