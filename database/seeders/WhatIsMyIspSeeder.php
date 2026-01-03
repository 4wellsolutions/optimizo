<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class WhatIsMyIspSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'what-is-my-isp'],
            [
                'name' => 'What is My ISP',
                'category' => 'network',
            'subcategory' => 'IP Tools',
                'controller' => 'Tools\\Network\\WhatIsMyIspController',
                'route_name' => 'network.what-is-my-isp',
                'url' => '/tools/what-is-my-isp',
                'meta_title' => 'What is My ISP - Free Network Tool | Optimizo',
                'meta_description' => 'Identify your Internet Service Provider.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 23,
            ]
        );
    }
}
