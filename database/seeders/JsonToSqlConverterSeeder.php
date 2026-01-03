<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class JsonToSqlConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'json-to-sql-converter'],
            [
                'name' => 'JSON to SQL Converter',
                'category' => 'utility',
            'subcategory' => 'Data Format Converters (Bidirectional)',
                'controller' => 'Tools\\Utility\\JsonSqlController',
                'route_name' => 'utility.json-sql',
                'url' => '/tools/json-to-sql-converter',
                'meta_title' => 'JSON to SQL Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert JSON to SQL INSERT statements and vice versa. Free bidirectional JSON-SQL converter.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 38,
            ]
        );
    }
}
