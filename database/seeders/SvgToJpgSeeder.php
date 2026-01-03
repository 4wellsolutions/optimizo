<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class SvgToJpgSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'svg-to-jpg-converter'],
            [
                'name' => 'SVG to JPG Converter',
                'category' => 'utility',
            'subcategory' => 'Image Tools',

                'controller' => 'Tools\\Utility\\ImageToolsController',
                'route_name' => 'utility.svg-to-jpg',
                'url' => '/tools/svg-to-jpg-converter',
                'meta_title' => 'SVG to JPG Converter - Vector to Raster Conversion | Optimizo',
                'meta_description' => 'Convert SVG vector files to JPG images online. Auto-fills transparent backgrounds with white for perfect JPG output.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 110,

            ]
        );
    }
}
