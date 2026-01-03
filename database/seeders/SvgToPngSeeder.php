<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class SvgToPngSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'svg-to-png-converter'],
            [
                'name' => 'SVG to PNG Converter',
                'category' => 'utility',
            'subcategory' => 'Image Tools',

                'controller' => 'Tools\\Utility\\ImageToolsController',
                'route_name' => 'utility.svg-to-png',
                'url' => '/tools/svg-to-png-converter',
                'meta_title' => 'SVG to PNG Converter - Rasterize SVG Images | Optimizo',
                'meta_description' => 'Convert Scalable Vector Graphics (SVG) to PNG images instantly. Perfect for ensuring compatibility with applications that don\'t support vector files.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 109,

            ]
        );
    }
}
