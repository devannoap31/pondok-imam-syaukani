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
            ['nama_penerima' => 'Rahardian Hutama Syamsuri'],
            [
                'gambar_qris' => 'qris/bto3p3TYEdFHRlyn1JuTM330oScxgMs4nrdBjGTW.jpg',
                'aktif' => true,
            ]
        );
    }
}
