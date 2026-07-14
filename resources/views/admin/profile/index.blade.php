@extends('admin.layouts.app')

@section('title', 'Kelola Profile Pondok – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
      <h3 class="text-lg font-bold font-outfit text-primary mb-2">Kelola Profil & Sejarah Pondok Pesantren</h3>
      <p class="text-xs text-slate-400 mb-6">Data ini akan tampil langsung di halaman Profil pengunjung website.</p>
      
      @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('success') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      @if($profile)
      <form action="{{ route('profil-pondok.update', $profile->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')
        
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Sejarah / Latar Belakang Pendirian</label>
          <textarea name="sejarah" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[150px] bg-white" required>{{ old('sejarah', $profile->sejarah) }}</textarea>
        </div>
        
        <div class="form-group mt-8">
          <label class="block text-slate-700 text-xs font-bold mb-2">Teks Visi Pondok</label>
          <textarea name="visi" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[80px] bg-white" required>{{ old('visi', $profile->visi) }}</textarea>
        </div>
        
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Poin-poin Misi</label>
          <textarea name="misi" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[120px] bg-white" required>{{ old('misi', $profile->misi) }}</textarea>
        </div>

        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Logo (opsional)</label>
          <input type="file" name="logo" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" />
          @if($profile->logo)
            <div class="mt-2">
              <img src="{{ Storage::url($profile->logo) }}" alt="Logo" class="h-16 object-cover rounded-xl" />
            </div>
          @endif
        </div>
        
        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
          Simpan Perubahan
        </button>
      </form>
      @else
      <div class="text-center py-10">
          <p class="text-slate-500 mb-4">Data profil belum ada di database. Harap jalankan seeder atau insert manual terlebih dahulu.</p>
      </div>
      @endif
    </div>
  </section>
@endsection
