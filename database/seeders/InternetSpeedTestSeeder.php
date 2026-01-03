<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class InternetSpeedTestSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'internet-speed-test'],
            [
                'name' => 'Internet Speed Test',
                'category' => 'utility',
            'subcategory' => 'Network Diagnostics',
                'controller' => 'Tools\\Utility\\InternetSpeedTestController',
                'route_name' => 'utility.speed-test',
                'url' => '/tools/internet-speed-test',
                'meta_title' => 'Internet Speed Test - Free Utility Tool | Optimizo',
                'meta_description' => 'Test your internet connection speed.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 66,
            ]
        );
    }
}
