@extends('frontend.layouts.app', ['activePage' => 'donation'])

@section('title', 'Donasi & Wakaf – PPTQ Imam Syaukani')
@section('meta_description', 'Salurkan donasi Anda untuk mendukung dakwah, pembangunan, dan operasional santri yatim/dhuafa di PPTQ Imam Syaukani.')

@section('content')
  <!-- PAGE HEADER -->
  <div class="bg-gradient-to-br from-primary-dark to-primary py-16 text-center text-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-outfit text-white mb-2.5">
        Donasi & Wakaf
      </h1>
      <p class="text-white/85 text-sm sm:text-base">
        Salurkan donasi Anda untuk mendukung dakwah, pembangunan, dan operasional santri yatim/dhuafa di PPTQ Imam Syaukani.
      </p>
      <div class="flex items-center justify-center gap-2 mt-4.5 text-xs sm:text-sm">
        <a href="{{ route('home') }}" class="text-white/70 hover:text-accent transition-colors">Home</a>
        <span class="text-white/40">›</span>
        <span class="text-white font-medium">Donasi</span>
      </div>
    </div>
  </div>

  @php
    $waNum = $kontak && $kontak->whatsapp ? str_replace([' ', '-', '+'], '', $kontak->whatsapp) : '6288888888888';
  @endphp

  <!-- DONASI CONTENT -->
  <section class="py-16 sm:py-20 bg-slate-50" x-data="{
    openModal: false,
    step: 1,
    copiedRekening: false,
    form: {
      nama: '',
      institusi: '',
      tanggal: new Date().toISOString().split('T')[0],
      keterangan: '',
      metode: 'bank',
      nominal: '100.000',
      buktiPreview: null,
      buktiName: ''
    },
    errors: {
      nama: '',
      keterangan: '',
      nominal: ''
    },
    setNominal(val) {
      this.form.nominal = new Intl.NumberFormat('id-ID').format(val);
      this.errors.nominal = '';
    },
    formatNominalInput(event) {
      let raw = event.target.value.replace(/[^0-9]/g, '');
      if (raw) {
        this.form.nominal = new Intl.NumberFormat('id-ID').format(parseInt(raw, 10));
        this.errors.nominal = '';
      } else {
        this.form.nominal = '';
      }
    },
    handleFileUpload(event) {
      const file = event.target.files[0];
      if (file) {
        this.form.buktiName = file.name;
        if (file.type.startsWith('image/')) {
          const reader = new FileReader();
          reader.onload = (e) => {
            this.form.buktiPreview = e.target.result;
          };
          reader.readAsDataURL(file);
        } else {
          this.form.buktiPreview = null;
        }
      }
    },
    removeFile() {
      this.form.buktiPreview = null;
      this.form.buktiName = '';
      if (this.$refs.fileInput) {
        this.$refs.fileInput.value = '';
      }
    },
    validateStep1() {
      this.errors.nama = this.form.nama.trim() ? '' : 'Nama donatur wajib diisi.';
      this.errors.keterangan = this.form.keterangan.trim() ? '' : 'Keterangan donasi wajib diisi.';
      if (!this.errors.nama && !this.errors.keterangan) {
        this.step = 2;
      }
    },
    resetForm() {
      this.openModal = false;
      this.step = 1;
      this.form.nama = '';
      this.form.institusi = '';
      this.form.keterangan = '';
      this.form.nominal = '100.000';
      this.form.buktiPreview = null;
      this.form.buktiName = '';
      this.errors.nama = '';
      this.errors.keterangan = '';
      this.errors.nominal = '';
    },
    getFormattedWhatsAppUrl() {
      let msg = 'Assalamu\'alaikum Panitia Donasi PPTQ Imam Syaukani,\n\n' +
                'Saya ingin konfirmasi penyaluran donasi:\n' +
                '• *Nama:* ' + (this.form.nama || '-') + '\n' +
                (this.form.institusi ? ('• *Institusi:* ' + this.form.institusi + '\n') : '') +
                '• *Tanggal:* ' + this.form.tanggal + '\n' +
                '• *Keterangan:* ' + this.form.keterangan + '\n' +
                '• *Nominal:* Rp ' + (this.form.nominal || '0') + '\n' +
                '• *Metode:* ' + (this.form.metode === 'bank' ? 'Transfer Bank BSI (7174567890)' : 'QRIS Pembayaran') + '\n\n' +
                (this.form.buktiName ? ('• *Bukti Pembayaran:* ' + this.form.buktiName + ' (terlampir)\n\n') : '') +
                'Berikut saya kirimkan konfirmasi beserta bukti transfer. Jazaakumullahu khairan katsiran.';
      return 'https://wa.me/{{ $waNum }}?text=' + encodeURIComponent(msg);
    }
  }">
    <div class="max-w-[1200px] mx-auto px-6">

      <!-- INTRO / QUOTE BANNER -->
      <div class="relative overflow-hidden bg-[#0B3322] border border-emerald-900/50 rounded-3xl p-8 sm:p-10 text-white shadow-xl shadow-emerald-950/10 mb-16">
        <!-- Subtle glow effects -->
        <div class="absolute -right-12 -top-12 w-64 h-64 bg-emerald-600/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-12 -bottom-12 w-64 h-64 bg-accent/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-3xl">
          <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full bg-white/10 text-accent text-xs font-bold uppercase tracking-wider mb-4 border border-white/10">
            ✨ Keutamaan Berbagi
          </span>
          <p class="text-base sm:text-lg md:text-xl font-medium leading-relaxed mb-4 text-emerald-50">
            "Perumpamaan orang yang menginfakkan hartanya di jalan Allah seperti sebutir biji yang menumbuhkan tujuh tangkai, pada setiap tangkai ada seratus biji. Allah melipatgandakan bagi siapa yang Dia kehendaki."
          </p>
          <div class="inline-flex items-center gap-2 text-xs sm:text-sm text-accent font-semibold mb-6">
            <span>— QS. Al-Baqarah: 261</span>
          </div>

          <!-- TOMBOL AKSI DI DALAM BANNER -->
          <div class="flex flex-wrap items-center gap-4 pt-2">
            <button 
              @click="openModal = true; step = 1" 
              type="button" 
              class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-accent text-slate-900 font-bold text-sm shadow-lg shadow-accent/25 hover:bg-accent-dark hover:scale-[1.02] active:scale-95 transition-all duration-200 cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              Salurkan Donasi Sekarang
            </button>
            <a href="https://wa.me/{{ $waNum }}?text=Assalamu%27alaikum%20Panitia%20Donasi%20PPTQ%20Imam%20Syaukani%2C%20saya%20ingin%20berkonsultasi%20tentang%20donasi..." target="_blank" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-white/15 text-white font-semibold text-sm hover:bg-white/25 border border-white/20 transition-all duration-200 backdrop-blur-sm">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
              </svg>
              Konsultasi via WhatsApp
            </a>
          </div>
        </div>
      </div>

      <!-- SECTION 1: DONASI UNTUK APA? -->
      <div class="mb-20">
        <div class="text-center max-w-2xl mx-auto mb-12">
          <span class="inline-block bg-primary-accent text-primary text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-3">
            Penyaluran Dana
          </span>
          <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold font-outfit text-slate-800">
            Donasi Anda Digunakan Untuk Apa?
          </h2>
          <p class="text-slate-600 text-sm sm:text-base mt-2.5">
            Setiap rupiah yang Anda amanahkan dikelola secara produktif dan tepat sasaran untuk program-program utama berikut:
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Item 1 -->
          <div class="bg-white rounded-2xl p-6 sm:p-7 border border-slate-200/80 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1.5 group flex flex-col justify-between">
            <div>
              <div class="w-14 h-14 rounded-2xl bg-emerald-50 text-primary flex items-center justify-center text-2xl mb-5 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                🎓
              </div>
              <h3 class="text-lg font-bold font-outfit text-slate-800 mb-2.5 group-hover:text-primary transition-colors">
                Beasiswa Santri Yatim & Dhuafa
              </h3>
              <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                Menanggung 100% biaya pendidikan, seragam, kitab pembelajaran, dan sarana belajar santri berprestasi dari keluarga kurang mampu.
              </p>
            </div>
            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center gap-2 text-xs font-semibold text-primary">
              <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
              Pendidikan Gratis
            </div>
          </div>

          <!-- Item 2 -->
          <div class="bg-white rounded-2xl p-6 sm:p-7 border border-slate-200/80 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1.5 group flex flex-col justify-between">
            <div>
              <div class="w-14 h-14 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl mb-5 group-hover:bg-accent group-hover:text-slate-900 transition-colors duration-300">
                🍲
              </div>
              <h3 class="text-lg font-bold font-outfit text-slate-800 mb-2.5 group-hover:text-primary transition-colors">
                Kebutuhan Pangan & Nutrisi
              </h3>
              <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                Penyediaan konsumsi harian makanan halal, sehat, dan bergizi bagi seluruh santri penghafal Al-Qur'an selama di asrama.
              </p>
            </div>
            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center gap-2 text-xs font-semibold text-amber-600">
              <span class="w-2 h-2 rounded-full bg-amber-500"></span>
              Pangan Berkelanjutan
            </div>
          </div>

          <!-- Item 3 -->
          <div class="bg-white rounded-2xl p-6 sm:p-7 border border-slate-200/80 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1.5 group flex flex-col justify-between">
            <div>
              <div class="w-14 h-14 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center text-2xl mb-5 group-hover:bg-teal-600 group-hover:text-white transition-colors duration-300">
                🕌
              </div>
              <h3 class="text-lg font-bold font-outfit text-slate-800 mb-2.5 group-hover:text-primary transition-colors">
                Pembangunan & Fasilitas
              </h3>
              <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                Pembangunan ruang kelas, asrama santri, sarana ibadah/masjid, sanitasi, serta perbaikan sarana prasarana pondok.
              </p>
            </div>
            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center gap-2 text-xs font-semibold text-teal-600">
              <span class="w-2 h-2 rounded-full bg-teal-500"></span>
              Wakaf Produktif
            </div>
          </div>

          <!-- Item 4 -->
          <div class="bg-white rounded-2xl p-6 sm:p-7 border border-slate-200/80 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1.5 group flex flex-col justify-between">
            <div>
              <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl mb-5 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                📖
              </div>
              <h3 class="text-lg font-bold font-outfit text-slate-800 mb-2.5 group-hover:text-primary transition-colors">
                Kafalah Guru & Operasional
              </h3>
              <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                Dukungan kafalah (tunjangan) para Asatidz/Ustadzah pembimbing tahfidz serta kelancaran operasional dakwah pesantren.
              </p>
            </div>
            <div class="mt-5 pt-4 border-t border-slate-100 flex items-center gap-2 text-xs font-semibold text-blue-600">
              <span class="w-2 h-2 rounded-full bg-blue-500"></span>
              Kesejahteraan Guru
            </div>
          </div>
        </div>
      </div>

      <!-- SECTION 2: TUJUAN DONASI -->
      <div class="mb-20">
        <div class="text-center max-w-2xl mx-auto mb-12">
          <span class="inline-block bg-primary-accent text-primary text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-3">
            Visi & Dampak
          </span>
          <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold font-outfit text-slate-800">
            Tujuan Donasi & Wakaf
          </h2>
          <p class="text-slate-600 text-sm sm:text-base mt-2.5">
            Dukungan Anda bukan sekadar bantuan materi, tetapi investasi peradaban untuk kebaikan umat.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Card Tujuan 1 -->
          <div class="bg-white rounded-3xl p-8 border border-slate-200/80 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-all duration-300">
            <div class="absolute top-0 right-0 w-28 h-28 bg-emerald-500/5 rounded-full blur-xl group-hover:bg-emerald-500/10 transition-colors"></div>
            <div class="w-12 h-12 rounded-xl bg-primary text-white flex items-center justify-center font-bold text-lg font-outfit mb-6 shadow-md shadow-primary/20">
              01
            </div>
            <h3 class="text-xl font-bold font-outfit text-slate-800 mb-3 group-hover:text-primary transition-colors">
              Mencetak Generasi Penghafal Al-Qur'an
            </h3>
            <p class="text-slate-600 text-sm leading-relaxed">
              Melahirkan santri yang hafal 30 Juz Al-Qur'an dengan pemahaman akidah yang lurus, berakhlak mulia, dan berwawasan keilmuan yang luas untuk masa depan umat.
            </p>
          </div>

          <!-- Card Tujuan 2 -->
          <div class="bg-white rounded-3xl p-8 border border-slate-200/80 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-all duration-300">
            <div class="absolute top-0 right-0 w-28 h-28 bg-amber-500/5 rounded-full blur-xl group-hover:bg-amber-500/10 transition-colors"></div>
            <div class="w-12 h-12 rounded-xl bg-accent text-slate-900 flex items-center justify-center font-bold text-lg font-outfit mb-6 shadow-md shadow-accent/20">
              02
            </div>
            <h3 class="text-xl font-bold font-outfit text-slate-800 mb-3 group-hover:text-primary transition-colors">
              Pemerataan Pendidikan Berkualitas
            </h3>
            <p class="text-slate-600 text-sm leading-relaxed">
              Memastikan tidak ada anak yatim atau dhuafa yang putus sekolah karena kendala biaya, memberikan hak yang setara untuk meraih cita-cita tertinggi.
            </p>
          </div>

          <!-- Card Tujuan 3 -->
          <div class="bg-white rounded-3xl p-8 border border-slate-200/80 shadow-sm relative overflow-hidden group hover:border-primary/40 transition-all duration-300">
            <div class="absolute top-0 right-0 w-28 h-28 bg-teal-500/5 rounded-full blur-xl group-hover:bg-teal-500/10 transition-colors"></div>
            <div class="w-12 h-12 rounded-xl bg-primary-light text-white flex items-center justify-center font-bold text-lg font-outfit mb-6 shadow-md shadow-primary-light/20">
              03
            </div>
            <h3 class="text-xl font-bold font-outfit text-slate-800 mb-3 group-hover:text-primary transition-colors">
              Menjadi Ladang Amal Jariyah
            </h3>
            <p class="text-slate-600 text-sm leading-relaxed">
              Menjadi jembatan bagi para muhsinin untuk memperoleh aliran pahala yang tidak pernah terputus dari setiap lantunan ayat suci dan ilmu yang diamalkan santri.
            </p>
          </div>
        </div>
      </div>



    </div>

    <!-- MODAL POPUP SALURKAN DONASI -->
    <div 
      x-show="openModal" 
      x-cloak
      class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 sm:p-6"
      aria-labelledby="modal-title" 
      role="dialog" 
      aria-modal="true">
      
      <!-- BACKDROP BLUR -->
      <div 
        x-show="openModal"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="if(step !== 3) resetForm()"
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity"></div>

      <!-- MODAL BOX -->
      <div 
        x-show="openModal"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="relative w-full max-w-xl bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden z-10 max-h-[90vh] flex flex-col">
        
        <!-- MODAL HEADER -->
        <div class="bg-gradient-to-r from-primary-dark to-primary px-6 sm:px-8 py-5 text-white flex items-center justify-between shrink-0">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-accent text-lg font-bold">
              <span x-text="step"></span>
            </div>
            <div>
              <h3 class="font-outfit font-bold text-lg text-white" id="modal-title">
                <span x-show="step === 1">Formulir Niat Donasi</span>
                <span x-show="step === 2">Rekening Tujuan & Nominal</span>
                <span x-show="step === 3">Unggah Bukti & Konfirmasi</span>
              </h3>
              <p class="text-xs text-emerald-100/80">
                <span x-show="step === 1">Langkah 1 dari 3: Isi data donatur</span>
                <span x-show="step === 2">Langkah 2 dari 3: Transfer & tentukan nominal</span>
                <span x-show="step === 3">Langkah 3 dari 3: Lampirkan bukti transfer</span>
              </p>
            </div>
          </div>
          <!-- Close Button (Disembunyikan di Langkah 3) -->
          <button 
            x-show="step !== 3"
            @click="resetForm()" 
            type="button" 
            class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- FORM WRAPPER UNTUK MENYIMPAN KE DATABASE -->
        <form action="{{ route('donasi.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col flex-1 overflow-hidden">
          @csrf

          <!-- MODAL BODY: STEP 1 (DATA DONATUR) -->
          <div x-show="step === 1" class="p-6 sm:p-8 overflow-y-auto">
            <div class="space-y-4.5">
              
              <!-- 1. Nama -->
              <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                  Nama Lengkap / Hamba Allah <span class="text-rose-500">*</span>
                </label>
                <input 
                  type="text" 
                  name="nama_donatur"
                  x-model="form.nama"
                  placeholder="Contoh: Fulan / Hamba Allah"
                  class="w-full px-4 py-3 rounded-xl border text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all placeholder:text-slate-400"
                  :class="errors.nama ? 'border-rose-400 bg-rose-50/30' : 'border-slate-200 bg-slate-50/50'"
                  required />
                <p x-show="errors.nama" x-text="errors.nama" class="text-rose-500 text-xs mt-1"></p>
              </div>

              <!-- 2. Institusi (Opsional) -->
              <div>
                <div class="flex items-center justify-between mb-1.5">
                  <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                    Institusi / Lembaga / Perusahaan
                  </label>
                  <span class="text-[11px] text-slate-400 font-medium">(Opsional)</span>
                </div>
                <input 
                  type="text" 
                  name="institusi"
                  x-model="form.institusi"
                  placeholder="Contoh: PT Berkah Mulia / Komunitas Peduli"
                  class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/50 text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all placeholder:text-slate-400" />
              </div>

              <!-- 3. Tanggal (Auto) -->
              <div>
                <div class="flex items-center justify-between mb-1.5">
                  <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                    Tanggal Donasi
                  </label>
                  <span class="text-[11px] text-emerald-600 font-semibold bg-emerald-50 px-2 py-0.5 rounded-md">Otomatis Hari Ini</span>
                </div>
                <input 
                  type="date" 
                  name="tanggal_donasi"
                  x-model="form.tanggal"
                  class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-100 text-slate-700 text-sm font-medium focus:ring-2 focus:ring-primary focus:border-primary transition-all" />
              </div>

              <!-- 4. Keterangan Donasi -->
              <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                  Keterangan / Peruntukan Donasi <span class="text-rose-500">*</span>
                </label>
                <textarea 
                  rows="3"
                  name="keterangan"
                  x-model="form.keterangan"
                  placeholder="Contoh: Infaq beras santri / Sedekah pembangunan asrama / Beasiswa dhuafa"
                  class="w-full px-4 py-3 rounded-xl border text-sm focus:ring-2 focus:ring-primary focus:border-primary transition-all placeholder:text-slate-400"
                  :class="errors.keterangan ? 'border-rose-400 bg-rose-50/30' : 'border-slate-200 bg-slate-50/50'"
                  required></textarea>
                <p x-show="errors.keterangan" x-text="errors.keterangan" class="text-rose-500 text-xs mt-1"></p>
              </div>

              <!-- ACTION BUTTON: NEXT -->
              <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100">
                <button 
                  type="button" 
                  @click="resetForm()"
                  class="px-5 py-2.5 rounded-xl text-slate-600 font-semibold text-xs hover:bg-slate-100 transition-colors cursor-pointer">
                  Batal
                </button>
                <button 
                  type="button"
                  @click="validateStep1()"
                  class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-primary text-white font-bold text-xs hover:bg-primary-dark transition-all duration-200 shadow-md shadow-primary/20 active:scale-95 cursor-pointer">
                  <span>Selanjutnya (Next)</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
                </button>
              </div>

            </div>
          </div>

          <!-- MODAL BODY: STEP 2 (REKENING & NOMINAL) -->
          <div x-show="step === 2" class="p-6 sm:p-8 overflow-y-auto space-y-5" x-cloak>
            
            <!-- Hidden input metode pembayaran -->
            <input type="hidden" name="metode_pembayaran" :value="form.metode === 'bank' ? 'Transfer Bank BSI (7174567890)' : 'QRIS Pembayaran'">

            <!-- 1. NOMOR REKENING / METODE TRANSFER -->
            <div>
              <div class="flex items-center justify-between mb-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                  1. Saluran Transfer Tujuan
                </label>
                <div class="flex gap-1.5 bg-slate-100 p-1 rounded-xl text-xs">
                  <button 
                    type="button" 
                    @click="form.metode = 'bank'"
                    class="px-3 py-1 rounded-lg font-bold transition-all cursor-pointer"
                    :class="form.metode === 'bank' ? 'bg-white text-primary shadow-sm' : 'text-slate-500 hover:text-slate-800'">
                    🏦 Bank BSI
                  </button>
                  <button 
                    type="button" 
                    @click="form.metode = 'qris'"
                    class="px-3 py-1 rounded-lg font-bold transition-all cursor-pointer"
                    :class="form.metode === 'qris' ? 'bg-white text-primary shadow-sm' : 'text-slate-500 hover:text-slate-800'">
                    📱 QRIS
                  </button>
                </div>
              </div>

              <!-- Box Rekening BSI -->
              <div x-show="form.metode === 'bank'" class="p-4 bg-emerald-50/70 border border-emerald-200/80 rounded-2xl">
                <div class="flex items-center justify-between gap-2 mb-1.5">
                  <span class="text-[11px] font-bold text-slate-600 uppercase tracking-wide">Bank Syariah Indonesia (BSI)</span>
                  <span class="text-[10px] font-bold text-emerald-700 bg-emerald-100/80 px-2 py-0.5 rounded">Kode Bank: 451</span>
                </div>
                <div class="flex items-center justify-between gap-3 bg-white p-3 rounded-xl border border-emerald-200/80 mb-2">
                  <span class="font-outfit text-xl font-extrabold text-primary tracking-wide">
                    7174567890
                  </span>
                  <button 
                    @click="navigator.clipboard.writeText('7174567890'); copiedRekening = true; setTimeout(() => copiedRekening = false, 2500)"
                    type="button"
                    class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all shadow-sm cursor-pointer"
                    :class="copiedRekening ? 'bg-emerald-600 text-white' : 'bg-primary text-white hover:bg-primary-dark active:scale-95'">
                    <span x-text="copiedRekening ? '✓ Tersalin!' : 'Salin'"></span>
                  </button>
                </div>
                <p class="text-xs text-slate-600">Atas Nama: <strong class="text-slate-800">PPTQ Imam Syaukani</strong></p>
              </div>

              <!-- Box QRIS -->
              <div x-show="form.metode === 'qris'" class="p-4 bg-slate-50 border border-slate-200 rounded-2xl text-center flex flex-col items-center">
                @if($qris && $qris->gambar_qris)
                  <img src="{{ asset('storage/' . $qris->gambar_qris) }}" alt="QRIS" class="w-36 h-36 object-contain rounded-lg border border-slate-200 bg-white p-1.5 mb-2 shadow-sm" />
                @else
                  <div class="w-36 h-36 bg-white rounded-lg border border-slate-200 p-2 flex items-center justify-center mb-2">
                    <div class="w-32 h-32 bg-[repeating-conic-gradient(from_45deg,#144D30_0%_25%,#fff_0%_50%)] rounded border"></div>
                  </div>
                @endif
                <p class="text-xs font-bold text-slate-800">@if($qris && $qris->nama_penerima) {{ $qris->nama_penerima }} @else PPTQ IMAM SYAUKANI @endif</p>
                <p class="text-[10px] text-slate-500">Mendukung GoPay, OVO, DANA, BCA, Mandiri, dll.</p>
              </div>
            </div>

            <!-- 2. INPUT NOMINAL DONASI -->
            <div>
              <label class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
                2. Nominal Donasi yang Ditransfer <span class="text-rose-500">*</span>
              </label>
              
              <!-- Preset Nominal Buttons -->
              <div class="grid grid-cols-3 sm:grid-cols-5 gap-2 mb-2.5">
                <button 
                  type="button" 
                  @click="setNominal(50000)"
                  class="py-1.5 px-2 rounded-xl text-xs font-bold border transition-all cursor-pointer text-center"
                  :class="form.nominal === '50.000' ? 'bg-primary text-white border-primary shadow-sm' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'">
                  50 Rb
                </button>
                <button 
                  type="button" 
                  @click="setNominal(100000)"
                  class="py-1.5 px-2 rounded-xl text-xs font-bold border transition-all cursor-pointer text-center"
                  :class="form.nominal === '100.000' ? 'bg-primary text-white border-primary shadow-sm' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'">
                  100 Rb
                </button>
                <button 
                  type="button" 
                  @click="setNominal(250000)"
                  class="py-1.5 px-2 rounded-xl text-xs font-bold border transition-all cursor-pointer text-center"
                  :class="form.nominal === '250.000' ? 'bg-primary text-white border-primary shadow-sm' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'">
                  250 Rb
                </button>
                <button 
                  type="button" 
                  @click="setNominal(500000)"
                  class="py-1.5 px-2 rounded-xl text-xs font-bold border transition-all cursor-pointer text-center"
                  :class="form.nominal === '500.000' ? 'bg-primary text-white border-primary shadow-sm' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'">
                  500 Rb
                </button>
                <button 
                  type="button" 
                  @click="setNominal(1000000)"
                  class="py-1.5 px-2 rounded-xl text-xs font-bold border transition-all cursor-pointer text-center col-span-3 sm:col-span-1"
                  :class="form.nominal === '1.000.000' ? 'bg-primary text-white border-primary shadow-sm' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'">
                  1 Juta
                </button>
              </div>

              <!-- Input Custom Nominal -->
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 font-bold text-sm">
                  Rp
                </div>
                <input 
                  type="text" 
                  name="nominal"
                  x-model="form.nominal"
                  @input="formatNominalInput($event)"
                  placeholder="Masukkan nominal transfer..."
                  class="w-full pl-12 pr-4 py-3 rounded-xl border text-slate-800 text-sm font-bold focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                  :class="errors.nominal ? 'border-rose-400 bg-rose-50/30' : 'border-slate-200 bg-slate-50/50'"
                  required />
              </div>
              <p x-show="errors.nominal" x-text="errors.nominal" class="text-rose-500 text-xs mt-1"></p>
            </div>

            <!-- STEP 2 ACTIONS: KEMBALI & NEXT KE STEP 3 -->
            <div class="flex items-center justify-between gap-3 pt-3 border-t border-slate-100">
              <button 
                type="button" 
                @click="step = 1"
                class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-slate-600 font-semibold text-xs hover:bg-slate-100 transition-colors cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
              </button>
              <button 
                type="button" 
                @click="if (form.nominal.trim()) { step = 3; errors.nominal = ''; } else { errors.nominal = 'Nominal donasi wajib diisi.'; }"
                class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-primary text-white font-bold text-xs hover:bg-primary-dark transition-all duration-200 shadow-md shadow-primary/20 active:scale-95 cursor-pointer">
                <span>Lanjut Upload Bukti (Next)</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </button>
            </div>

          </div>

          <!-- MODAL BODY: STEP 3 (UPLOAD BUKTI & KONFIRMASI KE DATABASE) -->
          <div x-show="step === 3" class="p-6 sm:p-8 overflow-y-auto space-y-5" x-cloak>
            
            <!-- Summary Box (Tanpa tombol edit) -->
            <div class="bg-emerald-50/80 border border-emerald-200/80 rounded-2xl p-4.5 text-xs text-slate-700 space-y-1.5">
              <div class="flex justify-between items-center text-slate-500 font-medium pb-2 border-b border-emerald-200/60">
                <span class="font-bold text-slate-700 flex items-center gap-1.5">
                  <span>📋</span> Ringkasan Donasi Anda:
                </span>
                <span class="text-[11px] font-semibold text-emerald-700 bg-emerald-100/80 px-2 py-0.5 rounded-md">
                  Siap Dikirim
                </span>
              </div>
              <div class="grid grid-cols-3 gap-1 pt-1">
                <span class="text-slate-500">Donatur:</span>
                <span class="col-span-2 font-bold text-slate-800" x-text="form.nama"></span>
              </div>
              <template x-if="form.institusi">
                <div class="grid grid-cols-3 gap-1">
                  <span class="text-slate-500">Institusi:</span>
                  <span class="col-span-2 font-semibold text-slate-800" x-text="form.institusi"></span>
                </div>
              </template>
              <div class="grid grid-cols-3 gap-1">
                <span class="text-slate-500">Nominal:</span>
                <span class="col-span-2 font-extrabold text-primary text-sm">Rp <span x-text="form.nominal"></span></span>
              </div>
              <div class="grid grid-cols-3 gap-1">
                <span class="text-slate-500">Peruntukan:</span>
                <span class="col-span-2 font-semibold text-slate-800" x-text="form.keterangan"></span>
              </div>
              <div class="grid grid-cols-3 gap-1">
                <span class="text-slate-500">Metode:</span>
                <span class="col-span-2 font-semibold text-slate-800" x-text="form.metode === 'bank' ? 'Transfer Bank BSI (7174567890)' : 'QRIS Pembayaran'"></span>
              </div>
            </div>

            <!-- UPLOAD BUKTI PEMBAYARAN (WAJIB) -->
            <div>
              <div class="flex items-center justify-between mb-1.5">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                  Unggah Bukti Pembayaran / Struk Transfer <span class="text-rose-500">*</span>
                </label>
                <span class="text-[11px] text-slate-400 font-medium">(Wajib Diisi)</span>
              </div>

              <input 
                type="file" 
                name="bukti_pembayaran"
                x-ref="fileInput"
                @change="handleFileUpload($event)"
                accept="image/*,.pdf" 
                class="hidden" 
                required />

              <!-- Area Upload (Belum ada file) -->
              <div 
                x-show="!form.buktiName"
                @click="$refs.fileInput.click()"
                class="border-2 border-dashed border-emerald-300/80 hover:border-primary bg-emerald-50/30 hover:bg-emerald-50/60 rounded-2xl p-6 text-center cursor-pointer transition-all duration-200 group">
                <div class="w-12 h-12 mx-auto rounded-2xl bg-emerald-100 text-primary flex items-center justify-center mb-2.5 transition-colors group-hover:scale-105">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </div>
                <p class="text-xs font-bold text-slate-700 group-hover:text-primary transition-colors">
                  Klik untuk memilih foto / screenshot struk bukti transfer
                </p>
                <p class="text-[11px] text-slate-500 mt-1">Format JPG, PNG, atau PDF (Maks. 5 MB)</p>
              </div>

              <!-- Preview File Terpilih -->
              <div 
                x-show="form.buktiName" 
                class="flex items-center justify-between p-4 bg-emerald-50 border border-emerald-300 rounded-2xl shadow-sm">
                <div class="flex items-center gap-3 overflow-hidden">
                  <template x-if="form.buktiPreview">
                    <img :src="form.buktiPreview" class="w-14 h-14 object-cover rounded-xl border border-emerald-300 shadow-sm shrink-0" alt="Preview Bukti" />
                  </template>
                  <template x-if="!form.buktiPreview">
                    <div class="w-14 h-14 bg-emerald-200 text-emerald-800 rounded-xl flex items-center justify-center font-bold text-xs shrink-0">
                      PDF
                    </div>
                  </template>
                  <div class="overflow-hidden">
                    <p class="text-xs font-bold text-slate-800 truncate" x-text="form.buktiName"></p>
                    <span class="text-[11px] text-emerald-700 font-bold flex items-center gap-1 mt-0.5">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                      </svg>
                      Bukti berhasil diunggah!
                    </span>
                  </div>
                </div>
                <button 
                  type="button" 
                  @click="removeFile()"
                  class="p-2 text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-xl transition-all cursor-pointer shrink-0"
                  title="Ganti / Hapus file">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </svg>
                </button>
              </div>
            </div>

            <!-- STEP 3 ACTIONS: TOMBOL SUBMIT KE DATABASE -->
            <div class="pt-3 border-t border-slate-100 flex flex-col items-center gap-2">
              <!-- Pesan Informasi Jika Belum Upload -->
              <p x-show="!form.buktiName" class="text-[11px] text-amber-600 bg-amber-50 px-3.5 py-2 rounded-xl border border-amber-200/80 w-full text-center font-medium">
                ⚠️ Unggah foto / file bukti transfer terlebih dahulu untuk menyelesaikan donasi.
              </p>

              <!-- Tombol Kirim Form (Aktif jika bukti sudah ada) -->
              <template x-if="form.buktiName">
                <button 
                  type="submit"
                  class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-emerald-600 text-white font-bold text-sm hover:bg-emerald-700 transition-all duration-200 shadow-lg shadow-emerald-600/30 active:scale-95 cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span>Kirim & Simpan Donasi</span>
                </button>
              </template>

              <!-- Tombol Disabled Jika Belum Ada Bukti -->
              <template x-if="!form.buktiName">
                <button 
                  type="button" 
                  disabled
                  class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-slate-200 text-slate-400 font-bold text-sm cursor-not-allowed opacity-75">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                  </svg>
                  <span>Kirim Donasi (Terkunci)</span>
                </button>
              </template>
            </div>

          </div>

        </form>

      </div>

    </div>

  </section>
@endsection
