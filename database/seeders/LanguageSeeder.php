<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Schema::hasTable('languages')) {
            // English (Default)
            DB::table('languages')->updateOrInsert(
                ['code' => 'en'],
                [
                    'name' => 'English',
                    'native_name' => 'English',
                    'flag_icon' => '🇺🇸',
                    'is_default' => true,
                    'is_active' => true,
                    'direction' => 'ltr'
                ]
            );

            // Russian
            DB::table('languages')->updateOrInsert(
                ['code' => 'ru'],
                [
                    'name' => 'Russian',
                    'native_name' => 'Русский',
                    'flag_icon' => '🇷🇺',
                    'is_default' => false,
                    'is_active' => true,
                    'direction' => 'ltr'
                ]
            );
        }
    }
}
