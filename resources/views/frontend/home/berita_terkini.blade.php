<!-- BERITA & ARTIKEL TERBARU SECTION -->
<section class="py-20 bg-slate-50 overflow-hidden" data-aos="fade-up" data-aos-duration="700">
  <div class="max-w-[1200px] mx-auto px-6">
    <!-- Section Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4 mb-12">
      <div>
        <div class="inline-block bg-primary-accent text-primary text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-3">
          Informasi & Kabar
        </div>
        <h2 class="text-3xl sm:text-4xl font-bold font-outfit text-primary">
          Berita & Kegiatan Terbaru
        </h2>
      </div>
      <a href="{{ url('/berita') }}" class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary hover:text-accent transition-colors">
        Lihat Semua Berita <span>→</span>
      </a>
    </div>

    <!-- Berita Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @forelse($beritas as $berita)
        <div class="bg-white rounded-3xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1.5 flex flex-col group">
          <!-- Thumbnail Image -->
          <div class="h-48 bg-slate-100 relative overflow-hidden flex items-center justify-center">
            @if($berita->gambar && file_exists(public_path('storage/' . $berita->gambar)))
              <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
            @else
              <div class="w-full h-full bg-gradient-to-br from-primary/10 to-primary/30 flex items-center justify-center text-4xl select-none">
                📰
              </div>
            @endif
            @if($berita->kategori)
              <span class="absolute top-4 left-4 bg-primary text-white text-[11px] font-bold px-3 py-1 rounded-full shadow-xs">
                {{ $berita->kategori }}
              </span>
            @endif
          </div>

          <!-- Body -->
          <div class="p-6 flex flex-col flex-1">
            <div class="text-xs text-slate-400 font-medium mb-2.5 flex items-center gap-2">
              <span>📅</span> {{ $berita->tanggal_publish ? \Carbon\Carbon::parse($berita->tanggal_publish)->translatedFormat('d F Y') : '-' }}
            </div>
            <h3 class="text-lg font-bold font-outfit text-slate-900 group-hover:text-primary transition-colors mb-3 line-clamp-2">
              <a href="{{ url('/berita/' . $berita->slug) }}">{{ $berita->judul }}</a>
            </h3>
            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mb-5 line-clamp-3 flex-1">
              {{ Str::limit(strip_tags($berita->isi), 120) }}
            </p>
            <a href="{{ url('/berita/' . $berita->slug) }}" class="text-xs sm:text-sm font-semibold text-primary inline-flex items-center gap-1 group-hover:gap-2 transition-all mt-auto">
              Baca Selengkapnya <span>→</span>
            </a>
          </div>
        </div>
      @empty
        <div class="col-span-full bg-white border border-slate-200 rounded-3xl p-12 text-center text-slate-500">
          <p class="text-base font-medium">Belum ada berita yang dipublikasikan.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>
