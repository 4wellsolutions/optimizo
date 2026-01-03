<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class MorseToTextConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'morse-to-text-converter'],
            [
                'name' => 'Morse Code to Text',
                'category' => 'utility',
            'subcategory' => 'Text & String Converters',
                'controller' => 'Tools\\Utility\\MorseToTextController',
                'route_name' => 'utility.morse-to-text',
                'url' => '/tools/morse-to-text-converter',
                'meta_title' => 'Morse Code to Text - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert Morse code to text. Decode Morse code messages instantly.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 56,
            ]
        );
    }
}
