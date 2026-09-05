<!-- SEJARAH / TENTANG KAMI SECTION -->
<section class="py-20 bg-white overflow-hidden">
  <div class="max-w-[1200px] mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
    <!-- Image Wrapper -->
    <div class="w-full" data-aos="fade-right" data-aos-duration="800">
      <div class="relative">
        <div class="rounded-3xl shadow-xl w-full bg-white border-4 border-slate-100 flex items-center justify-center p-6 md:p-10 h-[300px] md:h-[400px] overflow-hidden">
          <img src="{{ asset('images/logo-syaukani.png') }}" alt="Logo PPTQ Imam Syaukani" 
               class="w-full h-full object-contain max-h-[300px] transition-transform duration-500 hover:scale-105" />
        </div>
        <!-- Decorative accent block -->
        <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-accent/20 rounded-2xl -z-10"></div>
        <div class="absolute -top-4 -left-4 w-16 h-16 bg-primary/10 rounded-xl -z-10"></div>
      </div>
    </div>
    <!-- Content -->
    <div class="flex flex-col items-start" data-aos="fade-left" data-aos-duration="800">
      <div class="inline-block bg-primary-accent text-primary text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-3">
        <span>{{ __('frontend.about_badge') }}</span>
      </div>
      <h2 class="text-3xl md:text-4xl font-bold font-outfit text-primary mb-5">
        <span>{{ __('frontend.about_heading') }}</span>
      </h2>
      <p class="text-slate-600 mb-4 leading-relaxed">
        <span>{{ __('frontend.about_p1') }}</span>
      </p>
      <p class="text-slate-600 mb-4 leading-relaxed">
        <span>{{ __('frontend.about_p2') }}</span>
      </p>
      <a href="{{ url('/profil') }}" class="ripple-btn inline-flex items-center justify-center px-6 py-3 border-2 border-primary text-primary rounded-full text-sm font-semibold hover:bg-primary hover:text-white transition-all hover:-translate-y-0.5 mt-4 gap-2">
        <span>{{ __('frontend.about_btn') }}</span>
        <span>→</span>
      </a>
    </div>
  </div>
</section>
