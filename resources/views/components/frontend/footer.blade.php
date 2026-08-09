  <!-- FOOTER -->
  <footer class="w-full bg-dark text-gray-400 py-16 border-t-4 border-primary overflow-x-hidden" data-aos="fade-up" data-aos-duration="600" data-aos-anchor-placement="top-bottom">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6 w-full">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12 mb-12">
        
        <!-- Brand -->
        <div class="col-span-1 flex flex-col items-center lg:items-start text-center lg:text-left">
          <div class="text-white text-2xl font-outfit font-extrabold flex items-center gap-3 mb-5 justify-center lg:justify-start">
            <span class="text-accent">PPTQ</span> Imam Syaukani
          </div>
          <p class="text-sm leading-relaxed text-gray-400 mb-6 max-w-sm">
            <span>{{ __('frontend.footer_desc') }}</span>
          </p>
          <div class="flex gap-3 justify-center lg:justify-start">
            @php
              $kontak = \App\Models\Kontak::first();
            @endphp
            <a href="{{ $kontak && $kontak->instagram ? 'https://instagram.com/' . $kontak->instagram : '#' }}" class="w-10 h-10 rounded-full bg-white/5 text-white flex items-center justify-center hover:bg-accent hover:text-primary-dark transition-all duration-300 hover:-translate-y-1" title="Instagram">📸</a>
            <a href="{{ $kontak && $kontak->facebook ? 'https://facebook.com/' . $kontak->facebook : '#' }}" class="w-10 h-10 rounded-full bg-white/5 text-white flex items-center justify-center hover:bg-accent hover:text-primary-dark transition-all duration-300 hover:-translate-y-1" title="Facebook">👥</a>
            <a href="{{ $kontak && $kontak->youtube ? 'https://youtube.com/@' . $kontak->youtube : '#' }}" class="w-10 h-10 rounded-full bg-white/5 text-white flex items-center justify-center hover:bg-accent hover:text-primary-dark transition-all duration-300 hover:-translate-y-1" title="YouTube">📹</a>
          </div>
        </div>
        
        <!-- Quick Links -->
        <div class="col-span-1 text-left">
          <h5 class="text-white text-lg font-semibold mb-6">
            <span>{{ __('frontend.footer_links_title') }}</span>
          </h5>
          <ul class="space-y-3 text-sm">
            <li><a href="{{ url('/') }}" class="hover:text-accent hover:pl-1.5 transition-all block">› <span>{{ __('frontend.nav_home') }}</span></a></li>
            <li><a href="{{ url('/profil') }}" class="hover:text-accent hover:pl-1.5 transition-all block">› <span>{{ __('frontend.nav_profile_sub') }}</span></a></li>
            <li><a href="{{ url('/galeri') }}" class="hover:text-accent hover:pl-1.5 transition-all block">› <span>{{ __('frontend.nav_gallery') }}</span></a></li>
            <li><a href="{{ url('/berita') }}" class="hover:text-accent hover:pl-1.5 transition-all block">› <span>{{ __('frontend.nav_news') }}</span></a></li>
            <li><a href="{{ url('/sekolah') }}" class="hover:text-accent hover:pl-1.5 transition-all block">› <span>{{ __('frontend.nav_school') }}</span></a></li>
            <li><a href="{{ url('/jadwal') }}" class="hover:text-accent hover:pl-1.5 transition-all block">› <span>{{ __('frontend.nav_schedule') }}</span></a></li>
            <li><a href="{{ url('/donasi') }}" class="hover:text-accent hover:pl-1.5 transition-all block">› <span>{{ __('frontend.nav_donation') }}</span></a></li>
            <li><a href="{{ url('/lokasi') }}" class="hover:text-accent hover:pl-1.5 transition-all block">› <span>{{ __('frontend.nav_location') }}</span></a></li>
          </ul>
        </div>
        
        <!-- Contacts -->
        <div class="col-span-1 text-left">
          <h5 class="text-white text-lg font-semibold mb-6">
            <span>{{ __('frontend.footer_contact_title') }}</span>
          </h5>
          <ul class="space-y-4 text-sm">
            @if($kontak && $kontak->alamat)
              <li class="flex items-start gap-3">
                <span class="text-accent text-lg flex-shrink-0">📍</span>
                <span class="text-gray-400">{{ $kontak->alamat }}</span>
              </li>
            @endif
            @if($kontak && $kontak->telepon)
              <li class="flex items-start gap-3">
                <span class="text-accent text-lg flex-shrink-0">📞</span>
                <span class="text-gray-400">{{ $kontak->telepon }}</span>
              </li>
            @endif
            @if($kontak && $kontak->email)
              <li class="flex items-start gap-3">
                <span class="text-accent text-lg flex-shrink-0">✉️</span>
                <span class="text-gray-400">{{ $kontak->email }}</span>
              </li>
            @endif
          </ul>
        </div>
      </div>
      
      <!-- Footer Bottom -->
      <div class="border-t border-white/8 py-6 flex flex-col md:flex-row items-center justify-center md:justify-between text-xs text-gray-500 gap-3 text-center md:text-left">
        <p><span>{{ __('frontend.footer_copy') }}</span></p>
        <p><span>{{ __('frontend.footer_brand') }}</span></p>
      </div>
    </div>
  </footer>
