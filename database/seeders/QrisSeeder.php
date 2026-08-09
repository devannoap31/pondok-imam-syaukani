<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Qris;

class QrisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Qris::firstOrCreate(
            ['nama_penerima' => 'Mr. Adi Rohadi Dadi Dadi'],
            [
                'gambar_qris' => 'qris/default-qris.png',
                'aktif' => true,
            ]
        );
    }
}
