<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Berita;
use App\Models\Jadwal;
use App\Models\ProfilePondok;
use App\Models\ProgramPendidikan;
use App\Models\Pendaftaran;
use App\Models\Donasi;
use App\Models\Qris;
use App\Models\Galeri;
use App\Models\Kontak;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminCrudTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::firstOrCreate(
            ['email' => 'admin_test@example.com'],
            [
                'name' => 'Admin Tester',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]
        );
    }

    public function test_admin_dashboard_can_be_rendered()
    {
        $response = $this->actingAs($this->admin)->get('/admin/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Selamat Datang di Dashboard Admin');
    }

    public function test_jadwal_crud_operations()
    {
        // 1. Create
        $response = $this->actingAs($this->admin)->post('/admin/jadwal', [
            'judul' => 'Kajian Rutin Test',
            'deskripsi' => 'Deskripsi jadwal test',
            'tanggal' => '2026-08-20',
            'waktu' => '19:30 - 21:00',
        ]);
        $response->assertRedirect(route('jadwal.index'));
        $this->assertDatabaseHas('jadwal', ['judul' => 'Kajian Rutin Test']);

        $jadwal = Jadwal::where('judul', 'Kajian Rutin Test')->first();

        // 2. Edit View
        $response = $this->actingAs($this->admin)->get('/admin/jadwal/' . $jadwal->id_jadwal . '/edit');
        $response->assertStatus(200);

        // 3. Update
        $response = $this->actingAs($this->admin)->put('/admin/jadwal/' . $jadwal->id_jadwal, [
            'judul' => 'Kajian Rutin Test Updated',
            'deskripsi' => 'Deskripsi updated',
            'tanggal' => '2026-08-20',
            'waktu' => '19:30 - 21:00',
        ]);
        $response->assertRedirect(route('jadwal.index'));
        $this->assertDatabaseHas('jadwal', ['judul' => 'Kajian Rutin Test Updated']);

        // 4. Delete
        $response = $this->actingAs($this->admin)->delete('/admin/jadwal/' . $jadwal->id_jadwal);
        $response->assertRedirect(route('jadwal.index'));
        $this->assertDatabaseMissing('jadwal', ['id_jadwal' => $jadwal->id_jadwal]);
    }

    public function test_program_pendidikan_crud_operations()
    {
        // 1. Create
        $response = $this->actingAs($this->admin)->post('/admin/program-pendidikan', [
            'nama_program' => 'Program Khusus Test',
            'deskripsi' => 'Deskripsi program test',
        ]);
        $response->assertRedirect(route('program-pendidikan.index'));
        $this->assertDatabaseHas('program_pendidikan', ['nama_program' => 'Program Khusus Test']);

        $program = ProgramPendidikan::where('nama_program', 'Program Khusus Test')->first();

        // 2. Edit View
        $response = $this->actingAs($this->admin)->get('/admin/program-pendidikan/' . $program->id_program_pendidikan . '/edit');
        $response->assertStatus(200);

        // 3. Update
        $response = $this->actingAs($this->admin)->put('/admin/program-pendidikan/' . $program->id_program_pendidikan, [
            'nama_program' => 'Program Khusus Test Updated',
            'deskripsi' => 'Deskripsi program test updated',
        ]);
        $response->assertRedirect(route('program-pendidikan.index'));
        $this->assertDatabaseHas('program_pendidikan', ['nama_program' => 'Program Khusus Test Updated']);

        // 4. Delete
        $response = $this->actingAs($this->admin)->delete('/admin/program-pendidikan/' . $program->id_program_pendidikan);
        $response->assertRedirect(route('program-pendidikan.index'));
        $this->assertDatabaseMissing('program_pendidikan', ['id_program_pendidikan' => $program->id_program_pendidikan]);
    }

    public function test_donasi_crud_operations()
    {
        // 1. Create
        $response = $this->actingAs($this->admin)->post('/admin/donasi', [
            'nama_donatur' => 'Donatur Test Feature',
            'nominal' => 300000,
            'tanggal_donasi' => '2026-08-09 12:00:00',
            'keterangan' => 'Donasi operasional',
            'id_transaksi' => 888777,
        ]);
        $response->assertRedirect(route('donasi.index'));
        $this->assertDatabaseHas('donasi', ['id_transaksi' => 888777]);

        $donasi = Donasi::where('id_transaksi', 888777)->first();

        // 2. Show & Edit
        $this->actingAs($this->admin)->get('/admin/donasi/' . $donasi->id_donasi)->assertStatus(200);
        $this->actingAs($this->admin)->get('/admin/donasi/' . $donasi->id_donasi . '/edit')->assertStatus(200);

        // 3. Update
        $response = $this->actingAs($this->admin)->put('/admin/donasi/' . $donasi->id_donasi, [
            'nama_donatur' => 'Donatur Test Feature Updated',
            'nominal' => 350000,
            'tanggal_donasi' => '2026-08-09 12:00:00',
            'keterangan' => 'Donasi operasional updated',
            'id_transaksi' => 888777,
        ]);
        $response->assertRedirect(route('donasi.index'));
        $this->assertDatabaseHas('donasi', ['nama_donatur' => 'Donatur Test Feature Updated']);

        // 4. Delete
        $response = $this->actingAs($this->admin)->delete('/admin/donasi/' . $donasi->id_donasi);
        $response->assertRedirect(route('donasi.index'));
        $this->assertDatabaseMissing('donasi', ['id_donasi' => $donasi->id_donasi]);
    }

    public function test_ppdb_status_update()
    {
        $pendaftar = Pendaftaran::firstOrCreate(
            ['nomor_pendaftaran' => 'REG-TEST-999'],
            [
                'nama_lengkap' => 'Santri Testing',
                'tempat_lahir' => 'Solo',
                'tanggal_lahir' => '2026-01-01',
                'jenis_kelamin' => 'laki-laki',
                'alamat' => 'Jl Test No 1',
                'nomor_hp' => '08123456789',
                'nama_ortu' => 'Ortu Test',
                'pekerjaan_ortu' => 'Wiraswasta',
                'status' => 'Diverifikasi',
            ]
        );

        $response = $this->actingAs($this->admin)->put('/admin/pendaftaran/' . $pendaftar->id_pendaftaran . '/status', [
            'status' => 'Diterima',
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('pendaftaran', [
            'id_pendaftaran' => $pendaftar->id_pendaftaran,
            'status' => 'Diterima',
        ]);
    }

    public function test_berita_crud_operations()
    {
        Storage::fake('public');

        // 1. Create with Image
        $file = UploadedFile::fake()->image('berita_test.jpg');
        $response = $this->actingAs($this->admin)->post('/admin/berita', [
            'judul' => 'Berita Kegiatan Test',
            'isi' => 'Konten berita test kegiatan santri pondok.',
            'kategori' => 'Kegiatan',
            'gambar' => $file,
            'tanggal_publish' => '2026-08-10',
        ]);
        $response->assertRedirect(route('berita.index'));
        $this->assertDatabaseHas('berita', ['judul' => 'Berita Kegiatan Test']);

        $berita = Berita::where('judul', 'Berita Kegiatan Test')->first();

        // 2. Show & Edit View
        $this->actingAs($this->admin)->get('/admin/berita/' . $berita->id_berita)->assertStatus(200);
        $this->actingAs($this->admin)->get('/admin/berita/' . $berita->id_berita . '/edit')->assertStatus(200);

        // 3. Update
        $response = $this->actingAs($this->admin)->put('/admin/berita/' . $berita->id_berita, [
            'judul' => 'Berita Kegiatan Test Updated',
            'isi' => 'Konten berita test kegiatan santri pondok updated.',
            'kategori' => 'Prestasi',
            'tanggal_publish' => '2026-08-10',
        ]);
        $response->assertRedirect(route('berita.index'));
        $this->assertDatabaseHas('berita', ['judul' => 'Berita Kegiatan Test Updated']);

        // 4. Delete
        $response = $this->actingAs($this->admin)->delete('/admin/berita/' . $berita->id_berita);
        $response->assertRedirect(route('berita.index'));
        $this->assertDatabaseMissing('berita', ['id_berita' => $berita->id_berita]);
    }

    public function test_qris_crud_operations()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('qris_test.jpg');
        $response = $this->actingAs($this->admin)->post('/admin/qris', [
            'nama_penerima' => 'Penerima Test',
            'gambar_qris' => $file,
            'aktif' => 1,
        ]);
        $response->assertRedirect(route('qris.index'));
        $this->assertDatabaseHas('qris', ['nama_penerima' => 'Penerima Test']);

        $qris = Qris::where('nama_penerima', 'Penerima Test')->first();
        $this->actingAs($this->admin)->get('/admin/qris/' . $qris->id_qris . '/edit')->assertStatus(200);

        $response = $this->actingAs($this->admin)->put('/admin/qris/' . $qris->id_qris, [
            'nama_penerima' => 'Penerima Test Updated',
            'aktif' => 0,
        ]);
        $response->assertRedirect(route('qris.index'));
        $this->assertDatabaseHas('qris', ['nama_penerima' => 'Penerima Test Updated', 'aktif' => 0]);

        $response = $this->actingAs($this->admin)->delete('/admin/qris/' . $qris->id_qris);
        $response->assertRedirect(route('qris.index'));
        $this->assertDatabaseMissing('qris', ['id_qris' => $qris->id_qris]);
    }

    public function test_galeri_crud_operations()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('galeri_test.jpg');
        $response = $this->actingAs($this->admin)->post('/admin/galeri-admin', [
            'judul' => 'Foto Kegiatan Test',
            'tipe' => 'foto',
            'file_path' => $file,
            'deskripsi' => 'Deskripsi galeri test.',
        ]);
        $response->assertRedirect(route('galeri-admin.index'));
        $this->assertDatabaseHas('galeri', ['judul' => 'Foto Kegiatan Test']);

        $galeri = Galeri::where('judul', 'Foto Kegiatan Test')->first();
        $this->actingAs($this->admin)->get('/admin/galeri-admin/' . $galeri->id_galeri . '/edit')->assertStatus(200);

        $response = $this->actingAs($this->admin)->put('/admin/galeri-admin/' . $galeri->id_galeri, [
            'judul' => 'Foto Kegiatan Test Updated',
            'tipe' => 'foto',
            'deskripsi' => 'Deskripsi galeri test updated.',
        ]);
        $response->assertRedirect(route('galeri-admin.index'));
        $this->assertDatabaseHas('galeri', ['judul' => 'Foto Kegiatan Test Updated']);

        $response = $this->actingAs($this->admin)->delete('/admin/galeri-admin/' . $galeri->id_galeri);
        $response->assertRedirect(route('galeri-admin.index'));
        $this->assertDatabaseMissing('galeri', ['id_galeri' => $galeri->id_galeri]);
    }

    public function test_kontak_update_operation()
    {
        $kontak = Kontak::first();
        if ($kontak) {
            $response = $this->actingAs($this->admin)->put('/admin/kontak-admin/' . $kontak->id_kontak, [
                'alamat' => 'Jl. Baru Test Boyolali',
                'whatsapp' => '081234567890',
                'email' => $kontak->email,
                'facebook' => 'pptqsyaukani',
                'instagram' => 'pptqsyaukani',
                'youtube' => 'pptqsyaukani',
                'telepon' => '081234567890',
                'maps_embed' => '<iframe src="https://maps.google.com"></iframe>',
            ]);
            $response->assertRedirect(route('kontak-admin.index'));
            $this->assertDatabaseHas('kontak', ['alamat' => 'Jl. Baru Test Boyolali']);
        }
    }
}
