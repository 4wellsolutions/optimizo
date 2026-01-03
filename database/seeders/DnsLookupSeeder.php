<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class DnsLookupSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'dns-lookup'],
            [
                'name' => 'DNS Lookup',
                'category' => 'network',
            'subcategory' => 'Domain Tools',
                'controller' => 'Tools\\Network\\DnsLookupController',
                'route_name' => 'network.dns-lookup',
                'url' => '/tools/dns-lookup',
                'meta_title' => 'DNS Lookup - Free Network Tool | Optimizo',
                'meta_description' => 'Perform DNS lookups and check DNS records.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 24,
            ]
        );
    }
}
