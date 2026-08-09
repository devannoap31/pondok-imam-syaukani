<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pendaftaran;
use App\Models\BerkasPendaftaran;

class PendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pendaftaran = Pendaftaran::firstOrCreate(
            ['nomor_pendaftaran' => 'REG-20260808-FCLL'],
            [
                'nama_lengkap' => 'Rahardian Hutama Syamsuri',
                'tempat_lahir' => 'Pacitan',
                'tanggal_lahir' => '2026-08-06',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Desa Nanggungan Pacitan Jawa Timur',
                'nomor_hp' => '342423423',
                'nama_ortu' => 'dfd',
                'pekerjaan_ortu' => 'PNS/TNI/Polri',
                'status' => 'Diverifikasi',
            ]
        );

        $berkasData = [
            [
                'jenis_berkas' => 'Kartu Keluarga',
                'file_path' => 'berkas_pendaftaran/2qeTGj6ZQprQZMtzlwd4HsxFWTgaFUAlIbDka1Ih.pdf',
            ],
            [
                'jenis_berkas' => 'Akta Kelahiran',
                'file_path' => 'berkas_pendaftaran/xN1G4k4qQP0QscGrXWCMKLRtP0x1IZvIt9i5hWXd.pdf',
            ],
            [
                'jenis_berkas' => 'Ijazah / SKL',
                'file_path' => 'berkas_pendaftaran/QZ8UkxL12ycqMU3xM8OV3polr0tKpgiIvtTgaRwq.pdf',
            ],
        ];

        foreach ($berkasData as $berkas) {
            BerkasPendaftaran::firstOrCreate(
                [
                    'pendaftaran_id' => $pendaftaran->id_pendaftaran,
                    'jenis_berkas' => $berkas['jenis_berkas'],
                ],
                [
                    'file_path' => $berkas['file_path'],
                ]
            );
        }
    }
}
