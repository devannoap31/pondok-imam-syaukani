<!-- STATS STRIP -->
<section class="bg-primary-dark py-5 sm:py-8 border-t-2 border-b-2 border-accent relative z-10">
  <div class="grid grid-cols-4 gap-2 sm:gap-5 max-w-[1200px] mx-auto px-4 sm:px-6">

    <!-- Stat 1 -->
    <div class="flex flex-col items-center text-center text-white" data-aos="fade-up" data-aos-delay="0">
      <div class="w-8 h-8 sm:w-12 sm:h-12 bg-accent/15 rounded-full flex items-center justify-center text-accent text-base sm:text-2xl mb-1 sm:mb-2 transition-transform duration-300 hover:scale-110">
        👥
      </div>
      <div class="text-base sm:text-2xl md:text-3xl font-extrabold font-outfit text-accent leading-none"
           data-counter data-target="24">0</div>
      <div class="text-[9px] sm:text-xs md:text-sm text-white/80 font-medium mt-0.5 sm:mt-1">
        <span>{{ __('frontend.stat_active_students') }}</span>
      </div>
    </div>

    <!-- Stat 2 -->
    <div class="flex flex-col items-center text-center text-white" data-aos="fade-up" data-aos-delay="100">
      <div class="w-8 h-8 sm:w-12 sm:h-12 bg-accent/15 rounded-full flex items-center justify-center text-accent text-base sm:text-2xl mb-1 sm:mb-2 transition-transform duration-300 hover:scale-110">
        🎓
      </div>
      <div class="text-base sm:text-2xl md:text-3xl font-extrabold font-outfit text-accent leading-none"
           data-counter data-target="22">0</div>
      <div class="text-[9px] sm:text-xs md:text-sm text-white/80 font-medium mt-0.5 sm:mt-1">
        <span>{{ __('frontend.stat_alumni') }}</span>
      </div>
    </div>

    <!-- Stat 3 -->
    <div class="flex flex-col items-center text-center text-white" data-aos="fade-up" data-aos-delay="200">
      <div class="w-8 h-8 sm:w-12 sm:h-12 bg-accent/15 rounded-full flex items-center justify-center text-accent text-base sm:text-2xl mb-1 sm:mb-2 transition-transform duration-300 hover:scale-110">
        🕌
      </div>
      <div class="text-base sm:text-2xl md:text-3xl font-extrabold font-outfit text-accent leading-none"
           data-counter data-target="11">0</div>
      <div class="text-[9px] sm:text-xs md:text-sm text-white/80 font-medium mt-0.5 sm:mt-1">
        <span>{{ __('frontend.stat_educators') }}</span>
      </div>
    </div>

    <!-- Stat 4 -->
    <div class="flex flex-col items-center text-center text-white" data-aos="fade-up" data-aos-delay="300">
      <div class="w-8 h-8 sm:w-12 sm:h-12 bg-accent/15 rounded-full flex items-center justify-center text-accent text-base sm:text-2xl mb-1 sm:mb-2 transition-transform duration-300 hover:scale-110">
        🤝
      </div>
      <div class="text-base sm:text-2xl md:text-3xl font-extrabold font-outfit text-accent leading-none"
           data-counter data-target="3">0</div>
      <div class="text-[9px] sm:text-xs md:text-sm text-white/80 font-medium mt-0.5 sm:mt-1">
        <span>{{ __('frontend.stat_partners') }}</span>
      </div>
    </div>

  </div>
</section>
