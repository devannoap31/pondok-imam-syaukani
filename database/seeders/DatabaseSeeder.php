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
        // Create or update default test user (won't error on duplicate)
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        // Seed Profile Pondok & Kontak Data
        $this->call([
            ProfilePondokSeeder::class,
            KontakSeeder::class,
            QrisSeeder::class,
            DonasiSeeder::class,
        ]);
    }
}
