<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class GoogleSerpCheckerSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'google-serp-checker'],
            [
                'name' => 'Google SERP Checker',
                'category' => 'seo',
            'subcategory' => 'Google SERP Checker',
                'controller' => 'Tools\\Seo\\GoogleSerpCheckerController',
                'route_name' => 'seo.google-serp-checker',
                'url' => '/tools/google-serp-checker',
                'meta_title' => 'Google SERP Checker - Free Seo Tool | Optimizo',
                'meta_description' => 'Simulate Google search results for any location and device to check your rankings.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 14,
            ]
        );
    }
}
