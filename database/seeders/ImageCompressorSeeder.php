<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ImageCompressorSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'image-compressor'],
            [
                'name' => 'Image Compressor',
                'category' => 'utility',
            'subcategory' => 'Image Tools',
                'controller' => 'Tools\\Utility\\ImageCompressorController',
                'route_name' => 'utility.image-compressor',
                'url' => '/tools/image-compressor',
                'meta_title' => 'Image Compressor - Free Utility Tool | Optimizo',
                'meta_description' => 'Compress images without losing quality.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 57,
            ]
        );
    }
}
