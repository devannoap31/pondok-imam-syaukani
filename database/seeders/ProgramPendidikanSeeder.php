<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramPendidikan;

class ProgramPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'nama_program' => 'MTs (Madrasah Tsanawiyah)',
                'deskripsi' => 'Pendidikan Tingkat Menengah Pertama dengan fokus perbaikan bacaan Al-Qur\'an (Tahsin), permulaan hafalan (Tahfidz), pembentukan akhlak dasar, dan pengenalan ilmu bahasa Arab serta dasar-dasar agama.',
                'gambar' => 'program/mts.jpg',
            ],
            [
                'nama_program' => 'MA (Madrasah Aliyah)',
                'deskripsi' => 'Pendidikan Tingkat Menengah Atas dengan fokus pada pemantapan hafalan 30 Juz, pendalaman penguasaan Kitab Turast (kajian tingkat lanjut), Hifdzul Matan, serta persiapan akademis ke perguruan tinggi.',
                'gambar' => 'program/ma.jpg',
            ],
            [
                'nama_program' => 'Takhossus (Program Khusus)',
                'deskripsi' => 'Program intensif khusus bagi santri yang ingin berfokus secara penuh pada penyelesaian hafalan Al-Qur\'an 30 Juz (Tahfidz Mutqin) dan pendalaman ilmu syar\'i.',
                'gambar' => 'program/takhossus.jpg',
            ],
        ];

        foreach ($programs as $program) {
            ProgramPendidikan::firstOrCreate(
                ['nama_program' => $program['nama_program']],
                $program
            );
        }
    }
}
