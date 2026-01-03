<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class SentenceCaseConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'sentence-case-converter'],
            [
                'name' => 'Sentence Case Converter',
                'category' => 'utility',
            'subcategory' => 'Text & String Converters',
                'controller' => 'Tools\\Utility\\SentenceCaseController',
                'route_name' => 'utility.sentence-case',
                'url' => '/tools/sentence-case-converter',
                'meta_title' => 'Sentence Case Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert text to sentence case. Capitalize the first letter of each sentence automatically.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 48,
            ]
        );
    }
}
