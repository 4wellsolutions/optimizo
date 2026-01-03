<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class IcoConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'ico-converter'],
            [
                'name' => 'ICO Converter',
                'category' => 'utility',
            'subcategory' => 'Image Tools',

                'controller' => 'Tools\\Utility\\ImageToolsController',
                'route_name' => 'utility.ico-converter',
                'url' => '/tools/ico-converter',
                'meta_title' => 'ICO Converter - Create Favicons Online | Optimizo',
                'meta_description' => 'Convert images to ICO format for website favicons. Supports custom sizing (32x32, 64x64). Free online favicon generator.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 112,

            ]
        );
    }
}
