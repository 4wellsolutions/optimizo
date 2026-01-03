<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class AsciiConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'ascii-converter'],
            [
                'name' => 'ASCII Converter',
                'category' => 'utility',
            'subcategory' => 'Encoding/Decoding Tools (JWT and ASCII only - others are combined above)',
                'controller' => 'EncodingController@asciiConvert',
                'route_name' => 'utility.ascii-convert',
                'url' => '/tools/ascii-converter',
                'meta_title' => 'ASCII Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert between ASCII and text. Encode text to ASCII codes or decode ASCII to text.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 34,
            ]
        );
    }
}
