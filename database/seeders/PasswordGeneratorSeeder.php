<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PasswordGeneratorSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'password-generator'],
            [
                'name' => 'Password Generator',
                'category' => 'utility',
            'subcategory' => 'Security Tools',
                'controller' => 'Tools\\Utility\\PasswordGeneratorController',
                'route_name' => 'utility.password-generator',
                'url' => '/tools/password-generator',
                'meta_title' => 'Password Generator - Free Utility Tool | Optimizo',
                'meta_description' => 'Generate secure random passwords.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 65,
            ]
        );
    }
}
