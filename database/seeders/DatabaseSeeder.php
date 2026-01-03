<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            AdminUserSeeder::class,
                // ToolsSeeder::class, // Commented out - contains all old tools, use individual seeders instead

                // New Tool Seeders - Add new tools here
            BrokenLinksCheckerSeeder::class,
            GoogleSerpCheckerSeeder::class,
        ]);
    }
}
