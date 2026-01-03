<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class WhatIsMyIpSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'what-is-my-ip'],
            [
                'name' => 'What is My IP',
                'category' => 'network',
            'subcategory' => 'IP Tools',
                'controller' => 'Tools\\Network\\WhatIsMyIpController',
                'route_name' => 'network.what-is-my-ip',
                'url' => '/tools/what-is-my-ip',
                'meta_title' => 'What is My IP - Free Network Tool | Optimizo',
                'meta_description' => 'Find your public IP address instantly.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 19,
            ]
        );
    }
}
