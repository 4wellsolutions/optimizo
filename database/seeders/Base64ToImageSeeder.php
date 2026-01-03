<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class Base64ToImageSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'base64-to-image-converter'],
            [
                'name' => 'Base64 to Image Converter',
                'category' => 'utility',
            'subcategory' => 'Image Tools',

                'controller' => 'Tools\\Utility\\ImageToolsController',
                'route_name' => 'utility.base64-to-image',
                'url' => '/tools/base64-to-image-converter',
                'meta_title' => 'Base64 to Image Converter - Decode Base64 Output | Optimizo',
                'meta_description' => 'Convert Base64 encoded strings back to images (PNG, JPG, GIF). Free online decoder and visualizer.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 108,

            ]
        );
    }
}
