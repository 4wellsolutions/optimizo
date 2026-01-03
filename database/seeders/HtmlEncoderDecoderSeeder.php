<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class HtmlEncoderDecoderSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'html-encoder-decoder'],
            [
                'name' => 'HTML Encoder/Decoder',
                'category' => 'utility',
            'subcategory' => 'Broken Links Checker',
                'controller' => 'Tools\\Utility\\HtmlEncoderController',
                'route_name' => 'utility.html-encoder',
                'url' => '/tools/html-encoder-decoder',
                'meta_title' => 'HTML Encoder/Decoder - Free Utility Tool | Optimizo',
                'meta_description' => 'Encode and decode HTML entities to prevent XSS attacks.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 31,
            ]
        );
    }
}
