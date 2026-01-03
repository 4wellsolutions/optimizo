<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class HeicToJpgSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'heic-to-jpg-converter'],
            [
                'name' => 'HEIC to JPG Converter',
                'category' => 'utility',
            'subcategory' => 'Image Tools',

                'controller' => 'Tools\\Utility\\ImageToolsController',
                'route_name' => 'utility.heic-to-jpg',
                'url' => '/tools/heic-to-jpg-converter',
                'meta_title' => 'HEIC to JPG Converter - Convert iPhone Photos Online | Optimizo',
                'meta_description' => 'Convert High Efficiency Image File (HEIC/HEIF) photos from iPhone to standard JPG format. Free, private, client-side converter.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 111,

            ]
        );
    }
}
