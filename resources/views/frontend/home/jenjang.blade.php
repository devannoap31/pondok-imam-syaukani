<!-- JENJANG PENDIDIKAN SECTION -->
<section class="py-20 bg-slate-50">
  <div class="max-w-[1200px] mx-auto px-6">
    <!-- Header -->
    <div class="text-center max-w-[700px] mx-auto mb-14" data-aos="fade-up">
      <div class="inline-block bg-primary-accent text-primary text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-3">
        <span>{{ __('frontend.edu_badge') }}</span>
      </div>
      <h2 class="text-3xl md:text-4xl font-bold font-outfit text-slate-900 mb-3">
        <span>{{ __('frontend.edu_heading') }}</span>
      </h2>
      <p class="text-slate-600">
        <span>{{ __('frontend.edu_desc') }}</span>
      </p>
    </div>

    <!-- Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Card 1: MTs -->
      <div class="bg-white rounded-3xl overflow-hidden shadow-md border border-slate-200 transition-all duration-300 hover:-translate-y-3 hover:shadow-xl hover:border-primary-light flex flex-col group"
           data-aos="fade-up" data-aos-delay="0" data-aos-duration="700">
        <div class="h-48 flex items-center justify-center text-6xl bg-gradient-to-br from-[#e3f2fd] to-[#90caf9] relative overflow-hidden">
          <span class="transition-transform duration-500 group-hover:scale-125 group-hover:rotate-6 inline-block">📖</span>
          <div class="absolute inset-0 bg-gradient-to-t from-primary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>
        <div class="p-8 flex-1 flex flex-col">
          <h3 class="text-2xl font-bold font-outfit text-primary mb-1">
            <span>{{ __('frontend.mts_name') }}</span>
          </h3>
          <h5 class="text-slate-400 text-sm font-semibold mb-4">
            <span>{{ __('frontend.mts_sub') }}</span>
          </h5>
          <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-1">
            <span>{{ __('frontend.mts_desc') }}</span>
          </p>
          <div class="flex flex-col gap-2 mb-6">
            <div class="flex items-center gap-2.5 text-xs text-slate-600">
              <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
              <span>{{ __('frontend.mts_f1') }}</span>
            </div>
            <div class="flex items-center gap-2.5 text-xs text-slate-600">
              <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
              <span>{{ __('frontend.mts_f2') }}</span>
            </div>
            <div class="flex items-center gap-2.5 text-xs text-slate-600">
              <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
              <span>{{ __('frontend.mts_f3') }}</span>
            </div>
            <div class="flex items-center gap-2.5 text-xs text-slate-600">
              <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
              <span>{{ __('frontend.mts_f4') }}</span>
            </div>
          </div>
          <a href="{{ url('/sekolah') }}" class="ripple-btn mt-auto inline-flex items-center justify-center px-4 py-2.5 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all w-full">
            <span>{{ __('frontend.edu_btn') }}</span>
          </a>
        </div>
      </div>

      <!-- Card 2: MA -->
      <div class="bg-white rounded-3xl overflow-hidden shadow-md border border-slate-200 transition-all duration-300 hover:-translate-y-3 hover:shadow-xl hover:border-primary-light flex flex-col group"
           data-aos="fade-up" data-aos-delay="150" data-aos-duration="700">
        <div class="h-48 flex items-center justify-center text-6xl bg-gradient-to-br from-[#e8f5e9] to-[#a5d6a7] relative overflow-hidden">
          <span class="transition-transform duration-500 group-hover:scale-125 group-hover:rotate-6 inline-block">🕌</span>
          <div class="absolute inset-0 bg-gradient-to-t from-primary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>
        <div class="p-8 flex-1 flex flex-col">
          <h3 class="text-2xl font-bold font-outfit text-primary mb-1">
            <span>{{ __('frontend.ma_name') }}</span>
          </h3>
          <h5 class="text-slate-400 text-sm font-semibold mb-4">
            <span>{{ __('frontend.ma_sub') }}</span>
          </h5>
          <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-1">
            <span>{{ __('frontend.ma_desc') }}</span>
          </p>
          <div class="flex flex-col gap-2 mb-6">
            <div class="flex items-center gap-2.5 text-xs text-slate-600">
              <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
              <span>{{ __('frontend.ma_f1') }}</span>
            </div>
            <div class="flex items-center gap-2.5 text-xs text-slate-600">
              <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
              <span>{{ __('frontend.ma_f2') }}</span>
            </div>
            <div class="flex items-center gap-2.5 text-xs text-slate-600">
              <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
              <span>{{ __('frontend.ma_f3') }}</span>
            </div>
            <div class="flex items-center gap-2.5 text-xs text-slate-600">
              <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
              <span>{{ __('frontend.ma_f4') }}</span>
            </div>
          </div>
          <a href="{{ url('/sekolah') }}" class="ripple-btn mt-auto inline-flex items-center justify-center px-4 py-2.5 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all w-full">
            <span>{{ __('frontend.edu_btn') }}</span>
          </a>
        </div>
      </div>

      <!-- Card 3: Takhossus -->
      <div class="bg-white rounded-3xl overflow-hidden shadow-md border border-slate-200 transition-all duration-300 hover:-translate-y-3 hover:shadow-xl hover:border-primary-light flex flex-col group"
           data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
        <div class="h-48 flex items-center justify-center text-6xl bg-gradient-to-br from-[#fff3e0] to-[#ffcc80] relative overflow-hidden">
          <span class="transition-transform duration-500 group-hover:scale-125 group-hover:rotate-6 inline-block">✨</span>
          <div class="absolute inset-0 bg-gradient-to-t from-primary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>
        <div class="p-8 flex-1 flex flex-col">
          <h3 class="text-2xl font-bold font-outfit text-primary mb-1">
            <span>{{ __('frontend.takhossus_name') }}</span>
          </h3>
          <h5 class="text-slate-400 text-sm font-semibold mb-4">
            <span>{{ __('frontend.takhossus_sub') }}</span>
          </h5>
          <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-1">
            <span>{{ __('frontend.takhossus_desc') }}</span>
          </p>
          <div class="flex flex-col gap-2 mb-6">
            <div class="flex items-center gap-2.5 text-xs text-slate-600">
              <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
              <span>{{ __('frontend.takhossus_f1') }}</span>
            </div>
            <div class="flex items-center gap-2.5 text-xs text-slate-600">
              <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
              <span>{{ __('frontend.takhossus_f2') }}</span>
            </div>
            <div class="flex items-center gap-2.5 text-xs text-slate-600">
              <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
              <span>{{ __('frontend.takhossus_f3') }}</span>
            </div>
            <div class="flex items-center gap-2.5 text-xs text-slate-600">
              <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
              <span>{{ __('frontend.takhossus_f4') }}</span>
            </div>
          </div>
          <a href="{{ url('/sekolah') }}" class="ripple-btn mt-auto inline-flex items-center justify-center px-4 py-2.5 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all w-full">
            <span>{{ __('frontend.edu_btn') }}</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
