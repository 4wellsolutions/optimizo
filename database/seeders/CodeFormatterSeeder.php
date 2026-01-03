<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class CodeFormatterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'code-formatter'],
            [
                'name' => 'Code Formatter',
                'category' => 'utility',
            'subcategory' => 'Dev Tools',
                'controller' => 'Tools\\Utility\\CodeFormatterController',
                'route_name' => 'utility.code-formatter',
                'url' => '/tools/code-formatter',
                'meta_title' => 'Code Formatter - Free Utility Tool | Optimizo',
                'meta_description' => 'Format and beautify code in multiple languages.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 43,
            ]
        );
    }
}
