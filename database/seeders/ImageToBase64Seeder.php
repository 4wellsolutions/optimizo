<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ImageToBase64Seeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'image-to-base64-converter'],
            [
                'name' => 'Image to Base64 Converter',
                'category' => 'utility',
            'subcategory' => 'Image Tools',

                'controller' => 'Tools\\Utility\\ImageToolsController',
                'route_name' => 'utility.image-to-base64',
                'url' => '/tools/image-to-base64-converter',
                'meta_title' => 'Image to Base64 Converter - Convert Image to String | Optimizo',
                'meta_description' => 'Convert images to Base64 encoded strings for embedding in HTML or CSS. Free online tool supporting PNG, JPG, GIF.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 107,

            ]
        );
    }
}
