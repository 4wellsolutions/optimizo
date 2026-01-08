<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tool;
use App\Models\Category;
use App\Services\ToolData;
use Illuminate\Support\Str;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $toolsData = ToolData::getInitialToolsData();

        foreach ($toolsData as $data) {
            // 1. Handle Categories (Lookup only)
            $categorySlug = is_string($data['category']) ? $data['category'] : 'other';

            // Parent Category Lookup
            $parentCategory = \App\Models\Category::where('slug', $categorySlug)->first();

            $childCategory = null;
            if ($parentCategory && !empty($data['subcategory'])) {
                $subSlug = \Illuminate\Support\Str::slug($parentCategory->slug . '-' . $data['subcategory']);
                $childCategory = \App\Models\Category::where('slug', $subSlug)
                    ->where('parent_id', $parentCategory->id)
                    ->first();
            }

            // Determine which category to assign
            $assignedCategoryId = $parentCategory ? $parentCategory->id : null;
            $assignedSubcategoryId = $childCategory ? $childCategory->id : null;

            // 2. Create or Update Tool
            // We use slug as unique identifier
            $tool = Tool::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'name' => $data['name'],
                    // Assign IDs to 'category_id' and 'subcategory_id' columns
                    'category_id' => $assignedCategoryId,
                    'subcategory_id' => $assignedSubcategoryId,

                    'icon_svg' => $data['icon_svg'] ?? null,
                    'icon_name' => $data['icon_name'] ?? null,
                    'description' => $data['meta_description'] ?? null, // Use meta desc as short desc if missing
                    'content' => null, // Content usually manually edited or null

                    'controller' => $data['controller'],
                    'route_name' => $data['route_name'],
                    'url' => $data['url'],

                    'meta_title' => $data['meta_title'] ?? null,
                    'meta_description' => $data['meta_description'] ?? null,
                    'meta_keywords' => $data['meta_keywords'] ?? null,

                    'priority' => $data['priority'] ?? 0.8,
                    'change_frequency' => $data['change_frequency'] ?? 'weekly',
                    'order' => $data['order'] ?? 0,
                    'is_active' => true,
                ]
            );
        }
    }
}
