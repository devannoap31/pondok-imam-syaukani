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
        $beritas = Berita::latest()->paginate(9);
        return view('frontend.berita.berita', compact('beritas'));
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
}
