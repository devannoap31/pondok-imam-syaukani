<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Qris;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total data dari database
        $totalPendaftar = Pendaftaran::count();
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::where('tipe', 'foto')->count();
        
        // Mengecek status QRIS
        $qris = Qris::first();
        $statusQris = ($qris && $qris->aktif == 1) ? 'Aktif' : 'Tidak Aktif';

        // Mengirim data ke file view Blade (resources/views/admin/dashboard.blade.php)
        return view('admin.dashboard', compact('totalPendaftar', 'totalBerita', 'totalGaleri', 'statusQris'));
    }
}
