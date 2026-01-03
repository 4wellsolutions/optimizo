<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class CaseConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'case-converter'],
            [
                'name' => 'Case Converter',
                'category' => 'utility',
            'subcategory' => 'Text Tools',
                'controller' => 'Tools\\Utility\\CaseConverterController',
                'route_name' => 'utility.case-converter',
                'url' => '/tools/case-converter',
                'meta_title' => 'Case Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert text to different cases.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 40,
            ]
        );
    }
}
