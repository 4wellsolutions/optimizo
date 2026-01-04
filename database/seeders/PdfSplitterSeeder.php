<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PdfSplitterSeeder extends Seeder
{
    public function run()
    {
        Tool::updateOrCreate(
            ['slug' => 'pdf-splitter'],
            [
                'name' => 'PDF Splitter',
                'slug' => 'pdf-splitter',
                'description' => 'Split a PDF into multiple files or extract specific pages.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'controller' => 'App\Http\Controllers\Tools\Utility\DocumentConverterController',
                'route_name' => 'utility.pdf-splitter',
                'url' => 'tools/pdf-splitter',
                'meta_title' => 'Split PDF Online - Extract Pages',
                'meta_description' => 'Split PDF documents online. Extract pages or cut a large PDF into smaller files.',
                'content' => '<h2>Split PDF Files</h2><p>Break a large PDF into smaller pieces or extract only the pages you need.</p>',
            ]
        );
    }
}
