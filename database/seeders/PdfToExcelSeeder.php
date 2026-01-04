<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PdfToExcelSeeder extends Seeder
{
    public function run()
    {
        Tool::updateOrCreate(
            ['slug' => 'pdf-to-excel'],
            [
                'name' => 'PDF to Excel Converter',
                'slug' => 'pdf-to-excel',
                'description' => 'Convert PDF tables and data to Microsoft Excel spreadsheets.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'controller' => 'App\Http\Controllers\Tools\Utility\DocumentConverterController',
                'route_name' => 'utility.pdf-to-excel',
                'url' => 'tools/pdf-to-excel',
                'meta_title' => 'PDF to Excel Converter - Free Online Tool',
                'meta_description' => 'Convert PDF to Excel online. Extract tables and data from PDF documents into editable XLS/XLSX spreadsheets.',
                'content' => '<h2>Convert PDF to Excel</h2><p>Extract tables from your PDF documents directly into Microsoft Excel spreadsheets. The layout is preserved for easy data analysis.</p>',
            ]
        );
    }
}
