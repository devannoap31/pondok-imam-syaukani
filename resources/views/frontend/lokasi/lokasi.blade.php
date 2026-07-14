@extends('frontend.layouts.app', ['activePage' => 'location'])

@section('title', 'Lokasi & Kontak – PPTQ Imam Syaukani')
@section('meta_description', 'Silakan hubungi kami atau kunjungi langsung pondok pesantren untuk bersilaturahmi dan melihat kegiatan santri.')

@section('content')
  <!-- PAGE HEADER -->
  <div class="bg-gradient-to-br from-primary-dark to-primary py-16 text-center text-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-outfit text-white mb-2.5">
        Lokasi & Kontak
      </h1>
      <p class="text-white/85 text-sm sm:text-base">
        Silakan hubungi kami atau kunjungi langsung pondok pesantren untuk bersilaturahmi dan melihat kegiatan santri.
      </p>
      <div class="flex items-center justify-center gap-2 mt-4.5 text-xs sm:text-sm">
        <a href="index.blade.php" class="text-white/70 hover:text-accent transition-colors">Home</a>
        <span class="text-white/40">›</span>
        <span class="text-white font-medium">Lokasi</span>
      </div>
    </div>
  </div>

  <!-- CONTACT & LOKASI CONTENT -->
  <section class="py-20 bg-white">
    <div class="max-w-[1200px] mx-auto px-6 grid grid-cols-1 lg:grid-cols-[1.2fr_1fr] gap-10 items-start">
      @include('frontend.lokasi.peta')
      @include('frontend.lokasi.kontak_form')
    </div>
  </section>
@endsection
