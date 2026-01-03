<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tool;

class BrokenLinksCheckerSeeder extends Seeder
{
    /**
     * Seed the Broken Links Checker tool.
     */
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'broken-links-checker'],
            [
                'name' => 'Broken Links Checker',
                'category' => 'seo',
                'controller' => 'Tools\\SEO\\BrokenLinksCheckerController',
                'route_name' => 'tools.broken-links-checker',
                'url' => '/tools/broken-links-checker',
                'meta_title' => 'Broken Links Checker - Check for Dead Links Instantly',
                'meta_description' => 'Find and fix broken links on your website. Free broken link checker tool to scan pages for 404 errors and dead links. Improve SEO and user experience.',
                'meta_keywords' => 'broken links checker, dead link checker, 404 checker, link validator, broken link finder, seo tool',
                'priority' => 0.9,
                'change_frequency' => 'weekly',
                'order' => 40,
            ]
        );

        $this->command->info('✅ Broken Links Checker tool seeded successfully!');
    }
}
