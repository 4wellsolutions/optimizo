<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class JpgToPngSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'jpg-to-png-converter'],
            [
                'name' => 'JPG to PNG Converter',
                'category' => 'utility',
            'subcategory' => 'Image Tools',

                'controller' => 'Tools\\Utility\\ImageToolsController',
                'route_name' => 'utility.jpg-to-png',
                'url' => '/tools/jpg-to-png-converter',
                'meta_title' => 'JPG to PNG Converter - Convert JPG Images to PNG Free | Optimizo',
                'meta_description' => 'Convert JPG images to PNG format instantly. 100% free, secure client-side conversion, no file size limits.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 102,

            ]
        );
    }
}
