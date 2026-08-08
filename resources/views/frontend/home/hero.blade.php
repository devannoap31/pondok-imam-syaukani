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
      <span data-lang-key="hero-badge">Pondok Pesantren Tahfidzul Qur'an</span>
    </div>

    <!-- Main Heading with Typewriter -->
    <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-extrabold font-outfit leading-tight mb-6 max-w-4xl typewriter-cursor"
        id="hero-heading"
        data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
      <span data-lang-key="hero-heading">Membentuk Generasi Qur'ani &amp; Berakhlakul Karimah</span>
    </h1>

    <!-- Subtext -->
    <p class="text-white/85 text-base sm:text-lg md:text-xl leading-relaxed mb-10 max-w-2xl mx-auto"
       data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
      <span data-lang-key="hero-desc">Mencetak generasi yang beriman, berilmu, dan berakhlak mulia yang mampu memahami dan mengamalkan ajaran Islam secara mendalam serta menyebarkannya kepada masyarakat luas.</span>
    </p>

    <!-- CTA Buttons -->
    <div class="flex justify-center gap-5 flex-wrap" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
      <a href="{{ url('/daftar') }}" class="ripple-btn inline-flex items-center justify-center px-7 py-4 bg-accent text-primary-dark rounded-full text-sm sm:text-base font-semibold shadow-sm hover:bg-accent-dark transition-all hover:-translate-y-1 hover:shadow-[0_6px_20px_rgba(255,170,0,0.45)]">
        <span data-lang-key="hero-btn-register">DAFTAR SEKARANG +</span>
      </a>
      <a href="{{ url('/profil') }}" class="ripple-btn inline-flex items-center justify-center px-7 py-4 bg-transparent border-2 border-white text-white rounded-full text-sm sm:text-base font-semibold hover:bg-white hover:text-primary transition-all hover:-translate-y-1">
        <span data-lang-key="hero-btn-profile">PROFILE PESANTREN</span>
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

  /* Typewriter effect on hero heading */
  (function() {
    const el = document.getElementById('hero-heading');
    if (!el) return;
    const span = el.querySelector('[data-lang-key="hero-heading"]');
    if (!span) return;

    function runTypewriter(targetEl) {
      const text = targetEl.textContent;
      targetEl.textContent = '';
      el.classList.add('typewriter-cursor');
      let i = 0;
      const interval = setInterval(() => {
        targetEl.textContent += text[i];
        i++;
        if (i >= text.length) {
          clearInterval(interval);
          setTimeout(() => el.classList.remove('typewriter-cursor'), 800);
        }
      }, 30);
    }

    // Run on load after a short delay
    setTimeout(() => runTypewriter(span), 400);

    // Re-run typewriter when language changes
    const origApply = window.applyLanguage;
    window.applyLanguage = function(lang) {
      if (origApply) origApply(lang);
      setTimeout(() => {
        const s = el.querySelector('[data-lang-key="hero-heading"]');
        if (s) runTypewriter(s);
      }, 50);
    };
  })();
</script>
