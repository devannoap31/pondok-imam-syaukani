<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin – PPTQ Imam Syaukani</title>
  <meta name="description" content="Panel kontrol administrasi Pondok Pesantren Tahfidzul Qur'an Imam Syaukani." />
  
  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- TAILWIND CSS v4 -->
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  
  <style type="text/tailwindcss">
    @theme {
      --color-primary: #124E3F;
      --color-primary-dark: #0A3329;
      --color-primary-light: #1C745F;
      --color-primary-accent: #E3F2ED;
      --color-accent: #FFAA00;
      --color-accent-dark: #E59800;
      --color-accent-light: #FFBB33;
      --color-accent-bg: #FFF7E6;
      --color-dark: #0F172A;
      --color-danger: #EF4444;
      --color-success: #10B981;
    }
    @layer base {
      body {
        font-family: 'Poppins', 'Outfit', sans-serif;
        @apply text-slate-700 bg-white leading-relaxed overflow-x-hidden;
      }
      h1, h2, h3, h4, h5, h6 {
        font-family: 'Outfit', sans-serif;
        @apply text-slate-900 font-bold leading-tight;
      }
    }
  </style>
</head>
<body class="bg-slate-50">

  <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr] min-h-screen">
    
    <!-- SIDEBAR -->
    <aside class="sidebar-admin fixed top-0 left-0 w-[280px] lg:w-full h-screen bg-[#0A3329] text-white flex flex-col z-[1100] transition-transform duration-300 shadow-2xl lg:shadow-none lg:relative border-r border-emerald-900/30">
      
      <!-- BRAND / LOGO -->
      <div class="px-6 pt-7 pb-5 flex items-center justify-between border-b border-white/10">
        <a href="#" class="flex items-center gap-3 group">
          <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-accent to-amber-500 flex items-center justify-center text-primary-dark font-extrabold shadow-md shadow-amber-500/20 group-hover:scale-105 transition-transform">
            <svg class="w-6 h-6 text-primary-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
          </div>
          <div>
            <div class="font-outfit text-base font-bold tracking-tight text-white leading-tight flex items-center gap-1.5">
              <span class="text-accent font-extrabold">PPTQ</span> Imam Syaukani
            </div>
            <span class="text-[11px] text-emerald-200/60 font-medium tracking-wide">Panel Administrasi</span>
          </div>
        </a>
        <button class="lg:hidden p-1.5 text-white/70 hover:text-white rounded-lg hover:bg-white/10 transition-colors cursor-pointer" onclick="toggleAdminSidebar()" aria-label="Tutup Menu">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>

      <!-- USER PROFILE CARD -->
      <div class="px-5 py-4">
        <div class="bg-white/5 border border-white/10 rounded-2xl p-3 flex items-center gap-3">
          <div class="relative shrink-0">
            <div class="w-10 h-10 rounded-xl bg-accent/20 border border-accent/40 text-accent font-bold font-outfit text-sm flex items-center justify-center select-none shadow-sm">
              AA
            </div>
            <span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-emerald-400 border-2 border-[#0A3329] rounded-full"></span>
          </div>
          <div class="min-w-0 flex-1">
            <div class="font-semibold text-xs text-white truncate">Adminnya Admin</div>
            <div class="flex items-center gap-1.5 mt-0.5">
              <span class="text-[10px] font-semibold text-amber-400 bg-amber-400/10 px-2 py-0.5 rounded-md">Super Admin</span>
            </div>
          </div>
        </div>
      </div>

      <!-- NAVIGATION MENU -->
      <nav class="flex-1 overflow-y-auto px-4 pb-4 space-y-4 text-xs font-medium custom-scrollbar">
        
        <!-- SECTION: UTAMA -->
        <div>
          <div class="px-3 pb-1.5 text-[10px] font-bold tracking-wider uppercase text-emerald-300/50">Menu Utama</div>
          <div class="space-y-1">
            <a href="#" class="active group flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all [&.active]:bg-white/12 [&.active]:text-white [&.active]:font-semibold [&.active]:shadow-sm [&.active]:ring-1 [&.active]:ring-white/15 text-emerald-100/70 hover:text-white hover:bg-white/5" onclick="switchSection('dashboardOverview', this)">
              <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 text-emerald-300/70 group-hover:text-white group-[.active]:text-accent group-[.active]:bg-accent/15">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5" stroke-width="1.8"/><rect x="14" y="3" width="7" height="7" rx="1.5" stroke-width="1.8"/><rect x="14" y="14" width="7" height="7" rx="1.5" stroke-width="1.8"/><rect x="3" y="14" width="7" height="7" rx="1.5" stroke-width="1.8"/></svg>
              </div>
              <span class="truncate">Dashboard Overview</span>
            </a>
          </div>
        </div>

        <!-- SECTION: KONTEN & AKADEMIK -->
        <div>
          <div class="px-3 pb-1.5 text-[10px] font-bold tracking-wider uppercase text-emerald-300/50">Konten & Informasi</div>
          <div class="space-y-1">
            <!-- Profil Pondok -->
            <a href="#" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all [&.active]:bg-white/12 [&.active]:text-white [&.active]:font-semibold [&.active]:shadow-sm [&.active]:ring-1 [&.active]:ring-white/15 text-emerald-100/70 hover:text-white hover:bg-white/5" onclick="switchSection('manageProfile', this)">
              <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 text-emerald-300/70 group-hover:text-white group-[.active]:text-accent group-[.active]:bg-accent/15">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
              </div>
              <span class="truncate">Kelola Profile Pondok</span>
            </a>

            <!-- Kurikulum -->
            <a href="#" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all [&.active]:bg-white/12 [&.active]:text-white [&.active]:font-semibold [&.active]:shadow-sm [&.active]:ring-1 [&.active]:ring-white/15 text-emerald-100/70 hover:text-white hover:bg-white/5" onclick="switchSection('manageProgram', this)">
              <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 text-emerald-300/70 group-hover:text-white group-[.active]:text-accent group-[.active]:bg-accent/15">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
              </div>
              <span class="truncate">Kelola Kurikulum</span>
            </a>

            <!-- Berita -->
            <a href="#" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all [&.active]:bg-white/12 [&.active]:text-white [&.active]:font-semibold [&.active]:shadow-sm [&.active]:ring-1 [&.active]:ring-white/15 text-emerald-100/70 hover:text-white hover:bg-white/5" onclick="switchSection('manageNews', this)">
              <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 text-emerald-300/70 group-hover:text-white group-[.active]:text-accent group-[.active]:bg-accent/15">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
              </div>
              <span class="truncate">Kelola Berita</span>
            </a>

            <!-- Jadwal -->
            <a href="#" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all [&.active]:bg-white/12 [&.active]:text-white [&.active]:font-semibold [&.active]:shadow-sm [&.active]:ring-1 [&.active]:ring-white/15 text-emerald-100/70 hover:text-white hover:bg-white/5" onclick="switchSection('manageSchedule', this)">
              <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 text-emerald-300/70 group-hover:text-white group-[.active]:text-accent group-[.active]:bg-accent/15">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" stroke-width="1.8"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 2v4M8 2v4M3 10h18M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01M16 18h.01"/></svg>
              </div>
              <span class="truncate">Kelola Jadwal</span>
            </a>

            <!-- Galeri Foto -->
            <a href="#" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all [&.active]:bg-white/12 [&.active]:text-white [&.active]:font-semibold [&.active]:shadow-sm [&.active]:ring-1 [&.active]:ring-white/15 text-emerald-100/70 hover:text-white hover:bg-white/5" onclick="switchSection('manageGallery', this)">
              <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 text-emerald-300/70 group-hover:text-white group-[.active]:text-accent group-[.active]:bg-accent/15">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
              </div>
              <span class="truncate">Kelola Galeri Foto</span>
            </a>
          </div>
        </div>

        <!-- SECTION: LAYANAN & ADMINISTRASI -->
        <div>
          <div class="px-3 pb-1.5 text-[10px] font-bold tracking-wider uppercase text-emerald-300/50">Layanan & Pendaftaran</div>
          <div class="space-y-1">
            <!-- PPDB -->
            <a href="#" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all [&.active]:bg-white/12 [&.active]:text-white [&.active]:font-semibold [&.active]:shadow-sm [&.active]:ring-1 [&.active]:ring-white/15 text-emerald-100/70 hover:text-white hover:bg-white/5" onclick="switchSection('managePPDB', this)">
              <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 text-emerald-300/70 group-hover:text-white group-[.active]:text-accent group-[.active]:bg-accent/15">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
              </div>
              <span class="truncate">Kelola PPDB</span>
            </a>

            <!-- Donasi & QRIS -->
            <a href="#" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all [&.active]:bg-white/12 [&.active]:text-white [&.active]:font-semibold [&.active]:shadow-sm [&.active]:ring-1 [&.active]:ring-white/15 text-emerald-100/70 hover:text-white hover:bg-white/5" onclick="switchSection('manageDonation', this)">
              <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 text-emerald-300/70 group-hover:text-white group-[.active]:text-accent group-[.active]:bg-accent/15">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
              </div>
              <span class="truncate">Kelola Donasi & QRIS</span>
            </a>

            <!-- Lokasi / Kontak -->
            <a href="#" class="group flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-all [&.active]:bg-white/12 [&.active]:text-white [&.active]:font-semibold [&.active]:shadow-sm [&.active]:ring-1 [&.active]:ring-white/15 text-emerald-100/70 hover:text-white hover:bg-white/5" onclick="switchSection('manageContact', this)">
              <div class="w-7 h-7 rounded-lg flex items-center justify-center shrink-0 text-emerald-300/70 group-hover:text-white group-[.active]:text-accent group-[.active]:bg-accent/15">
                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              </div>
              <span class="truncate">Kelola Lokasi</span>
            </a>
          </div>
        </div>

      </nav>

      <!-- FOOTER ACTIONS: LOGOUT -->
      <div class="p-4 border-t border-white/10 space-y-2 bg-black/10">
        <form method="POST" action="{{ route('logout') }}" class="w-full">
          @csrf
          <button type="submit" class="w-full flex items-center gap-2.5 px-3.5 py-2 rounded-xl text-xs font-semibold text-rose-300 hover:text-white hover:bg-rose-500/20 border border-rose-500/20 transition-all cursor-pointer text-left">
            <svg class="w-4 h-4 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            <span>Keluar Portal</span>
          </button>
        </form>
      </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="p-6 md:p-10 overflow-y-auto w-full">
      <!-- HEADER -->
      <header class="flex justify-between items-center pb-5 border-b border-slate-200 mb-8 flex-wrap gap-4">
        <div class="flex items-center gap-3.5">
          <button class="lg:hidden inline-flex items-center justify-center p-2 rounded-lg text-primary hover:bg-slate-200 text-2xl bg-transparent border-none cursor-pointer outline-none" onclick="toggleAdminSidebar()">☰</button>
          <div>
            <h2 class="text-xl sm:text-2xl font-bold font-outfit text-slate-800">Sistem Informasi Admin</h2>
            <p class="text-xs text-slate-500">PPTQ Imam Syaukani — Pengelolaan Web Pusat</p>
          </div>
        </div>
        <div class="flex items-center gap-3.5">
          <span class="text-xs sm:text-sm font-medium text-slate-500">Super Admin</span>
          <div class="w-10 h-10 rounded-full bg-accent text-primary-dark font-extrabold flex items-center justify-center select-none text-sm">AA</div>
        </div>
      </header>

      <!-- SECTION: OVERVIEW -->
      <section class="admin-content-section active [&.active]:block hidden" id="dashboardOverview">
        <div class="bg-gradient-to-br from-primary to-primary-light text-white p-6 sm:p-8 rounded-3xl mb-8 border-none shadow-sm flex flex-col items-start">
          <h3 class="text-white text-xl sm:text-2xl font-bold font-outfit mb-2">Selamat Datang di Dashboard Admin</h3>
          <p class="text-white/85 text-xs sm:text-sm leading-relaxed max-w-2xl">
            Anda memiliki akses penuh untuk mengelola konten website, data pendaftar (PPDB), dan informasi pondok pesantren. Pilih menu di samping untuk mulai mengelola.
          </p>
        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
          <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-primary-accent text-primary flex items-center justify-center text-2xl select-none">👥</div>
            <div>
              <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">24</h3>
              <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1">Santri Aktif</p>
            </div>
          </div>
          <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-primary-accent text-primary flex items-center justify-center text-2xl select-none">🎓</div>
            <div>
              <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">22</h3>
              <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1">Total Alumni</p>
            </div>
          </div>
          <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-primary-accent text-primary flex items-center justify-center text-2xl select-none">🕌</div>
            <div>
              <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">11</h3>
              <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1">Pendidik / Ustadz</p>
            </div>
          </div>
          <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-primary-accent text-primary flex items-center justify-center text-2xl select-none">📩</div>
            <div>
              <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">8</h3>
              <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1">Pendaftar PPDB</p>
            </div>
          </div>
        </div>
      </section>

      <!-- SECTION: KELOLA PROFILE PONDOK (SEJARAH) -->
      <section class="admin-content-section [&.active]:block hidden" id="manageProfile">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-2">Kelola Sejarah Pondok Pesantren</h3>
          <p class="text-xs text-slate-400 mb-6">Data ini akan tampil langsung di halaman Profil pengunjung website.</p>
          <form onsubmit="event.preventDefault(); alert('Perubahan Sejarah berhasil disimpan!');" class="space-y-5">
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Judul Sub-heading</label>
              <input type="text" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="Lor Etan Ngalor Ngidul" required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Sejarah / Latar Belakang Pendirian</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[150px] bg-white" required>Didirikan pada Juni 2019, PPTQ Imam Syaukani lahir dari latar belakang melihat banyaknya anak-anak yang ingin mendalami ilmu agama namun tidak memiliki tempat. Kami hadir untuk mengedukasi masyarakat tentang pentingnya ilmu agama dalam kehidupan sehari-hari serta meneruskan ajaran Rasulullah SAW.</textarea>
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Tujuan Utama Pendirian</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[100px] bg-white" required>Mencetak generasi yang beriman, berilmu, dan berakhlak mulia (ulama) yang mampu memahami dan mengamalkan ajaran Islam secara mendalam (tafaqquh fiddin), serta menyebarkannya kepada masyarakat luas.</textarea>
            </div>
            <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
              Simpan Perubahan
            </button>
          </form>
        </div>
      </section>

      <!-- SECTION: KELOLA PROFILE PONDOK (VISI MISI) -->
      <section class="admin-content-section [&.active]:block hidden" id="manageProfileVisi">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-6">Kelola Visi, Misi & Nilai Utama</h3>
          <form onsubmit="event.preventDefault(); alert('Perubahan Visi & Misi berhasil disimpan!');" class="space-y-5">
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Teks Visi Pondok</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[80px] bg-white" required>"Mencetak Generasi Qur'ani berakhlaq mulia, mandiri dan berwawasan luas."</textarea>
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Poin-poin Misi (Pisahkan dengan baris baru / Enter)</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[120px] bg-white" required>Mengadakan pendidikan berbasis Al-Qur'an.
Menyiapkan generasi masa depan yang berakhlaq mulia.
Mewujudkan pendidikan karakter melalui kebiasaan baik.</textarea>
            </div>
            <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
              Simpan Perubahan
            </button>
          </form>
        </div>
      </section>

      <!-- SECTION: KELOLA PROGRAM PENDIDIKAN -->
      <section class="admin-content-section [&.active]:block hidden" id="manageProgram">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-6">Kelola Program & Kurikulum Jenjang</h3>
          <form onsubmit="event.preventDefault(); alert('Program pendidikan berhasil diupdate!');" class="space-y-5">
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Poin Kurikulum Pendekatan Salaf</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[80px] bg-white" required>Fokus pada adab menuntut ilmu, pengkajian kitab kuning (Turast) bersanad, tahfidz mutqin, dan hifdzul matan (menghafal matan ilmu dasar).</textarea>
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Poin Kurikulum Pendekatan Modern</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[80px] bg-white" required>Pembelajaran pelajaran umum, wawasan global, administrasi yang rapi, serta metode pengajaran yang interaktif dan mudah dipahami santri.</textarea>
            </div>
            <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
              Simpan Perubahan
            </button>
          </form>
        </div>
      </section>

      <!-- SECTION: KELOLA BERITA -->
      <section class="admin-content-section [&.active]:block hidden" id="manageNews">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <div class="flex justify-between items-center gap-3.5 mb-6 flex-wrap">
            <h3 class="text-lg font-bold font-outfit text-primary">Data Berita & Sorotan Kegiatan</h3>
            <button class="inline-flex items-center justify-center px-4 py-2 bg-primary text-white rounded-full text-xs font-semibold hover:bg-primary-dark transition-all" onclick="alert('Form Berita Baru Dibuka!');">+ Tambah Berita Baru</button>
          </div>
          <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
            <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
              <thead>
                <tr class="bg-primary text-white">
                  <th class="w-16 p-4 font-semibold text-xs uppercase tracking-wider">No</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Judul Berita</th>
                  <th class="w-40 p-4 font-semibold text-xs uppercase tracking-wider">Kategori</th>
                  <th class="w-32 p-4 font-semibold text-xs uppercase tracking-wider">Tgl Publish</th>
                  <th class="w-32 p-4 font-semibold text-xs uppercase tracking-wider">Status</th>
                  <th class="w-40 p-4 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100">
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4">1</td>
                  <td class="p-4 whitespace-normal min-w-[220px] font-semibold text-slate-800">Alhamdulillah, 50 Santri Lulus Ujian Hafalan 30 Juz Tahun Ini</td>
                  <td class="p-4 text-slate-600">Kegiatan Santri</td>
                  <td class="p-4 text-slate-600">01 Jan 2026</td>
                  <td class="p-4"><span class="text-success font-bold">Aktif</span></td>
                  <td class="p-4 space-x-2">
                    <button class="inline-flex items-center justify-center px-3 py-1 border border-primary text-primary rounded-lg text-xs font-semibold hover:bg-primary hover:text-white transition-all" onclick="alert('Edit clicked!')">Edit</button>
                    <button class="text-danger hover:underline text-xs font-semibold" onclick="alert('Delete clicked!')">Hapus</button>
                  </td>
                </tr>
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4">2</td>
                  <td class="p-4 whitespace-normal min-w-[220px] font-semibold text-slate-800">Juara 1 Lomba Pidato Bahasa Arab Tingkat Nasional</td>
                  <td class="p-4 text-slate-600">Prestasi</td>
                  <td class="p-4 text-slate-600">01 Jan 2026</td>
                  <td class="p-4"><span class="text-success font-bold">Aktif</span></td>
                  <td class="p-4 space-x-2">
                    <button class="inline-flex items-center justify-center px-3 py-1 border border-primary text-primary rounded-lg text-xs font-semibold hover:bg-primary hover:text-white transition-all" onclick="alert('Edit clicked!')">Edit</button>
                    <button class="text-danger hover:underline text-xs font-semibold" onclick="alert('Delete clicked!')">Hapus</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- SECTION: KELOLA JADWAL -->
      <section class="admin-content-section [&.active]:block hidden" id="manageSchedule">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-6">Jadwal Harian Santri</h3>
          <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
            <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
              <thead>
                <tr class="bg-primary text-white">
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Waktu</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Nama Kegiatan</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Tujuan</th>
                  <th class="w-32 p-4 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100">
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4 font-semibold text-slate-700">Ba’da Subuh - 06:00</td>
                  <td class="p-4 font-semibold text-primary">Setoran Hafalan Al-Qur’an</td>
                  <td class="p-4 whitespace-normal min-w-[220px] text-slate-600">Setoran hafalan baru (Ziyadah/Muraja'ah).</td>
                  <td class="p-4">
                    <button class="inline-flex items-center justify-center px-3 py-1 border border-primary text-primary rounded-lg text-xs font-semibold hover:bg-primary hover:text-white transition-all" onclick="alert('Edit clicked!')">Edit</button>
                  </td>
                </tr>
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4 font-semibold text-slate-700">08:00 - Dzuhur</td>
                  <td class="p-4 font-semibold text-primary">Kajian Kitab Turast & Umum</td>
                  <td class="p-4 whitespace-normal min-w-[220px] text-slate-600">Belajar Kitab Turast dan Pelajaran Umum di kelas.</td>
                  <td class="p-4">
                    <button class="inline-flex items-center justify-center px-3 py-1 border border-primary text-primary rounded-lg text-xs font-semibold hover:bg-primary hover:text-white transition-all" onclick="alert('Edit clicked!')">Edit</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- SECTION: KELOLA DONASI -->
      <section class="admin-content-section [&.active]:block hidden" id="manageDonation">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-6">Kelola Rekening & QRIS Donasi</h3>
          <form onsubmit="event.preventDefault(); alert('Pengaturan Donasi disimpan!');" class="space-y-5">
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Nomor Rekening Bank BSI</label>
              <input type="text" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="99 999999 99999-99" required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Nama Pemilik Rekening *</label>
              <input type="text" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="Mr. Adi rohadi Dadi Dadi" required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">NMID QRIS</label>
              <input type="text" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="ID1029384756102" required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Upload Gambar Qris baru</label>
              <input type="file" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" accept="image/*" />
            </div>
            <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
              Simpan Perubahan
            </button>
          </form>
        </div>
      </section>

      <!-- SECTION: KELOLA LOKASI & CONTACT -->
      <section class="admin-content-section [&.active]:block hidden" id="manageContact">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-6">Kelola Hubungi Kami & Peta Lokasi</h3>
          <form onsubmit="event.preventDefault(); alert('Informasi lokasi pondok berhasil disimpan!');" class="space-y-5">
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Alamat Lengkap Kantor</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[80px] bg-white" required>Jl. Kramat Jati, RT 003 / RW 004, Desa Demangan, Kecamatan Sambi, Kabupaten Boyolali, Jawa Tengah 57376</textarea>
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Link Google Maps Embed (iframe src)</label>
              <input type="text" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="https://www.google.com/maps/embed?..." required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Nomor WhatsApp Humas</label>
              <input type="text" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="0888 8888 8888" required />
            </div>
            <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
              Simpan Perubahan
            </button>
          </form>
        </div>
      </section>

      <!-- SECTION: KELOLA PPDB -->
      <section class="admin-content-section [&.active]:block hidden" id="managePPDB">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-6">Daftar Pendaftar Santri Baru (PPDB)</h3>
          <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
            <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
              <thead>
                <tr class="bg-primary text-white">
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">No</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Nama Calon Santri</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">NIK</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Jenis Kelamin</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Jenjang Dituju</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Wali Santri</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">No. WhatsApp</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100">
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4">1</td>
                  <td class="p-4 font-semibold text-slate-800">Ahmad Zaid</td>
                  <td class="p-4 text-slate-600">3315020911070001</td>
                  <td class="p-4 text-slate-600">Laki-laki</td>
                  <td class="p-4 text-slate-600">MA/SMA</td>
                  <td class="p-4 text-slate-600">Abu Ahmad</td>
                  <td class="p-4 text-slate-600">081234567890</td>
                  <td class="p-4 space-x-2">
                    <button class="inline-flex items-center justify-center px-3 py-1 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-primary-dark transition-all" onclick="alert('Data disetujui!');">Terima</button>
                    <button class="text-danger hover:underline text-xs font-semibold" onclick="alert('Data ditolak!');">Tolak</button>
                  </td>
                </tr>
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4">2</td>
                  <td class="p-4 font-semibold text-slate-800">Muhammad Al-Fatih</td>
                  <td class="p-4 text-slate-600">3315020911070002</td>
                  <td class="p-4 text-slate-600">Laki-laki</td>
                  <td class="p-4 text-slate-600">MTs/SMP</td>
                  <td class="p-4 text-slate-600">Usman</td>
                  <td class="p-4 text-slate-600">081234567891</td>
                  <td class="p-4 space-x-2">
                    <button class="inline-flex items-center justify-center px-3 py-1 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-primary-dark transition-all" onclick="alert('Data disetujui!');">Terima</button>
                    <button class="text-danger hover:underline text-xs font-semibold" onclick="alert('Data ditolak!');">Tolak</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- SECTION: KELOLA GALERI -->
      <section class="admin-content-section [&.active]:block hidden" id="manageGallery">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <div class="flex justify-between items-center gap-3.5 mb-6 flex-wrap">
            <h3 class="text-lg font-bold font-outfit text-primary">Kelola Galeri Foto Pondok</h3>
            <button class="inline-flex items-center justify-center px-4 py-2 bg-primary text-white rounded-full text-xs font-semibold hover:bg-primary-dark transition-all" onclick="alert('Form Upload Foto Dibuka!');">+ Upload Gambar</button>
          </div>
          <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
            <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
              <thead>
                <tr class="bg-primary text-white">
                  <th class="w-16 p-4 font-semibold text-xs uppercase tracking-wider">No</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Preview</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Nama Kegiatan</th>
                  <th class="w-40 p-4 font-semibold text-xs uppercase tracking-wider">Kategori</th>
                  <th class="w-32 p-4 font-semibold text-xs uppercase tracking-wider">Waktu Upload</th>
                  <th class="w-32 p-4 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100">
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4">1</td>
                  <td class="p-4 text-2xl select-none">Masjid</td>
                  <td class="p-4 font-semibold text-slate-800">Masjid Baiatur Ridwan</td>
                  <td class="p-4 text-slate-600">Fasilitas</td>
                  <td class="p-4 text-slate-600">01 Jan 2026</td>
                  <td class="p-4">
                    <button class="text-danger hover:underline text-xs font-semibold" onclick="alert('Delete clicked!')">Hapus</button>
                  </td>
                </tr>
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4">2</td>
                  <td class="p-4 text-2xl select-none">Buku</td>
                  <td class="p-4 font-semibold text-slate-800">Setoran Hafalan Al-Qur’an</td>
                  <td class="p-4 text-slate-600">Kegiatan Santri</td>
                  <td class="p-4 text-slate-600">01 Jan 2026</td>
                  <td class="p-4">
                    <button class="text-danger hover:underline text-xs font-semibold" onclick="alert('Delete clicked!')">Hapus</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </main>
  </div>

  <script>
    function toggleAdminSidebar() {
      const sidebar = document.querySelector('.sidebar-admin');
      sidebar.classList.toggle('active');
    }

    function switchSection(sectionId, element) {
      // Hide all content sections
      document.querySelectorAll('.admin-content-section').forEach(sec => {
        sec.classList.remove('active');
        sec.classList.add('hidden');
      });

      // Show targeted content section
      const activeSec = document.getElementById(sectionId);
      if (activeSec) {
        activeSec.classList.remove('hidden');
        activeSec.classList.add('active');
      }

      // Remove active class from menu list links
      document.querySelectorAll('.sidebar-admin nav a').forEach(a => {
        a.classList.remove('active');
      });
      document.querySelectorAll('.sidebar-admin .pl-10 a').forEach(a => {
        a.classList.remove('active');
      });

      // Highlight active menu item
      if (element) {
        element.classList.add('active');
      }

      // Close drawer on mobile after selection
      const sidebar = document.querySelector('.sidebar-admin');
      if (sidebar.classList.contains('active')) {
        sidebar.classList.remove('active');
      }
    }
  </script>
</body>
</html>
