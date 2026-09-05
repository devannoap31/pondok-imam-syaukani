@extends('admin.layouts.app')

@section('title', 'Edit Fasilitas & Data Statistik – Dashboard Admin')

@section('content')
<section class="admin-content-section active block">
  <div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">

      {{-- Header --}}
      <div class="flex items-center gap-3 mb-6 pb-4 border-b border-slate-100">
        <a href="{{ route('fasilitas-admin.index') }}"
           class="p-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 transition-colors">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
          </svg>
        </a>
        <div>
          <h3 class="text-lg font-bold font-outfit text-primary">Edit Fasilitas / Data Statistik</h3>
          <p class="text-xs text-slate-400 mt-0.5">Perbarui rincian baris data pada tabel statistik pondok</p>
        </div>
      </div>

      <form action="{{ route('fasilitas-admin.update', $fasilitas->id_fasilitas) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        {{-- Nama Fasilitas --}}
        <div>
          <label for="nama_fasilitas" class="block text-xs font-semibold text-slate-600 mb-1.5">
            Nama Fasilitas / Kategori <span class="text-red-500">*</span>
          </label>
          <input type="text" id="nama_fasilitas" name="nama_fasilitas" value="{{ old('nama_fasilitas', $fasilitas->nama_fasilitas) }}"
                 placeholder="Contoh: Gedung Asrama Santri, Masjid, Luas Lahan, dll."
                 class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all @error('nama_fasilitas') border-red-400 @enderror"/>
          @error('nama_fasilitas')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        {{-- Deskripsi Singkat & Icon --}}
        <div class="grid grid-cols-1 sm:grid-cols-[1fr_120px] gap-4">
          <div>
            <label for="deskripsi_singkat" class="block text-xs font-semibold text-slate-600 mb-1.5">
              Deskripsi / Keterangan Singkat
            </label>
            <input type="text" id="deskripsi_singkat" name="deskripsi_singkat" value="{{ old('deskripsi_singkat', $fasilitas->deskripsi_singkat) }}"
                   placeholder="Contoh: Pusat ibadah santri"
                   class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"/>
          </div>

          <div>
            <label for="icon" class="block text-xs font-semibold text-slate-600 mb-1.5">
              Icon Emoji
            </label>
            <input type="text" id="icon" name="icon" value="{{ old('icon', $fasilitas->icon ?: '🏢') }}"
                   placeholder="🏢"
                   class="w-full px-4 py-2.5 text-sm text-center rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"/>
          </div>
        </div>

        {{-- Rincian Data & Detail --}}
        <div>
          <label for="detail" class="block text-xs font-semibold text-slate-600 mb-1.5">
            Rincian Data & Detail <span class="text-red-500">*</span>
          </label>
          <textarea id="detail" name="detail" rows="4"
                    placeholder="Contoh:&#10;a. Nama: Masjid Baiatur Ridwan&#10;b. Kapasitas: 300 Orang"
                    class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all resize-none @error('detail') border-red-400 @enderror">{{ old('detail', $fasilitas->detail) }}</textarea>
          <p class="text-[11px] text-slate-400 mt-1">Dapat berupa angka/satuan langsung (misal: 2928 m²) atau beberapa baris rincian fasilitas.</p>
          @error('detail')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        {{-- Urutan & Status --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label for="urutan" class="block text-xs font-semibold text-slate-600 mb-1.5">Nomor Urutan</label>
            <input type="number" id="urutan" name="urutan" value="{{ old('urutan', $fasilitas->urutan) }}" min="0"
                   class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"/>
            <p class="text-[11px] text-slate-400 mt-1">Urutan tampil pada tabel (angka lebih kecil tampil lebih atas).</p>
          </div>

          <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Status Tampil</label>
            <label class="flex items-center gap-3 mt-2.5 cursor-pointer group">
              <div class="relative">
                <input type="checkbox" id="aktif" name="aktif" value="1"
                       {{ old('aktif', $fasilitas->aktif) ? 'checked' : '' }} class="sr-only peer"/>
                <div class="w-10 h-5 rounded-full bg-slate-200 peer-checked:bg-primary transition-colors"></div>
                <div class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-white shadow-sm transition-transform peer-checked:translate-x-5"></div>
              </div>
              <span class="text-sm font-medium text-slate-600 group-hover:text-slate-800 transition-colors">Tampilkan di Website</span>
            </label>
          </div>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-3 pt-4 border-t border-slate-100">
          <button type="submit"
                  class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-primary text-white rounded-xl text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm hover:shadow-md active:scale-95">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Simpan Perubahan
          </button>
          <a href="{{ route('fasilitas-admin.index') }}"
             class="px-5 py-2.5 text-sm font-semibold text-slate-600 hover:text-slate-800 transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
