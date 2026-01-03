<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class SnakeCaseConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'snake-case-converter'],
            [
                'name' => 'Snake Case Converter',
                'category' => 'utility',
            'subcategory' => 'Text & String Converters',
                'controller' => 'Tools\\Utility\\SnakeCaseController',
                'route_name' => 'utility.snake-case',
                'url' => '/tools/snake-case-converter',
                'meta_title' => 'Snake Case Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert text to snake_case format. Common in Python, Ruby, and database naming.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 51,
            ]
        );
    }
}
