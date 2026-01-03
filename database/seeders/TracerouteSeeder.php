<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class TracerouteSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'traceroute'],
            [
                'name' => 'Traceroute',
                'category' => 'network',
            'subcategory' => 'Network Diagnostics',
                'controller' => 'Tools\\Network\\TracerouteController',
                'route_name' => 'network.traceroute',
                'url' => '/tools/traceroute',
                'meta_title' => 'Traceroute - Free Network Tool | Optimizo',
                'meta_description' => 'Trace the route packets take to reach a destination.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 27,
            ]
        );
    }
}
