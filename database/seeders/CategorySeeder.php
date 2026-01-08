<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Services\ToolData;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clean up existing tool categories
        // Note: With separate tables, we can just truncate or delete all for seeding
        Category::query()->delete();
        \App\Models\BlogCategory::query()->delete();

        $toolsData = ToolData::getInitialToolsData();

        foreach ($toolsData as $data) {
            $categorySlug = is_string($data['category']) ? $data['category'] : 'other';

            // Define colors based on category slug
            $colors = match ($categorySlug) {
                'youtube' => [
                    'from' => '#ef4444', // red-500
                    'to' => '#b91c1c',   // red-700
                    'text' => 'text-white'
                ],
                'seo' => [
                    'from' => '#10b981', // emerald-500
                    'to' => '#047857',   // emerald-700
                    'text' => 'text-white'
                ],
                'utility' => [
                    'from' => '#3b82f6', // blue-500
                    'to' => '#1d4ed8',   // blue-700
                    'text' => 'text-white'
                ],
                'network' => [
                    'from' => '#8b5cf6', // violet-500
                    'to' => '#6d28d9',   // violet-700
                    'text' => 'text-white'
                ],
                default => [ // Other
                    'from' => '#6b7280', // gray-500
                    'to' => '#374151',   // gray-700
                    'text' => 'text-white'
                ]
            };

            // Parent Category (e.g., 'utility')
            $parentCategory = Category::firstOrCreate(
                ['slug' => $categorySlug],
                [
                    'name' => ucwords(str_replace('-', ' ', $categorySlug)),
                    'parent_id' => null,
                    'bg_gradient_from' => $colors['from'],
                    'bg_gradient_to' => $colors['to'],
                    'text_color' => $colors['text']
                ]
            );

            // Child Category (Subcategory)
            if (!empty($data['subcategory'])) {
                $subSlug = Str::slug($parentCategory->slug . '-' . $data['subcategory']);

                Category::firstOrCreate(
                    ['slug' => $subSlug, 'parent_id' => $parentCategory->id],
                    ['name' => $data['subcategory']] // Removed type
                );
            }
        }

        // Seed some sample Blog Categories
        \App\Models\BlogCategory::create([
            'name' => 'General News',
            'slug' => 'general-news',
            'description' => 'General announcements and news.'
        ]);
        \App\Models\BlogCategory::create([
            'name' => 'Tutorials',
            'slug' => 'tutorials',
            'description' => 'Detailed guides and how-tos.'
        ]);
    }
}
