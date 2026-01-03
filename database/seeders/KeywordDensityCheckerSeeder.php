<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class KeywordDensityCheckerSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'keyword-density-checker'],
            [
                'name' => 'Keyword Density Checker',
                'category' => 'seo',
            'subcategory' => 'Keyword Tools',
                'controller' => 'Tools\\Seo\\KeywordDensityController',
                'route_name' => 'seo.keyword-density',
                'url' => '/tools/keyword-density-checker',
                'meta_title' => 'Keyword Density Checker - Free Seo Tool | Optimizo',
                'meta_description' => 'Check keyword density and optimize your content for SEO.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 11,
            ]
        );
    }
}
