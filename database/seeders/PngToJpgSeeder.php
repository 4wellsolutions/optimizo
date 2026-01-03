<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PngToJpgSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'png-to-jpg-converter'],
            [
                'name' => 'PNG to JPG Converter',
                'category' => 'utility',
            'subcategory' => 'Image Tools',

                'controller' => 'Tools\\Utility\\ImageToolsController',
                'route_name' => 'utility.png-to-jpg',
                'url' => '/tools/png-to-jpg-converter',
                'meta_title' => 'PNG to JPG Converter - Convert PNG to JPG Online | Optimizo',
                'meta_description' => 'Convert PNG images to JPG format for smaller file sizes. Free online converter.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 103,

            ]
        );
    }
}
