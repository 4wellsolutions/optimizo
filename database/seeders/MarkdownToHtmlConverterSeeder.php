<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class MarkdownToHtmlConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'markdown-to-html-converter'],
            [
                'name' => 'Markdown to HTML Converter',
                'category' => 'utility',
            'subcategory' => 'Broken Links Checker',
                'controller' => 'Tools\\Utility\\MarkdownToHtmlController',
                'route_name' => 'utility.markdown-to-html',
                'url' => '/tools/markdown-to-html-converter',
                'meta_title' => 'Markdown to HTML Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert Markdown to HTML instantly with live preview.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 44,
            ]
        );
    }
}
