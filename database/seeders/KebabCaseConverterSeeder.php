<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class KebabCaseConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'kebab-case-converter'],
            [
                'name' => 'Kebab Case Converter',
                'category' => 'utility',
            'subcategory' => 'Text & String Converters',
                'controller' => 'Tools\\Utility\\KebabCaseController',
                'route_name' => 'utility.kebab-case',
                'url' => '/tools/kebab-case-converter',
                'meta_title' => 'Kebab Case Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert text to kebab-case format. Popular for URLs and CSS class names.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 52,
            ]
        );
    }
}
