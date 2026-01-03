<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class OnPageSeoCheckerSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'on-page-seo-checker'],
            [
                'name' => 'On-Page SEO Checker',
                'category' => 'seo',
            'subcategory' => 'On-Page SEO Checker',
                'controller' => 'Tools\\Seo\\OnPageSeoCheckerController',
                'route_name' => 'seo.on-page-seo-checker',
                'url' => '/tools/on-page-seo-checker',
                'meta_title' => 'On-Page SEO Checker - Free Seo Tool | Optimizo',
                'meta_description' => 'Comprehensive On-Page SEO audit tool. Analyze topic intent, content quality, and technical SEO factors.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 17,
            ]
        );
    }
}
