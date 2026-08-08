<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
  </style>

  @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

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
          class="hide fixed bottom-6 right-6 z-50 w-12 h-12 bg-accent text-primary-dark rounded-full shadow-lg flex items-center justify-center font-bold text-xl hover:bg-accent-dark hover:scale-110 transition-all duration-300">
    ↑
  </button>

  <!-- AOS JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

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

  <!-- SweetAlert2 Toast Notification for Language Change -->
  @if (session('lang_changed'))
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          icon: 'success',
          title: '{{ app()->getLocale() == "id" ? "Berhasil!" : "Success!" }}',
          text: '{{ session("lang_changed") }}',
          timer: 2500,
          showConfirmButton: false,
          toast: true,
          position: 'top-end',
          timerProgressBar: true,
          background: '#0B3322',
          color: '#ffffff',
          iconColor: '#FFAA00',
          customClass: {
            popup: 'rounded-xl border border-white/20 shadow-2xl mt-4 mr-4'
          }
        });
      });
    </script>
  @endif

  @stack('scripts')
</body>
</html>
