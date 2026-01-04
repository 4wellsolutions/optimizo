<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PdfMergerSeeder extends Seeder
{
    public function run()
    {
        Tool::updateOrCreate(
            ['slug' => 'pdf-merger'],
            [
                'name' => 'PDF Merger',
                'slug' => 'pdf-merger',
                'description' => 'Combine multiple PDF files into one.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'controller' => 'App\Http\Controllers\Tools\Utility\DocumentConverterController',
                'route_name' => 'utility.pdf-merger',
                'url' => 'tools/pdf-merger',
                'meta_title' => 'Merge PDF Online - Free PDF Combiner',
                'meta_description' => 'Merge multiple PDF files into a single document. Organize your PDFs by combining them in your preferred order.',
                'content' => '<h2>Merge PDF Files</h2><p>Combine separate PDF files into one master document. Drag and drop to reorder files before merging.</p>',
            ]
        );
    }
}
