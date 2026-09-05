<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FasilitasPesantren;

class FasilitasPesantrenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'nama_fasilitas'    => 'Luas area pondok',
                'deskripsi_singkat' => 'Total luas lahan & area pondok',
                'detail'            => '2928 m²',
                'icon'              => '📐',
                'urutan'            => 1,
                'aktif'             => true,
            ],
            [
                'nama_fasilitas'    => 'Masjid',
                'deskripsi_singkat' => 'Pusat ibadah & kajian santri',
                'detail'            => "a. Nama: Masjid Baiatur Ridwan\nb. Kapasitas: 300 Orang",
                'icon'              => '🕌',
                'urutan'            => 2,
                'aktif'             => true,
            ],
            [
                'nama_fasilitas'    => 'Asrama',
                'deskripsi_singkat' => 'Hunian tempat tinggal santri',
                'detail'            => "a. Nama: Abu Bakar & Umar\nb. Jumlah: 2 Kamar\nc. Kapasitas/fasilitas: 60 Orang",
                'icon'              => '🏢',
                'urutan'            => 3,
                'aktif'             => true,
            ],
            [
                'nama_fasilitas'    => 'Aula',
                'deskripsi_singkat' => 'Pertemuan & kegiatan bersama',
                'detail'            => "a. Nama: Usman Bin Affan\nb. Jumlah: 1 tempat\nc. Kapasitas/fasilitas: 10 Orang",
                'icon'              => '🏛️',
                'urutan'            => 4,
                'aktif'             => true,
            ],
            [
                'nama_fasilitas'    => 'Lain-lain (dll)',
                'deskripsi_singkat' => 'Sarana & fasilitas pendukung',
                'detail'            => "a. Nama: kantor, Dapur, Kantin, depot, lapangan dan kampus\nb. Jumlah: @1 Tempat\nc. Kapasitas/fasilitas: 5-25 Orang",
                'icon'              => '🏕️',
                'urutan'            => 5,
                'aktif'             => true,
            ],
            [
                'nama_fasilitas'    => 'Kapasitas tampung santri',
                'deskripsi_singkat' => 'Daya tampung maksimal santri',
                'detail'            => "a. Santri Putra: 60 Orang\nb. Santri Putri: -",
                'icon'              => '👥',
                'urutan'            => 6,
                'aktif'             => true,
            ],
            [
                'nama_fasilitas'    => 'Jumlah santri saat ini',
                'deskripsi_singkat' => 'Santri aktif terdaftar',
                'detail'            => "a. Santri Putra: 24 Orang\nb. Santri Putri: -",
                'icon'              => '🎓',
                'urutan'            => 7,
                'aktif'             => true,
            ],
            [
                'nama_fasilitas'    => 'Jumlah pengajar',
                'deskripsi_singkat' => 'Tenaga pengajar & pendidik',
                'detail'            => "a. Ustadz: 11 Orang\nb. Ustadzah: -",
                'icon'              => '👨‍🏫',
                'urutan'            => 8,
                'aktif'             => true,
            ],
            [
                'nama_fasilitas'    => 'Jumlah Alumni',
                'deskripsi_singkat' => 'Lulusan santri',
                'detail'            => 'a. Tingkat Lokal: 22 Orang',
                'icon'              => '📜',
                'urutan'            => 9,
                'aktif'             => true,
            ],
            [
                'nama_fasilitas'    => 'Mitra Pendidikan',
                'deskripsi_singkat' => 'Kerjasama lembaga pendidikan',
                'detail'            => '3 Mitra Pendidikan',
                'icon'              => '🤝',
                'urutan'            => 10,
                'aktif'             => true,
            ],
        ];

        foreach ($items as $item) {
            FasilitasPesantren::updateOrCreate(
                ['nama_fasilitas' => $item['nama_fasilitas']],
                $item
            );
        }
    }
}
