<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class JsonToYamlConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'json-to-yaml-converter'],
            [
                'name' => 'JSON to YAML Converter',
                'category' => 'utility',
            'subcategory' => 'Data Format Converters (Bidirectional)',
                'controller' => 'Tools\\Utility\\JsonYamlController',
                'route_name' => 'utility.json-yaml',
                'url' => '/tools/json-to-yaml-converter',
                'meta_title' => 'JSON to YAML Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert JSON to YAML and vice versa. Free bidirectional JSON-YAML converter for configuration files.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 36,
            ]
        );
    }
}
