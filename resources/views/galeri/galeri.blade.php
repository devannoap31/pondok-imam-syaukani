@extends('layouts.app', ['activePage' => 'gallery'])

@section('title', 'Galeri Pesantren – PPTQ Imam Syaukani')
@section('meta_description', 'Momen berharga, kegiatan belajar, dan fasilitas di lingkungan Pondok Pesantren Tahfidzul Qur\'an Imam Syaukani.')

@section('content')
  <!-- PAGE HEADER -->
  <div class="bg-gradient-to-br from-primary-dark to-primary py-16 text-center text-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-outfit text-white mb-2.5">
        Galeri Pesantren
      </h1>
      <p class="text-white/85 text-sm sm:text-base">
        Momen berharga, kegiatan belajar, dan fasilitas di lingkungan Pondok Pesantren Tahfidzul Qur'an Imam Syaukani.
      </p>
      <div class="flex items-center justify-center gap-2 mt-4.5 text-xs sm:text-sm">
        <a href="index.blade.php" class="text-white/70 hover:text-accent transition-colors">Home</a>
        <span class="text-white/40">›</span>
        <span class="text-white font-medium">Galeri</span>
      </div>
    </div>
  </div>

  <!-- GALLERY SECTION -->
  <section class="py-20 bg-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <!-- Filters -->
      <div class="flex justify-center gap-3.5 mb-10 flex-wrap">
        <button class="filter-btn active px-5.5 py-2 rounded-full border border-slate-300 text-sm font-medium transition-all hover:bg-primary hover:text-white hover:border-primary cursor-pointer select-none [&.active]:bg-primary [&.active]:text-white [&.active]:border-primary" onclick="filterGallery('semua', this)">
          Semua
        </button>
        <button class="filter-btn px-5.5 py-2 rounded-full border border-slate-300 text-sm font-medium transition-all hover:bg-primary hover:text-white hover:border-primary cursor-pointer select-none [&.active]:bg-primary [&.active]:text-white [&.active]:border-primary" onclick="filterGallery('fasilitas', this)">
          Fasilitas
        </button>
        <button class="filter-btn px-5.5 py-2 rounded-full border border-slate-300 text-sm font-medium transition-all hover:bg-primary hover:text-white hover:border-primary cursor-pointer select-none [&.active]:bg-primary [&.active]:text-white [&.active]:border-primary" onclick="filterGallery('kegiatan', this)">
          Kegiatan Santri
        </button>
        <button class="filter-btn px-5.5 py-2 rounded-full border border-slate-300 text-sm font-medium transition-all hover:bg-primary hover:text-white hover:border-primary cursor-pointer select-none [&.active]:bg-primary [&.active]:text-white [&.active]:border-primary" onclick="filterGallery('prestasi', this)">
          Prestasi
        </button>
      </div>

      <!-- Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="galleryGrid">
        <!-- Item 1 -->
        <div class="gallery-card relative rounded-2xl overflow-hidden shadow-sm border border-slate-200 h-64 bg-slate-100 flex items-center justify-center text-5xl cursor-pointer transition-all duration-300 hover:scale-[1.03] hover:shadow-md bg-gradient-to-br from-[#e8f5e9] to-[#a5d6a7]" data-category="fasilitas">
          🕌
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-5 text-white text-left">
            <h4 class="text-white text-base font-bold mb-1 font-outfit">Masjid Baiatur Ridwan</h4>
            <p class="text-white/80 text-xs">Fasilitas utama ibadah dan kajian santri</p>
          </div>
        </div>

        <!-- Item 2 -->
        <div class="gallery-card relative rounded-2xl overflow-hidden shadow-sm border border-slate-200 h-64 bg-slate-100 flex items-center justify-center text-5xl cursor-pointer transition-all duration-300 hover:scale-[1.03] hover:shadow-md bg-gradient-to-br from-[#e3f2fd] to-[#90caf9]" data-category="fasilitas">
          🏢
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-5 text-white text-left">
            <h4 class="text-white text-base font-bold mb-1 font-outfit">Asrama Abu Bakar & Umar</h4>
            <p class="text-white/80 text-xs">Kamar hunian santri yang bersih dan rapi</p>
          </div>
        </div>

        <!-- Item 3 -->
        <div class="gallery-card relative rounded-2xl overflow-hidden shadow-sm border border-slate-200 h-64 bg-slate-100 flex items-center justify-center text-5xl cursor-pointer transition-all duration-300 hover:scale-[1.03] hover:shadow-md bg-gradient-to-br from-[#fff3e0] to-[#ffcc80]" data-category="kegiatan">
          📖
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-5 text-white text-left">
            <h4 class="text-white text-base font-bold mb-1 font-outfit">Setoran Hafalan Al-Qur’an</h4>
            <p class="text-white/80 text-xs">Setoran hafalan baru harian ba'da subuh</p>
          </div>
        </div>

        <!-- Item 4 -->
        <div class="gallery-card relative rounded-2xl overflow-hidden shadow-sm border border-slate-200 h-64 bg-slate-100 flex items-center justify-center text-5xl cursor-pointer transition-all duration-300 hover:scale-[1.03] hover:shadow-md bg-gradient-to-br from-[#f3e5f5] to-[#ce93d8]" data-category="kegiatan">
          📚
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-5 text-white text-left">
            <h4 class="text-white text-base font-bold mb-1 font-outfit">Belajar Kitab Turast</h4>
            <p class="text-white/80 text-xs">Kegiatan pengkajian kitab kuning dan keilmuan salaf</p>
          </div>
        </div>

        <!-- Item 5 -->
        <div class="gallery-card relative rounded-2xl overflow-hidden shadow-sm border border-slate-200 h-64 bg-slate-100 flex items-center justify-center text-5xl cursor-pointer transition-all duration-300 hover:scale-[1.03] hover:shadow-md bg-gradient-to-br from-[#fce4ec] to-[#f48fb1]" data-category="prestasi">
          🥇
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-5 text-white text-left">
            <h4 class="text-white text-base font-bold mb-1 font-outfit">Lomba BTQ</h4>
            <p class="text-white/80 text-xs">Santri berprestasi dalam Lomba Baca Tulis Al-Qur’an</p>
          </div>
        </div>

        <!-- Item 6 -->
        <div class="gallery-card relative rounded-2xl overflow-hidden shadow-sm border border-slate-200 h-64 bg-slate-100 flex items-center justify-center text-5xl cursor-pointer transition-all duration-300 hover:scale-[1.03] hover:shadow-md bg-gradient-to-br from-[#e0f2f1] to-[#80cbc4]" data-category="prestasi">
          🏆
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-5 text-white text-left">
            <h4 class="text-white text-base font-bold mb-1 font-outfit">Juara 1 Pidato Bahasa Arab</h4>
            <p class="text-white/80 text-xs">Prestasi nasional Festival Bahasa Arab</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    function filterGallery(category, buttonEl) {
      // Remove active from all buttons
      document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
      
      // Set active to clicked button
      if (buttonEl) {
        buttonEl.classList.add('active');
      } else {
        event.target.classList.add('active');
      }

      // Filter grid cards
      const cards = document.querySelectorAll('.gallery-card');
      cards.forEach(card => {
        if (category === 'semua' || card.getAttribute('data-category') === category) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    }
  </script>
@endsection
