<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'PPTQ Imam Syaukani')</title>
  <meta name="description" content="@yield('meta_description', 'Pondok Pesantren Tahfidzul Qur\'an Imam Syaukani berkomitmen mencetak generasi Qur\'ani yang berakhlak mulia, mandiri, dan berwawasan luas.')" />
  
  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- TAILWIND CSS v4 -->
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  
  <!-- CUSTOM TAILWIND CONFIG & BASE CLASSES -->
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
      
      --radius-sm: 6px;
      --radius-md: 12px;
      --radius-lg: 24px;
      
      --shadow-primary: 0 4px 14px 0 rgba(18, 78, 63, 0.2);
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

    /* Custom Mobile Menu Slide Down Transition */
    .mobile-menu {
      max-height: 0;
      overflow: hidden;
      opacity: 0;
      visibility: hidden;
      transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.25s ease-in-out, padding 0.3s ease-in-out;
    }
    .mobile-menu.active {
      max-height: 550px;
      opacity: 1;
      visibility: visible;
      padding-top: 1.25rem;
      padding-bottom: 1.25rem;
    }

    /* Admin Dashboard Mobile Sidebar */
    .admin-sidebar {
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .admin-sidebar.active {
      left: 0;
    }
  </style>
  
  @yield('styles')
</head>
<body>

  <!-- NAVBAR -->
  <nav class="sticky top-0 z-50 bg-primary border-b-3 border-accent shadow-md">
    <div class="flex items-center justify-between h-20 max-w-[1200px] mx-auto px-6">
      <a href="index.blade.php" class="flex items-center gap-3 text-white font-outfit text-xl sm:text-2xl font-extrabold tracking-tight">
        <span class="text-accent">Imam</span> Syaukani
      </a>
      
      <!-- DESKTOP MENU -->
      <ul class="hidden md:flex items-center gap-1.5">
        <li>
          <a href="index.blade.php" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ $activePage === 'home' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            HOME
          </a>
        </li>
        <li class="relative group">
          <a href="profil.blade.php" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ $activePage === 'profile' || $activePage === 'gallery' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            PROFILE ▾
          </a>
          <ul class="absolute left-0 top-full bg-white min-w-[180px] rounded-xl shadow-xl py-2 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-50">
            <li>
              <a href="profil.blade.php" class="block text-gray-700 px-5 py-2.5 font-medium hover:bg-gray-100 hover:text-primary transition-colors text-sm">
                PROFILE
              </a>
            </li>
            <li>
              <a href="galeri.blade.php" class="block text-gray-700 px-5 py-2.5 font-medium hover:bg-gray-100 hover:text-primary transition-colors text-sm">
                GALERI
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="berita.blade.php" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ $activePage === 'news' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            BERITA
          </a>
        </li>
        <li>
          <a href="sekolah.blade.php" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ $activePage === 'school' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            SEKOLAH
          </a>
        </li>
        <li>
          <a href="jadwal.blade.php" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ $activePage === 'schedule' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            JADWAL
          </a>
        </li>
        <li>
          <a href="donasi.blade.php" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ $activePage === 'donation' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            DONASI
          </a>
        </li>
        <li>
          <a href="lokasi.blade.php" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ $activePage === 'location' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            LOKASI
          </a>
        </li>
      </ul>

      <!-- DESKTOP ACTIONS -->
      <div class="hidden md:flex items-center gap-3.5">
        <a href="daftar.blade.php" class="inline-flex items-center justify-center px-5 py-2.5 bg-accent text-primary-dark rounded-full text-xs font-semibold shadow-sm transition-all hover:bg-accent-dark hover:-translate-y-0.5 hover:shadow-[0_4px_12px_rgba(255,170,0,0.4)]">
          Pendaftaran
        </a>
      </div>

      <!-- MOBILE TOGGLE -->
      <div class="flex md:hidden flex-col gap-1.5 cursor-pointer" onclick="toggleMobileMenu()">
        <span class="block w-7 h-0.5 bg-white rounded transition-all"></span>
        <span class="block w-7 h-0.5 bg-white rounded transition-all"></span>
        <span class="block w-7 h-0.5 bg-white rounded transition-all"></span>
      </div>
    </div>
  </nav>

  <!-- MOBILE MENU -->
  <div id="mobileMenu" class="mobile-menu fixed top-20 sm:top-[72px] left-0 w-full bg-primary-dark px-6 border-t border-white/10 border-b-3 border-accent shadow-2xl z-[999]">
    <a href="index.blade.php" class="block text-white py-2.5 font-semibold {{ $activePage === 'home' ? 'text-accent' : '' }}">HOME</a>
    <a href="profil.blade.php" class="block text-white py-2.5 font-semibold {{ $activePage === 'profile' ? 'text-accent' : '' }}">PROFILE</a>
    <a href="galeri.blade.php" class="block text-white py-2.5 font-semibold pl-5 {{ $activePage === 'gallery' ? 'text-accent' : '' }}">- GALERI</a>
    <a href="berita.blade.php" class="block text-white py-2.5 font-semibold {{ $activePage === 'news' ? 'text-accent' : '' }}">BERITA</a>
    <a href="sekolah.blade.php" class="block text-white py-2.5 font-semibold {{ $activePage === 'school' ? 'text-accent' : '' }}">SEKOLAH</a>
    <a href="jadwal.blade.php" class="block text-white py-2.5 font-semibold {{ $activePage === 'schedule' ? 'text-accent' : '' }}">JADWAL</a>
    <a href="donasi.blade.php" class="block text-white py-2.5 font-semibold {{ $activePage === 'donation' ? 'text-accent' : '' }}">DONASI</a>
    <a href="lokasi.blade.php" class="block text-white py-2.5 font-semibold {{ $activePage === 'location' ? 'text-accent' : '' }}">LOKASI</a>
    <a href="daftar.blade.php" class="block w-full text-center py-2.5 mt-3.5 bg-accent text-primary-dark rounded-full text-sm font-semibold shadow-sm hover:bg-accent-dark">
      Pendaftaran
    </a>
  </div>

  <!-- MAIN CONTENT -->
  <main>
    @yield('content')
  </main>

  <!-- FOOTER -->
  <footer class="bg-dark text-gray-400 pt-20 border-t-5 border-primary">
    <div class="max-w-[1200px] mx-auto px-6">
      <div class="grid grid-cols-2 lg:grid-cols-[1.5fr_1fr_1fr] gap-10 lg:gap-12 mb-12">
        
        <!-- Brand -->
        <div class="col-span-2 lg:col-span-1 flex flex-col items-center lg:items-start text-center lg:text-left mb-8 lg:mb-0">
          <div class="text-white text-2xl font-outfit font-extrabold flex items-center gap-3 mb-5">
            <span class="text-accent">PPTQ</span> Imam Syaukani
          </div>
          <p class="text-sm leading-relaxed text-gray-400 mb-6 max-w-sm">
            Pondok Pesantren Tahfidzul Qur'an Imam Syaukani berkomitmen mencetak generasi Qur'ani yang berakhlak mulia, mandiri, dan berwawasan luas.
          </p>
          <div class="flex gap-3">
            <a href="https://instagram.com/pptqimamsyaukani" class="w-10 h-10 rounded-full bg-white/5 text-white flex items-center justify-center hover:bg-accent hover:text-primary-dark transition-all duration-300 hover:-translate-y-1">📸</a>
            <a href="#" class="w-10 h-10 rounded-full bg-white/5 text-white flex items-center justify-center hover:bg-accent hover:text-primary-dark transition-all duration-300 hover:-translate-y-1">👥</a>
            <a href="#" class="w-10 h-10 rounded-full bg-white/5 text-white flex items-center justify-center hover:bg-accent hover:text-primary-dark transition-all duration-300 hover:-translate-y-1">📹</a>
          </div>
        </div>
        
        <!-- Quick Links (2-Column Side on Mobile) -->
        <div class="col-span-1 text-left">
          <h5 class="text-white text-lg font-semibold mb-6 pb-2 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-9 after:height-[3px] after:bg-accent">
            Tautan Cepat
          </h5>
          <ul class="space-y-3 text-sm">
            <li><a href="index.blade.php" class="hover:text-accent hover:pl-1.5 transition-all">› Home</a></li>
            <li><a href="profil.blade.php" class="hover:text-accent hover:pl-1.5 transition-all">› Profil</a></li>
            <li><a href="galeri.blade.php" class="hover:text-accent hover:pl-1.5 transition-all">› Galeri</a></li>
            <li><a href="berita.blade.php" class="hover:text-accent hover:pl-1.5 transition-all">› Berita</a></li>
            <li><a href="sekolah.blade.php" class="hover:text-accent hover:pl-1.5 transition-all">› Sekolah</a></li>
            <li><a href="jadwal.blade.php" class="hover:text-accent hover:pl-1.5 transition-all">› Jadwal</a></li>
            <li><a href="donasi.blade.php" class="hover:text-accent hover:pl-1.5 transition-all">› Donasi</a></li>
            <li><a href="lokasi.blade.php" class="hover:text-accent hover:pl-1.5 transition-all">› Lokasi</a></li>
          </ul>
        </div>
        
        <!-- Contacts (2-Column Side on Mobile) -->
        <div class="col-span-1 text-left">
          <h5 class="text-white text-lg font-semibold mb-6 pb-2 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-9 after:height-[3px] after:bg-accent">
            Hubungi Kami
          </h5>
          <ul class="space-y-4 text-sm">
            <li class="flex items-start gap-3">
              <span class="text-accent text-lg flex-shrink-0">📍</span>
              <span class="text-gray-400">Jl. Kramat Jati, Demangan, Sambi, Boyolali, Jawa Tengah 57376</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-accent text-lg flex-shrink-0">📞</span>
              <span class="text-gray-400">0888 8888 8888</span>
            </li>
            <li class="flex items-start gap-3">
              <span class="text-accent text-lg flex-shrink-0">✉️</span>
              <span class="text-gray-400">mrdih1213@gmail.com</span>
            </li>
          </ul>
        </div>
      </div>
      
      <!-- Footer Bottom -->
      <div class="border-t border-white/8 py-6 flex flex-col md:flex-row items-center justify-between text-xs text-gray-500 gap-2.5 text-center">
        <p>&copy; 2026 Copyright wann.two. All Rights Reserved.</p>
        <p>PPTQ Imam Syaukani - Boyolali</p>
      </div>
    </div>
  </footer>

  <script>
    function toggleMobileMenu() {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('active');
    }
  </script>
  @yield('scripts')
</body>
</html>
