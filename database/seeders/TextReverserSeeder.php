<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class TextReverserSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'text-reverser'],
            [
                'name' => 'Text Reverser',
                'category' => 'utility',
            'subcategory' => 'Text & String Converters',
                'controller' => 'Tools\\Utility\\TextReverserController',
                'route_name' => 'utility.text-reverser',
                'url' => '/tools/text-reverser',
                'meta_title' => 'Text Reverser - Free Utility Tool | Optimizo',
                'meta_description' => 'Reverse text strings character by character. Flip text backwards instantly.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 54,
            ]
        );
    }
}
