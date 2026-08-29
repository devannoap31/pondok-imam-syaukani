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
          <!-- Article Meta Bar -->
          @php
            $wordCount = str_word_count(strip_tags($berita->isi));
            $readingTime = ceil($wordCount / 200);
          @endphp
          <div class="flex flex-wrap items-center gap-3 text-xs sm:text-sm text-slate-600">
            <div class="flex items-center gap-2 px-3 py-1.5 bg-white rounded-full border border-slate-200 shadow-sm">
              <span class="text-sm">📖</span>
              <span class="font-medium">{{ $readingTime }} menit baca</span>
            </div>
            <div class="flex items-center gap-2 px-3 py-1.5 bg-white rounded-full border border-slate-200 shadow-sm">
              <span class="text-sm">📊</span>
              <span class="font-medium">{{ $wordCount }} kata</span>
            </div>
          </div>

          <!-- Main Article Card -->
          <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-sm overflow-hidden" data-aos="fade-up">
            
            <!-- Featured Image Container -->
            @if($berita->gambar)
              <figure class="mb-10 -mx-6 sm:-mx-10">
                <div class="relative w-full bg-gradient-to-br from-slate-100 to-slate-200 aspect-video sm:aspect-[16/9] overflow-hidden rounded-2xl sm:rounded-3xl">
                  <img 
                    src="{{ asset('storage/' . $berita->gambar) }}" 
                    alt="{{ $berita->judul }}" 
                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-700" 
                    loading="lazy"
                  />
                  <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent pointer-events-none"></div>
                </div>
                <figcaption class="mt-3 text-center text-xs text-slate-500 font-medium px-6 sm:px-10">{{ $berita->judul }}</figcaption>
              </figure>
            @endif

            <!-- Article Body -->
            <div class="text-slate-700 leading-relaxed space-y-5">
              @php
                // Sanitize and render content properly
                $content = $berita->isi;
                // Split by newlines
                $lines = preg_split('/\r\n|\r|\n/', trim($content));
                
                foreach($lines as $line) {
                  $line = trim($line);
                  if (!empty($line)) {
                    // Check if line already contains HTML
                    if (preg_match('/<[^>]+>/', $line)) {
                      echo $line;
                    } else {
                      // Add paragraph styling for plain text
                      echo '<p class="text-base sm:text-lg leading-8">' . htmlspecialchars($line, ENT_QUOTES, 'UTF-8') . '</p>';
                    }
                  }
                }
              @endphp
            </div>

            <!-- Article Footer -->
            <div class="mt-12 pt-8 border-t-2 border-slate-100">
              
              <!-- Author & Share Section -->
              <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                <!-- Author Info -->
                <div class="flex items-center gap-4">
                  <div class="w-14 h-14 rounded-full bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center text-white text-lg font-bold shadow-md">
                    👤
                  </div>
                  <div>
                    <p class="text-sm font-semibold text-slate-900">Admin Pondok Pesantren</p>
                    <p class="text-xs text-slate-500 mt-0.5">
                      Diperbarui {{ $berita->updated_at ? $berita->updated_at->diffForHumans() : 'baru-baru ini' }}
                    </p>
                  </div>
                </div>

                <!-- Share Buttons -->
                <div class="flex flex-wrap items-center gap-2 w-full sm:w-auto">
                  @php
                    $shareUrl = urlencode(request()->fullUrl());
                    $shareTitle = urlencode($berita->judul);
                  @endphp
                  
                  <!-- Facebook -->
                  <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" 
                     target="_blank" 
                     rel="noopener noreferrer"
                     class="p-2.5 rounded-full bg-blue-50 hover:bg-blue-100 text-blue-600 hover:text-blue-700 transition-all shadow-sm border border-blue-200 group" 
                     title="Bagikan di Facebook"
                     aria-label="Share on Facebook">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                  </a>

                  <!-- Twitter/X -->
                  <a href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}" 
                     target="_blank" 
                     rel="noopener noreferrer"
                     class="p-2.5 rounded-full bg-sky-50 hover:bg-sky-100 text-sky-600 hover:text-sky-700 transition-all shadow-sm border border-sky-200 group"
                     title="Bagikan di Twitter"
                     aria-label="Share on Twitter">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 002.856-3.942 9.86 9.86 0 01-2.836.856 4.958 4.958 0 002.165-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                  </a>

                  <!-- Telegram -->
                  <a href="https://t.me/share/url?url={{ $shareUrl }}&text={{ $shareTitle }}" 
                     target="_blank" 
                     rel="noopener noreferrer"
                     class="p-2.5 rounded-full bg-blue-50 hover:bg-blue-100 text-blue-500 hover:text-blue-600 transition-all shadow-sm border border-blue-200 group"
                     title="Bagikan di Telegram"
                     aria-label="Share on Telegram">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M11.944 0A12 12 0 000 12a12 12 0 0012 12 12 12 0 0012-12A12 12 0 0011.944 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 01.171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.385-1.32.365-.434-.027-1.268-.168-1.884-.305-.76-.165-1.36-.27-1.31-.893.027-.466.399-.905.985-1.12 3.861-1.68 8.42-2.8 10.470-2.81z"/></svg>
                  </a>

                  <!-- Copy Link -->
                  <button type="button" 
                          onclick="copyNewsLink()" 
                          class="p-2.5 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 hover:text-slate-700 transition-all shadow-sm border border-slate-300 group"
                          title="Salin tautan"
                          aria-label="Copy link">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.658 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                  </button>

                  <!-- WhatsApp -->
                  <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' - ' . request()->fullUrl()) }}" 
                     target="_blank" 
                     rel="noopener noreferrer"
                     class="p-2.5 rounded-full bg-emerald-50 hover:bg-emerald-100 text-emerald-600 hover:text-emerald-700 transition-all shadow-sm border border-emerald-200 group"
                     title="Bagikan di WhatsApp"
                     aria-label="Share on WhatsApp">
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-4.255.949c-1.292.573-2.477 1.368-3.426 2.327A9.9 9.9 0 002.38 9.502c-.57 1.414-.744 2.976-.425 4.488.32 1.513 1.111 2.897 2.206 4.031.55.553 1.208 1.038 1.942 1.427 1.013.559 2.12.986 3.287 1.266 1.167.28 2.389.37 3.584.213 1.195-.157 2.322-.606 3.318-1.307.996-.701 1.812-1.622 2.368-2.688.556-1.066.834-2.257.806-3.464-.028-1.207-.324-2.378-.898-3.424-.574-1.046-1.404-1.957-2.428-2.647-1.023-.69-2.235-1.126-3.511-1.27-1.276-.144-2.596-.019-3.779.367"/></svg>
                  </a>
                </div>
              </div>

              <!-- Category Tags -->
              <div class="mt-8 pt-6 border-t border-slate-100 flex flex-wrap items-center gap-3">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Kategori:</span>
                <a href="{{ route('berita', ['category' => $berita->kategori]) }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-primary/10 text-primary rounded-full border border-primary/30 hover:bg-primary/20 hover:border-primary/50 transition-all text-xs font-semibold">
                  🏷️ {{ $berita->kategori ?? 'Umum' }}
                </a>
              </div>

            </div>

          </div>
        </article>

        <!-- RIGHT COLUMN: Sidebar -->
        <aside class="lg:col-span-4 space-y-6 lg:sticky lg:top-24">
          
          <!-- Recent News Widget -->
          <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm" data-aos="fade-left">
            <h3 class="text-base font-bold text-primary mb-4 pb-3 border-b-2 border-accent">
              📰 Berita Terbaru
            </h3>
            
            <div class="space-y-3">
              @forelse($recentBeritas as $recent)
                <a href="{{ route('berita.detail', $recent->slug) }}" class="group flex gap-3 pb-3 border-b border-slate-100 last:border-none hover:opacity-75 transition-opacity">
                  <div class="w-16 h-16 rounded-lg bg-slate-100 flex-shrink-0 overflow-hidden border border-slate-200">
                    @if($recent->gambar)
                      <img src="{{ asset('storage/' . $recent->gambar) }}" alt="{{ $recent->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300" loading="lazy" />
                    @else
                      <div class="w-full h-full flex items-center justify-center text-lg text-slate-300">📄</div>
                    @endif
                  </div>
                  <div class="flex-1 min-w-0">
                    <h4 class="text-sm font-bold text-slate-800 group-hover:text-primary transition-colors line-clamp-2">
                      {{ $recent->judul }}
                    </h4>
                    <span class="text-xs text-slate-400 mt-1 block">
                      {{ optional($recent->tanggal_publish)->format('d M Y') }}
                    </span>
                  </div>
                </a>
              @empty
                <p class="text-xs text-slate-500 text-center py-3">Tidak ada berita lain.</p>
              @endforelse
            </div>
            
            @if($recentBeritas->count() > 0)
              <a href="{{ route('berita') }}" class="mt-4 block w-full text-center px-4 py-2.5 bg-slate-100 hover:bg-primary hover:text-white text-slate-700 text-sm font-semibold rounded-lg transition-all">
                Lihat Semua →
              </a>
            @endif
          </div>

          <!-- Categories Widget -->
          @if(isset($categories) && $categories->count() > 0)
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm" data-aos="fade-left" data-aos-delay="50">
              <h3 class="text-base font-bold text-primary mb-4 pb-3 border-b-2 border-accent">
                🏷️ Kategori
              </h3>
              <div class="flex flex-wrap gap-2">
                <a href="{{ route('berita') }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 hover:bg-primary hover:text-white text-slate-700 transition-all">
                  Semua
                </a>
                @foreach($categories as $cat)
                  <a href="{{ route('berita', ['category' => $cat]) }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-slate-100 hover:bg-primary hover:text-white text-slate-700 transition-all">
                    {{ $cat }}
                  </a>
                @endforeach
              </div>
            </div>
          @endif

          <!-- PPDB Promo Banner -->
          <div class="bg-gradient-to-br from-accent to-yellow-300 rounded-2xl p-6 text-slate-900 shadow-lg" data-aos="fade-left" data-aos-delay="100">
            <span class="text-xs font-black uppercase tracking-wider block mb-2">⚡ Daftar Sekarang</span>
            <h4 class="text-base font-bold mb-3">Santri Baru 2026</h4>
            <p class="text-xs mb-4 leading-relaxed font-medium">
              Daftarkan putra/putri Anda sekarang di pondok pesantren kami.
            </p>
            <a href="{{ route('daftar') }}" class="inline-flex items-center justify-center w-full px-4 py-2.5 bg-primary text-white font-bold rounded-lg text-sm hover:bg-primary-dark transition-all">
              Daftar Online →
            </a>
          </div>

        </aside>

      </div>
    </div>
  </section>

  @push('scripts')
    <script>
      // Copy news link to clipboard
      function copyNewsLink() {
        const url = window.location.href;
        
        navigator.clipboard.writeText(url).then(() => {
          const button = event.target.closest('button');
          const originalHTML = button.innerHTML;
          
          // Show success feedback
          button.innerHTML = '<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/></svg>';
          button.classList.add('bg-emerald-100', 'text-emerald-600');
          button.classList.remove('bg-slate-100', 'text-slate-600');
          
          // Show toast notification
          if (typeof Swal !== 'undefined') {
            Swal.fire({
              icon: 'success',
              title: 'Tautan Tersalin!',
              text: 'Link berita berhasil disalin ke clipboard.',
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
          
          // Restore button after 2 seconds
          setTimeout(() => {
            button.innerHTML = originalHTML;
            button.classList.remove('bg-emerald-100', 'text-emerald-600');
            button.classList.add('bg-slate-100', 'text-slate-600');
          }, 2000);
        }).catch(() => {
          alert('Gagal menyalin tautan. Silakan coba lagi.');
        });
      }

      // Legacy share function (fallback)
      function shareNewsPage() {
        const title = "{{ e($berita->judul) }} - PPTQ Imam Syaukani";
        const url = window.location.href;

        if (navigator.share) {
          navigator.share({
            title: title,
            url: url
          }).catch(() => {});
        } else {
          copyNewsLink();
        }
      }

      // Add smooth scroll behavior for links
      document.addEventListener('DOMContentLoaded', function() {
        // Smooth scroll for any anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href !== '#' && document.querySelector(href)) {
              e.preventDefault();
              document.querySelector(href).scrollIntoView({
                behavior: 'smooth'
              });
            }
          });
        });

        // Add intersection observer for reading progress
        const article = document.querySelector('article');
        if (article) {
          let readProgress = 0;
          const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                const rect = entry.boundingClientRect;
                const viewportHeight = window.innerHeight;
                const elementTop = rect.top;
                
                if (elementTop <= viewportHeight) {
                  const scrolled = (viewportHeight - elementTop) / viewportHeight;
                  readProgress = Math.min(scrolled * 100, 100);
                }
              }
            });
          }, { threshold: 0 });
          
          observer.observe(article);
        }
      });
    </script>
  @endpush
@endsection
