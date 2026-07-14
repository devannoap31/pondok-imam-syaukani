@extends('admin.layouts.app')

@section('title', 'Tambah Program – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
      <h3 class="text-lg font-bold font-outfit text-primary mb-6">Tambah Program Pendidikan</h3>
      
      @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <form action="{{ route('program-pendidikan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Nama Program / Pendekatan</label>
          <input type="text" name="nama_program" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('nama_program') }}" />
        </div>
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Deskripsi Kurikulum</label>
          <textarea name="deskripsi" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[150px] bg-white" required>{{ old('deskripsi') }}</textarea>
        </div>
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Gambar / Brosur (opsional)</label>
          <input type="file" name="gambar" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" accept="image/*" />
        </div>
        
        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
          Simpan Program
        </button>
      </form>
    </div>
  </section>
@endsection
