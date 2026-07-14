@extends('frontend.layouts.app', ['activePage' => 'profile'])

@section('title', 'Profil Pesantren – PPTQ Imam Syaukani')
@section('meta_description', 'Mengenal lebih dekat sejarah, visi, misi, serta fasilitas PPTQ Imam Syaukani.')

@section('content')
  <!-- PAGE HEADER -->
  <div class="bg-gradient-to-br from-primary-dark to-primary py-16 text-center text-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-outfit text-white mb-2.5">
        Profile Pesantren
      </h1>
      <p class="text-white/85 text-sm sm:text-base">
        Mengenal lebih dekat sejarah, visi, misi, serta fasilitas PPTQ Imam Syaukani.
      </p>
      <div class="flex items-center justify-center gap-2 mt-4.5 text-xs sm:text-sm">
        <a href="index.blade.php" class="text-white/70 hover:text-accent transition-colors">Home</a>
        <span class="text-white/40">›</span>
        <span class="text-white font-medium">Profile</span>
      </div>
    </div>
  </div>

  @include('frontend.profil.sejarah')
  @include('frontend.profil.visi_misi')
  @include('frontend.profil.pimpinan')
  @include('frontend.profil.stats_table')
@endsection
