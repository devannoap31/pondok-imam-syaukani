@extends('admin.layouts.app')

@section('title', 'Edit Galeri – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
      <h3 class="text-lg font-bold font-outfit text-primary mb-6">Edit Foto/Video Galeri</h3>
      
      @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <form action="{{ route('galeri-admin.update', $galeri->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Judul</label>
          <input type="text" name="judul" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('judul', $galeri->judul) }}" />
        </div>
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Tipe</label>
          <select name="tipe" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required>
            <option value="foto" {{ old('tipe', $galeri->tipe) == 'foto' ? 'selected' : '' }}>Foto</option>
            <option value="video" {{ old('tipe', $galeri->tipe) == 'video' ? 'selected' : '' }}>Video</option>
          </select>
        </div>
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">File Media (Biarkan kosong jika tidak ingin mengubah)</label>
          <input type="file" name="file_path" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" />
          @if($galeri->file_path && $galeri->tipe === 'foto')
            <div class="mt-2">
              <img src="{{ Storage::url($galeri->file_path) }}" alt="Preview" class="h-32 object-cover rounded-xl" />
            </div>
          @endif
        </div>
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Deskripsi Singkat</label>
          <textarea name="deskripsi" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[100px] bg-white" required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
        </div>
        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
          Simpan Perubahan
        </button>
      </form>
    </div>
  </section>
@endsection
