  <!-- NAVBAR -->
  <nav id="main-navbar" class="sticky top-0 z-50 navbar-transparent border-b border-white/10 transition-all duration-300">
    <div class="flex items-center justify-between h-20 max-w-[1200px] mx-auto px-6">
      <a href="{{ url('/') }}" class="flex items-center gap-3 text-white font-outfit text-xl sm:text-2xl font-extrabold tracking-tight flex-shrink-0">
        <span class="text-accent">Imam</span> Syaukani
      </a>
      
      <!-- DESKTOP MENU -->
      <ul class="hidden md:flex items-center gap-1">
        <li>
          <a href="{{ url('/') }}" class="text-white/90 px-4 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'home' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            <span data-lang-key="nav-home">HOME</span>
          </a>
        </li>
        <li class="relative group">
          <a href="{{ url('/profil') }}" class="text-white/90 px-4 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'profile' || ($activePage ?? '') === 'gallery' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            <span data-lang-key="nav-profile">PROFILE ▾</span>
          </a>
          <ul class="absolute left-0 top-full bg-white min-w-[180px] rounded-xl shadow-xl py-2 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-50">
            <li>
              <a href="{{ url('/profil') }}" class="block text-gray-700 px-5 py-2.5 font-medium hover:bg-gray-100 hover:text-primary transition-colors text-sm">
                <span data-lang-key="nav-profile-sub">PROFILE</span>
              </a>
            </li>
            <li>
              <a href="{{ url('/galeri') }}" class="block text-gray-700 px-5 py-2.5 font-medium hover:bg-gray-100 hover:text-primary transition-colors text-sm">
                <span data-lang-key="nav-gallery">GALERI</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="{{ url('/berita') }}" class="text-white/90 px-4 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'news' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            <span data-lang-key="nav-news">BERITA</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/sekolah') }}" class="text-white/90 px-4 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'school' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            <span data-lang-key="nav-school">SEKOLAH</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/jadwal') }}" class="text-white/90 px-4 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'schedule' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            <span data-lang-key="nav-schedule">JADWAL</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/donasi') }}" class="text-white/90 px-4 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'donation' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            <span data-lang-key="nav-donation">DONASI</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/lokasi') }}" class="text-white/90 px-4 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'location' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            <span data-lang-key="nav-location">LOKASI</span>
          </a>
        </li>
      </ul>

      <!-- DESKTOP ACTIONS -->
      <div class="hidden md:flex items-center gap-3">
        <!-- Language Switcher -->
        <div class="flex items-center bg-white/10 rounded-full p-0.5 border border-white/20 text-xs font-semibold">
          <button data-lang="id" onclick="switchLanguage('id')" class="lang-btn px-3 py-1 rounded-full text-white transition-all duration-250">
            🇮🇩 ID
          </button>
          <button data-lang="en" onclick="switchLanguage('en')" class="lang-btn px-3 py-1 rounded-full text-white transition-all duration-250">
            🇬🇧 EN
          </button>
        </div>
        <a href="{{ url('/daftar') }}" class="ripple-btn inline-flex items-center justify-center px-5 py-2.5 bg-accent text-primary-dark rounded-full text-xs font-semibold shadow-sm transition-all hover:bg-accent-dark hover:-translate-y-0.5 hover:shadow-[0_4px_12px_rgba(255,170,0,0.4)]">
          <span data-lang-key="nav-register">Pendaftaran</span>
        </a>
      </div>

      <!-- MOBILE TOGGLE -->
      <div id="hamburger" class="flex md:hidden flex-col gap-[5px] cursor-pointer p-1" onclick="toggleMobileMenu()">
        <span class="ham-bar block w-7 h-0.5 bg-white rounded"></span>
        <span class="ham-bar block w-5 h-0.5 bg-white rounded"></span>
        <span class="ham-bar block w-7 h-0.5 bg-white rounded"></span>
      </div>
    </div>
  </nav>

  <!-- MOBILE MENU -->
  <div id="mobileMenu" class="mobile-menu fixed top-20 left-0 w-full bg-primary-dark px-6 border-t border-white/10 border-b-2 border-accent shadow-2xl z-[999]">
    <a href="{{ url('/') }}" class="block text-white py-2.5 font-semibold border-b border-white/8 {{ ($activePage ?? '') === 'home' ? 'text-accent' : '' }}">
      <span data-lang-key="nav-home">HOME</span>
    </a>
    <a href="{{ url('/profil') }}" class="block text-white py-2.5 font-semibold border-b border-white/8 {{ ($activePage ?? '') === 'profile' ? 'text-accent' : '' }}">
      <span data-lang-key="nav-profile-sub">PROFILE</span>
    </a>
    <a href="{{ url('/galeri') }}" class="block text-white/80 py-2 font-semibold pl-4 border-b border-white/8 {{ ($activePage ?? '') === 'gallery' ? 'text-accent' : '' }}">
      ↳ <span data-lang-key="nav-gallery">GALERI</span>
    </a>
    <a href="{{ url('/berita') }}" class="block text-white py-2.5 font-semibold border-b border-white/8 {{ ($activePage ?? '') === 'news' ? 'text-accent' : '' }}">
      <span data-lang-key="nav-news">BERITA</span>
    </a>
    <a href="{{ url('/sekolah') }}" class="block text-white py-2.5 font-semibold border-b border-white/8 {{ ($activePage ?? '') === 'school' ? 'text-accent' : '' }}">
      <span data-lang-key="nav-school">SEKOLAH</span>
    </a>
    <a href="{{ url('/jadwal') }}" class="block text-white py-2.5 font-semibold border-b border-white/8 {{ ($activePage ?? '') === 'schedule' ? 'text-accent' : '' }}">
      <span data-lang-key="nav-schedule">JADWAL</span>
    </a>
    <a href="{{ url('/donasi') }}" class="block text-white py-2.5 font-semibold border-b border-white/8 {{ ($activePage ?? '') === 'donation' ? 'text-accent' : '' }}">
      <span data-lang-key="nav-donation">DONASI</span>
    </a>
    <a href="{{ url('/lokasi') }}" class="block text-white py-2.5 font-semibold border-b border-white/8 {{ ($activePage ?? '') === 'location' ? 'text-accent' : '' }}">
      <span data-lang-key="nav-location">LOKASI</span>
    </a>
    <!-- Mobile Language Switcher -->
    <div class="flex items-center gap-3 mt-4 mb-2">
      <span class="text-white/60 text-xs font-medium">Language:</span>
      <div class="flex items-center bg-white/10 rounded-full p-0.5 border border-white/20 text-xs font-semibold">
        <button data-lang="id" onclick="switchLanguage('id')" class="lang-btn px-3 py-1 rounded-full text-white transition-all duration-250">
          🇮🇩 ID
        </button>
        <button data-lang="en" onclick="switchLanguage('en')" class="lang-btn px-3 py-1 rounded-full text-white transition-all duration-250">
          🇬🇧 EN
        </button>
      </div>
    </div>
    <a href="{{ url('/daftar') }}" class="ripple-btn block w-full text-center py-2.5 mt-2 mb-1 bg-accent text-primary-dark rounded-full text-sm font-semibold shadow-sm hover:bg-accent-dark">
      <span data-lang-key="nav-register">Pendaftaran</span>
    </a>
  </div>
