<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class WordToPdfSeeder extends Seeder
{
    public function run()
    {
        Tool::updateOrCreate(
            ['slug' => 'word-to-pdf'],
            [
                'name' => 'Word to PDF Converter',
                'slug' => 'word-to-pdf',
                'description' => 'Convert Microsoft Word documents to professional PDF files.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'controller' => 'App\Http\Controllers\Tools\Utility\DocumentConverterController',
                'route_name' => 'utility.word-to-pdf',
                'url' => 'tools/word-to-pdf',
                'meta_title' => 'Word to PDF Converter - Free Online Tool',
                'meta_description' => 'Convert DOC and DOCX files to PDF online for free. Preserve formatting and layout of your Word documents.',
                'content' => '<h2>Convert Word to PDF Online</h2><p>Turn your Microsoft Word documents into industry-standard PDF files. Preserves fonts, images, and layout.</p>',
            ]
        );
    }
}
