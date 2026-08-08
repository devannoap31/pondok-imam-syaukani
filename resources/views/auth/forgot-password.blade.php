<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Lupa Password – PPTQ Imam Syaukani</title>
  <meta name="description" content="Reset password akun PPTQ Imam Syaukani." />
  
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

  <!-- Card Container -->
  <div class="w-full max-w-[440px] bg-white rounded-3xl shadow-2xl relative overflow-hidden p-7 sm:p-9 border border-emerald-950/10">
    
    <!-- Top Glowing Bright Green Accent Bar -->
    <div class="absolute top-0 left-0 right-0 h-2 bg-[#00E676]"></div>

    <!-- Header Section -->
    <div class="text-center mt-2 mb-6">
      <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight font-outfit">
        Lupa Password
      </h1>
      <p class="text-xs sm:text-sm text-slate-500 font-medium mt-1">
        PPTQ Imam Syaukani
      </p>
    </div>

    <p class="text-xs sm:text-sm text-slate-600 mb-6 text-center leading-relaxed">
      Lupa password Anda? Masukkan alamat email Anda di bawah ini dan kami akan mengirimkan tautan reset password.
    </p>

    <!-- Session Status Alert -->
    @if (session('status'))
      <div class="mb-4 p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-xs text-emerald-800 font-medium text-center">
        {{ session('status') }}
      </div>
    @endif

    <!-- Form -->
    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
      @csrf

      <div>
        <label for="email" class="block text-slate-800 text-xs sm:text-sm font-semibold mb-1.5">
          Alamat Email
        </label>
        <input 
          id="email" 
          name="email" 
          type="email" 
          value="{{ old('email') }}" 
          required 
          autofocus 
          placeholder="Masukkan email Anda..."
          class="w-full px-4 py-2.5 border border-slate-300 rounded-lg text-sm text-slate-800 placeholder:text-slate-300 focus:outline-none focus:border-[#144D30] focus:ring-1 focus:ring-[#144D30] transition-all" 
        />
      </div>

      <div class="pt-2">
        <button 
          type="submit" 
          class="w-full bg-[#144D30] hover:bg-[#0E3A24] active:bg-[#0A2B1B] text-white font-semibold text-sm py-3 rounded-lg shadow-sm transition-all text-center cursor-pointer">
          Kirim Link Reset Password
        </button>
      </div>
    </form>

    <div class="text-center mt-6 text-xs text-slate-400">
      <span>Ingat password Anda? </span>
      <a href="{{ route('login') }}" class="text-[#144D30] font-bold hover:underline transition-colors">Masuk</a>
    </div>

    <div class="text-center mt-3">
      <a href="{{ url('/') }}" class="text-xs text-slate-400 hover:text-[#144D30] transition-colors underline">Kembali ke Beranda</a>
    </div>

  </div>

  @if (session('status'))
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: 'info',
        title: 'Informasi',
        text: "{{ session('status') }}",
        confirmButtonColor: '#144D30',
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
        title: 'Gagal Reset!',
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

</body>
</html>
