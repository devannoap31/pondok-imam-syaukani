@extends('frontend.layouts.app', ['activePage' => 'news'])

@section('title', 'Berita & Artikel – PPTQ Imam Syaukani')
@section('meta_description', 'Kabar terbaru, pengumuman, dan artikel Islami dari lingkungan Pondok Pesantren.')

@section('content')
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
        <a href="index.blade.php" class="text-white/70 hover:text-accent transition-colors">Home</a>
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
        <!-- Post 1 -->
        <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-200 grid grid-cols-1 md:grid-cols-[320px_1fr] transition-all duration-300 hover:shadow-md hover:border-primary-light">
          <div class="h-60 md:h-full flex items-center justify-center text-7xl select-none bg-gradient-to-br from-[#e8f5e9] to-[#a5d6a7]">
            Status 🕌
          </div>
          <div class="p-6 sm:p-8 flex flex-col justify-between items-start">
            <div>
              <div class="flex gap-4 text-xs font-semibold text-slate-500 mb-2.5">
                <span class="flex items-center gap-1">📅 01 Jan 2026</span>
                <span class="flex items-center gap-1">🏷️ Kegiatan Santri</span>
              </div>
              <h3 class="text-lg sm:text-xl font-bold font-outfit text-primary mb-3 leading-tight">
                Alhamdulillah, 50 Santri Lulus Ujian Hafalan 30 Juz Tahun Ini
              </h3>
              <p class="text-slate-600 text-sm mb-5 leading-relaxed">
                Prestasi membanggakan kembali ditorehkan oleh santri-santri program Tahfidz Unggulan Pondok Pesantren Darul Ilmi. Sebanyak 50 santri putra dan putri berhasil menyelesaikan setoran hafalan 30 Juz mereka.
              </p>
            </div>
            <a href="#" class="inline-flex items-center justify-center px-4 py-2 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all">
              Baca Selengkapnya
            </a>
          </div>
        </div>

        <!-- Post 2 -->
        <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-200 grid grid-cols-1 md:grid-cols-[320px_1fr] transition-all duration-300 hover:shadow-md hover:border-primary-light">
          <div class="h-60 md:h-full flex items-center justify-center text-7xl select-none bg-gradient-to-br from-[#fff3e0] to-[#ffcc80]">
            Trophy 🏆
          </div>
          <div class="p-6 sm:p-8 flex flex-col justify-between items-start">
            <div>
              <div class="flex gap-4 text-xs font-semibold text-slate-500 mb-2.5">
                <span class="flex items-center gap-1">📅 01 Jan 2026</span>
                <span class="flex items-center gap-1">🏷️ Prestasi</span>
              </div>
              <h3 class="text-lg sm:text-xl font-bold font-outfit text-primary mb-3 leading-tight">
                Juara 1 Lomba Pidato Bahasa Arab Tingkat Nasional
              </h3>
              <p class="text-slate-600 text-sm mb-5 leading-relaxed">
                Ananda Ahmad Zaid, santri kelas 11 MA, sukses membawa pulang trofi juara pertama dalam ajang Festival Bahasa Arab Nasional yang diadakan oleh Universitas Islam Negeri.
              </p>
            </div>
            <a href="#" class="inline-flex items-center justify-center px-4 py-2 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all">
              Baca Selengkapnya
            </a>
          </div>
        </div>

        <!-- Post 3 -->
        <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-slate-200 grid grid-cols-1 md:grid-cols-[320px_1fr] transition-all duration-300 hover:shadow-md hover:border-primary-light">
          <div class="h-60 md:h-full flex items-center justify-center text-7xl select-none bg-gradient-to-br from-[#e3f2fd] to-[#90caf9]">
            News 📋
          </div>
          <div class="p-6 sm:p-8 flex flex-col justify-between items-start">
            <div>
              <div class="flex gap-4 text-xs font-semibold text-slate-500 mb-2.5">
                <span class="flex items-center gap-1">📅 01 Jan 2026</span>
                <span class="flex items-center gap-1">🏷️ Pengumuman Resmi</span>
              </div>
              <h3 class="text-lg sm:text-xl font-bold font-outfit text-primary mb-3 leading-tight">
                Syarat dan Ketentuan Penerimaan Santri Baru 2026
              </h3>
              <p class="text-slate-600 text-sm mb-5 leading-relaxed">
                Pendaftaran Santri Baru (PPDB) PPTQ Imam Syaukani tahun ajaran 2026/2027 telah dibuka secara resmi. Pendaftaran gelombang pertama dapat dilakukan secara daring melalui website.
              </p>
            </div>
            <a href="#" class="inline-flex items-center justify-center px-4 py-2 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all">
              Baca Selengkapnya
            </a>
          </div>
        </div>

        <!-- Pagination -->
        <div class="flex gap-2 justify-center mt-10">
          <a href="#" class="inline-flex items-center justify-center px-4 py-2 border-2 border-primary bg-primary text-white rounded-full text-xs font-semibold min-w-10">1</a>
          <a href="#" class="inline-flex items-center justify-center px-4 py-2 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all min-w-10">2</a>
          <a href="#" class="inline-flex items-center justify-center px-4 py-2 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all min-w-10">3</a>
          <a href="#" class="inline-flex items-center justify-center px-4 py-2 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all min-w-10">›</a>
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
            <li class="border-b border-slate-100 pb-3.5 last:border-none last:pb-0">
              <a href="#">
                <h5 class="text-xs sm:text-sm font-bold font-outfit text-slate-800 hover:text-primary leading-tight transition-colors mb-1.5">
                  Alhamdulillah, 50 Santri Lulus Ujian Hafalan 30 Juz
                </h5>
                <span class="text-[10px] text-slate-400 font-semibold">01 Januari 2026</span>
              </a>
            </li>
            <li class="border-b border-slate-100 pb-3.5 last:border-none last:pb-0">
              <a href="#">
                <h5 class="text-xs sm:text-sm font-bold font-outfit text-slate-800 hover:text-primary leading-tight transition-colors mb-1.5">
                  Juara 1 Lomba Pidato Bahasa Arab Tingkat Nasional
                </h5>
                <span class="text-[10px] text-slate-400 font-semibold">01 Januari 2026</span>
              </a>
            </li>
            <li class="border-b border-slate-100 pb-3.5 last:border-none last:pb-0">
              <a href="#">
                <h5 class="text-xs sm:text-sm font-bold font-outfit text-slate-800 hover:text-primary leading-tight transition-colors mb-1.5">
                  Syarat & Ketentuan Penerimaan Santri Baru 2026
                </h5>
                <span class="text-[10px] text-slate-400 font-semibold">01 Januari 2026</span>
              </a>
            </li>
          </ul>
        </div>

        <!-- Widget 3: Categories -->
        <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm">
          <h4 class="text-base font-bold font-outfit text-primary mb-5 relative pb-2.5 after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-10 after:h-[3px] after:bg-accent">
            Kategori
          </h4>
          <ul class="space-y-3">
            <li><a href="#" class="text-xs font-semibold text-slate-600 hover:text-primary transition-colors flex items-center gap-1">› Kegiatan Santri</a></li>
            <li><a href="#" class="text-xs font-semibold text-slate-600 hover:text-primary transition-colors flex items-center gap-1">› Prestasi</a></li>
            <li><a href="#" class="text-xs font-semibold text-slate-600 hover:text-primary transition-colors flex items-center gap-1">› Pengumuman Resmi</a></li>
            <li><a href="#" class="text-xs font-semibold text-slate-600 hover:text-primary transition-colors flex items-center gap-1">› Artikel Islami</a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
@endsection
