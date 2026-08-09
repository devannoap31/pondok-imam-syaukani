<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'PPTQ Imam Syaukani - Pondok Pesantren Tahfidzul Qur\'an')</title>
  
  <!-- Google Fonts: Outfit & Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  
  <!-- AOS Animation Library CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />

  <!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Tailwind CSS Output -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    /* Custom Theme Colors */
    :root {
      --color-primary: #144D30;
      --color-primary-dark: #0B3322;
      --color-primary-light: #1C6B44;
      --color-primary-accent: #E8F5E9;
      --color-accent: #FFAA00;
      --color-accent-dark: #E09500;
      --color-dark: #0A2317;
    }

    .bg-primary { background-color: #144D30 !important; }
    .bg-primary-dark { background-color: #0B3322 !important; }
    .bg-primary-light { background-color: #1C6B44 !important; }
    .bg-primary-accent { background-color: #E8F5E9 !important; }
    .bg-accent { background-color: #FFAA00 !important; }
    .bg-accent-dark { background-color: #E09500 !important; }
    .bg-dark { background-color: #0A2317 !important; }

    .text-primary { color: #144D30 !important; }
    .text-primary-dark { color: #0B3322 !important; }
    .text-accent { color: #FFAA00 !important; }
    .text-dark { color: #0A2317 !important; }

    .border-primary { border-color: #144D30 !important; }
    .border-primary-dark { border-color: #0B3322 !important; }
    .border-accent { border-color: #FFAA00 !important; }

    .from-primary-dark {
      --tw-gradient-from: #0B3322 var(--tw-gradient-from-position, );
      --tw-gradient-to: rgb(11 51 34 / 0) var(--tw-gradient-to-position, );
      --tw-gradient-stops: var(--tw-gradient-via-stops, var(--tw-gradient-from), var(--tw-gradient-to));
    }
    .to-primary {
      --tw-gradient-to: #144D30 var(--tw-gradient-to-position, );
    }

    /* Global Smooth Scrolling */
    html {
      scroll-behavior: smooth;
    }
    body {
      font-family: 'Inter', sans-serif;
      top: 0px !important;
    }
    .font-outfit {
      font-family: 'Outfit', sans-serif;
    }
    
    /* Navbar Scroll Dynamic Styling */
    .navbar-transparent {
      background-color: rgba(20, 77, 48, 0.75);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
    }
    .navbar-solid {
      background-color: #0B3322;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
    }

    /* Ripple effect on buttons */
    .ripple-btn {
      position: relative;
      overflow: hidden;
    }
    .ripple-btn .ripple-wave {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.4);
      transform: scale(0);
      animation: ripple-animation 0.6s linear;
      pointer-events: none;
    }
    @keyframes ripple-animation {
      to {
        transform: scale(4);
        opacity: 0;
      }
    }

    /* Pulse Glow for Hero & CTA */
    @keyframes pulse-glow-anim {
      0%, 100% { transform: scale(1); opacity: 0.15; }
      50% { transform: scale(1.1); opacity: 0.25; }
    }
    .pulse-glow {
      animation: pulse-glow-anim 4s ease-in-out infinite;
    }

    /* Floating Particles */
    .particle {
      position: absolute;
      border-radius: 50%;
      pointer-events: none;
      animation: float-up 12s linear infinite;
    }
    @keyframes float-up {
      0% {
        transform: translateY(0) rotate(0deg);
        opacity: 0;
      }
      10% { opacity: 0.8; }
      90% { opacity: 0.8; }
      100% {
        transform: translateY(-500px) rotate(360deg);
        opacity: 0;
      }
    }

    /* Typewriter Cursor */
    .typewriter-cursor::after {
      content: '|';
      animation: blink 0.7s infinite;
      color: #FFAA00;
    }
    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0; }
    }

    /* Mobile Menu Animation */
    .mobile-menu {
      transition: max-height 0.35s ease-in-out, opacity 0.3s ease;
      max-height: 0;
      opacity: 0;
      overflow: hidden;
    }
    .mobile-menu.open {
      max-height: 500px;
      opacity: 1;
    }

    /* Hamburger Animation */
    .ham-bar {
      transition: transform 0.3s ease, opacity 0.3s ease;
    }
    .ham-active .ham-bar:nth-child(1) {
      transform: translateY(7px) rotate(45deg);
    }
    .ham-active .ham-bar:nth-child(2) {
      opacity: 0;
    }
    .ham-active .ham-bar:nth-child(3) {
      transform: translateY(-7px) rotate(-45deg);
    }

    /* Back to Top Button */
    #back-to-top {
      transition: opacity 0.3s ease, transform 0.3s ease;
    }
    #back-to-top.show {
      opacity: 1;
      pointer-events: auto;
      transform: translateY(0);
    }
    #back-to-top.hide {
      opacity: 0;
      pointer-events: none;
      transform: translateY(20px);
    }

    /* Hide Google Translate UI Branding Banner */
    .goog-te-banner-frame,
    .skiptranslate,
    #goog-gt-tt,
    .goog-te-balloon-frame {
      display: none !important;
    }
    .goog-text-highlight {
      background-color: transparent !important;
      box-shadow: none !important;
    }
    
    /* Manual Translation Overrides for UI Elements */
    body.lang-en .lang-id-text { display: none !important; }
    body.lang-en .lang-en-text { display: inline-block !important; }
    body.lang-id .lang-en-text { display: none !important; }
    body.lang-id .lang-id-text { display: inline-block !important; }
  </style>

  @stack('styles')

  <!-- Early Language Detection Script (Runs Before DOM Ready) -->
  <script>
    (function() {
      const userLang = localStorage.getItem('user_site_lang') || 'id';
      document.documentElement.lang = userLang;
      if (userLang === 'en') {
        document.body.classList.add('lang-en');
      } else {
        document.body.classList.add('lang-id');
      }
    })();
  </script>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

  <!-- Hidden Google Translate Element -->
  <div id="google_translate_element" style="display:none !important;"></div>

  <!-- Navbar Component -->
  <x-frontend.navbar :activePage="$activePage ?? ''" />

  <!-- Main Content -->
  <main class="flex-grow">
    @yield('content')
  </main>

  <!-- Footer Component -->
  <x-frontend.footer />

  <!-- Back to Top Button -->
  <button id="back-to-top" onclick="window.scrollTo({top:0, behavior:'smooth'})"
          class="hide fixed bottom-6 right-6 z-50 w-12 h-12 bg-accent text-primary-dark rounded-full shadow-lg flex items-center justify-center hover:bg-accent-dark hover:scale-110 transition-all duration-300 notranslate"
          aria-label="Back to Top" title="Ke Atas">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 stroke-[3]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
    </svg>
  </button>

  <!-- AOS JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

  <!-- Google Translate Engine Init -->
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'id',
        includedLanguages: 'id,en',
        autoDisplay: false
      }, 'google_translate_element');
    }
  </script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

  <!-- Automatic Language Switcher Script -->
  <script>
    function autoTranslatePage(lang) {
      const savedLang = localStorage.getItem('user_site_lang');
      
      // Only reload if language actually changed
      if (savedLang === lang) {
        return;
      }
      
      localStorage.setItem('user_site_lang', lang);
      
      const domain = window.location.hostname;
      if (lang === 'en') {
        document.cookie = "googtrans=/id/en; path=/; domain=" + domain;
        document.cookie = "googtrans=/id/en; path=/";
      } else {
        // Clear cookies to revert to original language
        document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; domain=" + domain;
        document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
        // Optional fallback to /id/id just in case
        document.cookie = "googtrans=/id/id; path=/; domain=" + domain;
        document.cookie = "googtrans=/id/id; path=/";
      }

      // Store flag to show toast after reload
      sessionStorage.setItem('show_lang_toast', lang);
      
      // Reload to ensure translation applies and DOM is refreshed properly
      window.location.reload();
    }

    function updateLangBtnStyle(lang) {
      const btnIdList = document.querySelectorAll('.btn-lang-id-target');
      const btnEnList = document.querySelectorAll('.btn-lang-en-target');
      const activeClass = 'flex items-center gap-1.5 px-3 py-1 rounded-full transition-all duration-200 bg-accent text-primary-dark shadow-sm font-bold notranslate';
      const inactiveClass = 'flex items-center gap-1.5 px-3 py-1 rounded-full transition-all duration-200 hover:bg-white/10 text-white/80 notranslate';

      if (lang === 'en') {
        document.body.classList.add('lang-en');
        document.body.classList.remove('lang-id');
        btnIdList.forEach(b => b.className = 'btn-lang-id-target ' + inactiveClass);
        btnEnList.forEach(b => b.className = 'btn-lang-en-target ' + activeClass);
      } else {
        document.body.classList.add('lang-id');
        document.body.classList.remove('lang-en');
        btnIdList.forEach(b => b.className = 'btn-lang-id-target ' + activeClass);
        btnEnList.forEach(b => b.className = 'btn-lang-en-target ' + inactiveClass);
      }
    }

    // Initialize language immediately on page load
    function initLanguage() {
      const savedLang = localStorage.getItem('user_site_lang') || 'id';
      updateLangBtnStyle(savedLang);

      // Check if we just reloaded from a language switch
      const toastLang = sessionStorage.getItem('show_lang_toast');
      if (toastLang && typeof Swal !== 'undefined') {
        sessionStorage.removeItem('show_lang_toast');
        Swal.fire({
          icon: 'success',
          title: toastLang === 'id' ? 'Bahasa Indonesia 🇮🇩' : 'English 🇬🇧',
          text: toastLang === 'id' 
            ? 'Konten kembali ke Bahasa Indonesia' 
            : 'Content automatically translated to English',
          timer: 2200,
          showConfirmButton: false,
          toast: true,
          position: 'top-end',
          timerProgressBar: true,
          background: '#0B3322',
          color: '#ffffff',
          iconColor: '#FFAA00',
          customClass: {
            popup: 'rounded-xl border border-white/20 shadow-2xl mt-4 mr-4 notranslate'
          }
        });
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      initLanguage();
    });
  </script>

  <script>
    // Initialize AOS
    document.addEventListener('DOMContentLoaded', function() {
      AOS.init({
        once: true,
        duration: 700,
        easing: 'ease-out-cubic'
      });
    });

    // Navbar Scroll Class Toggle
    window.addEventListener('scroll', function() {
      const nav = document.getElementById('main-navbar');
      const btt = document.getElementById('back-to-top');
      if (!nav) return;

      if (window.scrollY > 50) {
        nav.classList.remove('navbar-transparent');
        nav.classList.add('navbar-solid');
      } else {
        nav.classList.remove('navbar-solid');
        nav.classList.add('navbar-transparent');
      }

      if (btt) {
        if (window.scrollY > 400) {
          btt.classList.remove('hide');
          btt.classList.add('show');
        } else {
          btt.classList.remove('show');
          btt.classList.add('hide');
        }
      }
    });

    // Mobile Menu Toggle
    function toggleMobileMenu() {
      const menu = document.getElementById('mobileMenu');
      const ham = document.getElementById('hamburger');
      if (menu && ham) {
        menu.classList.toggle('open');
        ham.classList.toggle('ham-active');
      }
    }

    // Ripple Effect on Buttons
    document.addEventListener('click', function(e) {
      const btn = e.target.closest('.ripple-btn');
      if (!btn) return;
      
      const rect = btn.getBoundingClientRect();
      const circle = document.createElement('span');
      const diameter = Math.max(rect.width, rect.height);
      const radius = diameter / 2;

      circle.style.width = circle.style.height = `${diameter}px`;
      circle.style.left = `${e.clientX - rect.left - radius}px`;
      circle.style.top = `${e.clientY - rect.top - radius}px`;
      circle.classList.add('ripple-wave');

      const existingRipple = btn.querySelector('.ripple-wave');
      if (existingRipple) existingRipple.remove();

      btn.appendChild(circle);
    });

    // Counter Animation for Stats
    (function() {
      let animated = false;
      function animateCounters() {
        const counters = document.querySelectorAll('[data-counter]');
        if (!counters.length) return;

        counters.forEach(counter => {
          const target = +counter.getAttribute('data-target');
          let count = 0;
          const speed = Math.ceil(target / 40);
          const update = () => {
            count += speed;
            if (count > target) count = target;
            counter.innerText = count;
            if (count < target) setTimeout(update, 35);
          };
          update();
        });
      }

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting && !animated) {
            animated = true;
            animateCounters();
          }
        });
      }, { threshold: 0.3 });

      document.addEventListener('DOMContentLoaded', () => {
        const statsEl = document.querySelector('[data-counter]');
        if (statsEl && statsEl.parentElement) {
          observer.observe(statsEl.parentElement.parentElement);
        }
      });
    })();
  </script>

  @stack('scripts')
</body>
</html>
