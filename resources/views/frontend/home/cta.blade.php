<!-- PENDAFTARAN SANTRI BARU (CTA) -->
<section class="py-20 bg-slate-50">
  <div class="max-w-[1200px] mx-auto px-6">
    <div class="bg-gradient-to-br from-primary-dark to-primary rounded-3xl p-10 md:p-16 text-center text-white relative overflow-hidden shadow-xl flex flex-col items-center"
         data-aos="zoom-in" data-aos-duration="800">
      
      <!-- Decorative animated glow circles -->
      <div class="absolute top-[-30%] right-[-10%] w-[400px] h-[400px] rounded-full bg-[radial-gradient(circle,rgba(255,170,0,0.12)_0%,transparent_70%)] pulse-glow pointer-events-none"></div>
      <div class="absolute bottom-[-30%] left-[-10%] w-[350px] h-[350px] rounded-full bg-[radial-gradient(circle,rgba(255,255,255,0.06)_0%,transparent_70%)] pulse-glow pointer-events-none" style="animation-delay:1s;"></div>

      <!-- Badge -->
      <div class="inline-block bg-white/15 text-accent text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-4 backdrop-blur-sm border border-white/15 relative z-10"
           data-aos="fade-down" data-aos-delay="200">
        <span data-lang-key="cta-badge">Penerimaan Santri Baru</span>
      </div>

      <!-- Heading -->
      <h2 class="text-3xl md:text-4xl font-bold font-outfit text-white mb-4 relative z-10 max-w-2xl"
          data-aos="fade-up" data-aos-delay="300">
        <span data-lang-key="cta-heading">Mari Bergabung Menjadi Bagian dari Pesantren</span>
      </h2>

      <!-- Description -->
      <p class="text-white/85 text-base leading-relaxed mb-8 max-w-xl relative z-10"
         data-aos="fade-up" data-aos-delay="400">
        <span data-lang-key="cta-desc">Pendaftaran santri baru gelombang pertama telah dibuka. Kuota terbatas. Daftarkan putra-putri Anda sekarang untuk pendidikan yang lebih baik.</span>
      </p>

      <!-- Buttons -->
      <div class="flex justify-center gap-4 flex-wrap relative z-10" data-aos="fade-up" data-aos-delay="500">
        <a href="{{ url('/daftar') }}" class="ripple-btn inline-flex items-center justify-center px-7 py-3.5 bg-accent text-primary-dark rounded-full text-sm font-semibold shadow-sm hover:bg-accent-dark transition-all hover:-translate-y-1 hover:shadow-[0_6px_20px_rgba(255,170,0,0.5)]">
          <span data-lang-key="cta-btn-register">Daftar Sekarang</span>
        </a>
        <a href="{{ url('/lokasi') }}" class="ripple-btn inline-flex items-center justify-center px-7 py-3.5 bg-transparent border-2 border-white text-white rounded-full text-sm font-semibold hover:bg-white hover:text-primary transition-all hover:-translate-y-1">
          <span data-lang-key="cta-btn-contact">Hubungi Panitia</span>
        </a>
      </div>
    </div>
  </div>
</section>
