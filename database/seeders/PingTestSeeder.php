<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class PingTestSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'ping-test'],
            [
                'name' => 'Ping Test',
                'category' => 'network',
            'subcategory' => 'Network Diagnostics',
                'controller' => 'Tools\\Network\\PingTestController',
                'route_name' => 'network.ping-test',
                'url' => '/tools/ping-test',
                'meta_title' => 'Ping Test - Free Network Tool | Optimizo',
                'meta_description' => 'Test network connectivity and latency to any server.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 26,
            ]
        );
    }
}
