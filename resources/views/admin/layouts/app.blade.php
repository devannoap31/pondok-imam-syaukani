<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Dashboard Admin – PPTQ Imam Syaukani')</title>
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
    .sidebar-admin {
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .sidebar-admin.active {
      left: 0;
    }
  </style>
  @yield('styles')
</head>
<body class="bg-slate-50">

  <div class="grid grid-cols-1 lg:grid-cols-[260px_1fr] min-h-screen">
    
    <!-- SIDEBAR -->
    <aside class="sidebar-admin fixed top-0 -left-[280px] lg:left-0 w-[280px] lg:w-full h-screen bg-primary-dark text-white p-6 lg:p-8 flex flex-col z-[1100] transition-all duration-300 shadow-2xl lg:shadow-none lg:relative">
      <button class="lg:hidden text-white/70 hover:text-white text-3xl font-light self-end mb-5 bg-transparent border-none cursor-pointer outline-none" onclick="toggleAdminSidebar()">&times;</button>
      
      <div class="font-outfit text-xl font-extrabold tracking-tight text-white mb-10 flex items-center gap-2 select-none">
        <span class="text-accent font-extrabold">PPTQ</span> Imam Syaukani
      </div>

      <div class="flex items-center gap-3.5 mb-8 border-b border-white/10 pb-5">
        <div class="w-10 h-10 rounded-full bg-accent text-primary-dark font-extrabold flex items-center justify-center select-none">{{ substr(Auth::user()->name, 0, 2) }}</div>
        <div>
          <div class="font-semibold text-sm text-white">{{ Auth::user()->name }}</div>
          <div class="text-accent text-[11px] font-medium tracking-wide">Super Admin</div>
        </div>
      </div>

      <nav class="flex flex-col gap-1.5 overflow-y-auto flex-1 pr-2">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('dashboard') ? 'text-accent bg-white/12 border-l-4 border-accent' : 'text-white/70 hover:text-white hover:bg-white/8' }}">
          <span>📊</span> Dashboard Overview
        </a>
        
        <a href="{{ route('profil-pondok.index') }}" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('profil-pondok.*') ? 'text-accent bg-white/12 border-l-4 border-accent' : 'text-white/70 hover:text-white hover:bg-white/8' }}">
          <span>🕌</span> Kelola Profile Pondok
        </a>

        <a href="{{ route('program-pendidikan.index') }}" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('program-pendidikan.*') ? 'text-accent bg-white/12 border-l-4 border-accent mt-2.5' : 'text-white/70 hover:text-white hover:bg-white/8 mt-2.5' }}">
          <span>📖</span> Kelola Kurikulum
        </a>

        <a href="{{ route('berita.index') }}" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('berita.*') ? 'text-accent bg-white/12 border-l-4 border-accent' : 'text-white/70 hover:text-white hover:bg-white/8' }}">
          <span>📰</span> Kelola Berita
        </a>

        <a href="{{ route('jadwal.index') }}" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('jadwal.*') ? 'text-accent bg-white/12 border-l-4 border-accent' : 'text-white/70 hover:text-white hover:bg-white/8' }}">
          <span>📅</span> Kelola Jadwal
        </a>

        <a href="{{ route('donasi.index') }}" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('donasi.*') || request()->routeIs('qris.*') ? 'text-accent bg-white/12 border-l-4 border-accent' : 'text-white/70 hover:text-white hover:bg-white/8' }}">
          <span>💰</span> Kelola Donasi & QRIS
        </a>

        <a href="{{ route('kontak-admin.index') }}" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('kontak-admin.*') ? 'text-accent bg-white/12 border-l-4 border-accent' : 'text-white/70 hover:text-white hover:bg-white/8' }}">
          <span>📍</span> Kelola Lokasi
        </a>

        <a href="{{ route('pendaftaran.index') }}" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('pendaftaran.*') ? 'text-accent bg-white/12 border-l-4 border-accent' : 'text-white/70 hover:text-white hover:bg-white/8' }}">
          <span>👥</span> Kelola PPDB
        </a>

        <a href="{{ route('galeri-admin.index') }}" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium transition-all {{ request()->routeIs('galeri-admin.*') ? 'text-accent bg-white/12 border-l-4 border-accent' : 'text-white/70 hover:text-white hover:bg-white/8' }}">
          <span>🖼️</span> Kelola Galeri Foto
        </a>

        <form method="POST" action="{{ route('logout') }}" class="mt-8">
          @csrf
          <button type="submit" class="w-full flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium text-danger hover:bg-danger/8 transition-all cursor-pointer text-left border-none bg-transparent outline-none">
            <span>🚪</span> Keluar Portal
          </button>
        </form>
      </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="p-6 md:p-10 overflow-y-auto w-full relative">
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
          <div class="w-10 h-10 rounded-full bg-accent text-primary-dark font-extrabold flex items-center justify-center select-none text-sm">{{ substr(Auth::user()->name, 0, 2) }}</div>
        </div>
      </header>

      @yield('content')
      {{ $slot ?? '' }}
      
    </main>
  </div>

  <script>
    function toggleAdminSidebar() {
      const sidebar = document.querySelector('.sidebar-admin');
      sidebar.classList.toggle('active');
    }
  </script>
  @yield('scripts')
</body>
</html>
