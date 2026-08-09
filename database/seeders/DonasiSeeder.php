<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Donasi;

class DonasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Donasi::firstOrCreate(
            ['id_transaksi' => 1001],
            [
                'nama_donatur' => 'Donasi Anonim',
                'nominal' => 100000,
                'tanggal_donasi' => now(),
                'keterangan' => 'Donasi untuk operasional santri yatim piatu',
            ]
        );

        Donasi::firstOrCreate(
            ['id_transaksi' => 1002],
            [
                'nama_donatur' => 'Bapak Ahmad',
                'nominal' => 500000,
                'tanggal_donasi' => now()->subDays(1),
                'keterangan' => 'Donasi untuk pembangunan gedung baru',
            ]
        );

        Donasi::firstOrCreate(
            ['id_transaksi' => 1003],
            [
                'nama_donatur' => 'Ibu Siti',
                'nominal' => 250000,
                'tanggal_donasi' => now()->subDays(2),
                'keterangan' => 'Donasi untuk pembelian buku-buku Al-Qur\'an',
            ]
        );
    }
}
