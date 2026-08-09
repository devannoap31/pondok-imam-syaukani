<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\ProfilePondok;
use App\Models\ProgramPendidikan;
use App\Models\Jadwal;
use App\Models\Donasi;
use App\Models\Qris;
use App\Models\Kontak;
use App\Models\Pendaftaran;
use App\Models\BerkasPendaftaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function home()
    {
        $beritas = Berita::latest()->take(3)->get();
        $galeris = Galeri::latest()->take(6)->get();
        $profil = ProfilePondok::first();
        return view('frontend.home.index', compact('beritas', 'galeris', 'profil'));
    }

    public function profil()
    {
        $profil = ProfilePondok::first();
        return view('frontend.profil.profil', compact('profil'));
    }

    public function galeri()
    {
        $galeris = Galeri::latest()->get();
        return view('frontend.galeri.galeri', compact('galeris'));
    }

    public function berita()
    {
        $selectedCategory = request()->query('category');
        $categories = Berita::whereNotNull('kategori')->select('kategori')->distinct()->pluck('kategori');

        $query = Berita::latest();
        if ($selectedCategory) {
            $query->where('kategori', $selectedCategory);
        }

        $beritas = $query->paginate(9)->withQueryString();
        $popularBeritas = Berita::latest()->take(3)->get();

        return view('frontend.berita.berita', compact('beritas', 'popularBeritas', 'categories', 'selectedCategory'));
    }

    public function beritaDetail(Berita $berita)
    {
        $recentBeritas = Berita::where('id_berita', '!=', $berita->id_berita)->latest()->take(3)->get();

        return view('frontend.berita.detail', compact('berita', 'recentBeritas'));
    }

    public function sekolah()
    {
        $programs = ProgramPendidikan::all();
        return view('frontend.sekolah.sekolah', compact('programs'));
    }

    public function jadwal()
    {
        $jadwals = Jadwal::all();
        return view('frontend.jadwal.jadwal', compact('jadwals'));
    }

    public function donasi()
    {
        $donasi = Donasi::first();
        $qris = Qris::where('aktif', true)->first();
        return view('frontend.donasi.donasi', compact('donasi', 'qris'));
    }

    public function lokasi()
    {
        $kontak = Kontak::first();
        return view('frontend.lokasi.lokasi', compact('kontak'));
    }

    public function daftar()
    {
        return view('frontend.daftar.daftar');
    }

    public function storeDaftar(Request $request)
    {
        $request->validate([
            'nama_lengkap'   => 'required|string|max:40',
            'tempat_lahir'   => 'required|string|max:40',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required|in:laki-laki,perempuan',
            'alamat'         => 'required|string',
            'nomor_hp'       => 'required|string|max:40',
            'nama_ortu'      => 'required|string|max:40',
            'pekerjaan_ortu' => 'required|string|max:40',
            'file_kk'        => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'file_akta'      => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'file_ijazah'    => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'nama_lengkap.required'   => 'Nama lengkap wajib diisi.',
            'tempat_lahir.required'   => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required'  => 'Tanggal lahir wajib diisi.',
            'jenis_kelamin.required'  => 'Jenis kelamin wajib dipilih.',
            'alamat.required'         => 'Alamat wajib diisi.',
            'nomor_hp.required'       => 'Nomor WhatsApp/HP wajib diisi.',
            'nama_ortu.required'      => 'Nama orang tua wajib diisi.',
            'pekerjaan_ortu.required' => 'Pekerjaan orang tua wajib diisi.',
            'file_kk.max'             => 'File KK maksimal 2MB.',
            'file_akta.max'           => 'File Akta maksimal 2MB.',
            'file_ijazah.max'         => 'File Ijazah maksimal 2MB.',
        ]);

        // Auto-generate Nomor Pendaftaran unik
        $nomorPendaftaran = 'REG-' . date('Ymd') . '-' . strtoupper(Str::random(4));
        while (Pendaftaran::where('nomor_pendaftaran', $nomorPendaftaran)->exists()) {
            $nomorPendaftaran = 'REG-' . date('Ymd') . '-' . strtoupper(Str::random(4));
        }

        // Simpan data pendaftaran
        $pendaftaran = Pendaftaran::create([
            'nomor_pendaftaran' => $nomorPendaftaran,
            'nama_lengkap'      => $request->nama_lengkap,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'alamat'            => $request->alamat,
            'nomor_hp'          => $request->nomor_hp,
            'nama_ortu'         => $request->nama_ortu,
            'pekerjaan_ortu'    => $request->pekerjaan_ortu,
            'status'            => 'Diverifikasi',
        ]);

        // Simpan upload berkas jika ada
        $berkasList = [
            'file_kk'     => 'Kartu Keluarga',
            'file_akta'   => 'Akta Kelahiran',
            'file_ijazah' => 'Ijazah / SKL',
        ];

        foreach ($berkasList as $inputKey => $jenisBerkas) {
            if ($request->hasFile($inputKey)) {
                $file = $request->file($inputKey);
                $filePath = $file->store('berkas_pendaftaran', 'public');

                BerkasPendaftaran::create([
                    'pendaftaran_id' => $pendaftaran->id_pendaftaran,
                    'jenis_berkas'   => $jenisBerkas,
                    'file_path'      => $filePath,
                ]);
            }
        }

        return redirect()->back()->with('registration_success', [
            'nomor' => $pendaftaran->nomor_pendaftaran,
            'nama'  => $pendaftaran->nama_lengkap,
        ]);
    }
}
