@extends('frontend.layouts.app', ['activePage' => 'news'])

@php use Illuminate\Support\Str; @endphp

@section('title', $berita->judul . ' – PPTQ Imam Syaukani')
@section('meta_description', Str::limit(strip_tags($berita->isi), 160))

@section('content')
  <!-- HERO HEADER SECTION -->
  <section class="relative bg-gradient-to-br from-primary-dark via-primary to-[#0f3d26] py-14 sm:py-20 text-white overflow-hidden">
    <!-- Decorative Background Elements -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
      <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-accent/10 blur-3xl pulse-glow"></div>
      <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-emerald-400/10 blur-3xl pulse-glow" style="animation-delay: 2s;"></div>
      <div class="absolute inset-0 bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:24px_24px] opacity-5"></div>
    </div>

    <div class="max-w-[1250px] mx-auto px-4 sm:px-6 relative z-10">
      <!-- Breadcrumb & Back Navigation -->
      <div class="flex flex-wrap items-center justify-between gap-4 mb-8" data-aos="fade-down">
        <a href="{{ route('berita') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-white/20 text-white backdrop-blur-md rounded-full text-xs sm:text-sm font-medium transition-all hover:-translate-x-1 shadow-sm border border-white/10">
          <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
          </svg>
          Kembali ke Berita
        </a>

        <div class="flex items-center gap-2 text-xs text-white/70">
          <a href="{{ route('home') }}" class="hover:text-accent transition-colors">Home</a>
          <span class="text-white/40">›</span>
          <a href="{{ route('berita') }}" class="hover:text-accent transition-colors">Berita</a>
          <span class="text-white/40">›</span>
          <span class="text-white font-semibold truncate max-w-[180px] sm:max-w-none">{{ Str::limit($berita->judul, 30) }}</span>
        </div>
      </div>

      <!-- Main Header Content -->
      <div class="max-w-4xl" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-accent/20 border border-accent/40 text-accent text-xs font-bold uppercase tracking-wider mb-4 shadow-sm backdrop-blur-sm">
          <span>🏷️</span> {{ $berita->kategori ?? 'Berita' }}
        </div>

        <h1 class="text-2xl sm:text-4xl md:text-5xl font-black font-outfit text-white leading-tight tracking-tight mb-6">
          {{ $berita->judul }}
        </h1>

        <div class="flex flex-wrap items-center gap-4 text-xs sm:text-sm text-white/80">
          <div class="flex items-center gap-1.5 bg-white/10 px-3 py-1.5 rounded-full border border-white/10 backdrop-blur-sm">
            <span>📅</span>
            <span>{{ optional($berita->tanggal_publish)->format('d F Y') }}</span>
          </div>
          <div class="flex items-center gap-1.5 bg-white/10 px-3 py-1.5 rounded-full border border-white/10 backdrop-blur-sm">
            <span>✍️</span>
            <span>Oleh Admin Pondok</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MAIN ARTICLE SECTION -->
  <section class="py-12 sm:py-16 bg-slate-50 relative">
    <div class="max-w-[1250px] mx-auto px-4 sm:px-6">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

        <!-- LEFT COLUMN: Article Content -->
        <article class="lg:col-span-8 space-y-8">
          <div class="bg-white rounded-3xl p-5 sm:p-8 border border-slate-200/80 shadow-sm overflow-hidden" data-aos="fade-up">
            
            <!-- Featured Image Container (Contained & Non-overflowing) -->
            @if($berita->gambar)
              <div class="w-full rounded-2xl overflow-hidden mb-8 border border-slate-100 bg-slate-900/5 relative flex items-center justify-center min-h-[240px] max-h-[480px]">
                <!-- Subtle Blurred Backdrop for aesthetics -->
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="" class="absolute inset-0 w-full h-full object-cover blur-2xl opacity-20 select-none pointer-events-none" aria-hidden="true" />
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="relative z-10 w-auto h-auto max-h-[480px] max-w-full object-contain mx-auto" />
              </div>
            @endif

            <!-- Article Body -->
            <div class="prose prose-slate max-w-none break-words text-slate-700 leading-relaxed text-base sm:text-lg">
              {!! nl2br(e($berita->isi)) !!}
            </div>

            <!-- Share & Footer Actions -->
            <div class="mt-10 pt-6 border-t border-slate-100 flex flex-wrap items-center justify-between gap-4">
              <div class="flex items-center gap-2">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Kategori:</span>
                <a href="{{ route('berita', ['category' => $berita->kategori]) }}" class="text-xs font-bold px-3 py-1 bg-emerald-50 text-emerald-800 rounded-full border border-emerald-200 hover:bg-emerald-100 transition-colors">
                  {{ $berita->kategori ?? 'Umum' }}
                </a>
              </div>

              <div class="flex items-center gap-2">
                <button type="button" onclick="shareNewsPage()" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold rounded-full transition-all">
                  <span>🔗</span> Bagikan Berita
                </button>
                @php
                  $shareUrl = rawurlencode(request()->fullUrl());
                  $shareText = rawurlencode($berita->judul . "\n\nBaca selengkapnya di: ");
                @endphp
                <a href="https://api.whatsapp.com/send?text={{ $shareText . $shareUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold rounded-full shadow-sm transition-all">
                  <span>💬</span> WhatsApp
                </a>
              </div>
            </div>

          </div>
        </article>

        <!-- RIGHT COLUMN: Sidebar -->
        <aside class="lg:col-span-4 space-y-6 lg:sticky lg:top-24">
          
          <!-- Recent News Widget -->
          <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-sm" data-aos="fade-left">
            <h3 class="text-lg font-bold font-outfit text-primary mb-5 relative pb-2.5 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-[3px] after:bg-accent">
              Berita Terbaru
            </h3>
            
            <div class="space-y-4">
              @forelse($recentBeritas as $recent)
                <a href="{{ route('berita.detail', $recent->slug) }}" class="group flex items-start gap-3.5 pb-4 border-b border-slate-100 last:border-none last:pb-0">
                  <div class="w-16 h-16 rounded-xl bg-slate-100 flex-shrink-0 overflow-hidden relative border border-slate-100">
                    @if($recent->gambar)
                      <img src="{{ asset('storage/' . $recent->gambar) }}" alt="{{ $recent->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                    @else
                      <div class="w-full h-full flex items-center justify-center text-xl text-slate-400">📰</div>
                    @endif
                  </div>
                  <div class="flex-1 min-w-0">
                    <h4 class="text-xs sm:text-sm font-bold font-outfit text-slate-800 group-hover:text-primary transition-colors line-clamp-2 leading-snug">
                      {{ $recent->judul }}
                    </h4>
                    <span class="text-[11px] text-slate-400 font-medium mt-1 block">
                      📅 {{ optional($recent->tanggal_publish)->format('d M Y') }}
                    </span>
                  </div>
                </a>
              @empty
                <p class="text-xs text-slate-500">Tidak ada berita lain saat ini.</p>
              @endforelse
            </div>
          </div>

          <!-- Categories Widget -->
          @if(isset($categories) && $categories->count() > 0)
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-sm" data-aos="fade-left" data-aos-delay="50">
              <h3 class="text-lg font-bold font-outfit text-primary mb-4 relative pb-2.5 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-[3px] after:bg-accent">
                Kategori Berita
              </h3>
              <div class="flex flex-wrap gap-2">
                <a href="{{ route('berita') }}" class="px-3 py-1.5 rounded-full text-xs font-semibold bg-slate-100 hover:bg-primary hover:text-white text-slate-700 transition-all">
                  Semua
                </a>
                @foreach($categories as $cat)
                  <a href="{{ route('berita', ['category' => $cat]) }}" class="px-3 py-1.5 rounded-full text-xs font-semibold bg-slate-100 hover:bg-primary hover:text-white text-slate-700 transition-all">
                    {{ $cat }}
                  </a>
                @endforeach
              </div>
            </div>
          @endif

          <!-- PPDB Promo Banner Sidebar -->
          <div class="bg-gradient-to-br from-primary-dark to-primary rounded-3xl p-6 text-white shadow-lg relative overflow-hidden" data-aos="fade-left" data-aos-delay="100">
            <div class="absolute -right-8 -bottom-8 w-28 h-28 bg-accent/20 rounded-full blur-xl pointer-events-none"></div>
            <span class="text-accent text-[11px] font-bold uppercase tracking-wider block mb-1">Penerimaan Santri Baru</span>
            <h4 class="text-lg font-bold font-outfit text-white mb-2">Daftar Santri Baru Sekarang</h4>
            <p class="text-xs text-white/80 mb-5 leading-relaxed">
              Daftarkan putra/putri Anda secara online dengan mudah dan cepat.
            </p>
            <a href="{{ route('daftar') }}" class="ripple-btn inline-flex items-center justify-center w-full px-4 py-3 bg-accent text-primary-dark font-extrabold rounded-xl text-xs uppercase tracking-wider hover:bg-accent-dark transition-all shadow-md">
              Daftar Online →
            </a>
          </div>

        </aside>

      </div>
    </div>
  </section>

  @push('scripts')
    <script>
      function shareNewsPage() {
        const title = "{{ e($berita->judul) }} - PPTQ Imam Syaukani";
        const url = window.location.href;

        if (navigator.share) {
          navigator.share({
            title: title,
            url: url
          }).catch(() => {});
        } else {
          navigator.clipboard.writeText(url).then(() => {
            if (typeof Swal !== 'undefined') {
              Swal.fire({
                icon: 'success',
                title: 'Tautan Tersalin!',
                text: 'Link berita telah disalin ke clipboard.',
                timer: 2000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
                background: '#0B3322',
                color: '#ffffff',
                iconColor: '#FFAA00'
              });
            } else {
              alert('Link berita berhasil disalin ke clipboard!');
            }
          });
        }
      }
    </script>
  @endpush
@endsection
