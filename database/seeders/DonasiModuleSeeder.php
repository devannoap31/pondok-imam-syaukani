<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PenyaluranDana;
use App\Models\TujuanDonasi;
use App\Models\RekeningBank;
use App\Models\Qris;

class DonasiModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Penyaluran Dana
        if (PenyaluranDana::count() === 0) {
            PenyaluranDana::insert([
                [
                    'judul' => 'Beasiswa Santri Yatim & Dhuafa',
                    'deskripsi' => 'Menanggung 100% biaya pendidikan, seragam, kitab pembelajaran, dan sarana belajar santri berprestasi dari keluarga kurang mampu.',
                    'icon' => 'academic-cap',
                    'tag' => 'Pendidikan Gratis',
                    'warna' => 'emerald',
                    'urutan' => 1,
                    'aktif' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'judul' => 'Kebutuhan Pangan & Nutrisi',
                    'deskripsi' => 'Penyediaan konsumsi harian makanan halal, sehat, dan bergizi bagi seluruh santri penghafal Al-Qur\'an selama di asrama.',
                    'icon' => 'utensils',
                    'tag' => 'Pangan Berkelanjutan',
                    'warna' => 'amber',
                    'urutan' => 2,
                    'aktif' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'judul' => 'Pembangunan & Fasilitas',
                    'deskripsi' => 'Pembangunan ruang kelas, asrama santri, sarana ibadah/masjid, sanitasi, serta perbaikan sarana prasarana pondok.',
                    'icon' => 'building-library',
                    'tag' => 'Wakaf Produktif',
                    'warna' => 'teal',
                    'urutan' => 3,
                    'aktif' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'judul' => 'Kafalah Guru & Operasional',
                    'deskripsi' => 'Dukungan kafalah (tunjangan) para Asatidz/Ustadzah pembimbing tahfidz serta kelancaran operasional dakwah pesantren.',
                    'icon' => 'book-open',
                    'tag' => 'Kesejahteraan Guru',
                    'warna' => 'blue',
                    'urutan' => 4,
                    'aktif' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        // 2. Tujuan Donasi & Wakaf
        if (TujuanDonasi::count() === 0) {
            TujuanDonasi::insert([
                [
                    'nomor' => '01',
                    'judul' => 'Mencetak Generasi Penghafal Al-Qur\'an',
                    'deskripsi' => 'Melahirkan santri yang hafal 30 Juz Al-Qur\'an dengan pemahaman akidah yang lurus, berakhlak mulia, dan berwawasan keilmuan yang luas untuk masa depan umat.',
                    'warna' => 'primary',
                    'urutan' => 1,
                    'aktif' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nomor' => '02',
                    'judul' => 'Pemerataan Pendidikan Berkualitas',
                    'deskripsi' => 'Memastikan tidak ada anak yatim atau dhuafa yang putus sekolah karena kendala biaya, memberikan hak yang setara untuk meraih cita-cita tertinggi.',
                    'warna' => 'accent',
                    'urutan' => 2,
                    'aktif' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nomor' => '03',
                    'judul' => 'Menjadi Ladang Amal Jariyah',
                    'deskripsi' => 'Menjadi jembatan bagi para muhsinin untuk memperoleh aliran pahala yang tidak pernah terputus dari setiap lantunan ayat suci dan ilmu yang diamalkan santri.',
                    'warna' => 'primary-light',
                    'urutan' => 3,
                    'aktif' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }

        // 3. Rekening Bank
        if (RekeningBank::count() === 0) {
            RekeningBank::create([
                'nama_bank' => 'Bank Syariah Indonesia (BSI)',
                'kode_bank' => '451',
                'nomor_rekening' => '7174567890',
                'atas_nama' => 'PPTQ Imam Syaukani',
                'logo' => null,
                'urutan' => 1,
                'aktif' => true,
            ]);
        }

        // 4. Pastikan QRIS ada default jika kosong
        if (Qris::count() === 0) {
            Qris::create([
                'nama_penerima' => 'PPTQ IMAM SYAUKANI',
                'gambar_qris' => 'qris/sample.png',
                'aktif' => true,
            ]);
        }
    }
}
