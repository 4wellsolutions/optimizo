<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class BrokenLinksCheckerSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'broken-links-checker'],
            [
                'name' => 'Broken Links Checker',
                'category' => 'seo',
            'subcategory' => 'Broken Links Checker',
                'controller' => 'Tools\\Seo\\BrokenLinksCheckerController',
                'route_name' => 'seo.broken-links-checker',
                'url' => '/tools/broken-links-checker',
                'meta_title' => 'Broken Links Checker - Free Seo Tool | Optimizo',
                'meta_description' => 'Scan your webpage for dead links (404 errors) to improve user experience and SEO rankings. Free online broken link checker tool.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 18,
            ]
        );
    }
}
