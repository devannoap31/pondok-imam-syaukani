@extends('layouts.app', ['activePage' => 'schedule'])

@section('title', 'Kegiatan & Jadwal Santri – PPTQ Imam Syaukani')
@section('meta_description', 'Rincian program resmi harian pondok dalam membentuk santri yang berilmu, berwawasan, dan berakhlak mulia.')

@section('content')
  <!-- PAGE HEADER -->
  <div class="bg-gradient-to-br from-primary-dark to-primary py-16 text-center text-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-outfit text-white mb-2.5">
        Kegiatan & Jadwal Santri
      </h1>
      <p class="text-white/85 text-sm sm:text-base">
        Rincian program resmi harian pondok dalam membentuk santri yang berilmu, berwawasan, dan berakhlak mulia.
      </p>
      <div class="flex items-center justify-center gap-2 mt-4.5 text-xs sm:text-sm">
        <a href="index.blade.php" class="text-white/70 hover:text-accent transition-colors">Home</a>
        <span class="text-white/40">›</span>
        <span class="text-white font-medium">Jadwal</span>
      </div>
    </div>
  </div>

  <!-- MAIN DETAILS LAYOUT -->
  <section class="py-20 bg-white">
    <div class="max-w-[1200px] mx-auto px-6 grid grid-cols-1 lg:grid-cols-[1.8fr_1fr] gap-10 items-start">
      <!-- LEFT COLUMN: RINCIAN PROGRAM UTAMA -->
      @include('jadwal.program_details')
      
      <!-- RIGHT COLUMN: JADWAL HARIAN & INFORMASI SIDEBAR -->
      <div class="flex flex-col gap-6 w-full">
        @include('jadwal.harian')
        @include('jadwal.info')
      </div>
    </div>
  </section>
@endsection
