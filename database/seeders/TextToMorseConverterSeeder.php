<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class TextToMorseConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'text-to-morse-converter'],
            [
                'name' => 'Text to Morse Code',
                'category' => 'utility',
            'subcategory' => 'Text & String Converters',
                'controller' => 'Tools\\Utility\\TextToMorseController',
                'route_name' => 'utility.text-to-morse',
                'url' => '/tools/text-to-morse-converter',
                'meta_title' => 'Text to Morse Code - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert text to Morse code. Encode messages using international Morse code.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 55,
            ]
        );
    }
}
