<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class DomainToIpSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'domain-to-ip'],
            [
                'name' => 'Domain to IP',
                'category' => 'network',
            'subcategory' => 'Domain Tools',
                'controller' => 'Tools\\Network\\DomainToIpController',
                'route_name' => 'network.domain-to-ip',
                'url' => '/tools/domain-to-ip',
                'meta_title' => 'Domain to IP - Free Network Tool | Optimizo',
                'meta_description' => 'Convert domain names to IP addresses.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 21,
            ]
        );
    }
}
