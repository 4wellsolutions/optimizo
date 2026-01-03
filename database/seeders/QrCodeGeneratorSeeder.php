<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class QrCodeGeneratorSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'qr-code-generator'],
            [
                'name' => 'QR Code Generator',
                'category' => 'utility',
            'subcategory' => 'Image Tools',
                'controller' => 'Tools\\Utility\\QrGeneratorController',
                'route_name' => 'utility.qr-generator',
                'url' => '/tools/qr-code-generator',
                'meta_title' => 'QR Code Generator - Free Utility Tool | Optimizo',
                'meta_description' => 'Create custom QR codes instantly.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 59,
            ]
        );
    }
}
