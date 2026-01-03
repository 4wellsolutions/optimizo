<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PngToWebpSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'png-to-webp-converter'],
            [
                'name' => 'PNG to WEBP Converter',
                'category' => 'utility',
            'subcategory' => 'Image Tools',

                'controller' => 'Tools\\Utility\\ImageToolsController',
                'route_name' => 'utility.png-to-webp',
                'url' => '/tools/png-to-webp-converter',
                'meta_title' => 'PNG to WEBP Converter - Compress PNG to WebP | Optimizo',
                'meta_description' => 'Convert PNG images to WebP to reduce file size while maintaining transparency. Enhance your website loading speed.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 106,

            ]
        );
    }
}
