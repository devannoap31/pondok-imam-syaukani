@extends('admin.layouts.app')

@section('title', 'Kelola Kontak & Lokasi – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
      <h3 class="text-lg font-bold font-outfit text-primary mb-6">Kelola Hubungi Kami & Peta Lokasi</h3>
      
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

      @if($kontak)
      <form action="{{ route('kontak-admin.update', $kontak->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')
        
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Alamat Lengkap Kantor</label>
          <textarea name="alamat" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[80px] bg-white" required>{{ old('alamat', $kontak->alamat) }}</textarea>
        </div>
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Link Google Maps Embed (iframe src)</label>
          <input type="text" name="maps_embed" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="{{ old('maps_embed', $kontak->maps_embed) }}" required />
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Nomor WhatsApp Humas</label>
              <input type="text" name="whatsapp" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="{{ old('whatsapp', $kontak->whatsapp) }}" required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Nomor Telepon</label>
              <input type="text" name="telepon" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="{{ old('telepon', $kontak->telepon) }}" required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Alamat Email</label>
              <input type="email" name="email" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="{{ old('email', $kontak->email) }}" required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Link Facebook</label>
              <input type="text" name="facebook" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="{{ old('facebook', $kontak->facebook) }}" required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Link Instagram</label>
              <input type="text" name="instagram" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="{{ old('instagram', $kontak->instagram) }}" required />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Link YouTube</label>
              <input type="text" name="youtube" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" value="{{ old('youtube', $kontak->youtube) }}" required />
            </div>
        </div>

        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
          Simpan Perubahan
        </button>
      </form>
      @else
      <div class="text-center py-10">
          <p class="text-slate-500 mb-4">Data kontak belum ada di database.</p>
          <a href="{{ route('kontak-admin.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-primary text-white rounded-full text-xs font-semibold hover:bg-primary-dark transition-all">Tambah Data Kontak Awal</a>
      </div>
      @endif
    </div>
  </section>
@endsection
