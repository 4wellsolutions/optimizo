<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PdfCompressorSeeder extends Seeder
{
    public function run()
    {
        Tool::updateOrCreate(
            ['slug' => 'pdf-compressor'],
            [
                'name' => 'PDF Compressor',
                'slug' => 'pdf-compressor',
                'description' => 'Reduce PDF file size without losing quality.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'controller' => 'App\Http\Controllers\Tools\Utility\DocumentConverterController',
                'route_name' => 'utility.pdf-compressor',
                'url' => 'tools/pdf-compressor',
                'meta_title' => 'Compress PDF Online - Free PDF Optimizer',
                'meta_description' => 'Compress PDF files online. Reduce file size for email or web upload while maintaining visual quality.',
                'content' => '<h2>Compress PDF File Size</h2><p>Optimize your PDF files by reducing their size. Perfect for emailing large documents or saving storage space.</p>',
            ]
        );
    }
}
