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
            <li><a href="{{ url('/') }}" class="hover:text-accent hover:pl-1.5 transition-all">› Home</a></li>
            <li><a href="{{ url('/profil') }}" class="hover:text-accent hover:pl-1.5 transition-all">› Profil</a></li>
            <li><a href="{{ url('/galeri') }}" class="hover:text-accent hover:pl-1.5 transition-all">› Galeri</a></li>
            <li><a href="{{ url('/berita') }}" class="hover:text-accent hover:pl-1.5 transition-all">› Berita</a></li>
            <li><a href="{{ url('/sekolah') }}" class="hover:text-accent hover:pl-1.5 transition-all">› Sekolah</a></li>
            <li><a href="{{ url('/jadwal') }}" class="hover:text-accent hover:pl-1.5 transition-all">› Jadwal</a></li>
            <li><a href="{{ url('/donasi') }}" class="hover:text-accent hover:pl-1.5 transition-all">› Donasi</a></li>
            <li><a href="{{ url('/lokasi') }}" class="hover:text-accent hover:pl-1.5 transition-all">› Lokasi</a></li>
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
