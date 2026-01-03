<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class JsonParserSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'json-parser'],
            [
                'name' => 'JSON Parser',
                'category' => 'utility',
            'subcategory' => 'Dev Tools',
                'controller' => 'Tools\\Utility\\JsonParserController',
                'route_name' => 'utility.json-parser',
                'url' => '/tools/json-parser',
                'meta_title' => 'JSON Parser - Free Utility Tool | Optimizo',
                'meta_description' => 'Parse and validate JSON data.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 42,
            ]
        );
    }
}
