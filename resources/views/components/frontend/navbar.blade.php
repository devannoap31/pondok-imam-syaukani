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
            <span>{{ __('frontend.nav_home') }}</span>
          </a>
        </li>
        <li class="relative group">
          <a href="{{ url('/profil') }}" class="text-white/90 px-4 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'profile' || ($activePage ?? '') === 'gallery' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            <span>{{ __('frontend.nav_profile') }}</span>
          </a>
          <ul class="absolute left-0 top-full bg-white min-w-[180px] rounded-xl shadow-xl py-2 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-50">
            <li>
              <a href="{{ url('/profil') }}" class="block text-gray-700 px-5 py-2.5 font-medium hover:bg-gray-100 hover:text-primary transition-colors text-sm">
                <span>{{ __('frontend.nav_profile_sub') }}</span>
              </a>
            </li>
            <li>
              <a href="{{ url('/galeri') }}" class="block text-gray-700 px-5 py-2.5 font-medium hover:bg-gray-100 hover:text-primary transition-colors text-sm">
                <span>{{ __('frontend.nav_gallery') }}</span>
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="{{ url('/berita') }}" class="text-white/90 px-4 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'news' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            <span>{{ __('frontend.nav_news') }}</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/sekolah') }}" class="text-white/90 px-4 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'school' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            <span>{{ __('frontend.nav_school') }}</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/jadwal') }}" class="text-white/90 px-4 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'schedule' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            <span>{{ __('frontend.nav_schedule') }}</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/donasi') }}" class="text-white/90 px-4 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'donation' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            <span>{{ __('frontend.nav_donation') }}</span>
          </a>
        </li>
        <li>
          <a href="{{ url('/lokasi') }}" class="text-white/90 px-4 py-2.5 text-sm font-medium rounded-full hover:text-accent hover:bg-white/8 transition-all {{ ($activePage ?? '') === 'location' ? 'text-accent bg-white/8 font-semibold' : '' }}">
            <span>{{ __('frontend.nav_location') }}</span>
          </a>
        </li>
      </ul>

      <!-- DESKTOP ACTIONS -->
      <div class="hidden md:flex items-center gap-3">
        <!-- Language Switcher with Flags -->
        @php $currentLocale = app()->getLocale(); @endphp
        <div class="flex items-center bg-white/10 rounded-full p-1 border border-white/20 text-xs font-semibold">
          <a href="{{ route('lang.switch', 'id') }}" 
             class="flex items-center gap-1.5 px-3 py-1 rounded-full transition-all duration-200 {{ $currentLocale === 'id' ? 'bg-accent text-primary-dark shadow-sm font-bold' : 'hover:bg-white/10 text-white/80' }}"
             title="Bahasa Indonesia">
            <img src="https://flagcdn.com/w20/id.png" srcset="https://flagcdn.com/w40/id.png 2x" width="16" height="12" alt="Indonesia" class="rounded-[2px] inline-block object-cover shadow-xs">
            <span>ID</span>
          </a>
          <a href="{{ route('lang.switch', 'en') }}" 
             class="flex items-center gap-1.5 px-3 py-1 rounded-full transition-all duration-200 {{ $currentLocale === 'en' ? 'bg-accent text-primary-dark shadow-sm font-bold' : 'hover:bg-white/10 text-white/80' }}"
             title="English">
            <img src="https://flagcdn.com/w20/gb.png" srcset="https://flagcdn.com/w40/gb.png 2x" width="16" height="12" alt="English" class="rounded-[2px] inline-block object-cover shadow-xs">
            <span>EN</span>
          </a>
        </div>

        <a href="{{ url('/daftar') }}" class="ripple-btn inline-flex items-center justify-center px-5 py-2.5 bg-accent text-primary-dark rounded-full text-xs font-semibold shadow-sm transition-all hover:bg-accent-dark hover:-translate-y-0.5 hover:shadow-[0_4px_12px_rgba(255,170,0,0.4)]">
          <span>{{ __('frontend.nav_register') }}</span>
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
      <span>{{ __('frontend.nav_home') }}</span>
    </a>
    <a href="{{ url('/profil') }}" class="block text-white py-2.5 font-semibold border-b border-white/8 {{ ($activePage ?? '') === 'profile' ? 'text-accent' : '' }}">
      <span>{{ __('frontend.nav_profile_sub') }}</span>
    </a>
    <a href="{{ url('/galeri') }}" class="block text-white/80 py-2 font-semibold pl-4 border-b border-white/8 {{ ($activePage ?? '') === 'gallery' ? 'text-accent' : '' }}">
      ↳ <span>{{ __('frontend.nav_gallery') }}</span>
    </a>
    <a href="{{ url('/berita') }}" class="block text-white py-2.5 font-semibold border-b border-white/8 {{ ($activePage ?? '') === 'news' ? 'text-accent' : '' }}">
      <span>{{ __('frontend.nav_news') }}</span>
    </a>
    <a href="{{ url('/sekolah') }}" class="block text-white py-2.5 font-semibold border-b border-white/8 {{ ($activePage ?? '') === 'school' ? 'text-accent' : '' }}">
      <span>{{ __('frontend.nav_school') }}</span>
    </a>
    <a href="{{ url('/jadwal') }}" class="block text-white py-2.5 font-semibold border-b border-white/8 {{ ($activePage ?? '') === 'schedule' ? 'text-accent' : '' }}">
      <span>{{ __('frontend.nav_schedule') }}</span>
    </a>
    <a href="{{ url('/donasi') }}" class="block text-white py-2.5 font-semibold border-b border-white/8 {{ ($activePage ?? '') === 'donation' ? 'text-accent' : '' }}">
      <span>{{ __('frontend.nav_donation') }}</span>
    </a>
    <a href="{{ url('/lokasi') }}" class="block text-white py-2.5 font-semibold border-b border-white/8 {{ ($activePage ?? '') === 'location' ? 'text-accent' : '' }}">
      <span>{{ __('frontend.nav_location') }}</span>
    </a>
    
    <!-- Mobile Language Switcher -->
    <div class="flex items-center gap-3 mt-4 mb-2">
      <span class="text-white/60 text-xs font-medium">{{ __('frontend.lang_switch') }}:</span>
      @php $currentLocale = app()->getLocale(); @endphp
      <div class="flex items-center bg-white/10 rounded-full p-1 border border-white/20 text-xs font-semibold">
        <a href="{{ route('lang.switch', 'id') }}" 
           class="flex items-center gap-1.5 px-3 py-1 rounded-full transition-all duration-200 {{ $currentLocale === 'id' ? 'bg-accent text-primary-dark shadow-sm font-bold' : 'hover:bg-white/10 text-white/80' }}">
          <img src="https://flagcdn.com/w20/id.png" srcset="https://flagcdn.com/w40/id.png 2x" width="16" height="12" alt="Indonesia" class="rounded-[2px] inline-block object-cover shadow-xs">
          <span>ID</span>
        </a>
        <a href="{{ route('lang.switch', 'en') }}" 
           class="flex items-center gap-1.5 px-3 py-1 rounded-full transition-all duration-200 {{ $currentLocale === 'en' ? 'bg-accent text-primary-dark shadow-sm font-bold' : 'hover:bg-white/10 text-white/80' }}">
          <img src="https://flagcdn.com/w20/gb.png" srcset="https://flagcdn.com/w40/gb.png 2x" width="16" height="12" alt="English" class="rounded-[2px] inline-block object-cover shadow-xs">
          <span>EN</span>
        </a>
      </div>
    </div>
    <a href="{{ url('/daftar') }}" class="ripple-btn block w-full text-center py-2.5 mt-2 mb-1 bg-accent text-primary-dark rounded-full text-sm font-semibold shadow-sm hover:bg-accent-dark">
      <span>{{ __('frontend.nav_register') }}</span>
    </a>
  </div>
