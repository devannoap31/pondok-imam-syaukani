<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Verifikasi Email – PPTQ Imam Syaukani</title>
  <meta name="description" content="Verifikasi alamat email portal PPTQ Imam Syaukani." />
  
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
  <div class="w-full max-w-[460px] bg-white rounded-3xl shadow-2xl relative overflow-hidden p-7 sm:p-9 border border-emerald-950/10">
    
    <!-- Top Glowing Bright Green Accent Bar -->
    <div class="absolute top-0 left-0 right-0 h-2 bg-[#00E676]"></div>

    <!-- Icon & Header Section -->
    <div class="text-center mt-2 mb-6">
      <div class="w-16 h-16 rounded-2xl bg-emerald-50 text-[#144D30] flex items-center justify-center mx-auto mb-4 border border-emerald-100 shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
        </svg>
      </div>

      <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight font-outfit">
        Verifikasi Email
      </h1>
      <p class="text-xs sm:text-sm text-slate-500 font-medium mt-1">
        PPTQ Imam Syaukani
      </p>
    </div>

    <!-- Explanation Message -->
    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 mb-6 text-slate-600 text-xs sm:text-sm leading-relaxed text-center">
      Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan. Jika Anda tidak menerima email tersebut, tekan tombol di bawah untuk mengalirkan tautan baru.
    </div>

    <!-- Verification Sent Flash Alert -->
    @if (session('status') == 'verification-link-sent')
      <div class="mb-5 p-3.5 rounded-xl bg-emerald-50 border border-emerald-200 text-xs text-emerald-800 font-medium text-center flex items-center justify-center gap-2">
        <span>✓</span> Tautan verifikasi baru telah dikirimkan ke alamat email Anda.
      </div>
    @endif

    <!-- Actions Section -->
    <div class="space-y-4">
      <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button 
          type="submit" 
          class="w-full bg-[#144D30] hover:bg-[#0E3A24] active:bg-[#0A2B1B] text-white font-semibold text-sm py-3 rounded-xl shadow-sm hover:shadow transition-all text-center cursor-pointer">
          Kirim Ulang Email Verifikasi
        </button>
      </form>

      <div class="flex items-center justify-between pt-2">
        <a href="{{ url('/') }}" class="text-xs text-slate-400 hover:text-[#144D30] transition-colors underline">
          Kembali ke Beranda
        </a>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button 
            type="submit" 
            class="text-xs text-red-500 hover:text-red-700 font-medium transition-colors cursor-pointer flex items-center gap-1">
            <span>🚪</span> Keluar (Log Out)
          </button>
        </form>
      </div>
    </div>

  </div>

  @if (session('status') == 'verification-link-sent')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: 'success',
        title: 'Tautan Terkirim!',
        text: 'Tautan verifikasi baru telah dikirimkan ke alamat email Anda.',
        confirmButtonColor: '#144D30',
        timer: 4000,
        timerProgressBar: true,
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
