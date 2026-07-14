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
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
      <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-primary-accent text-primary flex items-center justify-center text-2xl select-none">📩</div>
        <div>
          <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">{{ $totalPendaftar ?? 0 }}</h3>
          <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1">Pendaftar PPDB</p>
        </div>
      </div>
      <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-primary-accent text-primary flex items-center justify-center text-2xl select-none">📰</div>
        <div>
          <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">{{ $totalBerita ?? 0 }}</h3>
          <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1">Total Berita</p>
        </div>
      </div>
      <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-primary-accent text-primary flex items-center justify-center text-2xl select-none">🖼️</div>
        <div>
          <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">{{ $totalGaleri ?? 0 }}</h3>
          <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1">Total Foto Galeri</p>
        </div>
      </div>
      <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-primary-accent text-primary flex items-center justify-center text-2xl select-none">💰</div>
        <div>
          <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">{{ $statusQris ?? 'Tidak Aktif' }}</h3>
          <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1">Status QRIS</p>
        </div>
      </div>
    </div>
  </section>
@endsection
