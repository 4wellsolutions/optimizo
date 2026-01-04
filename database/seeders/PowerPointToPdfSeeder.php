<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PowerPointToPdfSeeder extends Seeder
{
    public function run()
    {
        Tool::updateOrCreate(
            ['slug' => 'powerpoint-to-pdf'],
            [
                'name' => 'PowerPoint to PDF',
                'slug' => 'powerpoint-to-pdf',
                'description' => 'Convert PowerPoint presentations to PDF format.',
                'category' => 'utility',
                'subcategory' => 'Document Tools',
                'controller' => 'App\Http\Controllers\Tools\Utility\DocumentConverterController',
                'route_name' => 'utility.ppt-to-pdf',
                'url' => 'tools/powerpoint-to-pdf',
                'meta_title' => 'PowerPoint to PDF Converter - Free Online Tool',
                'meta_description' => 'Convert PPT and PPTX presentations to PDF. Share your slides easily without compatibility issues.',
                'content' => '<h2>Convert PowerPoint to PDF</h2><p>Save your slides as a PDF document. Ideal for handing out notes or sharing presentations with people who don\'t have PowerPoint.</p>',
            ]
        );
    }
}
