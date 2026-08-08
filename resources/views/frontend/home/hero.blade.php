<!-- HERO SECTION -->
<section class="bg-gradient-to-br from-primary-dark to-primary py-24 md:py-36 relative overflow-hidden text-white text-center">
  <!-- Background glow patterns -->
  <div class="absolute -top-[20%] -right-[10%] w-[600px] h-[600px] bg-[radial-gradient(circle,rgba(255,170,0,0.08)_0%,transparent_70%)] rounded-full pointer-events-none pulse-glow"></div>
  <div class="absolute -bottom-[20%] -left-[10%] w-[500px] h-[500px] bg-[radial-gradient(circle,rgba(18,78,63,0.4)_0%,transparent_70%)] rounded-full pointer-events-none pulse-glow" style="animation-delay:1.5s;"></div>

  <!-- Floating Particles Container -->
  <div id="particles-container" class="absolute inset-0 pointer-events-none overflow-hidden z-0"></div>

  <div class="max-w-[1200px] mx-auto px-6 relative z-10 flex flex-col items-center">
    <!-- Badge -->
    <div class="inline-block bg-white/15 text-accent text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-4 backdrop-blur-sm border border-white/10"
         data-aos="fade-down" data-aos-duration="600">
      <span>{{ __('frontend.hero_badge') }}</span>
    </div>

    <!-- Main Heading -->
    <div class="w-full flex justify-center mb-6">
      <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-extrabold font-outfit leading-tight max-w-4xl inline-block"
          id="hero-heading"
          data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
        <span id="hero-text-content">{{ __('frontend.hero_heading') }}</span>
      </h1>
    </div>

    <!-- Subtext -->
    <p class="text-white/85 text-base sm:text-lg md:text-xl leading-relaxed mb-10 max-w-2xl mx-auto"
       data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
      <span>{{ __('frontend.hero_desc') }}</span>
    </p>

    <!-- CTA Buttons -->
    <div class="flex justify-center gap-5 flex-wrap" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
      <a href="{{ url('/daftar') }}" class="ripple-btn inline-flex items-center justify-center px-7 py-4 bg-accent text-primary-dark rounded-full text-sm sm:text-base font-semibold shadow-sm hover:bg-accent-dark transition-all hover:-translate-y-1 hover:shadow-[0_6px_20px_rgba(255,170,0,0.45)]">
        <span>{{ __('frontend.hero_btn_register') }}</span>
      </a>
      <a href="{{ url('/profil') }}" class="ripple-btn inline-flex items-center justify-center px-7 py-4 bg-transparent border-2 border-white text-white rounded-full text-sm sm:text-base font-semibold hover:bg-white hover:text-primary transition-all hover:-translate-y-1">
        <span>{{ __('frontend.hero_btn_profile') }}</span>
      </a>
    </div>
  </div>
</section>

<script>
  /* Floating particles */
  (function() {
    const container = document.getElementById('particles-container');
    if (!container) return;
    const colors = ['rgba(255,170,0,0.5)', 'rgba(255,255,255,0.2)', 'rgba(0,230,118,0.3)', 'rgba(255,170,0,0.3)'];
    for (let i = 0; i < 18; i++) {
      const p = document.createElement('div');
      const size = Math.random() * 6 + 3;
      const left = Math.random() * 100;
      const delay = Math.random() * 8;
      const duration = Math.random() * 10 + 8;
      const color = colors[Math.floor(Math.random() * colors.length)];
      p.className = 'particle';
      p.style.cssText = `
        width:${size}px;height:${size}px;
        left:${left}%;bottom:-10px;
        background:${color};
        animation-duration:${duration}s;
        animation-delay:${delay}s;
        filter:blur(${Math.random() > 0.5 ? 1 : 0}px);
      `;
      container.appendChild(p);
    }
  })();

  /* Typewriter effect on hero heading - layout shift safe */
  document.addEventListener('DOMContentLoaded', function() {
    const el = document.getElementById('hero-heading');
    const span = document.getElementById('hero-text-content');
    if (!el || !span) return;

    const fullText = span.textContent.trim();
    if (!fullText) return;

    // Set initial height to prevent layout shift during typing
    const initialHeight = el.offsetHeight;
    if (initialHeight > 0) {
      el.style.minHeight = initialHeight + 'px';
    }

    span.textContent = '';
    el.classList.add('typewriter-cursor');

    let i = 0;
    const interval = setInterval(() => {
      if (i < fullText.length) {
        span.textContent += fullText[i];
        i++;
      } else {
        clearInterval(interval);
        setTimeout(() => {
          el.classList.remove('typewriter-cursor');
          el.style.minHeight = '';
        }, 1000);
      }
    }, 35);
  });
</script>
