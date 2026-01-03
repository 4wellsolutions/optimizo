<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class BingSerpCheckerSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'bing-serp-checker'],
            [
                'name' => 'Bing SERP Checker',
                'category' => 'seo',
            'subcategory' => 'Google SERP Checker',
                'controller' => 'Tools\\Seo\\BingSerpCheckerController',
                'route_name' => 'seo.bing-serp-checker',
                'url' => '/tools/bing-serp-checker',
                'meta_title' => 'Bing SERP Checker - Free Seo Tool | Optimizo',
                'meta_description' => 'Use our free Bing SERP checker to track your Bing ranking and position. Detailed Bing SERP analysis for desktop and mobile from any location.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 15,
            ]
        );
    }
}
