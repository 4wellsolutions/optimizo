<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PdfToPowerPointSeeder extends Seeder
{
    public function run()
    {
        Tool::updateOrCreate(
            ['slug' => 'pdf-to-powerpoint'],
            [
                'name' => 'PDF to PowerPoint',
                'slug' => 'pdf-to-powerpoint',
                'description' => 'Convert PDF files to editable PowerPoint presentations.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'controller' => 'App\Http\Controllers\Tools\Utility\DocumentConverterController',
                'route_name' => 'utility.pdf-to-ppt',
                'url' => 'tools/pdf-to-powerpoint',
                'meta_title' => 'PDF to PowerPoint Converter - Free Online Tool',
                'meta_description' => 'Convert PDF to PPTX online. Turn PDF content back into editable presentation slides.',
                'content' => '<h2>Convert PDF to PowerPoint</h2><p>Need to edit a presentation saved as PDF? Convert it back to PowerPoint (PPTX) format to modify text and move elements.</p>',
            ]
        );
    }
}
