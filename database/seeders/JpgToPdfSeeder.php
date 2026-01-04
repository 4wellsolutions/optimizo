<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class JpgToPdfSeeder extends Seeder
{
    public function run()
    {
        Tool::updateOrCreate(
            ['slug' => 'jpg-to-pdf'],
            [
                'name' => 'JPG to PDF Converter',
                'slug' => 'jpg-to-pdf',
                'description' => 'Convert JPG and PNG images into a single PDF file.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'controller' => 'App\Http\Controllers\Tools\Utility\DocumentConverterController',
                'route_name' => 'utility.jpg-to-pdf',
                'url' => 'tools/jpg-to-pdf',
                'meta_title' => 'JPG to PDF Converter - Free Online Tool',
                'meta_description' => 'Combine images (JPG, PNG) into a PDF document. Create portfolios or photo albums in PDF format.',
                'content' => '<h2>Convert Images to PDF</h2><p>Merge multiple images into a single PDF file. Great for creating digital photo albums or compiling scanned documents.</p>',
            ]
        );
    }
}
