<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class StudlyCaseConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'studly-case-converter'],
            [
                'name' => 'Studly Case Converter',
                'category' => 'utility',
            'subcategory' => 'Text & String Converters',
                'controller' => 'Tools\\Utility\\StudlyCaseController',
                'route_name' => 'utility.studly-case',
                'url' => '/tools/studly-case-converter',
                'meta_title' => 'Studly Case Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert text to StUdLy CaSe format. Create random capitalization patterns.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 53,
            ]
        );
    }
}
