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
        // Clear existing schedule entries to avoid duplicate clutter
        Jadwal::truncate();

        $jadwals = [
            [
                'judul' => 'Qiyamul Lail & Persiapan Subuh',
                'deskripsi' => 'Santri bangun malam untuk shalat Tahajud, zikir pribadi, dan persiapan shalat Subuh berjamaah di masjid.',
                'tanggal' => now()->toDateString(),
                'waktu' => '03.30 - 04.30 WIB',
                'file_jadwal' => '',
            ],
            [
                'judul' => 'Shalat Subuh & Halaqah Ziyadah (Hafalan Baru)',
                'deskripsi' => 'Shalat Subuh berjamaah, zikir pagi, dan setoran hafalan Al-Qur\'an baru (Ziyadah) bersama ustadz pembimbing.',
                'tanggal' => now()->toDateString(),
                'waktu' => '04.30 - 06.00 WIB',
                'file_jadwal' => '',
            ],
            [
                'judul' => 'Giat Kebersihan, Olahraga & Sarapan Pagi',
                'deskripsi' => 'Piket kebersihan asrama/pondok, olahraga ringan, mandi pagi, dan makan pagi bersama seluruh santri.',
                'tanggal' => now()->toDateString(),
                'waktu' => '06.00 - 07.15 WIB',
                'file_jadwal' => '',
            ],
            [
                'judul' => 'KBM Diniyah & Pelajaran Umum (Sesi Pagi)',
                'deskripsi' => 'Kegiatan Belajar Mengajar formal meliputi Dirasah Islamiyah (Bahasa Arab, Aqidah, Fiqih, Hadits) dan materi kurikulum umum.',
                'tanggal' => now()->toDateString(),
                'waktu' => '07.30 - 11.30 WIB',
                'file_jadwal' => '',
            ],
            [
                'judul' => 'Shalat Dzuhur, Makan Siang & Qailulah (Istirahat)',
                'deskripsi' => 'Shalat Dzuhur berjamaah di masjid, makan siang santri, dan istirahat siang sejenak (Qailulah) menjaga kondisi kesehatan.',
                'tanggal' => now()->toDateString(),
                'waktu' => '11.30 - 13.00 WIB',
                'file_jadwal' => '',
            ],
            [
                'judul' => 'Pendalaman Tahsin & Tajwid Al-Qur\'an',
                'deskripsi' => 'Bimbingan khusus perbaikan makharijul huruf, hukum tajwid, dan kelancaran bacaan Al-Qur\'an secara berkelompok.',
                'tanggal' => now()->toDateString(),
                'waktu' => '13.00 - 15.00 WIB',
                'file_jadwal' => '',
            ],
            [
                'judul' => 'Shalat Ashar & Halaqah Muraja\'ah Hafalan',
                'deskripsi' => 'Shalat Ashar berjamaah dilanjutkan halaqah mengulang hafalan lama (Muraja\'ah) untuk menguatkan hafalan yang telah disetorkan.',
                'tanggal' => now()->toDateString(),
                'waktu' => '15.00 - 16.30 WIB',
                'file_jadwal' => '',
            ],
            [
                'judul' => 'Ekstrakurikuler, Olahraga & Giat Bebas',
                'deskripsi' => 'Kegiatan pengembangan minat bakat (Panahan, Martial Art, Futsal) serta giat pribadi santri menjelang Maghrib.',
                'tanggal' => now()->toDateString(),
                'waktu' => '16.30 - 17.45 WIB',
                'file_jadwal' => '',
            ],
            [
                'judul' => 'Shalat Maghrib, Zikir Petang & Hifdzul Matan',
                'deskripsi' => 'Shalat Maghrib berjamaah, membaca zikir petang, dan hafalan matan-matan ilmiah (Akidah, Nahwu, Hadits).',
                'tanggal' => now()->toDateString(),
                'waktu' => '18.00 - 19.30 WIB',
                'file_jadwal' => '',
            ],
            [
                'judul' => 'Shalat Isya, Makan Malam & Mudzakarah (Belajar Mandiri)',
                'deskripsi' => 'Shalat Isya berjamaah, makan malam, dan pengulangan materi pelajaran (Mudzakarah) mandiri terarah di bawah dampingan musyrif.',
                'tanggal' => now()->toDateString(),
                'waktu' => '19.30 - 21.00 WIB',
                'file_jadwal' => '',
            ],
            [
                'judul' => 'Adab Malam & Istirahat Santri',
                'deskripsi' => 'Absensi malam, evaluasi harian musyrif, adab-adab sebelum tidur, dan istirahat malam santri.',
                'tanggal' => now()->toDateString(),
                'waktu' => '21.00 - 03.30 WIB',
                'file_jadwal' => '',
            ],
        ];

        foreach ($jadwals as $item) {
            Jadwal::create($item);
        }
    }
}
