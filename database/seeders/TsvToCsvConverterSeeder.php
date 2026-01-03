<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class TsvToCsvConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'tsv-to-csv-converter'],
            [
                'name' => 'TSV to CSV Converter',
                'category' => 'utility',
            'subcategory' => 'Data Format Converters (Bidirectional)',
                'controller' => 'Tools\\Utility\\TsvCsvController',
                'route_name' => 'utility.tsv-csv',
                'url' => '/tools/tsv-to-csv-converter',
                'meta_title' => 'TSV to CSV Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert TSV to CSV and vice versa. Free bidirectional TSV-CSV converter online.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 39,
            ]
        );
    }
}
