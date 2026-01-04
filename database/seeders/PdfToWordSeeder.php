<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PdfToWordSeeder extends Seeder
{
    public function run()
    {
        Tool::updateOrCreate(
            ['slug' => 'pdf-to-word'],
            [
                'name' => 'PDF to Word Converter',
                'slug' => 'pdf-to-word',
                'description' => 'Convert PDF documents to editable Microsoft Word (DOC/DOCX) files.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'controller' => 'App\Http\Controllers\Tools\Utility\DocumentConverterController',
                'route_name' => 'utility.pdf-to-word',
                'url' => 'tools/pdf-to-word',
                'meta_title' => 'PDF to Word Converter - Free Online Tool',
                'meta_description' => 'Convert PDF to Word online for free. Extract text and layout from PDF files to editable DOCX documents without software installation.',
                'content' => '<h2>Convert PDF to Word Online</h2><p>Our PDF to Word converter allows you to easily extract text and formatting from PDF files and save them as editable Word documents. Perfect for editing contracts, documents, or resumes originally saved as PDF.</p><h3>How to use:</h3><ol><li>Upload your PDF file.</li><li>Click "Convert to Word".</li><li>Download your editable DOCX file.</li></ol>',
            ]
        );
    }
}
