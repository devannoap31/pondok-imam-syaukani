<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jadwals = [
            [
                'judul' => 'Hafalan Qur\'an',
                'deskripsi' => 'Setoran hafalan (Ziyadah/Muraja\'ah) bersama ustadz pembimbing.',
                'tanggal' => now()->toDateString(),
                'waktu' => 'Ba\'da Subuh - 06:00',
                'file_jadwal' => 'jadwal/default-jadwal.pdf',
            ],
            [
                'judul' => 'Kajian & Pelajaran',
                'deskripsi' => 'Belajar Kitab Turast dan Pelajaran Umum di ruang kelas.',
                'tanggal' => now()->toDateString(),
                'waktu' => '08:00 - 12:00',
                'file_jadwal' => 'jadwal/default-jadwal.pdf',
            ],
            [
                'judul' => 'Hifdzul Matan (Sesi 1)',
                'deskripsi' => 'Hafalan kitab matan dasar bersama ustadz pembimbing.',
                'tanggal' => now()->toDateString(),
                'waktu' => 'Ba\'da Ashar (1 Jam)',
                'file_jadwal' => 'jadwal/default-jadwal.pdf',
            ],
            [
                'judul' => 'Hifdzul Matan & Belajar Mandiri',
                'deskripsi' => 'Lanjutan hafalan matan, kajian malam, dan belajar mandiri terarah.',
                'tanggal' => now()->toDateString(),
                'waktu' => 'Ba\'da Maghrib - 22:00',
                'file_jadwal' => 'jadwal/default-jadwal.pdf',
            ],
        ];

        foreach ($jadwals as $item) {
            Jadwal::firstOrCreate(
                ['judul' => $item['judul']],
                $item
            );
        }
    }
}
