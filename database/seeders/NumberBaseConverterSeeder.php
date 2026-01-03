<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class NumberBaseConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'number-base-converter'],
            [
                'name' => 'Number Base Converter',
                'category' => 'utility',
            'subcategory' => 'Number System Converters',
                'controller' => 'Tools\\Utility\\NumberBaseController',
                'route_name' => 'utility.number-base',
                'url' => '/tools/number-base-converter',
                'meta_title' => 'Number Base Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert numbers between any bases (2-36). Universal number base converter supporting binary, octal, decimal, hexadecimal, and more.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 71,
            ]
        );
    }
}
