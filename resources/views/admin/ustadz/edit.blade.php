@extends('admin.layouts.app')

@section('title', 'Edit Ustadz – Dashboard Admin')

@section('content')
<section class="admin-content-section active block">
  <div class="max-w-2xl">

    {{-- Breadcrumb --}}
    <div class="flex items-center gap-2 text-xs text-slate-500 mb-6">
      <a href="{{ route('ustadz-admin.index') }}" class="hover:text-primary font-medium transition-colors">Dewan Asatidz</a>
      <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
      <span class="text-slate-400">Edit: {{ $ustadz->nama }}</span>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8">
      <h3 class="text-lg font-bold font-outfit text-primary mb-6">Edit Data Ustadz</h3>

      <form action="{{ route('ustadz-admin.update', $ustadz) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        {{-- Nama & Gelar --}}
        <div class="grid grid-cols-1 sm:grid-cols-[1fr_auto] gap-4">
          <div>
            <label for="nama" class="block text-xs font-semibold text-slate-600 mb-1.5">Nama <span class="text-red-500">*</span></label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $ustadz->nama) }}" required
                   placeholder="Misal: Baihaqi Matsary"
                   class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all @error('nama') border-red-400 @enderror"/>
            @error('nama')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
          </div>
          <div>
            <label for="gelar" class="block text-xs font-semibold text-slate-600 mb-1.5">Gelar</label>
            <input type="text" id="gelar" name="gelar" value="{{ old('gelar', $ustadz->gelar) }}"
                   placeholder="Lc., M.A."
                   class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"/>
          </div>
        </div>

        {{-- Jabatan --}}
        <div>
          <label for="jabatan" class="block text-xs font-semibold text-slate-600 mb-1.5">Jabatan <span class="text-red-500">*</span></label>
          <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan', $ustadz->jabatan) }}" required
                 placeholder="Misal: Mudir Ma'had / Pengajar Tahfidz"
                 class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all @error('jabatan') border-red-400 @enderror"/>
          @error('jabatan')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        {{-- Foto --}}
        <div>
          <label for="foto" class="block text-xs font-semibold text-slate-600 mb-1.5">Foto</label>
          <div class="flex items-center gap-4">
            {{-- Current / Preview --}}
            <div class="w-20 h-20 rounded-xl border border-slate-200 bg-slate-50 overflow-hidden shrink-0">
              @if($ustadz->foto)
                <img id="fotoPreview" src="{{ Storage::url($ustadz->foto) }}" alt="{{ $ustadz->nama }}" class="w-full h-full object-cover object-top"/>
              @else
                <img id="fotoPreview" src="" alt="" class="w-full h-full object-cover object-top hidden"/>
                <div id="fotoPlaceholder" class="w-full h-full flex items-center justify-center">
                  <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                  </svg>
                </div>
              @endif
            </div>
            <div class="flex-1">
              <input type="file" id="foto" name="foto" accept="image/*"
                     class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition-all"
                     onchange="previewFoto(this)"/>
              <p class="text-[11px] text-slate-400 mt-1">Kosongkan jika tidak ingin mengganti foto. Maks 10MB.</p>
            </div>
          </div>
          @error('foto')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
        </div>

        {{-- Bio --}}
        <div>
          <label for="bio" class="block text-xs font-semibold text-slate-600 mb-1.5">Bio / Deskripsi Singkat</label>
          <textarea id="bio" name="bio" rows="3"
                    placeholder="Deskripsi singkat tentang ustadz..."
                    class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all resize-none">{{ old('bio', $ustadz->bio) }}</textarea>
        </div>

        {{-- Pendidikan --}}
        <div>
          <label for="pendidikan" class="block text-xs font-semibold text-slate-600 mb-1.5">Riwayat Pendidikan</label>
          <textarea id="pendidikan" name="pendidikan" rows="3"
                    placeholder="S1 Universitas Damaskus&#10;S2 Brunei Darussalam"
                    class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all resize-none">{{ old('pendidikan', $ustadz->pendidikan) }}</textarea>
          <p class="text-[11px] text-slate-400 mt-1">Satu per baris untuk setiap jenjang pendidikan.</p>
        </div>

        {{-- Keahlian --}}
        <div>
          <label for="keahlian" class="block text-xs font-semibold text-slate-600 mb-1.5">Keahlian</label>
          <input type="text" id="keahlian" name="keahlian" value="{{ old('keahlian', $ustadz->keahlian) }}"
                 placeholder="Misal: Tahfidz, Fiqih, Bahasa Arab"
                 class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"/>
        </div>

        {{-- Urutan & Aktif --}}
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label for="urutan" class="block text-xs font-semibold text-slate-600 mb-1.5">Urutan Tampil</label>
            <input type="number" id="urutan" name="urutan" value="{{ old('urutan', $ustadz->urutan) }}" min="0"
                   class="w-full px-4 py-2.5 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all"/>
            <p class="text-[11px] text-slate-400 mt-1">Angka lebih kecil tampil lebih dulu.</p>
          </div>
          <div>
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Status</label>
            <label class="flex items-center gap-3 mt-2.5 cursor-pointer group">
              <div class="relative">
                <input type="checkbox" id="aktif" name="aktif" value="1"
                       {{ old('aktif', $ustadz->aktif) ? 'checked' : '' }} class="sr-only peer"/>
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
          <a href="{{ route('ustadz-admin.index') }}"
             class="px-5 py-2.5 text-sm font-semibold text-slate-600 hover:text-slate-800 transition-colors">
            Batal
          </a>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
  function previewFoto(input) {
    const preview = document.getElementById('fotoPreview');
    const placeholder = document.getElementById('fotoPlaceholder');
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.classList.remove('hidden');
        if (placeholder) placeholder.classList.add('hidden');
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
