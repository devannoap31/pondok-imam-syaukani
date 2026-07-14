<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin – PPTQ Imam Syaukani</title>
  <meta name="description" content="Panel kontrol administrasi Pondok Pesantren Tahfidzul Qur'an Imam Syaukani." />
  
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
      --color-danger: #EF4444;
      --color-success: #10B981;
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
<body class="bg-slate-50">

  <div class="grid grid-cols-1 lg:grid-cols-[260px_1fr] min-h-screen">
    
    <!-- SIDEBAR -->
    <aside class="sidebar-admin fixed top-0 -left-[280px] lg:left-0 w-[280px] lg:w-full h-screen bg-primary-dark text-white p-6 lg:p-8 flex flex-col z-[1100] transition-all duration-300 shadow-2xl lg:shadow-none lg:relative [&.active]:left-0">
      <!-- Close button on mobile -->
      <button class="lg:hidden text-white/70 hover:text-white text-3xl font-light self-end mb-5 bg-transparent border-none cursor-pointer outline-none" onclick="toggleAdminSidebar()">&times;</button>
      
      <div class="font-outfit text-xl font-extrabold tracking-tight text-white mb-10 flex items-center gap-2 select-none">
        <span class="text-accent font-extrabold">PPTQ</span> Imam Syaukani
      </div>

      <div class="flex items-center gap-3.5 mb-8 border-b border-white/10 pb-5">
        <div class="w-10 h-10 rounded-full bg-accent text-primary-dark font-extrabold flex items-center justify-center select-none">AA</div>
        <div>
          <div class="font-semibold text-sm text-white">Adminnya Admin</div>
          <div class="text-accent text-[11px] font-medium tracking-wide">Super Admin</div>
        </div>
      </div>

      <nav class="flex flex-col gap-1.5 overflow-y-auto flex-1 pr-2">
        <a href="#" class="active flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium text-white/70 hover:text-white hover:bg-white/8 transition-all [&.active]:text-accent [&.active]:bg-white/12 [&.active]:border-l-4 [&.active]:border-accent" onclick="switchSection('dashboardOverview', this)">
          <span>📊</span> Dashboard Overview
        </a>
        
        <a href="#" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium text-white/70 hover:text-white hover:bg-white/8 transition-all [&.active]:text-accent [&.active]:bg-white/12 [&.active]:border-l-4 [&.active]:border-accent" onclick="switchSection('manageProfile', this)">
          <span>🕌</span> Kelola Profile Pondok
        </a>
        <div class="pl-10 mt-1 flex flex-col gap-1">
          <a href="#" class="text-xs py-1.5 px-3 text-white/55 hover:text-accent hover:bg-white/5 rounded-lg transition-colors [&.active]:text-accent [&.active]:bg-white/5" onclick="switchSection('manageProfile', this)">Informasi & Sejarah</a>
          <a href="#" class="text-xs py-1.5 px-3 text-white/55 hover:text-accent hover:bg-white/5 rounded-lg transition-colors [&.active]:text-accent [&.active]:bg-white/5" onclick="switchSection('manageProfileVisi', this)">Visi, Misi & Nilai</a>
        </div>

        <a href="#" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium text-white/70 hover:text-white hover:bg-white/8 transition-all [&.active]:text-accent [&.active]:bg-white/12 [&.active]:border-l-4 [&.active]:border-accent mt-2.5" onclick="switchSection('manageProgram', this)">
          <span>📖</span> Kelola Kurikulum
        </a>

        <a href="#" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium text-white/70 hover:text-white hover:bg-white/8 transition-all [&.active]:text-accent [&.active]:bg-white/12 [&.active]:border-l-4 [&.active]:border-accent" onclick="switchSection('manageNews', this)">
          <span>📰</span> Kelola Berita
        </a>

        <a href="#" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium text-white/70 hover:text-white hover:bg-white/8 transition-all [&.active]:text-accent [&.active]:bg-white/12 [&.active]:border-l-4 [&.active]:border-accent" onclick="switchSection('manageSchedule', this)">
          <span>📅</span> Kelola Jadwal
        </a>

        <a href="#" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium text-white/70 hover:text-white hover:bg-white/8 transition-all [&.active]:text-accent [&.active]:bg-white/12 [&.active]:border-l-4 [&.active]:border-accent" onclick="switchSection('manageDonation', this)">
          <span>💰</span> Kelola Donasi & QRIS
        </a>

        <a href="#" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium text-white/70 hover:text-white hover:bg-white/8 transition-all [&.active]:text-accent [&.active]:bg-white/12 [&.active]:border-l-4 [&.active]:border-accent" onclick="switchSection('manageContact', this)">
          <span>📍</span> Kelola Lokasi
        </a>

        <a href="#" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium text-white/70 hover:text-white hover:bg-white/8 transition-all [&.active]:text-accent [&.active]:bg-white/12 [&.active]:border-l-4 [&.active]:border-accent" onclick="switchSection('managePPDB', this)">
          <span>👥</span> Kelola PPDB
        </a>

        <a href="#" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium text-white/70 hover:text-white hover:bg-white/8 transition-all [&.active]:text-accent [&.active]:bg-white/12 [&.active]:border-l-4 [&.active]:border-accent" onclick="switchSection('manageGallery', this)">
          <span>🖼️</span> Kelola Galeri Foto
        </a>

        <a href="index.blade.php" class="flex items-center gap-3 px-5 py-3 rounded-xl text-sm font-medium text-danger hover:bg-danger/8 transition-all mt-8">
          <span>🚪</span> Keluar Portal
        </a>
      </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="p-6 md:p-10 overflow-y-auto w-full">
      <!-- HEADER -->
      <header class="flex justify-between items-center pb-5 border-b border-slate-200 mb-8 flex-wrap gap-4">
        <div class="flex items-center gap-3.5">
          <button class="lg:hidden inline-flex items-center justify-center p-2 rounded-lg text-primary hover:bg-slate-200 text-2xl bg-transparent border-none cursor-pointer outline-none" onclick="toggleAdminSidebar()">☰</button>
          <div>
            <h2 class="text-xl sm:text-2xl font-bold font-outfit text-slate-800">Sistem Informasi Admin</h2>
            <p class="text-xs text-slate-500">PPTQ Imam Syaukani — Pengelolaan Web Pusat</p>
          </div>
        </div>
        <div class="flex items-center gap-3.5">
          <span class="text-xs sm:text-sm font-medium text-slate-500">Super Admin</span>
          <div class="w-10 h-10 rounded-full bg-accent text-primary-dark font-extrabold flex items-center justify-center select-none text-sm">AA</div>
        </div>
      </header>

      <!-- SECTION: OVERVIEW -->
      <section class="admin-content-section active [&.active]:block hidden" id="dashboardOverview">
        <div class="bg-gradient-to-br from-primary to-primary-light text-white p-6 sm:p-8 rounded-3xl mb-8 border-none shadow-sm flex flex-col items-start">
          <h3 class="text-white text-xl sm:text-2xl font-bold font-outfit mb-2">Selamat Datang di Dashboard Admin</h3>
          <p class="text-white/85 text-xs sm:text-sm leading-relaxed max-w-2xl">
            Anda memiliki akses penuh untuk mengelola konten website, data pendaftar (PPDB), dan informasi pondok pesantren. Pilih menu di samping untuk mulai mengelola.
          </p>
        </div>

        <!-- STATS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
          <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-primary-accent text-primary flex items-center justify-center text-2xl select-none">👥</div>
            <div>
              <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">24</h3>
              <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1">Santri Aktif</p>
            </div>
          </div>
          <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-primary-accent text-primary flex items-center justify-center text-2xl select-none">🎓</div>
            <div>
              <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">22</h3>
              <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1">Total Alumni</p>
            </div>
          </div>
          <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-primary-accent text-primary flex items-center justify-center text-2xl select-none">🕌</div>
            <div>
              <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">11</h3>
              <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1">Pendidik / Ustadz</p>
            </div>
          </div>
          <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-primary-accent text-primary flex items-center justify-center text-2xl select-none">📩</div>
            <div>
              <h3 class="text-2xl font-extrabold font-outfit text-slate-900 leading-none">8</h3>
              <p class="text-[11px] sm:text-xs text-slate-400 font-semibold mt-1">Pendaftar PPDB</p>
            </div>
          </div>
        </div>
      </section>

      <!-- SECTION: KELOLA PROFILE PONDOK (SEJARAH) -->
      <section class="admin-content-section [&.active]:block hidden" id="manageProfile">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-2">Kelola Sejarah Pondok Pesantren</h3>
          <p class="text-xs text-slate-400 mb-6">Data ini akan tampil langsung di halaman Profil pengunjung website.</p>
          <form onsubmit="event.preventDefault(); alert('Perubahan Sejarah berhasil disimpan!');" class="space-y-5">
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Judul Sub-heading</label>
              <input type="text" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="Lor Etan Ngalor Ngidul" required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Sejarah / Latar Belakang Pendirian</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[150px] bg-white" required>Didirikan pada Juni 2019, PPTQ Imam Syaukani lahir dari latar belakang melihat banyaknya anak-anak yang ingin mendalami ilmu agama namun tidak memiliki tempat. Kami hadir untuk mengedukasi masyarakat tentang pentingnya ilmu agama dalam kehidupan sehari-hari serta meneruskan ajaran Rasulullah SAW.</textarea>
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Tujuan Utama Pendirian</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[100px] bg-white" required>Mencetak generasi yang beriman, berilmu, dan berakhlak mulia (ulama) yang mampu memahami dan mengamalkan ajaran Islam secara mendalam (tafaqquh fiddin), serta menyebarkannya kepada masyarakat luas.</textarea>
            </div>
            <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
              Simpan Perubahan
            </button>
          </form>
        </div>
      </section>

      <!-- SECTION: KELOLA PROFILE PONDOK (VISI MISI) -->
      <section class="admin-content-section [&.active]:block hidden" id="manageProfileVisi">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-6">Kelola Visi, Misi & Nilai Utama</h3>
          <form onsubmit="event.preventDefault(); alert('Perubahan Visi & Misi berhasil disimpan!');" class="space-y-5">
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Teks Visi Pondok</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[80px] bg-white" required>"Mencetak Generasi Qur'ani berakhlaq mulia, mandiri dan berwawasan luas."</textarea>
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Poin-poin Misi (Pisahkan dengan baris baru / Enter)</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[120px] bg-white" required>Mengadakan pendidikan berbasis Al-Qur'an.
Menyiapkan generasi masa depan yang berakhlaq mulia.
Mewujudkan pendidikan karakter melalui kebiasaan baik.</textarea>
            </div>
            <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
              Simpan Perubahan
            </button>
          </form>
        </div>
      </section>

      <!-- SECTION: KELOLA PROGRAM PENDIDIKAN -->
      <section class="admin-content-section [&.active]:block hidden" id="manageProgram">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-6">Kelola Program & Kurikulum Jenjang</h3>
          <form onsubmit="event.preventDefault(); alert('Program pendidikan berhasil diupdate!');" class="space-y-5">
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Poin Kurikulum Pendekatan Salaf</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[80px] bg-white" required>Fokus pada adab menuntut ilmu, pengkajian kitab kuning (Turast) bersanad, tahfidz mutqin, dan hifdzul matan (menghafal matan ilmu dasar).</textarea>
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Poin Kurikulum Pendekatan Modern</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[80px] bg-white" required>Pembelajaran pelajaran umum, wawasan global, administrasi yang rapi, serta metode pengajaran yang interaktif dan mudah dipahami santri.</textarea>
            </div>
            <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
              Simpan Perubahan
            </button>
          </form>
        </div>
      </section>

      <!-- SECTION: KELOLA BERITA -->
      <section class="admin-content-section [&.active]:block hidden" id="manageNews">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <div class="flex justify-between items-center gap-3.5 mb-6 flex-wrap">
            <h3 class="text-lg font-bold font-outfit text-primary">Data Berita & Sorotan Kegiatan</h3>
            <button class="inline-flex items-center justify-center px-4 py-2 bg-primary text-white rounded-full text-xs font-semibold hover:bg-primary-dark transition-all" onclick="alert('Form Berita Baru Dibuka!');">+ Tambah Berita Baru</button>
          </div>
          <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
            <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
              <thead>
                <tr class="bg-primary text-white">
                  <th class="w-16 p-4 font-semibold text-xs uppercase tracking-wider">No</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Judul Berita</th>
                  <th class="w-40 p-4 font-semibold text-xs uppercase tracking-wider">Kategori</th>
                  <th class="w-32 p-4 font-semibold text-xs uppercase tracking-wider">Tgl Publish</th>
                  <th class="w-32 p-4 font-semibold text-xs uppercase tracking-wider">Status</th>
                  <th class="w-40 p-4 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100">
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4">1</td>
                  <td class="p-4 whitespace-normal min-w-[220px] font-semibold text-slate-800">Alhamdulillah, 50 Santri Lulus Ujian Hafalan 30 Juz Tahun Ini</td>
                  <td class="p-4 text-slate-600">Kegiatan Santri</td>
                  <td class="p-4 text-slate-600">01 Jan 2026</td>
                  <td class="p-4"><span class="text-success font-bold">Aktif</span></td>
                  <td class="p-4 space-x-2">
                    <button class="inline-flex items-center justify-center px-3 py-1 border border-primary text-primary rounded-lg text-xs font-semibold hover:bg-primary hover:text-white transition-all" onclick="alert('Edit clicked!')">Edit</button>
                    <button class="text-danger hover:underline text-xs font-semibold" onclick="alert('Delete clicked!')">Hapus</button>
                  </td>
                </tr>
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4">2</td>
                  <td class="p-4 whitespace-normal min-w-[220px] font-semibold text-slate-800">Juara 1 Lomba Pidato Bahasa Arab Tingkat Nasional</td>
                  <td class="p-4 text-slate-600">Prestasi</td>
                  <td class="p-4 text-slate-600">01 Jan 2026</td>
                  <td class="p-4"><span class="text-success font-bold">Aktif</span></td>
                  <td class="p-4 space-x-2">
                    <button class="inline-flex items-center justify-center px-3 py-1 border border-primary text-primary rounded-lg text-xs font-semibold hover:bg-primary hover:text-white transition-all" onclick="alert('Edit clicked!')">Edit</button>
                    <button class="text-danger hover:underline text-xs font-semibold" onclick="alert('Delete clicked!')">Hapus</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- SECTION: KELOLA JADWAL -->
      <section class="admin-content-section [&.active]:block hidden" id="manageSchedule">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-6">Jadwal Harian Santri</h3>
          <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
            <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
              <thead>
                <tr class="bg-primary text-white">
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Waktu</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Nama Kegiatan</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Tujuan</th>
                  <th class="w-32 p-4 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100">
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4 font-semibold text-slate-700">Ba’da Subuh - 06:00</td>
                  <td class="p-4 font-semibold text-primary">Setoran Hafalan Al-Qur’an</td>
                  <td class="p-4 whitespace-normal min-w-[220px] text-slate-600">Setoran hafalan baru (Ziyadah/Muraja'ah).</td>
                  <td class="p-4">
                    <button class="inline-flex items-center justify-center px-3 py-1 border border-primary text-primary rounded-lg text-xs font-semibold hover:bg-primary hover:text-white transition-all" onclick="alert('Edit clicked!')">Edit</button>
                  </td>
                </tr>
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4 font-semibold text-slate-700">08:00 - Dzuhur</td>
                  <td class="p-4 font-semibold text-primary">Kajian Kitab Turast & Umum</td>
                  <td class="p-4 whitespace-normal min-w-[220px] text-slate-600">Belajar Kitab Turast dan Pelajaran Umum di kelas.</td>
                  <td class="p-4">
                    <button class="inline-flex items-center justify-center px-3 py-1 border border-primary text-primary rounded-lg text-xs font-semibold hover:bg-primary hover:text-white transition-all" onclick="alert('Edit clicked!')">Edit</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- SECTION: KELOLA DONASI -->
      <section class="admin-content-section [&.active]:block hidden" id="manageDonation">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-6">Kelola Rekening & QRIS Donasi</h3>
          <form onsubmit="event.preventDefault(); alert('Pengaturan Donasi disimpan!');" class="space-y-5">
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Nomor Rekening Bank BSI</label>
              <input type="text" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="99 999999 99999-99" required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Nama Pemilik Rekening *</label>
              <input type="text" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="Mr. Adi rohadi Dadi Dadi" required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">NMID QRIS</label>
              <input type="text" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="ID1029384756102" required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Upload Gambar Qris baru</label>
              <input type="file" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" accept="image/*" />
            </div>
            <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
              Simpan Perubahan
            </button>
          </form>
        </div>
      </section>

      <!-- SECTION: KELOLA LOKASI & CONTACT -->
      <section class="admin-content-section [&.active]:block hidden" id="manageContact">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-6">Kelola Hubungi Kami & Peta Lokasi</h3>
          <form onsubmit="event.preventDefault(); alert('Informasi lokasi pondok berhasil disimpan!');" class="space-y-5">
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Alamat Lengkap Kantor</label>
              <textarea class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[80px] bg-white" required>Jl. Kramat Jati, RT 003 / RW 004, Desa Demangan, Kecamatan Sambi, Kabupaten Boyolali, Jawa Tengah 57376</textarea>
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Link Google Maps Embed (iframe src)</label>
              <input type="text" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="https://www.google.com/maps/embed?..." required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Nomor WhatsApp Humas</label>
              <input type="text" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="0888 8888 8888" required />
            </div>
            <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
              Simpan Perubahan
            </button>
          </form>
        </div>
      </section>

      <!-- SECTION: KELOLA PPDB -->
      <section class="admin-content-section [&.active]:block hidden" id="managePPDB">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <h3 class="text-lg font-bold font-outfit text-primary mb-6">Daftar Pendaftar Santri Baru (PPDB)</h3>
          <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
            <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
              <thead>
                <tr class="bg-primary text-white">
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">No</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Nama Calon Santri</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">NIK</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Jenis Kelamin</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Jenjang Dituju</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Wali Santri</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">No. WhatsApp</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100">
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4">1</td>
                  <td class="p-4 font-semibold text-slate-800">Ahmad Zaid</td>
                  <td class="p-4 text-slate-600">3315020911070001</td>
                  <td class="p-4 text-slate-600">Laki-laki</td>
                  <td class="p-4 text-slate-600">MA/SMA</td>
                  <td class="p-4 text-slate-600">Abu Ahmad</td>
                  <td class="p-4 text-slate-600">081234567890</td>
                  <td class="p-4 space-x-2">
                    <button class="inline-flex items-center justify-center px-3 py-1 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-primary-dark transition-all" onclick="alert('Data disetujui!');">Terima</button>
                    <button class="text-danger hover:underline text-xs font-semibold" onclick="alert('Data ditolak!');">Tolak</button>
                  </td>
                </tr>
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4">2</td>
                  <td class="p-4 font-semibold text-slate-800">Muhammad Al-Fatih</td>
                  <td class="p-4 text-slate-600">3315020911070002</td>
                  <td class="p-4 text-slate-600">Laki-laki</td>
                  <td class="p-4 text-slate-600">MTs/SMP</td>
                  <td class="p-4 text-slate-600">Usman</td>
                  <td class="p-4 text-slate-600">081234567891</td>
                  <td class="p-4 space-x-2">
                    <button class="inline-flex items-center justify-center px-3 py-1 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-primary-dark transition-all" onclick="alert('Data disetujui!');">Terima</button>
                    <button class="text-danger hover:underline text-xs font-semibold" onclick="alert('Data ditolak!');">Tolak</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>

      <!-- SECTION: KELOLA GALERI -->
      <section class="admin-content-section [&.active]:block hidden" id="manageGallery">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
          <div class="flex justify-between items-center gap-3.5 mb-6 flex-wrap">
            <h3 class="text-lg font-bold font-outfit text-primary">Kelola Galeri Foto Pondok</h3>
            <button class="inline-flex items-center justify-center px-4 py-2 bg-primary text-white rounded-full text-xs font-semibold hover:bg-primary-dark transition-all" onclick="alert('Form Upload Foto Dibuka!');">+ Upload Gambar</button>
          </div>
          <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
            <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
              <thead>
                <tr class="bg-primary text-white">
                  <th class="w-16 p-4 font-semibold text-xs uppercase tracking-wider">No</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Preview</th>
                  <th class="p-4 font-semibold text-xs uppercase tracking-wider">Nama Kegiatan</th>
                  <th class="w-40 p-4 font-semibold text-xs uppercase tracking-wider">Kategori</th>
                  <th class="w-32 p-4 font-semibold text-xs uppercase tracking-wider">Waktu Upload</th>
                  <th class="w-32 p-4 font-semibold text-xs uppercase tracking-wider">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100">
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4">1</td>
                  <td class="p-4 text-2xl select-none">Masjid</td>
                  <td class="p-4 font-semibold text-slate-800">Masjid Baiatur Ridwan</td>
                  <td class="p-4 text-slate-600">Fasilitas</td>
                  <td class="p-4 text-slate-600">01 Jan 2026</td>
                  <td class="p-4">
                    <button class="text-danger hover:underline text-xs font-semibold" onclick="alert('Delete clicked!')">Hapus</button>
                  </td>
                </tr>
                <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
                  <td class="p-4">2</td>
                  <td class="p-4 text-2xl select-none">Buku</td>
                  <td class="p-4 font-semibold text-slate-800">Setoran Hafalan Al-Qur’an</td>
                  <td class="p-4 text-slate-600">Kegiatan Santri</td>
                  <td class="p-4 text-slate-600">01 Jan 2026</td>
                  <td class="p-4">
                    <button class="text-danger hover:underline text-xs font-semibold" onclick="alert('Delete clicked!')">Hapus</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </main>
  </div>

  <script>
    function toggleAdminSidebar() {
      const sidebar = document.querySelector('.sidebar-admin');
      sidebar.classList.toggle('active');
    }

    function switchSection(sectionId, element) {
      // Hide all content sections
      document.querySelectorAll('.admin-content-section').forEach(sec => {
        sec.classList.remove('active');
        sec.classList.add('hidden');
      });

      // Show targeted content section
      const activeSec = document.getElementById(sectionId);
      if (activeSec) {
        activeSec.classList.remove('hidden');
        activeSec.classList.add('active');
      }

      // Remove active class from menu list links
      document.querySelectorAll('.sidebar-admin nav a').forEach(a => {
        a.classList.remove('active');
      });
      document.querySelectorAll('.sidebar-admin .pl-10 a').forEach(a => {
        a.classList.remove('active');
      });

      // Highlight active menu item
      if (element) {
        element.classList.add('active');
      }

      // Close drawer on mobile after selection
      const sidebar = document.querySelector('.sidebar-admin');
      if (sidebar.classList.contains('active')) {
        sidebar.classList.remove('active');
      }
    }
  </script>
</body>
</html>
