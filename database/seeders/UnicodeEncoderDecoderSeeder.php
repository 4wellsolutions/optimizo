<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class UnicodeEncoderDecoderSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'unicode-encoder-decoder'],
            [
                'name' => 'Unicode Encoder/Decoder',
                'category' => 'utility',
            'subcategory' => 'Broken Links Checker',
                'controller' => 'Tools\\Utility\\UnicodeEncoderController',
                'route_name' => 'utility.unicode-encoder',
                'url' => '/tools/unicode-encoder-decoder',
                'meta_title' => 'Unicode Encoder/Decoder - Free Utility Tool | Optimizo',
                'meta_description' => 'Encode and decode Unicode escape sequences for JavaScript and JSON.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 32,
            ]
        );
    }
}
