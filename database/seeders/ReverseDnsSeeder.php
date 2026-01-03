<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class ReverseDnsSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'reverse-dns'],
            [
                'name' => 'Reverse DNS',
                'category' => 'network',
            'subcategory' => 'Domain Tools',
                'controller' => 'Tools\\Network\\ReverseDnsController',
                'route_name' => 'network.reverse-dns',
                'url' => '/tools/reverse-dns',
                'meta_title' => 'Reverse DNS - Free Network Tool | Optimizo',
                'meta_description' => 'Perform reverse DNS lookups to find domain names from IP addresses.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 22,
            ]
        );
    }
}
