<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\ProfilePondokController;
use App\Http\Controllers\Admin\ProgramPendidikanController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\DonasiController;
use App\Http\Controllers\Admin\QrisController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\StatusPendaftaranController;
use Illuminate\Support\Facades\Route;

// ==========================================
// LANGUAGE SWITCHER
// ==========================================
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])
    ->name('lang.switch')
    ->where('locale', 'id|en');

// ==========================================
// ROUTE PENGUNJUNG PUBLIK (FRONTEND TEAM)
// ==========================================
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/profil', [FrontendController::class, 'profil'])->name('profil');
Route::get('/galeri', [FrontendController::class, 'galeri'])->name('galeri');
Route::get('/berita', [FrontendController::class, 'berita'])->name('berita');
Route::get('/berita/{berita:slug}', [FrontendController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/sekolah', [FrontendController::class, 'sekolah'])->name('sekolah');
Route::get('/jadwal', [FrontendController::class, 'jadwal'])->name('jadwal');
Route::get('/donasi', [FrontendController::class, 'donasi'])->name('donasi');
Route::get('/lokasi', [FrontendController::class, 'lokasi'])->name('lokasi');
Route::get('/daftar', [FrontendController::class, 'daftar'])->name('daftar');
Route::post('/daftar', [FrontendController::class, 'storeDaftar'])->name('daftar.store');
Route::post('/kontak/kirim', [FrontendController::class, 'sendContactMessage'])->name('kontak.send');

// Status Pendaftaran (Cek kode registrasi)
Route::get('/cek-status', [StatusPendaftaranController::class, 'show'])->name('status-pendaftaran.show');
Route::post('/cek-status', [StatusPendaftaranController::class, 'check'])->name('status-pendaftaran.check');

// ==========================================
// ROUTE ADMIN (BACKEND TEAM) - WAJIB LOGIN
// ==========================================
Route::middleware(['auth', 'verified'])->group(function () {
    Route::redirect('/dashboard', '/admin/dashboard');

    Route::prefix('admin')->group(function () {
        // Halaman Utama Dashboard Admin
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // --- AREA KERJA AHMAD (Modul Informasi & Konten) ---
        Route::resource('berita', BeritaController::class);
        Route::resource('jadwal', JadwalController::class);
        Route::resource('profil-pondok', ProfilePondokController::class);
        Route::resource('program-pendidikan', ProgramPendidikanController::class);

        // --- AREA KERJA RYAN (Modul Transaksional & Validasi) ---
        Route::resource('pendaftaran', PendaftaranController::class, [
            'only' => ['create', 'store', 'edit', 'update', 'destroy']
        ]);
        Route::put('/pendaftaran/{pendaftaran}/status', [PendaftaranController::class, 'updateStatus'])->name('pendaftaran.updateStatus');
        Route::resource('donasi', DonasiController::class);
        Route::resource('qris', QrisController::class);
        Route::resource('galeri-admin', GaleriController::class);
        Route::resource('kontak-admin', KontakController::class);
    });

    // User & Admin dapat melihat informasi PPDB
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
    Route::get('/pendaftaran/{pendaftaran}', [PendaftaranController::class, 'show'])->name('pendaftaran.show');
});;

// ==========================================
// ROUTE BAWAAN LARAVEL BREEZE (Jangan Dihapus)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
