@extends('admin.layouts.app')

@section('title', 'Edit Jadwal – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
      <h3 class="text-lg font-bold font-outfit text-primary mb-6">Edit Jadwal / Kegiatan</h3>
      
      @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <form action="{{ route('jadwal.update', $jadwal->id_jadwal) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Tanggal</label>
              <input type="date" name="tanggal" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('tanggal', $jadwal->tanggal) }}" />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Waktu (contoh: 08:00 - Dzuhur)</label>
              <input type="text" name="waktu" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('waktu', $jadwal->waktu) }}" />
            </div>
        </div>

        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Nama Kegiatan (Judul)</label>
          <input type="text" name="judul" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('judul', $jadwal->judul) }}" />
        </div>
        
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Deskripsi Kegiatan</label>
          <textarea name="deskripsi" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[80px] bg-white" required>{{ old('deskripsi', $jadwal->deskripsi) }}</textarea>
        </div>

        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">File Lampiran Jadwal (biarkan kosong jika tidak diubah)</label>
          <input type="file" name="file_jadwal" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" accept=".pdf,.jpg,.png,.jpeg" />
          @if($jadwal->file_jadwal)
             <a href="{{ Storage::url($jadwal->file_jadwal) }}" target="_blank" class="text-primary text-xs mt-2 inline-block underline">Lihat file tersimpan</a>
          @endif
        </div>
        
        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
          Simpan Perubahan
        </button>
      </form>
    </div>
  </section>
@endsection
