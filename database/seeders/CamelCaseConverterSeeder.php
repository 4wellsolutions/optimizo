<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class CamelCaseConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'camel-case-converter'],
            [
                'name' => 'Camel Case Converter',
                'category' => 'utility',
            'subcategory' => 'Text & String Converters',
                'controller' => 'Tools\\Utility\\CamelCaseController',
                'route_name' => 'utility.camel-case',
                'url' => '/tools/camel-case-converter',
                'meta_title' => 'Camel Case Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert text to camelCase format. Perfect for JavaScript and programming variable names.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 49,
            ]
        );
    }
}
