<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class JsonToXmlConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'json-to-xml-converter'],
            [
                'name' => 'JSON to XML Converter',
                'category' => 'utility',
            'subcategory' => 'Data Format Converters (Bidirectional)',
                'controller' => 'Tools\\Utility\\JsonXmlController',
                'route_name' => 'utility.json-xml',
                'url' => '/tools/json-to-xml-converter',
                'meta_title' => 'JSON to XML Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert JSON to XML and vice versa. Free bidirectional JSON-XML converter with formatting options.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 35,
            ]
        );
    }
}
