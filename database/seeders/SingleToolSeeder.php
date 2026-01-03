<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tool;

class SingleToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * This seeder allows you to add/update a single tool without affecting existing data.
     * Simply modify the tool data below and run: php artisan db:seed --class=SingleToolSeeder
     */
    public function run(): void
    {
        // Define your tool data here
        $toolData = [
            'name' => 'Broken Links Checker',
            'slug' => 'broken-links-checker',
            'category' => 'seo',
            'controller' => 'Tools\\SEO\\BrokenLinksCheckerController',
            'route_name' => 'seo.broken-links-checker',
            'url' => '/tools/broken-links-checker',
            'meta_title' => 'Broken Links Checker - Check for Dead Links Instantly',
            'meta_description' => 'Find and fix broken links on your website. Free broken link checker tool to scan pages for 404 errors and dead links. Improve SEO and user experience.',
            'meta_keywords' => 'broken links checker, dead link checker, 404 checker, link validator, broken link finder, seo tool',
            'priority' => 0.9,
            'change_frequency' => 'weekly',
            'order' => 40,
        ];

        // Check if tool already exists
        $existingTool = Tool::where('slug', $toolData['slug'])->first();

        if ($existingTool) {
            $this->command->warn("⚠️  Tool '{$toolData['slug']}' already exists. Updating...");
            $existingTool->update($toolData);
            $this->command->info("✅ Tool '{$toolData['name']}' updated successfully!");
        } else {
            $this->command->info("📝 Creating new tool '{$toolData['slug']}'...");
            Tool::create($toolData);
            $this->command->info("✅ Tool '{$toolData['name']}' created successfully!");
        }

        $this->command->line('');
        $this->command->line("🔗 Tool URL: {$toolData['url']}");
        $this->command->line("📊 Category: {$toolData['category']}");
        $this->command->line("🎯 Priority: {$toolData['priority']}");
    }
}
