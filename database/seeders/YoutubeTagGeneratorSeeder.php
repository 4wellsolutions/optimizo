<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class YoutubeTagGeneratorSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'youtube-tag-generator'],
            [
                'name' => 'YouTube Tag Generator',
                'category' => 'youtube',
            'subcategory' => 'Video Tools',
                'controller' => 'Tools\\YouTube\\TagsGeneratorController',
                'route_name' => 'youtube.tags',
                'url' => '/tools/youtube-tag-generator',
                'meta_title' => 'YouTube Tag Generator - Free Youtube Tool | Optimizo',
                'meta_description' => 'Generate SEO-optimized tags for your YouTube videos.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 6,
            ]
        );
    }
}
