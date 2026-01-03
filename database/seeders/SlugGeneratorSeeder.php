<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class SlugGeneratorSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'slug-generator'],
            [
                'name' => 'Slug Generator',
                'category' => 'utility',
            'subcategory' => 'Text Tools',
                'controller' => 'Tools\\Utility\\SlugGeneratorController',
                'route_name' => 'utility.slug-generator',
                'url' => '/tools/slug-generator',
                'meta_title' => 'Slug Generator - Free Utility Tool | Optimizo',
                'meta_description' => 'Create SEO-friendly URL slugs.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 47,
            ]
        );
    }
}
