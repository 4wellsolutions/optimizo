<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class UrlEncoderDecoderSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'url-encoder-decoder'],
            [
                'name' => 'URL Encoder/Decoder',
                'category' => 'utility',
            'subcategory' => 'Broken Links Checker',
                'controller' => 'Tools\\Utility\\UrlEncoderController',
                'route_name' => 'utility.url-encoder',
                'url' => '/tools/url-encoder-decoder',
                'meta_title' => 'URL Encoder/Decoder - Free Utility Tool | Optimizo',
                'meta_description' => 'Encode and decode URLs.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 30,
            ]
        );
    }
}
