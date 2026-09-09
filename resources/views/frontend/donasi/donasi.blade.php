@extends('frontend.layouts.app', ['activePage' => 'donation'])

@section('title', 'Donasi & Wakaf – PPTQ Imam Syaukani')
@section('meta_description', 'Salurkan donasi Anda untuk mendukung dakwah, pembangunan, dan operasional santri yatim/dhuafa di PPTQ Imam Syaukani.')

@section('content')
  <!-- PAGE HEADER -->
  <div class="bg-gradient-to-br from-primary-dark to-primary py-14 sm:py-16 text-center text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px] pointer-events-none"></div>
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6 relative z-10">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-outfit text-white mb-2.5 tracking-tight">
        Donasi & Wakaf
      </h1>
      <p class="text-white/85 text-sm sm:text-base max-w-2xl mx-auto leading-relaxed">
        Salurkan donasi Anda untuk mendukung dakwah, pembangunan, dan operasional santri yatim/dhuafa di PPTQ Imam Syaukani.
      </p>
      <div class="flex items-center justify-center gap-2 mt-4 text-xs sm:text-sm">
        <a href="{{ route('home') }}" class="text-white/70 hover:text-accent transition-colors">Home</a>
        <span class="text-white/40">›</span>
        <span class="text-white font-medium">Donasi</span>
      </div>
    </div>
  </div>

  @php
    $rawWa = $kontak && $kontak->whatsapp ? $kontak->whatsapp : '6288888888888';
    $waNum = preg_replace('/[^0-9]/', '', $rawWa);
    if (str_starts_with($waNum, '0')) {
        $waNum = '62' . substr($waNum, 1);
    }
    $firstBank = $rekenings->first();
    $defaultBankName = $firstBank ? $firstBank->nama_bank : 'Bank Syariah Indonesia (BSI)';
    $defaultBankNo = $firstBank ? $firstBank->nomor_rekening : '7174567890';
    $defaultBankAn = $firstBank ? $firstBank->atas_nama : 'PPTQ Imam Syaukani';
    $defaultBankCode = $firstBank ? $firstBank->kode_bank : '451';
  @endphp

  <!-- DONASI CONTENT -->
  <section class="py-12 sm:py-16 md:py-20 bg-slate-50" x-data="{
    openModal: false,
    step: 1,
    copiedRekening: false,
    selectedBankIndex: 0,
    banks: [
      @foreach($rekenings as $idx => $rb)
      {
        id: {{ $rb->id_rekening }},
        nama: '{{ addslashes($rb->nama_bank) }}',
        nomor: '{{ addslashes($rb->nomor_rekening) }}',
        atas_nama: '{{ addslashes($rb->atas_nama) }}',
        kode: '{{ addslashes($rb->kode_bank ?? '') }}'
      }@if(!$loop->last),@endif
      @endforeach
    ],
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
    getActiveBank() {
      if (this.banks && this.banks.length > 0) {
        return this.banks[this.selectedBankIndex] || this.banks[0];
      }
      return {
        nama: '{{ $defaultBankName }}',
        nomor: '{{ $defaultBankNo }}',
        atas_nama: '{{ $defaultBankAn }}',
        kode: '{{ $defaultBankCode }}'
      };
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
    }
  }">
    <div class="max-w-[1200px] mx-auto px-4 sm:px-6">

      <!-- ALERT SUKSES SETELAH SUBMIT DONASI -->
      @if(session('success_donasi'))
        <div class="mb-10 bg-gradient-to-r from-emerald-600 to-primary text-white p-5 sm:p-6 rounded-3xl shadow-xl flex items-start sm:items-center gap-4">
          <div class="w-12 h-12 rounded-2xl bg-white/20 flex items-center justify-center shrink-0">
            <x-donasi-icon name="shield-check" class="w-7 h-7 text-accent" />
          </div>
          <div class="flex-1">
            <h4 class="font-outfit font-bold text-base sm:text-lg text-white">Konfirmasi Donasi Berhasil Diterima!</h4>
            <p class="text-xs sm:text-sm text-emerald-100 mt-0.5 leading-relaxed">{{ session('success_donasi') }}</p>
          </div>
        </div>
      @endif

      <!-- INTRO / QUOTE BANNER -->
      <div class="relative overflow-hidden bg-[#0B3322] border border-emerald-900/50 rounded-3xl p-6 sm:p-10 md:p-12 text-white shadow-xl shadow-emerald-950/10 mb-16">
        <!-- Subtle glow effects -->
        <div class="absolute -right-12 -top-12 w-64 h-64 bg-emerald-600/15 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -left-12 -bottom-12 w-64 h-64 bg-accent/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-3xl">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 text-accent text-xs font-bold uppercase tracking-wider mb-4 border border-white/10">
            <x-donasi-icon name="sparkles" class="w-4 h-4 text-accent" />
            <span>Keutamaan Berbagi</span>
          </div>
          <p class="text-sm sm:text-base md:text-lg lg:text-xl font-medium leading-relaxed mb-4 text-emerald-50 font-outfit">
            "Perumpamaan orang yang menginfakkan hartanya di jalan Allah seperti sebutir biji yang menumbuhkan tujuh tangkai, pada setiap tangkai ada seratus biji. Allah melipatgandakan bagi siapa yang Dia kehendaki."
          </p>
          <div class="inline-flex items-center gap-2 text-xs sm:text-sm text-accent font-semibold mb-6">
            <span>— QS. Al-Baqarah: 261</span>
          </div>

          <!-- TOMBOL AKSI DI DALAM BANNER -->
          <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5 pt-2">
            <button 
              @click="openModal = true; step = 1" 
              type="button" 
              class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-accent text-slate-900 font-bold text-sm shadow-lg shadow-accent/25 hover:bg-accent-dark hover:scale-[1.02] active:scale-95 transition-all duration-200 cursor-pointer">
              <x-donasi-icon name="gift" class="w-4 h-4 text-slate-900" />
              <span>Salurkan Donasi Sekarang</span>
            </button>
            <a href="https://wa.me/{{ $waNum }}?text=Assalamu%27alaikum%20Panitia%20Donasi%20PPTQ%20Imam%20Syaukani%2C%20saya%20ingin%20berkonsultasi%20tentang%20donasi..." target="_blank" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-white/15 text-white font-semibold text-sm hover:bg-white/25 border border-white/20 transition-all duration-200 backdrop-blur-sm">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
              </svg>
              <span>Konsultasi via WhatsApp</span>
            </a>
          </div>
        </div>
      </div>

      <!-- SECTION 1: DONASI UNTUK APA? (PENYALURAN DANA DINAMIS) -->
      <div class="mb-16 sm:mb-20">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12">
          <span class="inline-block bg-primary-accent text-primary text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-3">
            Penyaluran Dana
          </span>
          <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold font-outfit text-slate-800">
            Donasi Anda Digunakan Untuk Apa?
          </h2>
          <p class="text-slate-600 text-xs sm:text-sm md:text-base mt-2.5 leading-relaxed">
            Setiap rupiah yang Anda amanahkan dikelola secara produktif dan tepat sasaran untuk program-program utama berikut:
          </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          @forelse($penyalurans as $item)
            @php
              $warna = $item->warna ?? 'emerald';
              $iconTheme = match($warna) {
                'amber' => [
                  'box' => 'bg-amber-50 text-amber-600 border-amber-200/80 group-hover:bg-amber-500 group-hover:text-white group-hover:border-amber-500',
                  'dot' => 'bg-amber-500',
                  'tag' => 'text-amber-700 bg-amber-50/80 border-amber-200/60',
                ],
                'teal' => [
                  'box' => 'bg-teal-50 text-teal-600 border-teal-200/80 group-hover:bg-teal-600 group-hover:text-white group-hover:border-teal-600',
                  'dot' => 'bg-teal-500',
                  'tag' => 'text-teal-700 bg-teal-50/80 border-teal-200/60',
                ],
                'blue' => [
                  'box' => 'bg-blue-50 text-blue-600 border-blue-200/80 group-hover:bg-blue-600 group-hover:text-white group-hover:border-blue-600',
                  'dot' => 'bg-blue-500',
                  'tag' => 'text-blue-700 bg-blue-50/80 border-blue-200/60',
                ],
                default => [
                  'box' => 'bg-emerald-50 text-emerald-700 border-emerald-200/80 group-hover:bg-primary group-hover:text-white group-hover:border-primary',
                  'dot' => 'bg-emerald-500',
                  'tag' => 'text-emerald-800 bg-emerald-50/80 border-emerald-200/60',
                ],
              };
            @endphp
            <div class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/80 shadow-xs hover:shadow-xl transition-all duration-300 hover:-translate-y-1.5 group flex flex-col justify-between">
              <div>
                <!-- ICON BOX (Fixed 56x56px square rounded box) -->
                <div class="w-14 h-14 rounded-2xl border {{ $iconTheme['box'] }} flex items-center justify-center mb-5 transition-all duration-300 group-hover:scale-105 group-hover:shadow-md shrink-0">
                  <x-donasi-icon :name="$item->icon" class="w-7 h-7" />
                </div>
                
                <h3 class="text-base sm:text-lg font-bold font-outfit text-slate-800 mb-2.5 group-hover:text-primary transition-colors leading-snug">
                  {{ $item->judul }}
                </h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                  {{ $item->deskripsi }}
                </p>
              </div>

              <!-- TAG / BADGE KATEGORI DINAMIS DARI DATABASE -->
              @if($item->tag)
              <div class="mt-6 pt-4 border-t border-slate-100 flex items-center gap-2 text-xs font-semibold {{ $iconTheme['tag'] }} px-2.5 py-1 rounded-xl border w-fit">
                <span class="w-2 h-2 rounded-full {{ $iconTheme['dot'] }} shrink-0"></span>
                <span class="font-bold">{{ $item->tag }}</span>
              </div>
              @endif
            </div>
          @empty
            <div class="col-span-full py-12 text-center text-slate-400 text-sm">
              Belum ada data penyaluran dana.
            </div>
          @endforelse
        </div>
      </div>

      <!-- SECTION 2: TUJUAN DONASI & WAKAF (DINAMIS) -->
      <div class="mb-16 sm:mb-20">
        <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-12">
          <span class="inline-block bg-primary-accent text-primary text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-3">
            Visi & Dampak
          </span>
          <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold font-outfit text-slate-800">
            Tujuan Donasi & Wakaf
          </h2>
          <p class="text-slate-600 text-xs sm:text-sm md:text-base mt-2.5 leading-relaxed">
            Dukungan Anda bukan sekadar bantuan materi, tetapi investasi peradaban untuk kebaikan umat.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
          @forelse($tujuans as $item)
            @php
              $warna = $item->warna ?? 'primary';
              $numBg = match($warna) {
                'accent' => 'bg-accent text-slate-900 shadow-accent/20',
                'primary-light' => 'bg-primary-light text-white shadow-primary-light/20',
                default => 'bg-primary text-white shadow-primary/20',
              };
            @endphp
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs relative overflow-hidden group hover:border-primary/40 hover:shadow-lg transition-all duration-300">
              <div class="absolute top-0 right-0 w-28 h-28 bg-emerald-500/5 rounded-full blur-xl group-hover:bg-emerald-500/10 transition-colors"></div>
              <div class="w-12 h-12 rounded-xl {{ $numBg }} flex items-center justify-center font-bold text-lg font-outfit mb-6 shadow-md">
                {{ $item->nomor }}
              </div>
              <h3 class="text-lg sm:text-xl font-bold font-outfit text-slate-800 mb-3 group-hover:text-primary transition-colors">
                {{ $item->judul }}
              </h3>
              <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                {{ $item->deskripsi }}
              </p>
            </div>
          @empty
            <div class="col-span-full py-12 text-center text-slate-400 text-sm">
              Belum ada data tujuan donasi.
            </div>
          @endforelse
        </div>
      </div>

    </div>

    <!-- MODAL POPUP SALURKAN DONASI -->
    <div 
      x-show="openModal" 
      x-cloak
      class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-3 sm:p-6"
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
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs transition-opacity"></div>

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
        <div class="bg-gradient-to-r from-primary-dark to-primary px-5 sm:px-8 py-4.5 sm:py-5 text-white flex items-center justify-between shrink-0">
          <div class="flex items-center gap-3">
            <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl bg-white/10 flex items-center justify-center text-accent text-base sm:text-lg font-bold">
              <span x-text="step"></span>
            </div>
            <div>
              <h3 class="font-outfit font-bold text-base sm:text-lg text-white" id="modal-title">
                <span x-show="step === 1">Formulir Niat Donasi</span>
                <span x-show="step === 2">Rekening Tujuan & Nominal</span>
                <span x-show="step === 3">Unggah Bukti & Konfirmasi</span>
              </h3>
              <p class="text-[11px] sm:text-xs text-emerald-100/80">
                <span x-show="step === 1">Langkah 1 dari 3: Isi data donatur</span>
                <span x-show="step === 2">Langkah 2 dari 3: Pilih saluran & nominal transfer</span>
                <span x-show="step === 3">Langkah 3 dari 3: Lampirkan bukti transfer</span>
              </p>
            </div>
          </div>
          <!-- Close Button -->
          <button 
            @click="resetForm()" 
            type="button" 
            class="w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer"
            title="Tutup Formulir">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- FORM WRAPPER -->
        <form action="{{ route('donasi.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col flex-1 overflow-hidden">
          @csrf

          <!-- MODAL BODY: STEP 1 (DATA DONATUR) -->
          <div x-show="step === 1" class="p-5 sm:p-8 overflow-y-auto">
            <div class="space-y-4">
              
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
                  <span>Selanjutnya</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                  </svg>
                </button>
              </div>

            </div>
          </div>

          <!-- MODAL BODY: STEP 2 (REKENING & NOMINAL) -->
          <div x-show="step === 2" class="p-5 sm:p-8 overflow-y-auto space-y-5" x-cloak>
            
            <!-- Hidden input metode pembayaran -->
            <input 
              type="hidden" 
              name="metode_pembayaran" 
              :value="form.metode === 'bank' ? ('Transfer ' + getActiveBank().nama + ' (' + getActiveBank().nomor + ')') : 'QRIS Pembayaran'">

            <!-- 1. METODE TRANSFER -->
            <div>
              <div class="flex items-center justify-between mb-2">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                  1. Saluran Transfer Tujuan
                </label>
                <div class="flex gap-1 bg-slate-100 p-1 rounded-xl text-xs">
                  <button 
                    type="button" 
                    @click="form.metode = 'bank'"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-bold transition-all cursor-pointer"
                    :class="form.metode === 'bank' ? 'bg-white text-primary shadow-xs' : 'text-slate-500 hover:text-slate-800'">
                    <x-donasi-icon name="bank" class="w-3.5 h-3.5" />
                    <span>Rekening Bank</span>
                  </button>
                  <button 
                    type="button" 
                    @click="form.metode = 'qris'"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg font-bold transition-all cursor-pointer"
                    :class="form.metode === 'qris' ? 'bg-white text-primary shadow-xs' : 'text-slate-500 hover:text-slate-800'">
                    <x-donasi-icon name="qrcode" class="w-3.5 h-3.5" />
                    <span>QRIS</span>
                  </button>
                </div>
              </div>

              <!-- Pilihan Bank (Jika Bank > 1) -->
              <div x-show="form.metode === 'bank' && banks.length > 1" class="mb-2">
                <label class="block text-[11px] text-slate-500 font-semibold mb-1">Pilih Bank:</label>
                <div class="flex flex-wrap gap-2">
                  <template x-for="(b, i) in banks" :key="b.id">
                    <button 
                      type="button" 
                      @click="selectedBankIndex = i"
                      class="px-3 py-1 rounded-lg text-xs font-bold border transition-all cursor-pointer"
                      :class="selectedBankIndex === i ? 'bg-primary text-white border-primary shadow-xs' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'"
                      x-text="b.nama">
                    </button>
                  </template>
                </div>
              </div>

              <!-- Box Rekening Bank Terpilih -->
              <div x-show="form.metode === 'bank'" class="p-4 bg-emerald-50/70 border border-emerald-200/80 rounded-2xl">
                <div class="flex items-center justify-between gap-2 mb-1.5 flex-wrap">
                  <span class="text-[11px] font-bold text-slate-600 uppercase tracking-wide" x-text="getActiveBank().nama"></span>
                  <template x-if="getActiveBank().kode">
                    <span class="text-[10px] font-bold text-emerald-700 bg-emerald-100/80 px-2 py-0.5 rounded" x-text="'Kode Bank: ' + getActiveBank().kode"></span>
                  </template>
                </div>
                <div class="flex items-center justify-between gap-3 bg-white p-3 rounded-xl border border-emerald-200/80 mb-2">
                  <span class="font-outfit text-lg sm:text-xl font-extrabold text-primary tracking-wide break-all" x-text="getActiveBank().nomor"></span>
                  <button 
                    @click="navigator.clipboard.writeText(getActiveBank().nomor); copiedRekening = true; setTimeout(() => copiedRekening = false, 2500)"
                    type="button"
                    class="px-3.5 py-1.5 rounded-lg text-xs font-bold transition-all shadow-xs cursor-pointer shrink-0"
                    :class="copiedRekening ? 'bg-emerald-600 text-white' : 'bg-primary text-white hover:bg-primary-dark active:scale-95'">
                    <span x-text="copiedRekening ? '✓ Tersalin!' : 'Salin'"></span>
                  </button>
                </div>
                <p class="text-xs text-slate-600">Atas Nama: <strong class="text-slate-800" x-text="getActiveBank().atas_nama"></strong></p>
              </div>

              <!-- Box QRIS -->
              <div x-show="form.metode === 'qris'" class="p-4 bg-slate-50 border border-slate-200 rounded-2xl text-center flex flex-col items-center">
                @if($qris && $qris->gambar_qris)
                  <img src="{{ Storage::url($qris->gambar_qris) }}" alt="QRIS" class="w-36 h-36 object-contain rounded-lg border border-slate-200 bg-white p-1.5 mb-2 shadow-xs" />
                @else
                  <div class="w-36 h-36 bg-white rounded-lg border border-slate-200 p-2 flex items-center justify-center mb-2">
                    <x-donasi-icon name="qrcode" class="w-24 h-24 text-primary" />
                  </div>
                @endif
                <p class="text-xs font-bold text-slate-800">@if($qris && $qris->nama_penerima) {{ $qris->nama_penerima }} @else PPTQ IMAM SYAUKANI @endif</p>
                <p class="text-[10px] text-slate-500 mt-0.5">Mendukung GoPay, OVO, DANA, BCA, Mandiri, BSI, dll.</p>
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
                  :class="form.nominal === '50.000' ? 'bg-primary text-white border-primary shadow-xs' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'">
                  50 Rb
                </button>
                <button 
                  type="button" 
                  @click="setNominal(100000)"
                  class="py-1.5 px-2 rounded-xl text-xs font-bold border transition-all cursor-pointer text-center"
                  :class="form.nominal === '100.000' ? 'bg-primary text-white border-primary shadow-xs' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'">
                  100 Rb
                </button>
                <button 
                  type="button" 
                  @click="setNominal(250000)"
                  class="py-1.5 px-2 rounded-xl text-xs font-bold border transition-all cursor-pointer text-center"
                  :class="form.nominal === '250.000' ? 'bg-primary text-white border-primary shadow-xs' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'">
                  250 Rb
                </button>
                <button 
                  type="button" 
                  @click="setNominal(500000)"
                  class="py-1.5 px-2 rounded-xl text-xs font-bold border transition-all cursor-pointer text-center"
                  :class="form.nominal === '500.000' ? 'bg-primary text-white border-primary shadow-xs' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'">
                  500 Rb
                </button>
                <button 
                  type="button" 
                  @click="setNominal(1000000)"
                  class="py-1.5 px-2 rounded-xl text-xs font-bold border transition-all cursor-pointer text-center col-span-3 sm:col-span-1"
                  :class="form.nominal === '1.000.000' ? 'bg-primary text-white border-primary shadow-xs' : 'bg-white text-slate-600 border-slate-200 hover:bg-slate-50'">
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

            <!-- STEP 2 ACTIONS -->
            <div class="flex items-center justify-between gap-3 pt-3 border-t border-slate-100">
              <button 
                type="button" 
                @click="step = 1"
                class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-slate-600 font-semibold text-xs hover:bg-slate-100 transition-colors cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali</span>
              </button>
              <button 
                type="button" 
                @click="if (form.nominal.trim()) { step = 3; errors.nominal = ''; } else { errors.nominal = 'Nominal donasi wajib diisi.'; }"
                class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-primary text-white font-bold text-xs hover:bg-primary-dark transition-all duration-200 shadow-md shadow-primary/20 active:scale-95 cursor-pointer">
                <span>Lanjut Upload Bukti</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </button>
            </div>

          </div>

          <!-- MODAL BODY: STEP 3 (UPLOAD BUKTI & KONFIRMASI KE DATABASE) -->
          <div x-show="step === 3" class="p-5 sm:p-8 overflow-y-auto space-y-5" x-cloak>
            
            <!-- Summary Box -->
            <div class="bg-emerald-50/80 border border-emerald-200/80 rounded-2xl p-4 sm:p-4.5 text-xs text-slate-700 space-y-1.5">
              <div class="flex justify-between items-center text-slate-500 font-medium pb-2 border-b border-emerald-200/60">
                <span class="font-bold text-slate-700 flex items-center gap-1.5">
                  <x-donasi-icon name="clipboard" class="w-4 h-4 text-primary" />
                  <span>Ringkasan Donasi Anda:</span>
                </span>
                <span class="text-[11px] font-semibold text-emerald-700 bg-emerald-100/80 px-2 py-0.5 rounded-md">
                  Siap Disimpan
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
                <span class="col-span-2 font-semibold text-slate-800" x-text="form.metode === 'bank' ? ('Transfer ' + getActiveBank().nama) : 'QRIS Pembayaran'"></span>
              </div>
            </div>

            <!-- UPLOAD BUKTI PEMBAYARAN -->
            <div>
              <div class="flex items-center justify-between mb-1.5">
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-700">
                  Unggah Bukti Pembayaran / Struk Transfer <span class="text-rose-500">*</span>
                </label>
                <span class="text-[11px] text-slate-400 font-medium">(Wajib)</span>
              </div>

              <input 
                type="file" 
                name="bukti_pembayaran" 
                x-ref="fileInput"
                @change="handleFileUpload($event)"
                accept="image/*,.pdf" 
                class="hidden" 
                required />

              <!-- Area Upload -->
              <div 
                x-show="!form.buktiName"
                @click="$refs.fileInput.click()"
                class="border-2 border-dashed border-emerald-300/80 hover:border-primary bg-emerald-50/30 hover:bg-emerald-50/60 rounded-2xl p-6 text-center cursor-pointer transition-all duration-200 group">
                <div class="w-12 h-12 mx-auto rounded-2xl bg-emerald-100 text-primary flex items-center justify-center mb-2.5 transition-transform group-hover:scale-105">
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
                class="flex items-center justify-between p-3.5 bg-emerald-50 border border-emerald-300 rounded-2xl shadow-xs">
                <div class="flex items-center gap-3 overflow-hidden">
                  <template x-if="form.buktiPreview">
                    <img :src="form.buktiPreview" class="w-12 h-12 sm:w-14 sm:h-14 object-cover rounded-xl border border-emerald-300 shadow-xs shrink-0" alt="Preview Bukti" />
                  </template>
                  <template x-if="!form.buktiPreview">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-emerald-200 text-emerald-800 rounded-xl flex items-center justify-center font-bold text-xs shrink-0">
                      PDF
                    </div>
                  </template>
                  <div class="overflow-hidden">
                    <p class="text-xs font-bold text-slate-800 truncate max-w-[180px] sm:max-w-xs" x-text="form.buktiName"></p>
                    <span class="text-[11px] text-emerald-700 font-bold flex items-center gap-1 mt-0.5">
                      <x-donasi-icon name="shield-check" class="w-3.5 h-3.5" />
                      Bukti berhasil dipilih!
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
            <div class="pt-3 border-t border-slate-100 flex flex-col items-center gap-2.5">
              <!-- Pesan Informasi Jika Belum Upload -->
              <p x-show="!form.buktiName" class="text-[11px] text-amber-700 bg-amber-50 px-3.5 py-2 rounded-xl border border-amber-200/80 w-full text-center font-medium flex items-center justify-center gap-1.5">
                <x-donasi-icon name="alert" class="w-3.5 h-3.5 text-amber-600" />
                <span>Unggah foto / file bukti transfer terlebih dahulu untuk mengirim donasi.</span>
              </p>

              <div class="flex items-center justify-between w-full gap-3">
                <button 
                  type="button" 
                  @click="step = 2"
                  class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-slate-600 font-semibold text-xs hover:bg-slate-100 transition-colors cursor-pointer">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                  </svg>
                  <span>Kembali</span>
                </button>

                <!-- Tombol Kirim Form (Aktif jika bukti sudah ada) -->
                <template x-if="form.buktiName">
                  <button 
                    type="submit"
                    class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-emerald-600 text-white font-bold text-xs hover:bg-emerald-700 transition-all duration-200 shadow-md shadow-emerald-600/30 active:scale-95 cursor-pointer">
                    <x-donasi-icon name="shield-check" class="w-4 h-4 text-white" />
                    <span>Kirim & Simpan Donasi</span>
                  </button>
                </template>

                <!-- Tombol Disabled Jika Belum Ada Bukti -->
                <template x-if="!form.buktiName">
                  <button 
                    type="button" 
                    disabled
                    class="flex-1 inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-slate-200 text-slate-400 font-bold text-xs cursor-not-allowed opacity-75">
                    <span>Kirim Donasi (Pilih Bukti Dahulu)</span>
                  </button>
                </template>
              </div>
            </div>

          </div>

        </form>

      </div>

    </div>

  </section>
@endsection
