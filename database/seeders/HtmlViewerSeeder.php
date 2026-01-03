<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class HtmlViewerSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'html-viewer'],
            [
                'name' => 'HTML Viewer',
                'category' => 'utility',
            'subcategory' => 'Dev Tools',
                'controller' => 'Tools\\Utility\\HtmlViewerController',
                'route_name' => 'utility.html-viewer',
                'url' => '/tools/html-viewer',
                'meta_title' => 'HTML Viewer - Free Utility Tool | Optimizo',
                'meta_description' => 'Preview HTML code in real-time.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 60,
            ]
        );
    }
}
