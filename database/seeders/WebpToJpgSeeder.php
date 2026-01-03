<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class WebpToJpgSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'webp-to-jpg-converter'],
            [
                'name' => 'WEBP to JPG Converter',
                'category' => 'utility',
            'subcategory' => 'Image Tools',

                'controller' => 'Tools\\Utility\\ImageToolsController',
                'route_name' => 'utility.webp-to-jpg',
                'url' => '/tools/webp-to-jpg-converter',
                'meta_title' => 'WEBP to JPG Converter - Convert WebP to JPG Online | Optimizo',
                'meta_description' => 'Convert WebP images to standard JPG format for broad compatibility. Free, fast, and secure converter.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 105,

            ]
        );
    }
}
