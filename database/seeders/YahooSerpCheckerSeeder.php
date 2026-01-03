<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class YahooSerpCheckerSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'yahoo-serp-checker'],
            [
                'name' => 'Yahoo SERP Checker',
                'category' => 'seo',
            'subcategory' => 'Google SERP Checker',
                'controller' => 'Tools\\Seo\\YahooSerpCheckerController',
                'route_name' => 'seo.yahoo-serp-checker',
                'url' => '/tools/yahoo-serp-checker',
                'meta_title' => 'Yahoo SERP Checker - Free Seo Tool | Optimizo',
                'meta_description' => 'Use our free Yahoo SERP checker to track your Yahoo ranking and position. Detailed Yahoo SERP analysis for desktop and mobile.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 16,
            ]
        );
    }
}
