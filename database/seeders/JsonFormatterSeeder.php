<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class JsonFormatterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'json-formatter'],
            [
                'name' => 'JSON Formatter',
                'category' => 'utility',
            'subcategory' => 'Dev Tools',
                'controller' => 'Tools\\Utility\\JsonFormatterController',
                'route_name' => 'utility.json-formatter',
                'url' => '/tools/json-formatter',
                'meta_title' => 'JSON Formatter - Free Utility Tool | Optimizo',
                'meta_description' => 'Format and validate JSON data.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 41,
            ]
        );
    }
}
