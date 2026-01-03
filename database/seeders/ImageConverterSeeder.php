<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ImageConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'image-converter'],
            [
                'name' => 'Image Converter',
                'category' => 'utility',
            'subcategory' => 'Image Tools',

                'controller' => 'Tools\\Utility\\ImageToolsController',
                'route_name' => 'utility.image-converter',
                'url' => '/tools/image-converter',
                'meta_title' => 'Image Converter - Convert Images Online Free | Optimizo',
                'meta_description' => 'Convert images between multiple formats (PNG, JPG, WEBP) easily and for free. Secure, client-side conversion requiring no uploads.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 101,

            ]
        );
    }
}
