  <!-- NAVBAR -->
  <nav class="sticky top-0 z-50 bg-primary border-b-3 border-accent shadow-md">
    <div class="flex items-center justify-between h-20 max-w-[1200px] mx-auto px-6">
      <a href="{{ url('/') }}" class="flex items-center gap-3 text-white font-outfit text-xl sm:text-2xl font-extrabold tracking-tight">
        <span class="text-accent">Imam</span> Syaukani
      </a>
      
      <!-- DESKTOP MENU -->
      <ul class="hidden md:flex items-center gap-1.5">
        <li>
          <a href="{{ url('/') }}" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'home' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            HOME
          </a>
        </li>
        <li class="relative group">
          <a href="{{ url('/profil') }}" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'profile' || ($activePage ?? '') === 'gallery' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            PROFILE ▾
          </a>
          <ul class="absolute left-0 top-full bg-white min-w-[180px] rounded-xl shadow-xl py-2 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-50">
            <li>
              <a href="{{ url('/profil') }}" class="block text-gray-700 px-5 py-2.5 font-medium hover:bg-gray-100 hover:text-primary transition-colors text-sm">
                PROFILE
              </a>
            </li>
            <li>
              <a href="{{ url('/galeri') }}" class="block text-gray-700 px-5 py-2.5 font-medium hover:bg-gray-100 hover:text-primary transition-colors text-sm">
                GALERI
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="{{ url('/berita') }}" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'news' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            BERITA
          </a>
        </li>
        <li>
          <a href="{{ url('/sekolah') }}" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'school' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            SEKOLAH
          </a>
        </li>
        <li>
          <a href="{{ url('/jadwal') }}" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'schedule' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            JADWAL
          </a>
        </li>
        <li>
          <a href="{{ url('/donasi') }}" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'donation' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            DONASI
          </a>
        </li>
        <li>
          <a href="{{ url('/lokasi') }}" class="text-white/90 px-4.5 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'location' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            LOKASI
          </a>
        </li>
      </ul>

      <!-- DESKTOP ACTIONS -->
      <div class="hidden md:flex items-center gap-3.5">
        <a href="{{ url('/daftar') }}" class="inline-flex items-center justify-center px-5 py-2.5 bg-accent text-primary-dark rounded-full text-xs font-semibold shadow-sm transition-all hover:bg-accent-dark hover:-translate-y-0.5 hover:shadow-[0_4px_12px_rgba(255,170,0,0.4)]">
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
    <a href="{{ url('/') }}" class="block text-white py-2.5 font-semibold {{ ($activePage ?? '') === 'home' ? 'text-accent' : '' }}">HOME</a>
    <a href="{{ url('/profil') }}" class="block text-white py-2.5 font-semibold {{ ($activePage ?? '') === 'profile' ? 'text-accent' : '' }}">PROFILE</a>
    <a href="{{ url('/galeri') }}" class="block text-white py-2.5 font-semibold pl-5 {{ ($activePage ?? '') === 'gallery' ? 'text-accent' : '' }}">- GALERI</a>
    <a href="{{ url('/berita') }}" class="block text-white py-2.5 font-semibold {{ ($activePage ?? '') === 'news' ? 'text-accent' : '' }}">BERITA</a>
    <a href="{{ url('/sekolah') }}" class="block text-white py-2.5 font-semibold {{ ($activePage ?? '') === 'school' ? 'text-accent' : '' }}">SEKOLAH</a>
    <a href="{{ url('/jadwal') }}" class="block text-white py-2.5 font-semibold {{ ($activePage ?? '') === 'schedule' ? 'text-accent' : '' }}">JADWAL</a>
    <a href="{{ url('/donasi') }}" class="block text-white py-2.5 font-semibold {{ ($activePage ?? '') === 'donation' ? 'text-accent' : '' }}">DONASI</a>
    <a href="{{ url('/lokasi') }}" class="block text-white py-2.5 font-semibold {{ ($activePage ?? '') === 'location' ? 'text-accent' : '' }}">LOKASI</a>
    <a href="{{ url('/daftar') }}" class="block w-full text-center py-2.5 mt-3.5 bg-accent text-primary-dark rounded-full text-sm font-semibold shadow-sm hover:bg-accent-dark">
      Pendaftaran
    </a>
  </div>
