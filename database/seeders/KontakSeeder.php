<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kontak;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kontak::firstOrCreate(
            ['email' => 'mrdih1213@gmail.com'],
            [
                'alamat' => 'Jl. Kramat Jati, RT 003 / RW 004, Desa Demangan, Kecamatan Sambi, Kabupaten Boyolali, Jawa Tengah 57376',
                'whatsapp' => '0888 8888 8888',
                'facebook' => 'pptqimamsyaukani',
                'instagram' => 'pptqimamsyaukani',
                'youtube' => 'pptqimamsyaukani',
                'telepon' => '0888 8888 8888',
                'maps_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15816.985955681176!2d110.7029589!3d-7.4878345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a13d719ad62cb%3A0xe54fbdf447814c8f!2sSambi%2C%20Boyolali%20Regency%2C%20Central%20Java!5e0!3m2!1sen!2sid!4v1718600000000!5m2!1sen!2sid" width="100%" height="100%" style="border:none;" allowfullscreen="" loading="lazy"></iframe>',
            ]
        );
    }
}
