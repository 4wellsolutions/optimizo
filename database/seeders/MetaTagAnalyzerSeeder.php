<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class MetaTagAnalyzerSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'meta-tag-analyzer'],
            [
                'name' => 'Meta Tag Analyzer',
                'category' => 'seo',
            'subcategory' => 'Analysis Tools',
                'controller' => 'Tools\\Seo\\MetaAnalyzerController',
                'route_name' => 'seo.meta-analyzer',
                'url' => '/tools/meta-tag-analyzer',
                'meta_title' => 'Meta Tag Analyzer - Free Seo Tool | Optimizo',
                'meta_description' => 'Analyze and optimize meta tags for better search engine rankings.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 10,
            ]
        );
    }
}
