<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ExcelToPdfSeeder extends Seeder
{
    public function run()
    {
        Tool::updateOrCreate(
            ['slug' => 'excel-to-pdf'],
            [
                'name' => 'Excel to PDF Converter',
                'slug' => 'excel-to-pdf',
                'description' => 'Convert Excel spreadsheets to clean PDF documents.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'controller' => 'App\Http\Controllers\Tools\Utility\DocumentConverterController',
                'route_name' => 'utility.excel-to-pdf',
                'url' => 'tools/excel-to-pdf',
                'meta_title' => 'Excel to PDF Converter - Free Online Tool',
                'meta_description' => 'Convert XLS and XLSX files to PDF. Securely save your spreadsheets as PDF documents.',
                'content' => '<h2>Convert Excel to PDF</h2><p>Save your Excel sheets as PDF files to ensure they print and display correctly on any device.</p>',
            ]
        );
    }
}
