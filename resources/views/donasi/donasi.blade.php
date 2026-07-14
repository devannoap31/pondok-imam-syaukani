@extends('layouts.app', ['activePage' => 'donation'])

@section('title', 'Donasi & Wakaf – PPTQ Imam Syaukani')
@section('meta_description', 'Salurkan donasi Anda untuk mendukung dakwah, pembangunan, dan operasional santri yatim/dhuafa di PPTQ Imam Syaukani.')

@section('content')
  <!-- PAGE HEADER -->
  <div class="bg-gradient-to-br from-primary-dark to-primary py-16 text-center text-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-outfit text-white mb-2.5">
        Donasi & Wakaf
      </h1>
      <p class="text-white/85 text-sm sm:text-base">
        Salurkan donasi Anda untuk mendukung dakwah, pembangunan, dan operasional santri yatim/dhuafa di PPTQ Imam Syaukani.
      </p>
      <div class="flex items-center justify-center gap-2 mt-4.5 text-xs sm:text-sm">
        <a href="index.blade.php" class="text-white/70 hover:text-accent transition-colors">Home</a>
        <span class="text-white/40">›</span>
        <span class="text-white font-medium">Donasi</span>
      </div>
    </div>
  </div>

  <!-- DONASI LAYOUT -->
  <section class="py-20 bg-white">
    <div class="max-w-[1200px] mx-auto px-6 grid grid-cols-1 lg:grid-cols-[1.2fr_1fr] gap-10 items-start">
      @include('donasi.metode')
      @include('donasi.alokasi')
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    function copyAccount() {
      const num = document.getElementById('accountNum').innerText;
      navigator.clipboard.writeText(num).then(() => {
        alert('Nomor rekening berhasil disalin!');
      }).catch(err => {
        console.error('Error copying text: ', err);
      });
    }
  </script>
@endsection
