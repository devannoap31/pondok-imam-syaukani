<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Berita::firstOrCreate(
            ['slug' => 'ppdb-2026-dibuka-resmi'],
            [
                'id_users' => 1,
                'judul' => 'Pendaftaran Santri Baru 2026 Resmi Dibuka',
                'slug' => 'ppdb-2026-dibuka-resmi',
                'kategori' => 'Pengumuman',
                'isi' => 'Pendaftaran Santri Baru untuk tahun ajaran 2026 di PPTQ Imam Syaukani resmi dibuka. Calon santri dapat mendaftar secara online melalui website resmi kami dan mengikuti alur seleksi dengan ketentuan yang telah ditetapkan.',
                'gambar' => 'berita/default-berita.jpg',
                'tanggal_publish' => '2023-06-15',
            ]
        );

        Berita::firstOrCreate(
            ['slug' => 'prestasi-santri-di-ajang-lokal'],
            [
                'id_users' => 1,
                'judul' => 'Prestasi Santri di Ajang Lokal',
                'slug' => 'prestasi-santri-di-ajang-lokal',
                'kategori' => 'Prestasi',
                'isi' => 'Santri PPTQ Imam Syaukani berhasil meraih juara dalam lomba tahfidz dan seni baca Al-Qur’an tingkat regional.',
                'gambar' => 'berita/default-berita.jpg',
                'tanggal_publish' => '2023-05-20',
            ]
        );

        Berita::firstOrCreate(
            ['slug' => 'tips-ibadah-puasa-bagi-santri-baru'],
            [
                'id_users' => 1,
                'judul' => 'Tips Ibadah Puasa bagi Santri Baru',
                'slug' => 'tips-ibadah-puasa-bagi-santri-baru',
                'kategori' => 'Artikel',
                'isi' => 'Panduan singkat untuk santri baru dalam menjalankan ibadah puasa dengan penuh kesabaran dan ketenangan.',
                'gambar' => 'berita/default-berita.jpg',
                'tanggal_publish' => '2023-04-28',
            ]
        );
    }
}
