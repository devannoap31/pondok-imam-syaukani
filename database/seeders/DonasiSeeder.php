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

        Donasi::firstOrCreate(
            ['id_transaksi' => 2609091960],
            [
                'nama_donatur' => 'Donatur Uji Mandiri',
                'institusi' => 'Komunitas Dermawan',
                'nominal' => 250000,
                'tanggal_donasi' => now(),
                'keterangan' => 'Infaq operasional santri tahfidz',
                'metode_pembayaran' => 'Transfer Bank BSI (7174567890)',
                'bukti_pembayaran' => null,
            ]
        );

        Donasi::firstOrCreate(
            ['id_transaksi' => 2609092067],
            [
                'nama_donatur' => 'qwdq',
                'institusi' => 'qwd',
                'nominal' => 201000,
                'tanggal_donasi' => now(),
                'keterangan' => 'qwdqwd',
                'metode_pembayaran' => 'Transfer Bank Syariah Indonesia (BSI) (7174567890)',
                'bukti_pembayaran' => 'bukti_donasi/JVcSSj8rhGOv9F5fjEpbs1KoP4WNFaq7yCvRn5Sb.png',
            ]
        );

        Donasi::firstOrCreate(
            ['id_transaksi' => 2609092023],
            [
                'nama_donatur' => 'Tes2',
                'institusi' => 'tes2',
                'nominal' => 100000,
                'tanggal_donasi' => now(),
                'keterangan' => 'test',
                'metode_pembayaran' => 'QRIS Pembayaran',
                'bukti_pembayaran' => 'bukti_donasi/kbIZEE8AfwYtLi4vCjo8IDuO1EZsrnMNr7jYAXNu.jpg',
            ]
        );
    }
}
