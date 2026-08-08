<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Admin – PPTQ Imam Syaukani</title>
  <meta name="description" content="Pendaftaran akun admin PPTQ Imam Syaukani." />
  
  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- TAILWIND CSS -->
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

  <!-- SWEETALERT2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style type="text/tailwindcss">
    @layer base {
      body {
        font-family: 'Poppins', sans-serif;
      }
      h1, h2, h3, h4, h5, h6 {
        font-family: 'Outfit', sans-serif;
      }
    }
  </style>
</head>
<body class="bg-[#144D30] min-h-screen flex flex-col justify-center items-center p-4 relative font-poppins">


  <!-- Registration Card Container -->
  <div class="w-full max-w-[440px] bg-white rounded-3xl shadow-2xl relative overflow-hidden p-7 sm:p-9 border border-emerald-950/10">
    
    <!-- Top Glowing Bright Green Accent Bar -->
    <div class="absolute top-0 left-0 right-0 h-2 bg-[#00E676]"></div>

    <!-- Header Section -->
    <div class="text-center mt-2 mb-6">
      <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-outfit">
        Sign-Up
      </h1>
      <p class="text-xs sm:text-sm text-slate-500 font-medium mt-1">
        Admin PPTQ Imam Syaukani
      </p>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
      <div class="mb-4 p-3 rounded-lg bg-red-50 border border-red-200 text-xs text-red-600 space-y-1">
        @foreach ($errors->all() as $error)
          <p>• {{ $error }}</p>
        @endforeach
      </div>
    @endif

    <!-- Registration Form -->
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
      @csrf

      <!-- Username / Email Input -->
      <div>
        <label for="name" class="block text-slate-800 text-xs sm:text-sm font-semibold mb-1.5">
          Username/Email
        </label>
        <input 
          id="name" 
          name="name" 
          type="text" 
          value="{{ old('name') }}" 
          required 
          autofocus 
          placeholder="Masukkan Username atau email..."
          class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm text-slate-800 placeholder:text-slate-300 focus:outline-none focus:border-[#144D30] focus:ring-1 focus:ring-[#144D30] transition-all" 
        />
      </div>

      <!-- Password Input -->
      <div>
        <label for="password" class="block text-slate-800 text-xs sm:text-sm font-semibold mb-1.5">
          Password
        </label>
        <div class="relative">
          <input 
            id="password" 
            name="password" 
            type="password" 
            required 
            placeholder="Masukkan Password..."
            class="w-full pl-4 pr-10 py-2.5 border border-slate-300 rounded-lg text-sm text-slate-800 placeholder:text-slate-300 focus:outline-none focus:border-[#144D30] focus:ring-1 focus:ring-[#144D30] transition-all" 
          />
          <button 
            type="button" 
            id="toggle-password" 
            aria-label="Tampilkan password"
            class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600 focus:outline-none transition-colors">
            <svg id="eye-icon-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <svg id="eye-off-icon-password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.025 10.025 0 014.122-.963c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21M3 3l18 18" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Ulangi Password Input -->
      <div>
        <label for="password_confirmation" class="block text-slate-800 text-xs sm:text-sm font-semibold mb-1.5">
          Ulangi Password
        </label>
        <div class="relative">
          <input 
            id="password_confirmation" 
            name="password_confirmation" 
            type="password" 
            required 
            placeholder="Masukkan Password..."
            class="w-full pl-4 pr-10 py-2.5 border border-slate-300 rounded-lg text-sm text-slate-800 placeholder:text-slate-300 focus:outline-none focus:border-[#144D30] focus:ring-1 focus:ring-[#144D30] transition-all" 
          />
          <button 
            type="button" 
            id="toggle-password-confirmation" 
            aria-label="Tampilkan konfirmasi password"
            class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600 focus:outline-none transition-colors">
            <svg id="eye-icon-confirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <svg id="eye-off-icon-confirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.025 10.025 0 014.122-.963c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21M3 3l18 18" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Submit Button -->
      <div class="pt-3">
        <button 
          type="submit" 
          class="w-4/5 sm:w-[85%] mx-auto block bg-[#144D30] hover:bg-[#0E3A24] active:bg-[#0A2B1B] text-white font-semibold text-sm py-2.5 rounded-lg shadow-sm hover:shadow transition-all text-center cursor-pointer">
          Buat
        </button>
      </div>

    </form>

    <!-- Footer Nav Links -->
    <div class="text-center mt-6 text-xs text-slate-400">
      <span>Sudah punya akun? </span>
      <a href="{{ route('login') }}" class="text-[#144D30] font-bold hover:underline transition-colors">Masuk Sekarang</a>
    </div>

    <div class="text-center mt-3">
      <a href="{{ url('/') }}" class="text-xs text-slate-400 hover:text-[#144D30] transition-colors underline">Kembali ke Beranda</a>
    </div>

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      function setupPasswordToggle(inputId, toggleId, eyeId, eyeOffId) {
        const input = document.getElementById(inputId);
        const toggleBtn = document.getElementById(toggleId);
        const eyeIcon = document.getElementById(eyeId);
        const eyeOffIcon = document.getElementById(eyeOffId);

        if (input && toggleBtn) {
          toggleBtn.addEventListener('click', function () {
            const isPassword = input.getAttribute('type') === 'password';
            input.setAttribute('type', isPassword ? 'text' : 'password');
            if (eyeIcon && eyeOffIcon) {
              eyeIcon.classList.toggle('hidden', isPassword);
              eyeOffIcon.classList.toggle('hidden', !isPassword);
            }
          });
        }
      }

      setupPasswordToggle('password', 'toggle-password', 'eye-icon-password', 'eye-off-icon-password');
      setupPasswordToggle('password_confirmation', 'toggle-password-confirmation', 'eye-icon-confirm', 'eye-off-icon-confirm');
    });
  </script>

  @if ($errors->any())
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      let errorMessages = `{!! implode('<br>• ', $errors->all()) !!}`;
      Swal.fire({
        icon: 'error',
        title: 'Registrasi Gagal!',
        html: '<div class="text-left text-sm mt-2">• ' + errorMessages + '</div>',
        confirmButtonColor: '#144D30',
        confirmButtonText: 'Mengerti'
      });
    });
  </script>
  @endif

  @if (session('success'))
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#144D30',
        timer: 3000,
        timerProgressBar: true
      });
    });
  </script>
  @endif

</body>
</html>
