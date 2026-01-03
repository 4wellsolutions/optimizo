<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PortCheckerSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'port-checker'],
            [
                'name' => 'Port Checker',
                'category' => 'network',
            'subcategory' => 'Network Diagnostics',
                'controller' => 'Tools\\Network\\PortCheckerController',
                'route_name' => 'network.port-checker',
                'url' => '/tools/port-checker',
                'meta_title' => 'Port Checker - Free Network Tool | Optimizo',
                'meta_description' => 'Check if specific ports are open on a server.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 28,
            ]
        );
    }
}
