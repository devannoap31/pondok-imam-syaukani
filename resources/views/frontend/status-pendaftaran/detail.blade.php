@extends('frontend.layouts.app', ['activePage' => 'cek-status'])

@section('title', 'Status Pendaftaran – PPTQ Imam Syaukani')
@section('meta_description', 'Lihat status pendaftaran santri Anda.')

@section('content')
  <!-- PAGE HEADER -->
  <div class="bg-gradient-to-br from-primary-dark to-primary py-16 text-center text-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-outfit text-white mb-2.5">
        Status Pendaftaran Anda
      </h1>
      <p class="text-white/85 text-sm sm:text-base">
        Informasi lengkap status pendaftaran santri.
      </p>
      <div class="flex items-center justify-center gap-2 mt-4.5 text-xs sm:text-sm">
        <a href="{{ url('/') }}" class="text-white/70 hover:text-accent transition-colors">Home</a>
        <span class="text-white/40">›</span>
        <span class="text-white font-medium">Status Pendaftaran</span>
      </div>
    </div>
  </div>

  <!-- STATUS SECTION -->
  <section class="py-20 bg-white">
    <div class="max-w-[800px] mx-auto px-6">
      <!-- Status Card -->
      <div class="bg-white rounded-3xl border border-slate-200 shadow-md p-6 sm:p-10 mb-6">
        <div class="flex items-start justify-between mb-8">
          <div>
            <h2 class="text-2xl font-bold text-slate-900 mb-1">{{ $pendaftaran->nama_lengkap }}</h2>
            <p class="text-sm text-slate-600">No. Registrasi: <span class="font-mono font-bold text-primary">{{ $pendaftaran->nomor_pendaftaran }}</span></p>
          </div>
          <div class="text-right">
            @php
              $statusColor = match($pendaftaran->status) {
                'Diterima' => 'bg-green-100 text-green-800 border-green-300',
                'Ditolak' => 'bg-red-100 text-red-800 border-red-300',
                default => 'bg-yellow-100 text-yellow-800 border-yellow-300',
              };
            @endphp
            <span class="inline-block px-4 py-2 rounded-full text-xs font-bold border {{ $statusColor }}">
              {{ $pendaftaran->status }}
            </span>
          </div>
        </div>

        <!-- Status Timeline -->
        <div class="relative">
          <!-- Connector line (vertical) -->
          <div class="absolute left-5 top-10 bottom-10 w-0.5 bg-slate-200" style="transform: translateX(-50%);"></div>

          <div class="space-y-6">
            {{-- STEP 1: Pendaftaran masuk --}}
            <div class="flex items-start gap-4">
              <div class="w-10 h-10 min-w-10 min-h-10 rounded-full flex-shrink-0 flex items-center justify-center relative z-10" style="background-color: #22c55e !important;">
                <span class="text-white text-lg font-bold leading-none">
                    ✓
                </span>
              </div>
              <div class="pt-1">
                <h3 class="font-semibold text-slate-900 text-sm">Pendaftaran Masuk</h3>
                <p class="text-xs text-slate-500 mt-0.5">{{ $pendaftaran->created_at->format('d M Y, H:i') }} WIB</p>
              </div>
            </div>

            {{-- STEP 2: Verifikasi Berkas --}}
            <div class="flex items-start gap-4">
              @if($pendaftaran->status !== 'Diverifikasi')
                <div class="w-10 h-10 min-w-10 min-h-10 rounded-full flex-shrink-0 flex items-center justify-center relative z-10" style="background-color: #22c55e !important;">
                <span class="text-white text-lg font-bold leading-none">
                    ✓
                </span>
              </div>
              @else
                <div class="w-10 h-10 rounded-full bg-slate-200 flex-shrink-0 flex items-center justify-center z-10">
                  <span class="text-slate-500 text-sm font-bold">2</span>
                </div>
              @endif
              <div class="pt-1">
                <h3 class="font-semibold text-slate-900 text-sm">Verifikasi Berkas</h3>
                <p class="text-xs text-slate-500 mt-0.5">
                  @if($pendaftaran->status === 'Diverifikasi')
                    Sedang diverifikasi oleh panitia...
                  @else
                    Berkas telah diverifikasi
                  @endif
                </p>
              </div>
            </div>

            {{-- STEP 3: Hasil Seleksi --}}
            <div class="flex items-start gap-4">
              @if($pendaftaran->status === 'Diterima')
                <div class="w-10 h-10 min-w-10 min-h-10 rounded-full flex-shrink-0 flex items-center justify-center relative z-10" style="background-color: #22c55e !important;">
                  <span class="text-white text-lg font-bold leading-none">
                    ✓
                  </span>
                </div>
              @elseif($pendaftaran->status === 'Ditolak')
                <div class="w-10 h-10 min-w-10 min-h-10 rounded-full flex-shrink-0 flex items-center justify-center relative z-10" style="background-color: #dc2626 !important;">
                  <span class="text-white text-lg font-bold leading-none">
                    X
                  </span>
                </div>
              @else
                <div class="w-10 h-10 rounded-full bg-slate-200 flex-shrink-0 flex items-center justify-center z-10">
                  <span class="text-slate-500 text-sm font-bold">3</span>
                </div>
              @endif
              <div class="pt-1">
                <h3 class="font-semibold text-slate-900 text-sm">
                  @if($pendaftaran->status === 'Diterima')
                    Selamat, Anda Diterima! 🎉
                  @elseif($pendaftaran->status === 'Ditolak')
                    Maaf, Pendaftaran Tidak Diterima
                  @else
                    Menunggu Hasil Seleksi
                  @endif
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">
                  @if($pendaftaran->status === 'Diterima')
                    Anda telah diterima sebagai santri PPTQ Imam Syaukani.
                  @elseif($pendaftaran->status === 'Ditolak')
                    Terima kasih telah mendaftar. Semoga ada kesempatan di tahun depan.
                  @else
                    Panitia sedang melakukan seleksi calon santri.
                  @endif
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Data Pribadi -->
      <div class="bg-slate-50 rounded-3xl border border-slate-200 p-6 sm:p-10 mb-6">
        <h3 class="text-xl font-bold text-slate-900 mb-6">Data Pribadi</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div>
            <p class="text-xs text-slate-600 font-semibold uppercase tracking-wider mb-1">Nama Lengkap</p>
            <p class="text-slate-900 font-medium">{{ $pendaftaran->nama_lengkap }}</p>
          </div>
          <div>
            <p class="text-xs text-slate-600 font-semibold uppercase tracking-wider mb-1">Jenis Kelamin</p>
            <p class="text-slate-900 font-medium capitalize">{{ $pendaftaran->jenis_kelamin }}</p>
          </div>
          <div>
            <p class="text-xs text-slate-600 font-semibold uppercase tracking-wider mb-1">Tempat, Tanggal Lahir</p>
            <p class="text-slate-900 font-medium">{{ $pendaftaran->tempat_lahir }}, {{ $pendaftaran->tanggal_lahir->format('d M Y') }}</p>
          </div>
          <div>
            <p class="text-xs text-slate-600 font-semibold uppercase tracking-wider mb-1">Nomor HP</p>
            <p class="text-slate-900 font-medium">{{ $pendaftaran->nomor_hp }}</p>
          </div>
          <div class="sm:col-span-2">
            <p class="text-xs text-slate-600 font-semibold uppercase tracking-wider mb-1">Alamat</p>
            <p class="text-slate-900 font-medium">{{ $pendaftaran->alamat }}</p>
          </div>
        </div>
      </div>

      <!-- Data Orang Tua -->
      <div class="bg-slate-50 rounded-3xl border border-slate-200 p-6 sm:p-10 mb-6">
        <h3 class="text-xl font-bold text-slate-900 mb-6">Data Orang Tua/Wali</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div>
            <p class="text-xs text-slate-600 font-semibold uppercase tracking-wider mb-1">Nama Orang Tua</p>
            <p class="text-slate-900 font-medium">{{ $pendaftaran->nama_ortu }}</p>
          </div>
          <div>
            <p class="text-xs text-slate-600 font-semibold uppercase tracking-wider mb-1">Pekerjaan</p>
            <p class="text-slate-900 font-medium">{{ $pendaftaran->pekerjaan_ortu }}</p>
          </div>
        </div>
      </div>

      <!-- Berkas Pendaftaran -->
      @if($pendaftaran->berkas->count() > 0)
        <div class="bg-slate-50 rounded-3xl border border-slate-200 p-6 sm:p-10 mb-6">
          <h3 class="text-xl font-bold text-slate-900 mb-6">Berkas Pendaftaran</h3>
          <div class="space-y-3">
            @foreach($pendaftaran->berkas as $berkas)
              <div class="flex items-center justify-between bg-white p-4 rounded-xl border border-slate-200">
                <div class="flex items-center gap-3">
                  <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary font-bold">
                    📄
                  </div>
                  <div>
                    <p class="font-semibold text-slate-900 text-sm">{{ $berkas->jenis_berkas }}</p>
                    <p class="text-xs text-slate-600">Sudah diunggah</p>
                  </div>
                </div>
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
              </div>
            @endforeach
          </div>
        </div>
      @endif

      <!-- Action Buttons -->
      <div class="flex gap-4">
        <a 
          href="{{ route('status-pendaftaran.show') }}" 
          class="flex-1 px-6 py-3 border border-primary text-primary rounded-full text-base font-semibold hover:bg-primary hover:text-white transition-all text-center"
        >
          ← Cek Status Lain
        </a>
        <a 
          href="{{ route('home') }}" 
          class="flex-1 px-6 py-3 bg-primary text-white rounded-full text-base font-semibold hover:bg-primary-dark transition-all text-center"
        >
          Kembali ke Beranda
        </a>
      </div>
    </div>
  </section>
@endsection
