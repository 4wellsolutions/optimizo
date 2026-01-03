<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class RgbHexConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'rgb-hex-converter'],
            [
                'name' => 'RGB/HEX Converter',
                'category' => 'utility',
            'subcategory' => 'Dev Tools',
                'controller' => 'Tools\\Utility\\RgbHexConverterController',
                'route_name' => 'utility.rgb-hex-converter',
                'url' => '/tools/rgb-hex-converter',
                'meta_title' => 'RGB/HEX Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert between RGB and HEX color formats.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 58,
            ]
        );
    }
}
