@extends('admin.layouts.app')

@section('title', 'Dashboard Admin – PPTQ Imam Syaukani')

@section('content')
  <!-- SECTION: OVERVIEW -->
  <section class="admin-content-section active block" id="dashboardOverview">
    <div class="bg-gradient-to-br from-primary to-primary-light text-white p-6 sm:p-8 rounded-3xl mb-8 border-none shadow-sm flex flex-col items-start">
      <h3 class="text-white text-xl sm:text-2xl font-bold font-outfit mb-2">Selamat Datang di Dashboard Admin</h3>
      <p class="text-white/85 text-xs sm:text-sm leading-relaxed max-w-2xl">
        Anda memiliki akses penuh untuk mengelola konten website, data pendaftar (PPDB), dan informasi pondok pesantren. Pilih menu di samping untuk mulai mengelola.
      </p>
    </div>

    <!-- STATS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
      <!-- STAT 1: PPDB -->
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-center gap-4 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-md hover:border-emerald-500/30 group">
        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-primary flex items-center justify-center shrink-0 transition-transform duration-300 group-hover:scale-110">
          <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>
        <div class="min-w-0 flex-1">
          <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">{{ $totalPendaftar ?? 0 }}</h3>
          <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1 truncate">Pendaftar PPDB</p>
        </div>
      </div>

      <!-- STAT 2: BERITA -->
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-center gap-4 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-md hover:border-emerald-500/30 group">
        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-primary flex items-center justify-center shrink-0 transition-transform duration-300 group-hover:scale-110">
          <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
        </div>
        <div class="min-w-0 flex-1">
          <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">{{ $totalBerita ?? 0 }}</h3>
          <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1 truncate">Total Berita</p>
        </div>
      </div>

      <!-- STAT 3: GALERI -->
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-center gap-4 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-md hover:border-emerald-500/30 group">
        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-primary flex items-center justify-center shrink-0 transition-transform duration-300 group-hover:scale-110">
          <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        </div>
        <div class="min-w-0 flex-1">
          <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">{{ $totalGaleri ?? 0 }}</h3>
          <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1 truncate">Total Foto Galeri</p>
        </div>
      </div>

      <!-- STAT 4: QRIS -->
      <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-xs flex items-center gap-4 transition-all duration-300 ease-out hover:-translate-y-1 hover:shadow-md hover:border-emerald-500/30 group">
        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-primary flex items-center justify-center shrink-0 transition-transform duration-300 group-hover:scale-110">
          <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>
        <div class="min-w-0 flex-1">
          <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">{{ $statusQris ?? 'Tidak Aktif' }}</h3>
          <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1 truncate">Status QRIS</p>
        </div>
      </div>
    </div>
  </section>
@endsection
