<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PascalCaseConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'pascal-case-converter'],
            [
                'name' => 'Pascal Case Converter',
                'category' => 'utility',
            'subcategory' => 'Text & String Converters',
                'controller' => 'Tools\\Utility\\PascalCaseController',
                'route_name' => 'utility.pascal-case',
                'url' => '/tools/pascal-case-converter',
                'meta_title' => 'Pascal Case Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert text to PascalCase format. Ideal for class names and type definitions.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 50,
            ]
        );
    }
}
