<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class YoutubeEarningsCalculatorSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'youtube-earnings-calculator'],
            [
                'name' => 'YouTube Earnings Calculator',
                'category' => 'youtube',
            'subcategory' => 'Monetization & Analytics',
                'controller' => 'Tools\\YouTube\\EarningsCalculatorController',
                'route_name' => 'youtube.earnings',
                'url' => '/tools/youtube-earnings-calculator',
                'meta_title' => 'YouTube Earnings Calculator - Free Youtube Tool | Optimizo',
                'meta_description' => 'Estimate potential earnings for YouTube channels based on views and engagement.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 4,
            ]
        );
    }
}
