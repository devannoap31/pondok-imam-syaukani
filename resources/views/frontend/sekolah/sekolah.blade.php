@extends('frontend.layouts.app', ['activePage' => 'school'])

@section('title', 'Program & Pendidikan – PPTQ Imam Syaukani')
@section('meta_description', 'Sistem pendidikan yang terintegrasi, mencetak generasi ulama yang Tafaqquh Fiddin.')

@section('content')
  <!-- PAGE HEADER -->
  <div class="bg-gradient-to-br from-primary-dark to-primary py-16 text-center text-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-outfit text-white mb-2.5">
        Program & Pendidikan
      </h1>
      <p class="text-white/85 text-sm sm:text-base">
        Sistem pendidikan yang terintegrasi, mencetak generasi ulama yang Tafaqquh Fiddin.
      </p>
      <div class="flex items-center justify-center gap-2 mt-4.5 text-xs sm:text-sm">
        <a href="index.blade.php" class="text-white/70 hover:text-accent transition-colors">Home</a>
        <span class="text-white/40">›</span>
        <span class="text-white font-medium">Sekolah</span>
      </div>
    </div>
  </div>

  @include('frontend.sekolah.salaf_modern')
  @include('frontend.sekolah.program_unggulan')
  @include('frontend.sekolah.jenjang_list')

  <!-- CTA BANNER -->
  <section class="pb-20 bg-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <div class="bg-gradient-to-br from-primary-dark to-primary rounded-3xl p-10 md:p-14 text-center text-white relative overflow-hidden shadow-lg flex flex-col items-center">
        <h2 class="text-2xl sm:text-3xl font-bold font-outfit text-white mb-4">
          Siap Mendidik Putra-Putri Anda Menjadi Ulama?
        </h2>
        <p class="text-white/85 text-sm sm:text-base leading-relaxed mb-8 max-w-2xl mx-auto">
          Pendaftaran santri baru untuk jenjang MTs, MA, dan Takhossus telah dibuka. Kuota terbatas, terutama untuk program gratis bagi Yatim dan Dhuafa.
        </p>
        <a href="daftar.blade.php" class="inline-flex items-center justify-center px-6 py-3.5 bg-accent text-primary-dark rounded-full text-sm font-semibold shadow-sm hover:bg-accent-dark transition-all hover:-translate-y-0.5 hover:shadow-[0_4px_12px_rgba(255,170,0,0.4)]">
          Daftar Sekarang
        </a>
      </div>
    </div>
  </section>
@endsection
