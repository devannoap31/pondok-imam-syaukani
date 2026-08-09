<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Galeri;

class GaleriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galeris = [
            [
                'judul' => 'Kegiatan Setoran Tahfidz Santri',
                'tipe' => 'foto',
                'file_path' => 'galeri/tahfidz.jpg',
                'deskripsi' => 'Santri sedang menyetorkan hafalan Al-Qur\'an kepada musyrif.',
            ],
            [
                'judul' => 'Kajian Kitab Turast Bersama Pengasuh',
                'tipe' => 'foto',
                'file_path' => 'galeri/kajian.jpg',
                'deskripsi' => 'Pembelajaran kitab kuning di aula pondok pesantren.',
            ],
            [
                'judul' => 'Kegiatan Olahraga & Ekstrakurikuler',
                'tipe' => 'foto',
                'file_path' => 'galeri/olahraga.jpg',
                'deskripsi' => 'Santri berolahraga bersama untuk menjaga kebugaran jasmani.',
            ],
        ];

        foreach ($galeris as $galeri) {
            Galeri::firstOrCreate(
                ['judul' => $galeri['judul']],
                $galeri
            );
        }
    }
}
