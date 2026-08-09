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
      transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    }
    @media (max-width: 1023px) {
      .sidebar-admin {
        transform: translateX(-100%);
      }
      .sidebar-admin.active {
        transform: translateX(0);
      }
    }
    #sidebarOverlay {
      transition: opacity 0.3s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      opacity: 0;
      visibility: hidden;
      pointer-events: none;
    }
    #sidebarOverlay.active {
      opacity: 1;
      visibility: visible;
      pointer-events: auto;
    }
    @keyframes pageFadeIn {
      from {
        opacity: 0;
        transform: translateY(8px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .admin-page-container {
      animation: pageFadeIn 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    @keyframes modalScaleUp {
      from {
        opacity: 0;
        transform: scale(0.95) translateY(10px);
      }
      to {
        opacity: 1;
        transform: scale(1) translateY(0);
      }
    }
    .animate-scale-up {
      animation: modalScaleUp 0.25s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .custom-sidebar-scrollbar::-webkit-scrollbar {
      width: 4px;
    }
    .custom-sidebar-scrollbar::-webkit-scrollbar-track {
      background: transparent;
    }
    .custom-sidebar-scrollbar::-webkit-scrollbar-thumb {
      background: rgba(255, 255, 255, 0.12);
      border-radius: 4px;
    }
    .custom-sidebar-scrollbar::-webkit-scrollbar-thumb:hover {
      background: rgba(255, 255, 255, 0.25);
    }
  </style>
  <!-- SWEETALERT2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  @yield('styles')
</head>
<body class="bg-slate-50 antialiased text-slate-700">

  <!-- MOBILE OVERLAY BACKDROP -->
  <div id="sidebarOverlay" class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs z-[1050] lg:hidden" onclick="toggleAdminSidebar()"></div>

  <div class="grid grid-cols-1 lg:grid-cols-[270px_1fr] min-h-screen w-full">
    
    <!-- SIDEBAR -->
    <aside class="sidebar-admin fixed top-0 left-0 w-[270px] h-screen max-h-screen bg-[#0A3329] text-white flex flex-col z-[1100] shadow-2xl lg:shadow-none lg:sticky lg:top-0 border-r border-emerald-900/30 shrink-0 select-none">
      
      <!-- BRAND / LOGO (PINNED TOP) -->
      <div class="px-5 py-4.5 flex items-center justify-between border-b border-white/10 shrink-0">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 group">
          <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-accent to-amber-500 flex items-center justify-center text-primary-dark font-extrabold shadow-md shadow-amber-500/20 group-hover:scale-105 group-hover:rotate-3 transition-all duration-300">
            <svg class="w-5 h-5 text-primary-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
          </div>
          <div>
            <div class="font-outfit text-sm font-bold tracking-tight text-white leading-tight flex items-center gap-1">
              <span class="text-accent font-extrabold">PPTQ</span> Imam Syaukani
            </div>
            <span class="text-[10px] text-emerald-200/60 font-medium tracking-wide">Panel Administrasi</span>
          </div>
        </a>
        <button class="lg:hidden p-1.5 text-white/70 hover:text-white rounded-lg hover:bg-white/10 active:scale-95 transition-all duration-200 cursor-pointer" onclick="toggleAdminSidebar()" aria-label="Tutup Menu">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
      </div>

      <!-- USER PROFILE CARD (PINNED) -->
      <div class="px-4 py-3 shrink-0">
        <div class="bg-white/5 border border-white/10 rounded-xl p-2.5 flex items-center gap-2.5 hover:bg-white/10 hover:border-white/20 transition-all duration-200">
          <div class="relative shrink-0">
            <div class="w-8.5 h-8.5 rounded-lg bg-accent/20 border border-accent/40 text-accent font-bold font-outfit text-xs flex items-center justify-center select-none shadow-sm transition-transform duration-200 hover:scale-105">
              {{ substr(Auth::user()->name ?? 'AD', 0, 2) }}
            </div>
            <span class="absolute -bottom-0.5 -right-0.5 w-2 h-2 bg-emerald-400 border-2 border-[#0A3329] rounded-full animate-pulse"></span>
          </div>
          <div class="min-w-0 flex-1">
            <div class="font-semibold text-xs text-white truncate">{{ Auth::user()->name ?? 'Administrator' }}</div>
            <div class="flex items-center gap-1 mt-0.5">
              <span class="text-[9px] font-semibold text-amber-400 bg-amber-400/10 px-1.5 py-0.5 rounded">Super Admin</span>
            </div>
          </div>
        </div>
      </div>

      <!-- NAVIGATION MENU (SCROLLABLE AREA) -->
      <nav class="flex-1 min-h-0 overflow-y-auto px-3 py-1 space-y-3 text-xs font-medium custom-sidebar-scrollbar">
        
        <!-- SECTION: UTAMA -->
        <div>
          <div class="px-2.5 pb-1 text-[9.5px] font-bold tracking-wider uppercase text-emerald-300/50">Menu Utama</div>
          <div class="space-y-0.5">
            <a href="{{ route('dashboard') }}" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl transition-all duration-200 ease-out hover:translate-x-1 active:scale-[0.98] {{ request()->routeIs('dashboard') ? 'bg-white/12 text-white font-semibold shadow-sm ring-1 ring-white/15' : 'text-emerald-100/70 hover:text-white hover:bg-white/8' }}">
              <div class="w-6.5 h-6.5 rounded-lg flex items-center justify-center shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('dashboard') ? 'text-accent bg-accent/15' : 'text-emerald-300/70 group-hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1.5" stroke-width="1.8"/><rect x="14" y="3" width="7" height="7" rx="1.5" stroke-width="1.8"/><rect x="14" y="14" width="7" height="7" rx="1.5" stroke-width="1.8"/><rect x="3" y="14" width="7" height="7" rx="1.5" stroke-width="1.8"/></svg>
              </div>
              <span class="truncate">Dashboard Overview</span>
            </a>
          </div>
        </div>

        <!-- SECTION: KONTEN & AKADEMIK -->
        <div>
          <div class="px-2.5 pb-1 text-[9.5px] font-bold tracking-wider uppercase text-emerald-300/50">Konten & Informasi</div>
          <div class="space-y-0.5">
            <!-- Profil Pondok -->
            <a href="{{ route('profil-pondok.index') }}" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl transition-all duration-200 ease-out hover:translate-x-1 active:scale-[0.98] {{ request()->routeIs('profil-pondok.*') ? 'bg-white/12 text-white font-semibold shadow-sm ring-1 ring-white/15' : 'text-emerald-100/70 hover:text-white hover:bg-white/8' }}">
              <div class="w-6.5 h-6.5 rounded-lg flex items-center justify-center shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('profil-pondok.*') ? 'text-accent bg-accent/15' : 'text-emerald-300/70 group-hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
              </div>
              <span class="truncate">Kelola Profile Pondok</span>
            </a>

            <!-- Kurikulum -->
            <a href="{{ route('program-pendidikan.index') }}" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl transition-all duration-200 ease-out hover:translate-x-1 active:scale-[0.98] {{ request()->routeIs('program-pendidikan.*') ? 'bg-white/12 text-white font-semibold shadow-sm ring-1 ring-white/15' : 'text-emerald-100/70 hover:text-white hover:bg-white/8' }}">
              <div class="w-6.5 h-6.5 rounded-lg flex items-center justify-center shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('program-pendidikan.*') ? 'text-accent bg-accent/15' : 'text-emerald-300/70 group-hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
              </div>
              <span class="truncate">Kelola Kurikulum</span>
            </a>

            <!-- Berita -->
            <a href="{{ route('berita.index') }}" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl transition-all duration-200 ease-out hover:translate-x-1 active:scale-[0.98] {{ request()->routeIs('berita.*') ? 'bg-white/12 text-white font-semibold shadow-sm ring-1 ring-white/15' : 'text-emerald-100/70 hover:text-white hover:bg-white/8' }}">
              <div class="w-6.5 h-6.5 rounded-lg flex items-center justify-center shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('berita.*') ? 'text-accent bg-accent/15' : 'text-emerald-300/70 group-hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
              </div>
              <span class="truncate">Kelola Berita</span>
            </a>

            <!-- Jadwal -->
            <a href="{{ route('jadwal.index') }}" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl transition-all duration-200 ease-out hover:translate-x-1 active:scale-[0.98] {{ request()->routeIs('jadwal.*') ? 'bg-white/12 text-white font-semibold shadow-sm ring-1 ring-white/15' : 'text-emerald-100/70 hover:text-white hover:bg-white/8' }}">
              <div class="w-6.5 h-6.5 rounded-lg flex items-center justify-center shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('jadwal.*') ? 'text-accent bg-accent/15' : 'text-emerald-300/70 group-hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" stroke-width="1.8"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 2v4M8 2v4M3 10h18M8 14h.01M12 14h.01M16 14h.01M8 18h.01M12 18h.01M16 18h.01"/></svg>
              </div>
              <span class="truncate">Kelola Jadwal</span>
            </a>

            <!-- Galeri Foto -->
            <a href="{{ route('galeri-admin.index') }}" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl transition-all duration-200 ease-out hover:translate-x-1 active:scale-[0.98] {{ request()->routeIs('galeri-admin.*') ? 'bg-white/12 text-white font-semibold shadow-sm ring-1 ring-white/15' : 'text-emerald-100/70 hover:text-white hover:bg-white/8' }}">
              <div class="w-6.5 h-6.5 rounded-lg flex items-center justify-center shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('galeri-admin.*') ? 'text-accent bg-accent/15' : 'text-emerald-300/70 group-hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
              </div>
              <span class="truncate">Kelola Galeri Foto</span>
            </a>
          </div>
        </div>

        <!-- SECTION: LAYANAN & ADMINISTRASI -->
        <div>
          <div class="px-2.5 pb-1 text-[9.5px] font-bold tracking-wider uppercase text-emerald-300/50">Layanan & Pendaftaran</div>
          <div class="space-y-0.5">
            <!-- PPDB -->
            <a href="{{ route('pendaftaran.index') }}" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl transition-all duration-200 ease-out hover:translate-x-1 active:scale-[0.98] {{ request()->routeIs('pendaftaran.*') ? 'bg-white/12 text-white font-semibold shadow-sm ring-1 ring-white/15' : 'text-emerald-100/70 hover:text-white hover:bg-white/8' }}">
              <div class="w-6.5 h-6.5 rounded-lg flex items-center justify-center shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('pendaftaran.*') ? 'text-accent bg-accent/15' : 'text-emerald-300/70 group-hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
              </div>
              <span class="truncate">Kelola PPDB</span>
            </a>

            <!-- Donasi & QRIS -->
            <a href="{{ route('donasi.index') }}" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl transition-all duration-200 ease-out hover:translate-x-1 active:scale-[0.98] {{ request()->routeIs('donasi.*') || request()->routeIs('qris.*') ? 'bg-white/12 text-white font-semibold shadow-sm ring-1 ring-white/15' : 'text-emerald-100/70 hover:text-white hover:bg-white/8' }}">
              <div class="w-6.5 h-6.5 rounded-lg flex items-center justify-center shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('donasi.*') || request()->routeIs('qris.*') ? 'text-accent bg-accent/15' : 'text-emerald-300/70 group-hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
              </div>
              <span class="truncate">Kelola Donasi & QRIS</span>
            </a>

            <!-- Lokasi / Kontak -->
            <a href="{{ route('kontak-admin.index') }}" class="group flex items-center gap-2.5 px-3 py-2 rounded-xl transition-all duration-200 ease-out hover:translate-x-1 active:scale-[0.98] {{ request()->routeIs('kontak-admin.*') ? 'bg-white/12 text-white font-semibold shadow-sm ring-1 ring-white/15' : 'text-emerald-100/70 hover:text-white hover:bg-white/8' }}">
              <div class="w-6.5 h-6.5 rounded-lg flex items-center justify-center shrink-0 transition-transform duration-200 group-hover:scale-110 {{ request()->routeIs('kontak-admin.*') ? 'text-accent bg-accent/15' : 'text-emerald-300/70 group-hover:text-white' }}">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              </div>
              <span class="truncate">Kelola Lokasi</span>
            </a>
          </div>
        </div>

      </nav>

      <!-- FOOTER ACTIONS: VIEW SITE & LOGOUT (PINNED BOTTOM) -->
      <div class="p-3 border-t border-white/10 space-y-1.5 bg-black/10 shrink-0">
        <a href="{{ route('home') }}" target="_blank" class="w-full flex items-center justify-between px-3 py-1.5 rounded-xl text-xs font-medium text-emerald-200/80 hover:text-white hover:bg-white/10 hover:translate-x-1 transition-all duration-200">
          <span class="flex items-center gap-2">
            <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            Lihat Website
          </span>
          <svg class="w-3 h-3 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        </a>

        <form method="POST" action="{{ route('logout') }}" class="w-full">
          @csrf
          <button type="submit" class="w-full flex items-center gap-2 px-3 py-1.5 rounded-xl text-xs font-semibold text-rose-300 hover:text-white hover:bg-rose-500/20 border border-rose-500/20 active:scale-[0.98] transition-all duration-200 cursor-pointer text-left">
            <svg class="w-3.5 h-3.5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            <span>Keluar Portal</span>
          </button>
        </form>
      </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="p-4 sm:p-6 lg:p-8 w-full relative min-w-0 min-h-screen flex flex-col overflow-x-hidden">
      <!-- HEADER -->
      <header class="flex justify-between items-center pb-4 border-b border-slate-200 mb-6 flex-wrap gap-4 shrink-0">
        <div class="flex items-center gap-3">
          <button class="lg:hidden inline-flex items-center justify-center p-2 rounded-xl text-primary hover:bg-slate-100 text-xl border border-slate-200 active:scale-95 cursor-pointer transition-all duration-200 shadow-xs" onclick="toggleAdminSidebar()" aria-label="Buka Sidebar">
            <svg class="w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
          </button>
          <div>
            <h2 class="text-lg sm:text-xl font-bold font-outfit text-slate-800">Sistem Informasi Admin</h2>
            <p class="text-[11px] sm:text-xs text-slate-500">PPTQ Imam Syaukani — Pengelolaan Web Pusat</p>
          </div>
        </div>
        <div class="flex items-center gap-3">
          <div class="text-right hidden sm:block">
            <div class="text-xs font-semibold text-slate-800">{{ Auth::user()->name ?? 'Administrator' }}</div>
            <div class="text-[10px] font-medium text-slate-400">Super Admin</div>
          </div>
          <div class="w-9 h-9 rounded-xl bg-primary text-accent font-bold text-xs flex items-center justify-center select-none shadow-xs border border-primary/20 hover:scale-105 transition-transform duration-200">
            {{ substr(Auth::user()->name ?? 'AD', 0, 2) }}
          </div>
        </div>
      </header>

      <!-- PAGE BODY WITH SMOOTH ENTRANCE TRANSITION (FULL HEIGHT) -->
      <div class="admin-page-container flex-1 flex flex-col w-full">
        @yield('content')
        {{ $slot ?? '' }}
      </div>
      
    </main>
  </div>

  <script>
    function toggleAdminSidebar() {
      const sidebar = document.querySelector('.sidebar-admin');
      const overlay = document.getElementById('sidebarOverlay');
      sidebar.classList.toggle('active');
      if (overlay) {
        overlay.classList.toggle('active');
      }
    }

    function confirmDelete(event, itemName = 'data ini') {
      event.preventDefault();
      const form = event.target.closest('form');
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: `Anda akan menghapus ${itemName}. Data yang dihapus tidak dapat dikembalikan!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#EF4444',
        cancelButtonColor: '#64748B',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true,
        customClass: {
          popup: 'rounded-2xl',
          confirmButton: 'rounded-lg px-4 py-2 text-sm',
          cancelButton: 'rounded-lg px-4 py-2 text-sm'
        }
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    }
  </script>

  @if (session('success'))
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#124E3F',
        timer: 3500,
        timerProgressBar: true,
        customClass: {
          popup: 'rounded-2xl',
          confirmButton: 'rounded-lg px-5 py-2'
        }
      });
    });
  </script>
  @endif

  @if (session('error'))
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: "{{ session('error') }}",
        confirmButtonColor: '#EF4444',
        customClass: {
          popup: 'rounded-2xl',
          confirmButton: 'rounded-lg px-5 py-2'
        }
      });
    });
  </script>
  @endif

  @if (session('warning'))
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: 'warning',
        title: 'Peringatan',
        text: "{{ session('warning') }}",
        confirmButtonColor: '#F59E0B',
        customClass: {
          popup: 'rounded-2xl',
          confirmButton: 'rounded-lg px-5 py-2'
        }
      });
    });
  </script>
  @endif

  @if (session('status'))
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: 'info',
        title: 'Informasi',
        text: "{{ session('status') }}",
        confirmButtonColor: '#124E3F',
        customClass: {
          popup: 'rounded-2xl',
          confirmButton: 'rounded-lg px-5 py-2'
        }
      });
    });
  </script>
  @endif

  @if ($errors->any())
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let errorMessages = `{!! implode('<br>• ', $errors->all()) !!}`;
      Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan!',
        html: '<div class="text-left text-sm mt-2">• ' + errorMessages + '</div>',
        confirmButtonColor: '#EF4444',
        confirmButtonText: 'Mengerti',
        customClass: {
          popup: 'rounded-2xl',
          confirmButton: 'rounded-lg px-5 py-2'
        }
      });
    });
  </script>
  @endif

  @yield('scripts')
</body>
</html>
