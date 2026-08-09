<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfilePondok;

class ProfilePondokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfilePondok::firstOrCreate(
            ['email' => 'mrdih1213@gmail.com'],
            [
                'nama_pondok' => 'PPTQ Imam Syaukani',
                'visi' => 'Mencetak Generasi Qur\'an yang berakhlaq mulia, mandiri dan berwawasan luas.',
                'misi' => "Mengadakan pendidikan berbasis Al-Qur'an.\nMenyiapkan generasi masa depan yang berakhlaq mulia.\nMewujudkan pendidikan karakter melalui kebiasaan baik.",
                'sejarah' => "Didirikan pada Juni 2019, PPTQ Imam Syaukani lahir dari latar belakang melihat banyaknya anak-anak yang ingin mendalami ilmu agama namun tidak memiliki tempat. Kami hadir untuk mengedukasi masyarakat tentang pentingnya ilmu agama dalam kehidupan sehari-hari serta meneruskan ajaran Rasulullah SAW.\n\nTujuan Pendirian: Mencetak generasi yang beriman, berilmu, dan berakhlak mulia (ulama) yang mampu memahami dan mengamalkan ajaran Islam secara mendalam (tafaqquh fiddin), serta menyebarkannya kepada masyarakat luas. Kami memprioritaskan pemahaman ajaran Islam di daerah pedalaman yang belum terjangkau akses pendidikan dan terkendala biaya.",
                'alamat' => 'Jl. Kramat Jati, Demangan, Sambi, Boyolali, Jawa Tengah 57376',
                'telepon' => '0888 8888 8888',
                'maps_url' => 'https://maps.google.com/?q=-7.4878345,110.7029589',
                'logo' => 'logos/default-logo.png',
            ]
        );
    }
}
