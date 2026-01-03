<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class Base64EncoderDecoderSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'base64-encoder-decoder'],
            [
                'name' => 'Base64 Encoder/Decoder',
                'category' => 'utility',
            'subcategory' => 'Dev Tools',
                'controller' => 'Tools\\Utility\\Base64Controller',
                'route_name' => 'utility.base64',
                'url' => '/tools/base64-encoder-decoder',
                'meta_title' => 'Base64 Encoder/Decoder - Free Utility Tool | Optimizo',
                'meta_description' => 'Encode and decode Base64 strings.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 29,
            ]
        );
    }
}
