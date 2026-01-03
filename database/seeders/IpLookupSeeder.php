<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class IpLookupSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'ip-lookup'],
            [
                'name' => 'IP Lookup',
                'category' => 'network',
            'subcategory' => 'IP Tools',
                'controller' => 'Tools\\Network\\IpLookupController',
                'route_name' => 'network.ip-lookup',
                'url' => '/tools/ip-lookup',
                'meta_title' => 'IP Lookup - Free Network Tool | Optimizo',
                'meta_description' => 'Get detailed information about any IP address.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 20,
            ]
        );
    }
}
