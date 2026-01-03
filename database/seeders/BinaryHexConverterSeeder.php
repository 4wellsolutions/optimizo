<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class BinaryHexConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'binary-hex-converter'],
            [
                'name' => 'Binary to Hexadecimal Converter',
                'category' => 'utility',
            'subcategory' => 'Number System Converters',
                'controller' => 'Tools\\Utility\\BinaryHexController',
                'route_name' => 'utility.binary-hex',
                'url' => '/tools/binary-hex-converter',
                'meta_title' => 'Binary to Hexadecimal Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert binary numbers to hexadecimal and vice versa. Free bidirectional binary-hex converter.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 69,
            ]
        );
    }
}
