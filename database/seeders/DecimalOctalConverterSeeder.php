<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class DecimalOctalConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'decimal-octal-converter'],
            [
                'name' => 'Decimal to Octal Converter',
                'category' => 'utility',
            'subcategory' => 'Number System Converters',
                'controller' => 'Tools\\Utility\\DecimalOctalController',
                'route_name' => 'utility.decimal-octal',
                'url' => '/tools/decimal-octal-converter',
                'meta_title' => 'Decimal to Octal Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert decimal numbers to octal and vice versa. Free bidirectional decimal-octal converter.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 70,
            ]
        );
    }
}
