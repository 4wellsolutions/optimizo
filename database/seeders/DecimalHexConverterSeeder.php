<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class DecimalHexConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'decimal-hex-converter'],
            [
                'name' => 'Decimal to Hexadecimal Converter',
                'category' => 'utility',
            'subcategory' => 'Number System Converters',
                'controller' => 'Tools\\Utility\\DecimalHexController',
                'route_name' => 'utility.decimal-hex',
                'url' => '/tools/decimal-hex-converter',
                'meta_title' => 'Decimal to Hexadecimal Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert decimal numbers to hexadecimal and vice versa. Free bidirectional decimal-hex converter.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 68,
            ]
        );
    }
}
