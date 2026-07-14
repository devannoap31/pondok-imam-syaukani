@extends('admin.layouts.app')

@section('title', 'Edit Berita – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
      <h3 class="text-lg font-bold font-outfit text-primary mb-6">Edit Berita</h3>
      
      @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Judul Berita</label>
          <input type="text" name="judul" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('judul', $berita->judul) }}" />
        </div>
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Isi Berita</label>
          <textarea name="isi" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[150px] bg-white" required>{{ old('isi', $berita->isi) }}</textarea>
        </div>
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Gambar (Biarkan kosong jika tidak ingin mengubah)</label>
          <input type="file" name="gambar" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" />
          @if($berita->gambar)
            <div class="mt-2">
              <img src="{{ Storage::url($berita->gambar) }}" alt="Gambar Berita" class="h-32 object-cover rounded-xl" />
            </div>
          @endif
        </div>
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Tanggal Publish</label>
          <input type="date" name="tanggal_publish" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('tanggal_publish', $berita->tanggal_publish) }}" />
        </div>
        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
          Perbarui Berita
        </button>
      </form>
    </div>
  </section>
@endsection
