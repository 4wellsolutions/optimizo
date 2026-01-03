<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class WordCounterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'word-counter'],
            [
                'name' => 'Word Counter',
                'category' => 'seo',
            'subcategory' => 'Analysis Tools',
                'controller' => 'Tools\\Seo\\WordCounterController',
                'route_name' => 'seo.word-counter',
                'url' => '/tools/word-counter',
                'meta_title' => 'Word Counter - Free Seo Tool | Optimizo',
                'meta_description' => 'Count words, characters, and analyze text for SEO optimization.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 12,
            ]
        );
    }
}
