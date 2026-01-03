<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tool;

class GoogleSerpCheckerSeeder extends Seeder
{
    /**
     * Seed the Google SERP Checker tool.
     */
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'google-serp-checker'],
            [
                'name' => 'Google SERP Checker',
                'category' => 'seo',
                'controller' => 'Tools\\SEO\\GoogleSerpCheckerController',
                'route_name' => 'seo.google-serp-checker',
                'url' => '/tools/google-serp-checker',
                'meta_title' => 'Free Google SERP Checker & Rank Tracker',
                'meta_description' => 'Check live rankings with our advanced SERP Results Checker. Accurate Google SERP position from any location.',
                'meta_keywords' => 'serp checker, google rank tracker, serp position, keyword ranking, google search results',
                'priority' => 0.9,
                'change_frequency' => 'daily',
                'order' => 41,
            ]
        );

        $this->command->info('✅ Google SERP Checker tool seeded successfully!');
    }
}
