<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class JsMinifierSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'js-minifier'],
            [
                'name' => 'JS Minifier',
                'category' => 'utility',
            'subcategory' => 'Dev Tools',
                'controller' => 'Tools\\Utility\\JsMinifierController',
                'route_name' => 'utility.js-minifier',
                'url' => '/tools/js-minifier',
                'meta_title' => 'JS Minifier - Free Utility Tool | Optimizo',
                'meta_description' => 'Minify JavaScript code for better performance.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 62,
            ]
        );
    }
}
