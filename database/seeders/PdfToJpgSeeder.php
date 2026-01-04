<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PdfToJpgSeeder extends Seeder
{
    public function run()
    {
        Tool::updateOrCreate(
            ['slug' => 'pdf-to-jpg'],
            [
                'name' => 'PDF to JPG Converter',
                'slug' => 'pdf-to-jpg',
                'description' => 'Convert PDF pages to high-quality JPG images.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'controller' => 'App\Http\Controllers\Tools\Utility\DocumentConverterController',
                'route_name' => 'utility.pdf-to-jpg',
                'url' => 'tools/pdf-to-jpg',
                'meta_title' => 'PDF to JPG Converter - Free Online Tool',
                'meta_description' => 'Convert PDF pages to JPG images. Extract every page of your PDF as a separate image file.',
                'content' => '<h2>Convert PDF to JPG</h2><p>Turn PDF pages into image files. Useful for sharing specific pages on social media or using them in design projects.</p>',
            ]
        );
    }
}
