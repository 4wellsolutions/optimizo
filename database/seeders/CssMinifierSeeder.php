<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class CssMinifierSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'css-minifier'],
            [
                'name' => 'CSS Minifier',
                'category' => 'utility',
            'subcategory' => 'Dev Tools',
                'controller' => 'Tools\\Utility\\CssMinifierController',
                'route_name' => 'utility.css-minifier',
                'url' => '/tools/css-minifier',
                'meta_title' => 'CSS Minifier - Free Utility Tool | Optimizo',
                'meta_description' => 'Minify CSS code for better performance.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 61,
            ]
        );
    }
}
