<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

class JwtDecoderSeeder extends Seeder
{
    public function run(): void
    {
        Tool::updateOrCreate(
            ['slug' => 'jwt-decoder'],
            [
                'name' => 'JWT Decoder',
                'category' => 'utility',
            'subcategory' => 'Encoding/Decoding Tools (JWT and ASCII only - others are combined above)',
                'controller' => 'EncodingController@jwtDecode',
                'route_name' => 'utility.jwt-decode',
                'url' => '/tools/jwt-decoder',
                'meta_title' => 'JWT Decoder - Free Utility Tool | Optimizo',
                'meta_description' => 'Decode and inspect JWT tokens. View header, payload, and signature of JSON Web Tokens.',
                'is_active' => true,
                'priority' => 0.8,
                'order' => 33,
            ]
        );
    }
}
