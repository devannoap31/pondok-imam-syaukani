<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ==========================================
// ROUTE PENGUNJUNG PUBLIK (FRONTEND TEAM)
// ==========================================
Route::get('/', function () { return view('home'); }); 
Route::get('/profil', function () { return view('profil'); }); 
Route::get('/galeri', function () { return view('galeri'); }); 
// (Tim Frontend bisa menambahkan route halaman publik lainnya di sini)

// ==========================================
// ROUTE ADMIN (BACKEND TEAM) - WAJIB LOGIN
// ==========================================
Route::middleware(['auth','verified'])->prefix('admin')->group(function () {
    
    // Halaman Utama Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // --- AREA KERJA AHMAD (Modul Informasi & Konten) ---
    // Route::resource('berita', BeritaController::class);
    // Route::resource('jadwal', JadwalController::class);
    // Route::resource('profil-pondok', ProfilePondokController::class);
    // Route::resource('program-pendidikan', ProgramPendidikanController::class);
    
    // --- AREA KERJA RYAN (Modul Transaksional & Validasi) ---
    // Route::resource('pendaftaran', PendaftaranController::class);
    // Route::resource('donasi', DonasiController::class);
    // Route::resource('qris', QrisController::class);
    // Route::resource('galeri-admin', GaleriController::class);
    // Route::resource('kontak-admin', KontakController::class);

});

// ==========================================
// ROUTE BAWAAN LARAVEL BREEZE (Jangan Dihapus)
// ==========================================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
