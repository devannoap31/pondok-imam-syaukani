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
        // Seed All Models Data
        $this->call([
            UserSeeder::class,
            ProfilePondokSeeder::class,
            KontakSeeder::class,
            QrisSeeder::class,
            DonasiSeeder::class,
            BeritaSeeder::class,
            ProgramPendidikanSeeder::class,
            JadwalSeeder::class,
            GaleriSeeder::class,
            PendaftaranSeeder::class,
        ]);
    }
}
