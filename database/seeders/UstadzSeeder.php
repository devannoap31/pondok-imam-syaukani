<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ustadz;

class UstadzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $asatidz = [
            [
                'nama'       => 'Ust. Baihaqi Matsari',
                'gelar'      => 'Lc., M.A.',
                'jabatan'    => "Mudir Ma'had",
                'bio'        => "Pimpinan Utama & Pengasuh PPTQ Imam Syaukani, mengasuh santri dalam bidang tafsir dan tafaqquh fiddin.",
                'pendidikan' => "S1 Universitas Damaskus, Suriah\nS2 Brunei Darussalam",
                'keahlian'   => "Tafsir Al-Qur'an, Ushul Fiqih, Bahasa Arab",
                'urutan'     => 1,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ust. Abdullah',
                'gelar'      => 'S.Pd.I.',
                'jabatan'    => 'Wakil Mudir / Kesantrian',
                'bio'        => 'Membimbing pembinaan karakter, akhlak, dan kedisiplinan santri sehari-hari di asrama pondok.',
                'pendidikan' => 'S1 Pendidikan Agama Islam',
                'keahlian'   => 'Manajemen Pesantren, Bimbingan Konseling Santri',
                'urutan'     => 2,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ust. Hendy',
                'gelar'      => 'S.Ag., Al-Hafizh',
                'jabatan'    => 'Ka. Kurikulum & Tahfidz',
                'bio'        => "Mengoordinasikan program target hafalan Al-Qur'an 30 Juz dan mutaba'ah harian para santri.",
                'pendidikan' => "S1 Ilmu Al-Qur'an & Tafsir",
                'keahlian'   => "Tahfidz 30 Juz Bersanad, Tahsin Tilawah",
                'urutan'     => 3,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ust. Nasirudin',
                'gelar'      => 'B.A.',
                'jabatan'    => 'Pengajar Dirosah Islamiyah',
                'bio'        => 'Mengampu kajian kitab fiqih, ushuluddin, dan pemahaman syariat Islam yang mendalam.',
                'pendidikan' => 'S1 Syariah Islamiyah',
                'keahlian'   => 'Fiqih Syafi\'i, Hadits Ahkam',
                'urutan'     => 4,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ust. Rahmat Hidayat',
                'gelar'      => 'S.S.',
                'jabatan'    => 'Pengajar Bahasa Arab',
                'bio'        => 'Membimbing kemampuan tata bahasa nahwu-shorof serta percakapan aktif bahasa Arab di lingkungan pondok.',
                'pendidikan' => 'S1 Sastra & Bahasa Arab',
                'keahlian'   => 'Nahwu, Shorof, Percakapan Bahasa Arab',
                'urutan'     => 5,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ust. Ahmad Fauzi',
                'gelar'      => 'Al-Hafizh',
                'jabatan'    => 'Pengajar Tahsin & Tajwid',
                'bio'        => 'Membimbing talaqqi makharijul huruf, kaidah tajwid, dan kelancaran setoran hafalan santri.',
                'pendidikan' => "Ma'had Tahfidz Al-Qur'an",
                'keahlian'   => 'Tajwid Jazariyyah, Qira\'at Ashim',
                'urutan'     => 6,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ust. Salman Al-Farisi',
                'gelar'      => 'S.Pd.',
                'jabatan'    => 'Musyrif Asrama Putra',
                'bio'        => 'Mendampingi aktivitas sholat berjamaah, kemandirian asrama, dan kebugaran santri.',
                'pendidikan' => 'Kulliyatul Mu\'allimin Al-Islamiyah',
                'keahlian'   => 'Kepanduan Santri, Bina Mental & Jasmani',
                'urutan'     => 7,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ust. Muhammad Ridwan',
                'gelar'      => 'S.Hum.',
                'jabatan'    => 'Pengajar Tarikh Islam',
                'bio'        => 'Mengajarkan sejarah peradaban Islam dan sirah nabawiyah agar santri memiliki teladan hidup mulia.',
                'pendidikan' => 'S1 Sejarah Kebudayaan Islam',
                'keahlian'   => 'Sirah Nabawiyah, Tarikh Khulafaur Rasyidin',
                'urutan'     => 8,
                'aktif'      => true,
            ],
            [
                'nama'       => 'Ust. Fatih Pratama',
                'gelar'      => 'Lc.',
                'jabatan'    => 'Pengajar Aqidah & Akhlak',
                'bio'        => 'Menanamkan pondasi aqidah ahlussunnah wal jama\'ah dan adab penuntut ilmu kepada seluruh santri.',
                'pendidikan' => 'S1 Ushuluddin & Aqidah',
                'keahlian'   => 'Aqidah Shahihah, Adab Talibul Ilmi',
                'urutan'     => 9,
                'aktif'      => true,
            ],
        ];

        foreach ($asatidz as $data) {
            Ustadz::updateOrCreate(
                ['nama' => $data['nama']],
                $data
            );
        }
    }
}
