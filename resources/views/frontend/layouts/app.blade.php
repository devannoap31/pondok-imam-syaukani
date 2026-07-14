<!DOCTYPE html>
<html lang="id">
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
      max-height: 550px;
      opacity: 1;
      visibility: visible;
      padding-top: 1.25rem;
      padding-bottom: 1.25rem;
    }

    /* Admin Dashboard Mobile Sidebar */
    .admin-sidebar {
      transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .admin-sidebar.active {
      left: 0;
    }
  </style>
  
  @yield('styles')
</head>
<body>

  <x-frontend.navbar :activePage="$activePage ?? ''" />

  <!-- MAIN CONTENT -->
  <main>
    @yield('content')
  </main>

  <x-frontend.footer />

  <script>
    function toggleMobileMenu() {
      const menu = document.getElementById('mobileMenu');
      menu.classList.toggle('active');
    }
  </script>
  @yield('scripts')
</body>
</html>
