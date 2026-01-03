<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class CsvToXmlConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'csv-to-xml-converter'],
            [
                'name' => 'CSV to XML Converter',
                'category' => 'utility',
            'subcategory' => 'Data Format Converters (Bidirectional)',
                'controller' => 'Tools\\Utility\\CsvXmlController',
                'route_name' => 'utility.csv-xml',
                'url' => '/tools/csv-to-xml-converter',
                'meta_title' => 'CSV to XML Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert CSV to XML and vice versa. Free bidirectional CSV-XML converter with custom element names.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 37,
            ]
        );
    }
}
