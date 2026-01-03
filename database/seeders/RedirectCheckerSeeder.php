<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class RedirectCheckerSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'redirect-checker'],
            [
                'name' => 'Redirect & HTTP Status Checker',
                'category' => 'seo',
            'subcategory' => 'Technical SEO',
                'controller' => 'Tools\\Seo\\RedirectCheckerController',
                'route_name' => 'network.redirect-checker',
                'url' => '/tools/redirect-checker',
                'meta_title' => 'Redirect & HTTP Status Checker - Free Seo Tool | Optimizo',
                'meta_description' => 'Check redirects and HTTP status codes. Analyze redirect chains and detect loops.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 13,
            ]
        );
    }
}
