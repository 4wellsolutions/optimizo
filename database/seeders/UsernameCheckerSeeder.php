<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class UsernameCheckerSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'username-checker'],
            [
                'name' => 'Username Checker',
                'category' => 'utility',
            'subcategory' => 'Social Tools',
                'controller' => 'Tools\\Utility\\UsernameCheckerController',
                'route_name' => 'utility.username-checker',
                'url' => '/tools/username-checker',
                'meta_title' => 'Username Checker - Free Utility Tool | Optimizo',
                'meta_description' => 'Check username availability across platforms.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 64,
            ]
        );
    }
}
