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
            // Handle Category Lookup
            $categorySlug = is_string($data['category']) ? $data['category'] : 'other';
            $category = Category::where('slug', $categorySlug)->first();

            // Create or Update Tool
            Tool::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'name' => $data['name'],
                    'category_id' => $category ? $category->id : null,
                    'icon_name' => $data['icon_name'] ?? null,
                    'controller' => $data['controller'],
                    'route_name' => $data['route_name'],
                    'url' => $data['url'],
                    'order' => $data['order'] ?? 0,
                    'is_active' => true,
                ]
            );
        }
    }
}
