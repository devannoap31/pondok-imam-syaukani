@extends('frontend.layouts.app', ['activePage' => 'gallery'])

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
        @php
          $gradients = [
            'from-[#e8f5e9] to-[#a5d6a7]',
            'from-[#e3f2fd] to-[#90caf9]',
            'from-[#fff3e0] to-[#ffcc80]',
            'from-[#f3e5f5] to-[#ce93d8]',
            'from-[#fce4ec] to-[#f48fb1]',
            'from-[#e0f2f1] to-[#80cbc4]',
          ];
          $emojis = ['🕌', '🏢', '📖', '📚', '🥇', '🏆', '📸', '✨'];
        @endphp
        @forelse($galeris as $index => $galeri)
          @php
            $bgGrad = $gradients[$index % count($gradients)];
            $emoji = $emojis[$index % count($emojis)];
            $hasImage = $galeri->file_path && file_exists(public_path('storage/' . $galeri->file_path));
          @endphp
          <div class="gallery-card relative rounded-2xl overflow-hidden shadow-sm border border-slate-200 h-64 bg-slate-100 flex items-center justify-center text-5xl cursor-pointer transition-all duration-300 hover:scale-[1.03] hover:shadow-md bg-gradient-to-br {{ $bgGrad }}" data-category="{{ $galeri->tipe ?? 'foto' }}">
            @if($hasImage)
              <img src="{{ asset('storage/' . $galeri->file_path) }}" alt="{{ $galeri->judul }}" class="w-full h-full object-cover" />
            @else
              <span>{{ $emoji }}</span>
            @endif
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/85 via-black/50 to-transparent p-5 text-white text-left">
              <span class="inline-block text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded bg-accent/90 text-primary-dark mb-1">{{ ucfirst($galeri->tipe ?? 'Foto') }}</span>
              <h4 class="text-white text-base font-bold mb-0.5 font-outfit line-clamp-1">{{ $galeri->judul }}</h4>
              <p class="text-white/80 text-xs line-clamp-2">{{ $galeri->deskripsi }}</p>
            </div>
          </div>
        @empty
          <div class="col-span-full bg-slate-50 border border-slate-200 rounded-3xl p-12 text-center text-slate-500">
            <p class="text-base font-medium">Belum ada foto atau video dalam galeri.</p>
          </div>
        @endforelse
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
