<!DOCTYPE html>
<html lang="id" id="html-root">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'PPTQ Imam Syaukani')</title>
  <meta name="description" content="@yield('meta_description', 'Pondok Pesantren Tahfidzul Qur\'an Imam Syaukani berkomitmen mencetak generasi Qur\'ani yang berakhlak mulia, mandiri, dan berwawasan luas.')" />
  
  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- TAILWIND CSS v4 -->
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  
  <!-- AOS - Animate On Scroll -->
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />

  <!-- CUSTOM TAILWIND CONFIG & BASE CLASSES -->
  <style type="text/tailwindcss">
    @theme {
      --color-primary: #124E3F;
      --color-primary-dark: #0A3329;
      --color-primary-light: #1C745F;
      --color-primary-accent: #E3F2ED;
      --color-accent: #FFAA00;
      --color-accent-dark: #E59800;
      --color-accent-light: #FFBB33;
      --color-accent-bg: #FFF7E6;
      --color-dark: #0F172A;
      
      --radius-sm: 6px;
      --radius-md: 12px;
      --radius-lg: 24px;
      
      --shadow-primary: 0 4px 14px 0 rgba(18, 78, 63, 0.2);
    }

    @layer base {
      body {
        font-family: 'Poppins', 'Outfit', sans-serif;
        @apply text-slate-700 bg-white leading-relaxed overflow-x-hidden;
      }
      h1, h2, h3, h4, h5, h6 {
        font-family: 'Outfit', sans-serif;
        @apply text-slate-900 font-bold leading-tight;
      }
    }

    /* Custom Mobile Menu Slide Down Transition */
    .mobile-menu {
      max-height: 0;
      overflow: hidden;
      opacity: 0;
      visibility: hidden;
      transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.25s ease-in-out, padding 0.3s ease-in-out;
    }
    .mobile-menu.active {
      max-height: 600px;
      opacity: 1;
      visibility: visible;
      padding-top: 1.25rem;
      padding-bottom: 1.25rem;
    }

    /* Navbar scroll effect */
    .navbar-transparent {
      background-color: rgba(10, 51, 41, 0.85);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
    }
    .navbar-solid {
      background-color: #124E3F;
      box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }

    /* Hamburger animation */
    .ham-bar {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      transform-origin: center;
    }
    .ham-open .ham-bar:nth-child(1) {
      transform: translateY(8px) rotate(45deg);
    }
    .ham-open .ham-bar:nth-child(2) {
      opacity: 0;
      transform: scaleX(0);
    }
    .ham-open .ham-bar:nth-child(3) {
      transform: translateY(-8px) rotate(-45deg);
    }

    /* Floating particles */
    .particle {
      position: absolute;
      border-radius: 50%;
      pointer-events: none;
      animation: floatParticle linear infinite;
      will-change: transform, opacity;
    }
    @keyframes floatParticle {
      0% { transform: translateY(100%) translateX(0); opacity: 0; }
      10% { opacity: 0.6; }
      90% { opacity: 0.3; }
      100% { transform: translateY(-100vh) translateX(30px); opacity: 0; }
    }

    /* Typewriter cursor */
    .typewriter-cursor::after {
      content: '|';
      animation: blink 0.75s step-end infinite;
      color: #FFAA00;
      margin-left: 2px;
    }
    @keyframes blink {
      0%, 100% { opacity: 1; }
      50% { opacity: 0; }
    }

    /* Pulse glow for CTA */
    .pulse-glow {
      animation: pulseGlow 3s ease-in-out infinite;
    }
    @keyframes pulseGlow {
      0%, 100% { opacity: 0.15; transform: scale(1); }
      50% { opacity: 0.3; transform: scale(1.05); }
    }

    /* Back to top button */
    #back-to-top {
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }
    #back-to-top.visible {
      opacity: 1;
      visibility: visible;
    }

    /* Language toggle button */
    .lang-btn {
      transition: all 0.25s ease;
    }
    .lang-btn.active {
      background-color: #FFAA00;
      color: #0A3329;
    }

    /* Admin Dashboard Mobile Sidebar */
    .admin-sidebar {
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .admin-sidebar.active {
      left: 0;
    }

    /* Ripple effect */
    .ripple-btn {
      position: relative;
      overflow: hidden;
    }
    .ripple-btn .ripple {
      position: absolute;
      border-radius: 50%;
      transform: scale(0);
      animation: rippleAnim 0.6s linear;
      background-color: rgba(255,255,255,0.3);
      pointer-events: none;
    }
    @keyframes rippleAnim {
      to { transform: scale(4); opacity: 0; }
    }
  </style>
  
  <!-- SWEETALERT2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  @yield('styles')
</head>
<body>

  <x-frontend.navbar :activePage="$activePage ?? ''" />

  <!-- MAIN CONTENT -->
  <main>
    @yield('content')
  </main>

  <x-frontend.footer />

  <!-- BACK TO TOP BUTTON -->
  <button id="back-to-top" onclick="scrollToTop()"
    class="fixed bottom-8 right-8 z-50 w-12 h-12 bg-primary text-white rounded-full shadow-lg flex items-center justify-center text-xl hover:bg-primary-dark hover:-translate-y-1 transition-all duration-300 hover:shadow-[0_8px_20px_rgba(18,78,63,0.4)]"
    aria-label="Kembali ke atas">
    ↑
  </button>

  <!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

  <script>
    /* ============================================================
       INIT AOS
    ============================================================ */
    AOS.init({
      duration: 700,
      easing: 'ease-out-cubic',
      once: true,
      offset: 60,
    });

    /* ============================================================
       MOBILE MENU TOGGLE
    ============================================================ */
    function toggleMobileMenu() {
      const menu = document.getElementById('mobileMenu');
      const hamburger = document.getElementById('hamburger');
      menu.classList.toggle('active');
      hamburger.classList.toggle('ham-open');
    }

    /* ============================================================
       NAVBAR SCROLL EFFECT
    ============================================================ */
    const navbar = document.getElementById('main-navbar');
    function handleNavbarScroll() {
      if (window.scrollY > 50) {
        navbar.classList.remove('navbar-transparent');
        navbar.classList.add('navbar-solid');
      } else {
        navbar.classList.remove('navbar-solid');
        navbar.classList.add('navbar-transparent');
      }
    }
    window.addEventListener('scroll', handleNavbarScroll, { passive: true });
    handleNavbarScroll();

    /* ============================================================
       BACK TO TOP
    ============================================================ */
    const backToTopBtn = document.getElementById('back-to-top');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 400) {
        backToTopBtn.classList.add('visible');
      } else {
        backToTopBtn.classList.remove('visible');
      }
    }, { passive: true });
    function scrollToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    /* ============================================================
       COUNTER ANIMATION
    ============================================================ */
    function animateCounter(el, target, duration = 1800) {
      let start = 0;
      const step = target / (duration / 16);
      const update = () => {
        start += step;
        if (start < target) {
          el.textContent = Math.floor(start);
          requestAnimationFrame(update);
        } else {
          el.textContent = target;
        }
      };
      requestAnimationFrame(update);
    }

    const statsObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const el = entry.target;
          const target = parseInt(el.dataset.target);
          animateCounter(el, target);
          statsObserver.unobserve(el);
        }
      });
    }, { threshold: 0.5 });

    document.querySelectorAll('[data-counter]').forEach(el => {
      statsObserver.observe(el);
    });

    /* ============================================================
       RIPPLE EFFECT ON BUTTONS
    ============================================================ */
    document.querySelectorAll('.ripple-btn').forEach(btn => {
      btn.addEventListener('click', function(e) {
        const ripple = document.createElement('span');
        ripple.className = 'ripple';
        const rect = this.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = (e.clientX - rect.left - size / 2) + 'px';
        ripple.style.top = (e.clientY - rect.top - size / 2) + 'px';
        this.appendChild(ripple);
        setTimeout(() => ripple.remove(), 700);
      });
    });

    /* ============================================================
       LANGUAGE SWITCHER
    ============================================================ */
    const translations = {
      id: {
        // Navbar
        'nav-home': 'HOME',
        'nav-profile': 'PROFILE ▾',
        'nav-profile-sub': 'PROFILE',
        'nav-gallery': 'GALERI',
        'nav-news': 'BERITA',
        'nav-school': 'SEKOLAH',
        'nav-schedule': 'JADWAL',
        'nav-donation': 'DONASI',
        'nav-location': 'LOKASI',
        'nav-register': 'Pendaftaran',
        // Hero
        'hero-badge': "Pondok Pesantren Tahfidzul Qur'an",
        'hero-heading': "Membentuk Generasi Qur'ani & Berakhlakul Karimah",
        'hero-desc': 'Mencetak generasi yang beriman, berilmu, dan berakhlak mulia yang mampu memahami dan mengamalkan ajaran Islam secara mendalam serta menyebarkannya kepada masyarakat luas.',
        'hero-btn-register': 'DAFTAR SEKARANG +',
        'hero-btn-profile': 'PROFILE PESANTREN',
        // Stats
        'stat-1-label': 'Santri Aktif',
        'stat-2-label': 'Alumni',
        'stat-3-label': 'Pendidik',
        'stat-4-label': 'Mitra',
        // Sejarah
        'sejarah-badge': 'Tentang Kami',
        'sejarah-heading': 'Lor Etan Ngalor Ngidul',
        'sejarah-p1': 'Lor Etan Ngalor Ngidul Kanan kiri Atas bawah Kotak segitiga atas. Lor Etan Ngalor Ngidul Kanan kiri Atas bawah Kotak segitiga atas.',
        'sejarah-p2': 'Lor Etan Ngalor Ngidul Kanan kiri Atas bawah Kotak segitiga atas. Lor Etan Ngalor Ngidul Kanan kiri Atas bawah Kotak segitiga atas.',
        'sejarah-btn': 'Baca Selengkapnya',
        // Jenjang
        'jenjang-badge': 'Program Pendidikan',
        'jenjang-heading': 'Jenjang Pendidikan yang Tersedia',
        'jenjang-desc': 'Pilihan jenjang pendidikan formal dan non-formal di PPTQ Imam Syaukani.',
        'jenjang-c1-name': 'MTs',
        'jenjang-c1-sub': 'Madrasah Tsanawiyah',
        'jenjang-c1-desc': 'Jenjang MTs diperuntukkan bagi lulusan SD/MI. Pada tahap ini, santri difokuskan pada perbaikan bacaan Al-Qur\'an (Tahsin), permulaan hafalan (Tahfidz), pembentukan akhlak dasar, dan pengenalan ilmu bahasa Arab serta dasar-dasar agama.',
        'jenjang-c1-f1': 'Target hafalan Al-Qur\'an bertahap',
        'jenjang-c1-f2': 'Ijazah formal MTs Nasional',
        'jenjang-c1-f3': 'Pelajaran umum dan eksakta',
        'jenjang-c1-f4': 'Ekstrakurikuler pondok',
        'jenjang-c2-name': 'MA',
        'jenjang-c2-sub': 'Madrasah Aliyah',
        'jenjang-c2-desc': 'Jenjang MA diperuntukkan bagi lulusan SMP/MTs. Fokus pada pemantapan hafalan 30 Juz, pendalaman penguasaan Kitab Turast (kitab kuning), Hifdzul Matan, serta persiapan akademis bagi yang ingin melanjutkan kuliah ke Timur Tengah maupun PTN.',
        'jenjang-c2-f1': 'Pendalaman Kitab Kuning',
        'jenjang-c2-f2': 'Hifdzul Matan tingkat lanjut',
        'jenjang-c2-f3': 'Ijazah formal MA Nasional',
        'jenjang-c2-f4': 'Persiapan pengabdian masyarakat',
        'jenjang-c3-name': 'Takhossus',
        'jenjang-c3-sub': 'Program Khusus',
        'jenjang-c3-desc': 'Takhossus adalah program khusus yang didedikasikan bagi santri yang ingin berfokus secara penuh (100%) pada penyelesaian hafalan Al-Qur\'an 30 Juz (Tahfidz Mutqin) atau pendalaman ilmu syar\'i tanpa terbebani kurikulum sekolah umum.',
        'jenjang-c3-f1': 'Target penyelesaian cepat & mutqin',
        'jenjang-c3-f2': 'Waktu muraja\'ah sangat leluasa',
        'jenjang-c3-f3': 'Pengambilan sanad hafalan',
        'jenjang-c3-f4': 'Fokus program keagamaan',
        'jenjang-btn': 'Rincian Program',
        // Fasilitas
        'fasilitas-badge': 'Fasilitas Keunggulan',
        'fasilitas-heading': 'Lingkungan Belajar yang Nyaman & Islami',
        'fasilitas-desc': 'Data riil fasilitas dan demografi Pondok Pesantren saat ini.',
        'fac-1-name': 'Masjid',
        'fac-1-desc': 'Masjid Baiatur Ridwan dengan kapasitas tampung 300 Orang untuk sarana ibadah dan setoran santri.',
        'fac-2-name': 'Asrama',
        'fac-2-desc': 'Asrama Abu Bakar & Umar (2 Kamar) dengan kapasitas tampung 60 Orang.',
        'fac-3-name': 'Aula',
        'fac-3-desc': 'Aula Usman Bin Affan dengan kapasitas tampung 10 Orang untuk kegiatan belajar dan pertemuan.',
        'fac-4-name': 'Lain-lain (dll)',
        'fac-4-desc': 'Fasilitas penunjang seperti kantor, dapur, kantin, depot air minum, lapangan, dan ruang kelas.',
        // CTA
        'cta-badge': 'Penerimaan Santri Baru',
        'cta-heading': 'Mari Bergabung Menjadi Bagian dari Pesantren',
        'cta-desc': 'Pendaftaran santri baru gelombang pertama telah dibuka. Kuota terbatas. Daftarkan putra-putri Anda sekarang untuk pendidikan yang lebih baik.',
        'cta-btn-register': 'Daftar Sekarang',
        'cta-btn-contact': 'Hubungi Panitia',
        // Footer
        'footer-desc': 'Pondok Pesantren Tahfidzul Qur\'an Imam Syaukani berkomitmen mencetak generasi Qur\'ani yang berakhlak mulia, mandiri, dan berwawasan luas.',
        'footer-links-title': 'Tautan Cepat',
        'footer-contact-title': 'Hubungi Kami',
        'footer-copy': '© 2026 Copyright wann.two. All Rights Reserved.',
        'footer-brand': 'PPTQ Imam Syaukani - Boyolali',
      },
      en: {
        // Navbar
        'nav-home': 'HOME',
        'nav-profile': 'PROFILE ▾',
        'nav-profile-sub': 'PROFILE',
        'nav-gallery': 'GALLERY',
        'nav-news': 'NEWS',
        'nav-school': 'SCHOOL',
        'nav-schedule': 'SCHEDULE',
        'nav-donation': 'DONATION',
        'nav-location': 'LOCATION',
        'nav-register': 'Enrollment',
        // Hero
        'hero-badge': "Qur'an Memorization Boarding School",
        'hero-heading': "Shaping a Qur'ani Generation with Noble Character",
        'hero-desc': 'Producing a generation of believers, scholars, and people of noble character who understand and practice Islamic teachings deeply, and spread them to the wider community.',
        'hero-btn-register': 'ENROLL NOW +',
        'hero-btn-profile': 'SCHOOL PROFILE',
        // Stats
        'stat-1-label': 'Active Students',
        'stat-2-label': 'Alumni',
        'stat-3-label': 'Educators',
        'stat-4-label': 'Partners',
        // Sejarah
        'sejarah-badge': 'About Us',
        'sejarah-heading': 'Our Foundation',
        'sejarah-p1': 'Our boarding school was established with a commitment to providing quality Islamic education, combining religious knowledge with formal academic curriculum in a balanced and nurturing environment.',
        'sejarah-p2': 'We are dedicated to producing graduates who are proficient in Qur\'an memorization, possess strong Islamic character, and are equipped to contribute positively to society.',
        'sejarah-btn': 'Read More',
        // Jenjang
        'jenjang-badge': 'Education Programs',
        'jenjang-heading': 'Available Education Levels',
        'jenjang-desc': 'Choices of formal and non-formal education levels at PPTQ Imam Syaukani.',
        'jenjang-c1-name': 'MTs',
        'jenjang-c1-sub': 'Junior Islamic High School',
        'jenjang-c1-desc': 'The MTs level is for graduates of elementary school. At this stage, students focus on improving Qur\'an recitation (Tahsin), beginning memorization (Tahfidz), forming basic character, and introduction to Arabic language and Islamic fundamentals.',
        'jenjang-c1-f1': 'Progressive Qur\'an memorization targets',
        'jenjang-c1-f2': 'National MTs formal certificate',
        'jenjang-c1-f3': 'General and science subjects',
        'jenjang-c1-f4': 'School extracurricular activities',
        'jenjang-c2-name': 'MA',
        'jenjang-c2-sub': 'Senior Islamic High School',
        'jenjang-c2-desc': 'The MA level is for junior high graduates. Focus on solidifying 30-Juz memorization, deepening mastery of Classical Islamic Texts (Kitab Kuning), Hifdzul Matan, and academic preparation for those wishing to continue to the Middle East or Indonesian universities.',
        'jenjang-c2-f1': 'Classical Islamic Texts (Kitab Kuning)',
        'jenjang-c2-f2': 'Advanced Hifdzul Matan',
        'jenjang-c2-f3': 'National MA formal certificate',
        'jenjang-c2-f4': 'Community service preparation',
        'jenjang-c3-name': 'Takhossus',
        'jenjang-c3-sub': 'Special Program',
        'jenjang-c3-desc': 'Takhossus is a specialized program dedicated for students who wish to focus 100% on completing 30-Juz Qur\'an memorization (Tahfidz Mutqin) or deepening Islamic knowledge without the burden of a general school curriculum.',
        'jenjang-c3-f1': 'Fast & precise memorization completion',
        'jenjang-c3-f2': 'Ample muraja\'ah (review) time',
        'jenjang-c3-f3': 'Sanad memorization certification',
        'jenjang-c3-f4': 'Islamic program focus',
        'jenjang-btn': 'Program Details',
        // Fasilitas
        'fasilitas-badge': 'Key Facilities',
        'fasilitas-heading': 'A Comfortable & Islamic Learning Environment',
        'fasilitas-desc': 'Real data on current facilities and demographics of the Boarding School.',
        'fac-1-name': 'Mosque',
        'fac-1-desc': 'Baiatur Ridwan Mosque with a capacity of 300 people for worship and student recitation sessions.',
        'fac-2-name': 'Dormitory',
        'fac-2-desc': 'Abu Bakar & Umar Dormitory (2 rooms) with a capacity of 60 people.',
        'fac-3-name': 'Hall',
        'fac-3-desc': 'Usman Bin Affan Hall with a capacity of 10 people for study activities and meetings.',
        'fac-4-name': 'Other Facilities',
        'fac-4-desc': 'Supporting facilities including office, kitchen, canteen, water depot, sports field, and classrooms.',
        // CTA
        'cta-badge': 'New Student Enrollment',
        'cta-heading': 'Join and Become Part of Our Pesantren',
        'cta-desc': 'First wave enrollment for new students is now open. Limited quota. Register your child now for a better education.',
        'cta-btn-register': 'Enroll Now',
        'cta-btn-contact': 'Contact Committee',
        // Footer
        'footer-desc': 'PPTQ Imam Syaukani is committed to producing a Qur\'ani generation with noble character, independence, and broad vision.',
        'footer-links-title': 'Quick Links',
        'footer-contact-title': 'Contact Us',
        'footer-copy': '© 2026 Copyright wann.two. All Rights Reserved.',
        'footer-brand': 'PPTQ Imam Syaukani - Boyolali',
      }
    };

    let currentLang = localStorage.getItem('lang') || 'id';

    function applyLanguage(lang) {
      currentLang = lang;
      localStorage.setItem('lang', lang);
      document.getElementById('html-root').lang = lang === 'id' ? 'id' : 'en';

      const t = translations[lang];
      document.querySelectorAll('[data-lang-key]').forEach(el => {
        const key = el.dataset.langKey;
        if (t[key] !== undefined) {
          el.textContent = t[key];
        }
      });

      // Update language button states
      document.querySelectorAll('.lang-btn').forEach(btn => {
        if (btn.dataset.lang === lang) {
          btn.classList.add('active');
        } else {
          btn.classList.remove('active');
        }
      });
    }

    function switchLanguage(lang) {
      applyLanguage(lang);
    }

    // Apply saved language on page load
    document.addEventListener('DOMContentLoaded', () => {
      applyLanguage(currentLang);
    });
  </script>

  @if (session('success'))
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#124E3F',
        timer: 3500,
        timerProgressBar: true,
        customClass: {
          popup: 'rounded-2xl',
          confirmButton: 'rounded-lg px-5 py-2'
        }
      });
    });
  </script>
  @endif

  @if (session('error'))
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: "{{ session('error') }}",
        confirmButtonColor: '#EF4444',
        customClass: {
          popup: 'rounded-2xl',
          confirmButton: 'rounded-lg px-5 py-2'
        }
      });
    });
  </script>
  @endif

  @if ($errors->any())
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let errorMessages = `{!! implode('<br>• ', $errors->all()) !!}`;
      Swal.fire({
        icon: 'error',
        title: 'Terjadi Kesalahan!',
        html: '<div class="text-left text-sm mt-2">• ' + errorMessages + '</div>',
        confirmButtonColor: '#EF4444',
        confirmButtonText: 'Mengerti',
        customClass: {
          popup: 'rounded-2xl',
          confirmButton: 'rounded-lg px-5 py-2'
        }
      });
    });
  </script>
  @endif

  @yield('scripts')
</body>
</html>
