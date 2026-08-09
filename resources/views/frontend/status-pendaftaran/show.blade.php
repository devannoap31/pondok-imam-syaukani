@extends('frontend.layouts.app', ['activePage' => 'cek-status'])

@section('title', 'Cek Status Pendaftaran – PPTQ Imam Syaukani')
@section('meta_description', 'Masukkan kode registrasi Anda untuk mengecek status pendaftaran.')

@section('content')
  <!-- PAGE HEADER -->
  <div class="bg-gradient-to-br from-primary-dark to-primary py-16 text-center text-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-outfit text-white mb-2.5">
        Cek Status Pendaftaran
      </h1>
      <p class="text-white/85 text-sm sm:text-base">
        Masukkan Nomor Registrasi Anda untuk melihat status pendaftaran santri.
      </p>
      <div class="flex items-center justify-center gap-2 mt-4.5 text-xs sm:text-sm">
        <a href="{{ url('/') }}" class="text-white/70 hover:text-accent transition-colors">Home</a>
        <span class="text-white/40">›</span>
        <span class="text-white font-medium">Cek Status</span>
      </div>
    </div>
  </div>

  <!-- FORM SECTION -->
  <section class="py-20 bg-white">
    <div class="max-w-[800px] mx-auto px-6">
      <div class="bg-white rounded-3xl border border-slate-200 shadow-md p-6 sm:p-10">
        <h2 class="text-2xl font-bold text-primary mb-2">Masukkan Kode Registrasi</h2>
        <p class="text-sm text-slate-600 mb-8">Kode registrasi telah dikirimkan via WhatsApp saat Anda mendaftar.</p>

        @if ($errors->any())
          <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl">
            @foreach ($errors->all() as $error)
              <p class="text-sm">{{ $error }}</p>
            @endforeach
          </div>
        @endif

        @if (session('error'))
          <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl">
            <p class="text-sm">{{ session('error') }}</p>
          </div>
        @endif

        <form action="{{ route('status-pendaftaran.check') }}" method="POST" class="space-y-6">
          @csrf
          <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">Nomor Registrasi *</label>
            <input 
              type="text" 
              name="nomor_pendaftaran" 
              placeholder="Contoh: REG-20260809-ABCD"
              class="w-full px-4 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(20,77,48,0.1)] focus:outline-none bg-white"
              value="{{ old('nomor_pendaftaran') }}"
              required
            />
            @error('nomor_pendaftaran')
              <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <button 
            type="submit" 
            class="w-full px-6 py-3 bg-primary text-white rounded-full text-base font-semibold hover:bg-primary-dark transition-all shadow-md hover:shadow-lg active:scale-[0.98]"
          >
            Cek Status Pendaftaran
          </button>
        </form>

        <div class="mt-8 pt-8 border-t border-slate-200">
          <p class="text-xs text-slate-600 text-center mb-4">Belum punya kode registrasi?</p>
          <a 
            href="{{ route('daftar') }}" 
            class="block w-full text-center px-6 py-3 border border-primary text-primary rounded-full text-base font-semibold hover:bg-primary hover:text-white transition-all"
          >
            Daftar Sekarang
          </a>
        </div>
      </div>
    </div>
  </section>
@endsection
