<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class DecimalBinaryConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'decimal-binary-converter'],
            [
                'name' => 'Decimal to Binary Converter',
                'category' => 'utility',
            'subcategory' => 'Number System Converters',
                'controller' => 'Tools\\Utility\\DecimalBinaryController',
                'route_name' => 'utility.decimal-binary',
                'url' => '/tools/decimal-binary-converter',
                'meta_title' => 'Decimal to Binary Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert decimal numbers to binary and vice versa. Free bidirectional decimal-binary converter.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 67,
            ]
        );
    }
}
