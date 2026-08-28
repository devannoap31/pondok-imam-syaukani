@extends('frontend.layouts.app', ['activePage' => 'school'])

@section('title', $program->nama_program . ' – PPTQ Imam Syaukani')
@section('meta_description', \Illuminate\Support\Str::limit(strip_tags($program->deskripsi), 160))

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
        <a href="{{ route('sekolah') }}" class="inline-flex items-center gap-2.5 px-4 py-2 bg-white/10 hover:bg-white/20 text-white backdrop-blur-md rounded-full text-xs sm:text-sm font-medium transition-all hover:-translate-x-1 shadow-sm border border-white/10">
          <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
          </svg>
          Kembali ke Program Pendidikan
        </a>

        <div class="flex items-center gap-2 text-xs text-white/70">
          <a href="{{ route('home') }}" class="hover:text-accent transition-colors">Home</a>
          <span class="text-white/40">›</span>
          <a href="{{ route('sekolah') }}" class="hover:text-accent transition-colors">Sekolah</a>
          <span class="text-white/40">›</span>
          <span class="text-white font-semibold truncate max-w-[180px] sm:max-w-none">{{ $program->nama_program }}</span>
        </div>
      </div>

      <!-- Main Header Content -->
      <div class="max-w-4xl" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-accent/20 border border-accent/40 text-accent text-xs font-bold uppercase tracking-wider mb-4 shadow-sm backdrop-blur-sm">
          <span class="w-2 h-2 rounded-full bg-accent animate-ping"></span>
          Program Pendidikan Unggulan
        </div>

        <h1 class="text-3xl sm:text-5xl md:text-6xl font-black font-outfit text-white leading-tight tracking-tight mb-4">
          {{ $program->nama_program }}
        </h1>

        @if($program->subjudul)
          <p class="text-lg sm:text-2xl text-emerald-100/90 font-medium font-outfit mb-6 leading-relaxed max-w-3xl">
            {{ $program->subjudul }}
          </p>
        @endif

        <!-- Highlights Pills -->
        <div class="flex flex-wrap items-center gap-3 pt-2">
          <div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-white/10 backdrop-blur-md border border-white/10 text-xs sm:text-sm text-white/90">
            <span>🎓</span> Terakreditasi & Resmi
          </div>
          <div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-white/10 backdrop-blur-md border border-white/10 text-xs sm:text-sm text-white/90">
            <span>📖</span> Tahfidz & Kitab Turast
          </div>
          <div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl bg-accent/20 backdrop-blur-md border border-accent/30 text-xs sm:text-sm text-accent font-semibold">
            <span>✨</span> Beasiswa Yatim/Dhuafa 100%
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MAIN BODY CONTENT SECTION -->
  <section class="py-12 sm:py-16 bg-slate-50 relative">
    <div class="max-w-[1250px] mx-auto px-4 sm:px-6">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
        
        <!-- LEFT COLUMN: Content Details -->
        <div class="lg:col-span-7 xl:col-span-8 space-y-10">
          
          <!-- Image / Media Banner -->
          <div class="bg-white rounded-3xl p-3 sm:p-4 border border-slate-200/80 shadow-xl overflow-hidden relative group" data-aos="fade-up">
            <div class="rounded-2xl overflow-hidden relative aspect-[16/9] sm:aspect-[16/10] bg-slate-900">
              @if($program->gambar && file_exists(public_path('storage/' . $program->gambar)))
                <img src="{{ asset('storage/' . $program->gambar) }}" alt="{{ $program->nama_program }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
              @else
                <div class="w-full h-full bg-gradient-to-br from-emerald-900 via-primary-dark to-[#0A2317] flex flex-col items-center justify-center text-center p-6 relative overflow-hidden">
                  <div class="absolute -right-10 -bottom-10 opacity-10 text-9xl select-none">🎓</div>
                  <div class="w-20 h-20 rounded-3xl bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-4xl mb-4 shadow-lg">
                    📖
                  </div>
                  <h3 class="text-xl sm:text-2xl font-bold font-outfit text-white max-w-md">{{ $program->nama_program }}</h3>
                  <p class="text-xs sm:text-sm text-emerald-200/80 mt-1">PPTQ Imam Syaukani</p>
                </div>
              @endif

              <!-- Floating Tag Badge -->
              <div class="absolute top-4 left-4 bg-primary/90 backdrop-blur-md text-white text-xs font-bold px-3.5 py-1.5 rounded-full shadow-lg border border-white/20">
                PPTQ Imam Syaukani
              </div>
            </div>
          </div>

          <!-- Description Section Card -->
          <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-sm space-y-6" data-aos="fade-up">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
              <div class="w-10 h-10 rounded-xl bg-primary-accent text-primary flex items-center justify-center font-bold text-xl">
                📌
              </div>
              <div>
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-600">Gambaran Umum</span>
                <h2 class="text-2xl sm:text-3xl font-bold font-outfit text-primary">Tentang Program</h2>
              </div>
            </div>

            <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed text-base sm:text-lg whitespace-pre-line">
              {{ $program->deskripsi }}
            </div>

            <!-- Vision Statement Quote Box -->
            <div class="mt-6 p-6 rounded-2xl bg-gradient-to-r from-primary-accent via-emerald-50/60 to-white border-l-4 border-primary text-slate-800 relative overflow-hidden">
              <div class="flex items-start gap-4">
                <span class="text-4xl leading-none text-primary/40 font-serif">“</span>
                <p class="text-sm sm:text-base italic text-slate-700 leading-relaxed font-medium">
                  Menyiapkan santri menjadi ulama yang berakhlak karimah, hafizh Al-Qur'an mutqin, serta menguasai dasar-dasar ilmu syar'i sesuai pemahaman Salafus Shalih.
                </p>
              </div>
            </div>
          </div>

          <!-- Keunggulan Program Cards Grid -->
          @if(is_array($program->keunggulan) && count($program->keunggulan) > 0)
            <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-sm space-y-6" data-aos="fade-up">
              <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
                <div class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center font-bold text-xl">
                  ⭐
                </div>
                <div>
                  <span class="text-xs font-bold uppercase tracking-wider text-amber-600">Fasilitas & Kelebihan</span>
                  <h2 class="text-2xl sm:text-3xl font-bold font-outfit text-primary">Keunggulan Program</h2>
                </div>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @foreach($program->keunggulan as $index => $keunggulan)
                  <div class="p-4 sm:p-5 rounded-2xl bg-slate-50/80 hover:bg-emerald-50/50 border border-slate-200/60 hover:border-emerald-300 transition-all duration-300 flex items-start gap-3.5 group">
                    <div class="flex-shrink-0 w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center font-bold text-sm shadow-sm group-hover:scale-110 transition-transform">
                      ✓
                    </div>
                    <div class="pt-0.5">
                      <p class="text-slate-800 text-sm sm:text-base font-medium leading-snug">
                        {{ $keunggulan }}
                      </p>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          @endif

          <!-- Learning Target & Method Section -->
          <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200/80 shadow-sm space-y-6" data-aos="fade-up">
            <div class="flex items-center gap-3 pb-4 border-b border-slate-100">
              <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xl">
                🎯
              </div>
              <div>
                <span class="text-xs font-bold uppercase tracking-wider text-emerald-600">Pilar Pembelajaran</span>
                <h2 class="text-2xl sm:text-3xl font-bold font-outfit text-primary">Fokus Kurikulum</h2>
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div class="p-6 rounded-2xl bg-gradient-to-br from-emerald-900 to-primary text-white space-y-3 relative overflow-hidden">
                <div class="w-12 h-12 rounded-xl bg-white/10 backdrop-blur-md flex items-center justify-center text-2xl">
                  📖
                </div>
                <h3 class="text-lg font-bold font-outfit text-white">Tahfidzul Qur'an</h3>
                <p class="text-xs sm:text-sm text-emerald-100/80 leading-relaxed">
                  Bimbingan setoran hafalan harian, muraja'ah terstruktur, dan ujian tahfidz berkala hingga mutqin 30 Juz.
                </p>
              </div>

              <div class="p-6 rounded-2xl bg-gradient-to-br from-slate-900 to-slate-800 text-white space-y-3 relative overflow-hidden">
                <div class="w-12 h-12 rounded-xl bg-white/10 backdrop-blur-md flex items-center justify-center text-2xl">
                  📚
                </div>
                <h3 class="text-lg font-bold font-outfit text-white">Kajian Dirasah Islamiyah</h3>
                <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                  Pembelajaran kitab turast (Aqidah, Fiqih, Tajwid, Nahwu Shorof) dengan sanad dan metode pengajaran yang sistematis.
                </p>
              </div>
            </div>
          </div>

          <!-- Other Active Programs Explorer -->
          @if(isset($otherPrograms) && $otherPrograms->count() > 0)
            <div class="space-y-6 pt-4" data-aos="fade-up">
              <div class="flex items-center justify-between">
                <div>
                  <span class="text-xs font-bold uppercase tracking-wider text-emerald-600">Eksplorasi Program</span>
                  <h2 class="text-2xl font-bold font-outfit text-primary">Program Pendidikan Lainnya</h2>
                </div>
                <a href="{{ route('sekolah') }}" class="text-xs sm:text-sm font-semibold text-emerald-600 hover:text-primary transition-colors inline-flex items-center gap-1">
                  Lihat Semua <span>→</span>
                </a>
              </div>

              <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                @foreach($otherPrograms as $item)
                  <a href="{{ route('sekolah.program.detail', $item) }}" class="group bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow-lg hover:border-emerald-400 transition-all duration-300 flex flex-col justify-between">
                    <div>
                      <div class="rounded-xl overflow-hidden aspect-[4/3] bg-primary-accent mb-3 relative">
                        @if($item->gambar && file_exists(public_path('storage/' . $item->gambar)))
                          <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_program }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                        @else
                          <div class="w-full h-full flex items-center justify-center text-3xl">🎓</div>
                        @endif
                      </div>
                      <h4 class="font-bold font-outfit text-primary group-hover:text-emerald-600 transition-colors line-clamp-1 text-base">
                        {{ $item->nama_program }}
                      </h4>
                      @if($item->subjudul)
                        <p class="text-xs text-slate-500 line-clamp-1 mt-0.5">{{ $item->subjudul }}</p>
                      @endif
                    </div>
                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-emerald-600">
                      <span>Detail Program</span>
                      <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </div>
                  </a>
                @endforeach
              </div>
            </div>
          @endif

        </div>

        <!-- RIGHT COLUMN: Sticky Registration Sidebar -->
        <div class="lg:col-span-5 xl:col-span-4 sticky top-24 space-y-6">
          
          <!-- Registration & Info Action Card -->
          <div class="bg-white rounded-3xl border border-slate-200/90 shadow-xl p-6 sm:p-7 relative overflow-hidden" data-aos="fade-left">
            <!-- Header Accent Pill -->
            <div class="bg-gradient-to-r from-primary-dark to-primary rounded-2xl p-5 text-white mb-6 shadow-md relative overflow-hidden">
              <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-accent/20 rounded-full blur-xl pointer-events-none"></div>
              <p class="text-accent text-[11px] font-extrabold uppercase tracking-wider mb-1">Informasi Pendaftaran</p>
              <h3 class="text-xl font-bold font-outfit text-white">Gelombang PPDB Dibuka</h3>
              <p class="text-xs text-white/80 mt-1">Daftarkan diri secara online dengan cepat & mudah.</p>
            </div>

            <!-- Quick Specs List -->
            <div class="space-y-4 text-xs sm:text-sm text-slate-600 mb-7">
              <div class="flex items-center justify-between py-2.5 border-b border-slate-100">
                <span class="flex items-center gap-2 text-slate-500 font-medium">
                  <span class="text-base">🎓</span> Jenjang / Program
                </span>
                <span class="font-bold text-slate-800 text-right">{{ $program->nama_program }}</span>
              </div>

              <div class="flex items-center justify-between py-2.5 border-b border-slate-100">
                <span class="flex items-center gap-2 text-slate-500 font-medium">
                  <span class="text-base">🟢</span> Status Penerimaan
                </span>
                <span class="px-2.5 py-0.5 rounded-full bg-emerald-100 text-emerald-700 font-bold text-xs">Aktif Dibuka</span>
              </div>

              <div class="flex items-center justify-between py-2.5 border-b border-slate-100">
                <span class="flex items-center gap-2 text-slate-500 font-medium">
                  <span class="text-base">🏫</span> Sistem Belajar
                </span>
                <span class="font-semibold text-slate-800">Boarding / Berasrama</span>
              </div>

              <div class="flex items-between justify-between py-2.5 border-b border-slate-100">
                <span class="flex items-center gap-2 text-slate-500 font-medium">
                  <span class="text-base">🤝</span> Beasiswa Yatim
                </span>
                <span class="font-bold text-emerald-600">Gratis 100%</span>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3">
              <a href="{{ route('daftar') }}" class="ripple-btn w-full inline-flex items-center justify-center gap-2 px-6 py-4 bg-accent hover:bg-accent-dark text-primary-dark font-extrabold rounded-2xl shadow-lg hover:shadow-accent/40 hover:-translate-y-0.5 transition-all text-sm uppercase tracking-wide">
                <span>Daftar Sekarang</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
              </a>

              @if(isset($kontak) && $kontak->whatsapp)
                @php
                  $waNum = preg_replace('/[^0-9]/', '', $kontak->whatsapp);
                  if (!str_starts_with($waNum, '62') && str_starts_with($waNum, '0')) {
                      $waNum = '62' . substr($waNum, 1);
                  }
                  $waMsg = rawurlencode("Assalamu'alaikum, saya ingin bertanya informasi lebih rinci mengenai program " . $program->nama_program . " di PPTQ Imam Syaukani.");
                @endphp
                <a href="https://wa.me/{{ $waNum }}?text={{ $waMsg }}" target="_blank" rel="noopener noreferrer" class="w-full inline-flex items-center justify-center gap-2.5 px-6 py-3.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-800 font-bold rounded-2xl border border-emerald-200 transition-all text-xs sm:text-sm">
                  <svg class="w-5 h-5 text-emerald-600 fill-current" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                  </svg>
                  <span>Konsultasi via WhatsApp</span>
                </a>
              @endif

              <button onclick="shareProgramPage()" type="button" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl transition-all text-xs">
                <span>🔗 Share / Bagikan Program Ini</span>
              </button>
            </div>
          </div>

          <!-- Customer Service Card -->
          <div class="bg-gradient-to-br from-primary-accent to-emerald-50/50 rounded-3xl p-6 border border-emerald-200/60 shadow-sm space-y-3" data-aos="fade-left" data-aos-delay="100">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-full bg-primary text-white flex items-center justify-center text-lg">
                ☎️
              </div>
              <div>
                <h4 class="font-bold text-primary font-outfit text-base">Layanan Informasi</h4>
                <p class="text-xs text-slate-500">Senin - Sabtu (08.00 - 16.00 WIB)</p>
              </div>
            </div>
            <p class="text-xs text-slate-600 leading-relaxed">
              Memiliki pertanyaan seputar kurikulum, syarat administrasi, atau beasiswa? Tim kami siap membantu Anda.
            </p>
            @if(isset($kontak) && $kontak->telepon)
              <div class="pt-2 text-xs font-bold text-primary flex items-center gap-2">
                <span>📞 Hotline:</span>
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $kontak->telepon) }}" class="underline hover:text-accent transition-colors">
                  {{ $kontak->telepon }}
                </a>
              </div>
            @endif
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- BOTTOM CTA BANNER -->
  <section class="py-16 bg-white relative overflow-hidden">
    <div class="max-w-[1250px] mx-auto px-4 sm:px-6">
      <div class="bg-gradient-to-br from-primary-dark via-primary to-[#0A2317] rounded-3xl p-8 sm:p-14 text-center text-white relative overflow-hidden shadow-2xl flex flex-col items-center border border-white/10" data-aos="zoom-in">
        <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-accent/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-20 -top-20 w-80 h-80 bg-emerald-400/20 rounded-full blur-3xl pointer-events-none"></div>

        <span class="inline-block bg-accent/20 border border-accent/40 text-accent text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full mb-4">
          Buka Masa Depan Cerah Santri
        </span>

        <h2 class="text-3xl sm:text-4xl md:text-5xl font-black font-outfit text-white mb-4 max-w-3xl leading-tight">
          Bergabunglah Bersama {{ $program->nama_program }}
        </h2>

        <p class="text-emerald-100/90 text-sm sm:text-base leading-relaxed mb-8 max-w-2xl">
          Mulai langkah awal putra-putri Anda untuk menjadi penghafal Al-Qur'an dan calon ulama beradab mulia di PPTQ Imam Syaukani.
        </p>

        <div class="flex flex-wrap items-center justify-center gap-4">
          <a href="{{ route('daftar') }}" class="ripple-btn inline-flex items-center justify-center gap-2 px-8 py-4 bg-accent text-primary-dark rounded-full text-base font-extrabold shadow-lg hover:bg-accent-dark transition-all hover:-translate-y-1 hover:shadow-accent/50">
            <span>Daftar Sekarang</span>
            <svg class="w-5 h-5 stroke-[2.5]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/>
            </svg>
          </a>

          <a href="{{ route('sekolah') }}" class="inline-flex items-center justify-center px-6 py-4 bg-white/10 hover:bg-white/20 text-white rounded-full text-base font-semibold border border-white/20 transition-all">
            Lihat Program Lain
          </a>
        </div>
      </div>
    </div>
  </section>

  @push('scripts')
    <script>
      function shareProgramPage() {
        const title = "{{ e($program->nama_program) }} - PPTQ Imam Syaukani";
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
                title: 'Tautan Berhasil Dycopy!',
                text: 'Link detail program telah disalin ke clipboard.',
                timer: 2000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end',
                background: '#0B3322',
                color: '#ffffff',
                iconColor: '#FFAA00'
              });
            } else {
              alert('Link detail program telah disalin ke clipboard!');
            }
          });
        }
      }
    </script>
  @endpush
@endsection