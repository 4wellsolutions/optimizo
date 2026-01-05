<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tool;
use App\Services\ToolData;

class ToolSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch tools from the central service
        $tools = ToolData::getTools();

        // Efficiently update or create tools based on their unique slug
        // This prevents ID churning and data loss compared to truncate()
        foreach ($tools as $tool) {
            if (isset($tool['slug'])) {
                Tool::updateOrCreate(
                    ['slug' => $tool['slug']], // Search key
                    $tool // Values to update
                );
            }
        }
    }
}
