<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class HtmlMinifierSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'html-minifier'],
            [
                'name' => 'HTML Minifier',
                'category' => 'utility',
            'subcategory' => 'Dev Tools',
                'controller' => 'Tools\\Utility\\HtmlMinifierController',
                'route_name' => 'utility.html-minifier',
                'url' => '/tools/html-minifier',
                'meta_title' => 'HTML Minifier - Free Utility Tool | Optimizo',
                'meta_description' => 'Minify HTML code for better performance.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 63,
            ]
        );
    }
}
