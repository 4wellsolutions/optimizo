<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class JpgToWebpSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'jpg-to-webp-converter'],
            [
                'name' => 'JPG to WEBP Converter',
                'category' => 'utility',
            'subcategory' => 'Image Tools',

                'controller' => 'Tools\\Utility\\ImageToolsController',
                'route_name' => 'utility.jpg-to-webp',
                'url' => '/tools/jpg-to-webp-converter',
                'meta_title' => 'JPG to WEBP Converter - Convert Images to WebP | Optimizo',
                'meta_description' => 'Convert JPG images to the modern WebP format for superior compression and web performance. Free online tool.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 104,

            ]
        );
    }
}
