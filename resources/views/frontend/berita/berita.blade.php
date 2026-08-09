@extends('frontend.layouts.app', ['activePage' => 'news'])

@section('title', 'Berita & Artikel – PPTQ Imam Syaukani')
@section('meta_description', 'Kabar terbaru, pengumuman, dan artikel Islami dari lingkungan Pondok Pesantren.')

@section('content')
  @php use Illuminate\Support\Str; @endphp

  <!-- PAGE HEADER -->
  <div class="bg-gradient-to-br from-primary-dark to-primary py-16 text-center text-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-outfit text-white mb-2.5">
        Berita & Artikel
      </h1>
      <p class="text-white/85 text-sm sm:text-base">
        Kabar terbaru, pengumuman, dan artikel Islami dari lingkungan Pondok Pesantren.
      </p>
      <div class="flex items-center justify-center gap-2 mt-4.5 text-xs sm:text-sm">
        <a href="{{ route('home') }}" class="text-white/70 hover:text-accent transition-colors">Home</a>
        <span class="text-white/40">›</span>
        <span class="text-white font-medium">Berita</span>
      </div>
    </div>
  </div>

  <!-- MAIN NEWS LAYOUT -->
  <section class="py-20 bg-white">
    <div class="max-w-[1200px] mx-auto px-6 grid grid-cols-1 lg:grid-cols-[1fr_340px] gap-10">
      <!-- Left side: News Grid -->
      <div class="flex flex-col gap-8">
        @forelse($beritas as $berita)
          <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-200 grid grid-cols-1 md:grid-cols-[320px_1fr] transition-all duration-300 hover:shadow-md hover:border-primary-light">
            <div class="h-60 md:h-full bg-slate-100 overflow-hidden">
              @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover" />
              @else
                <div class="h-full flex items-center justify-center text-5xl text-slate-400">📰</div>
              @endif
            </div>
            <div class="p-6 sm:p-8 flex flex-col justify-between items-start">
              <div>
                <div class="flex gap-4 text-xs font-semibold text-slate-500 mb-2.5">
                  <span class="flex items-center gap-1">📅 {{ optional($berita->tanggal_publish)->format('d M Y') }}</span>
                  <span class="flex items-center gap-1">🏷️ {{ $berita->kategori ?? 'Berita' }}</span>
                </div>
                <h3 class="text-lg sm:text-xl font-bold font-outfit text-primary mb-3 leading-tight">
                  {{ $berita->judul }}
                </h3>
                <p class="text-slate-600 text-sm mb-5 leading-relaxed">
                  {{ Str::limit(strip_tags($berita->isi), 140) }}
                </p>
              </div>
              <a href="{{ route('berita.detail', $berita->slug) }}" class="inline-flex items-center justify-center px-4 py-2 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all">
                Baca Selengkapnya
              </a>
            </div>
          </div>
        @empty
          <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-8 text-center">
            <p class="text-slate-600">Belum ada berita untuk ditampilkan saat ini.</p>
          </div>
        @endforelse

        <div class="mt-10">
          {{ $beritas->links() }}
        </div>
      </div>

      <!-- Right side: Sidebar -->
      <div class="flex flex-col gap-8 w-full">
        <!-- Widget 1: Search -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm">
          <h4 class="text-base font-bold font-outfit text-primary mb-5 relative pb-2.5 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-[3px] after:bg-accent">
            Pencarian
          </h4>
          <form class="flex bg-slate-50 border border-slate-200 rounded-full p-1" onsubmit="event.preventDefault();">
            <input type="text" placeholder="Cari berita..." class="flex-1 bg-transparent px-4 py-2.5 text-sm text-slate-700 focus:outline-none" />
            <button type="submit" class="bg-primary text-white w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0 text-sm select-none">🔍</button>
          </form>
        </div>

        <!-- Widget 2: Popular -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm">
          <h4 class="text-base font-bold font-outfit text-primary mb-5 relative pb-2.5 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-[3px] after:bg-accent">
            Berita Terpopuler
          </h4>
          <ul class="space-y-4">
            @forelse($popularBeritas as $popular)
              <li class="border-b border-slate-100 pb-3.5 last:border-none last:pb-0">
                <a href="{{ route('berita.detail', $popular->slug) }}" class="block">
                  <h5 class="text-xs sm:text-sm font-bold font-outfit text-slate-800 hover:text-primary leading-tight transition-colors mb-1.5">
                    {{ Str::limit($popular->judul, 70) }}
                  </h5>
                  <span class="text-[10px] text-slate-400 font-semibold">{{ optional($popular->tanggal_publish)->format('d M Y') }}</span>
                </a>
              </li>
            @empty
              <li class="border-b border-slate-100 pb-3.5 last:border-none last:pb-0">
                <p class="text-slate-600 text-xs">Belum ada berita populer saat ini.</p>
              </li>
            @endforelse
          </ul>
        </div>

        <!-- Widget 3: Categories -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm">
          <h4 class="text-base font-bold font-outfit text-primary mb-5 relative pb-2.5 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-[3px] after:bg-accent">
            Kategori
          </h4>
          <ul class="space-y-3">
            <li>
              <a href="{{ route('berita') }}" class="text-xs font-semibold transition-colors {{ empty($selectedCategory) ? 'text-primary' : 'text-slate-600 hover:text-primary' }} flex items-center gap-1">› Semua Kategori</a>
            </li>
            @foreach($categories as $category)
              <li>
                <a href="{{ route('berita', ['category' => $category]) }}" class="text-xs font-semibold transition-colors {{ $selectedCategory === $category ? 'text-primary' : 'text-slate-600 hover:text-primary' }} flex items-center gap-1">› {{ $category }}</a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </section>
@endsection
