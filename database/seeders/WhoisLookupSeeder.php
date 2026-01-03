<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class WhoisLookupSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'whois-lookup'],
            [
                'name' => 'WHOIS Lookup',
                'category' => 'network',
            'subcategory' => 'Domain Tools',
                'controller' => 'Tools\\Network\\WhoisLookupController',
                'route_name' => 'network.whois-lookup',
                'url' => '/tools/whois-lookup',
                'meta_title' => 'WHOIS Lookup - Free Network Tool | Optimizo',
                'meta_description' => 'Look up domain registration and ownership information.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 25,
            ]
        );
    }
}
