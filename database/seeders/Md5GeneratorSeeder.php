<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class Md5GeneratorSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'md5-generator'],
            [
                'name' => 'MD5 Generator',
                'category' => 'utility',
            'subcategory' => 'Security Tools',
                'controller' => 'Tools\\Utility\\Md5GeneratorController',
                'route_name' => 'utility.md5-generator',
                'url' => '/tools/md5-generator',
                'meta_title' => 'MD5 Generator - Free Utility Tool | Optimizo',
                'meta_description' => 'Generate MD5 hashes from text.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 46,
            ]
        );
    }
}
