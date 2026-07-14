<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Masuk Portal – PPTQ Imam Syaukani</title>
  <meta name="description" content="Masuk ke portal administrasi Pondok Pesantren Tahfidzul Qur'an Imam Syaukani." />
  
  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- TAILWIND CSS v4 -->
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  
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
  </style>
</head>
<body class="bg-gradient-to-br from-primary-dark to-primary min-h-screen flex items-center justify-center p-5">

  <div class="w-full max-w-[450px] bg-white rounded-3xl shadow-xl p-8 sm:p-10 relative">
    <div class="text-center mb-8 font-outfit font-extrabold text-3xl text-primary flex justify-center items-center gap-2 select-none">
      <span class="text-accent">PPTQ</span> Imam Syaukani
    </div>
    <h3 class="text-center text-xl sm:text-2xl font-bold font-outfit text-slate-800 mb-1">
      Login Portal Admin
    </h3>
    <p class="text-center text-slate-400 text-xs mb-8">Sistem Informasi Akademik & Pendaftaran</p>

    <!-- Session Status -->
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
      @csrf

      <div class="form-group">
        <label for="email" class="block text-slate-700 text-xs font-bold mb-2">Username / Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Masukkan Username atau email..." required autofocus autocomplete="username" />
        @error('email')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
      </div>
      
      <div class="form-group">
        <label for="password" class="block text-slate-700 text-xs font-bold mb-2">Password</label>
        <input type="password" name="password" id="password" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Masukkan Password..." required autocomplete="current-password" />
        @error('password')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-between items-center gap-3.5 mb-6 text-xs sm:text-sm">
        <label class="flex items-center gap-1.5 cursor-pointer text-slate-500 font-medium select-none">
          <input type="checkbox" name="remember" class="cursor-pointer" /> Ingat saya di Perangkat ini
        </label>
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-primary font-bold hover:text-primary-dark transition-colors">Lupa Password?</a>
        @endif
      </div>

      <button type="submit" class="inline-flex items-center justify-center px-6 py-3.5 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all w-full shadow-sm">
        Masuk
      </button>
    </form>

    <div class="text-center mt-6 text-xs sm:text-sm">
      <span class="text-slate-400">Tidak Memiliki Akun? </span>
      <a href="{{ route('register') }}" class="text-primary font-bold hover:text-primary-dark transition-colors">Daftar Sekarang</a>
    </div>
    
    <div class="text-center mt-5">
      <a href="{{ url('/') }}" class="text-xs text-slate-400 hover:text-primary transition-colors underline">Kembali ke Beranda</a>
    </div>
  </div>

</body>
</html>
