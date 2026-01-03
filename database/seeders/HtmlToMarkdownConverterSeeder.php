<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class HtmlToMarkdownConverterSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'html-to-markdown-converter'],
            [
                'name' => 'HTML to Markdown Converter',
                'category' => 'utility',
            'subcategory' => 'Broken Links Checker',
                'controller' => 'ConverterController@htmlToMarkdown',
                'route_name' => 'utility.html-to-markdown',
                'url' => '/tools/html-to-markdown-converter',
                'meta_title' => 'HTML to Markdown Converter - Free Utility Tool | Optimizo',
                'meta_description' => 'Convert HTML code to clean Markdown format instantly. Perfect for documentation and content migration.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 45,
            ]
        );
    }
}
