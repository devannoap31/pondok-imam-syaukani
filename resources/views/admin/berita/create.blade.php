@extends('admin.layouts.app')

@section('title', 'Tambah Berita – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    
    <!-- HEADER BREADCRUMB & TITLE -->
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
      <div>
        <div class="flex items-center gap-2 text-xs font-semibold text-slate-400 mb-1">
          <a href="{{ route('berita.index') }}" class="hover:text-primary transition-colors flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            Kelola Berita
          </a>
          <svg class="w-3 h-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          <span class="text-primary font-bold">Tambah Berita</span>
        </div>
        <h3 class="text-xl sm:text-2xl font-bold font-outfit text-slate-800">Tambah Berita Baru</h3>
        <p class="text-xs text-slate-500 mt-0.5">Tulis dan publikasikan artikel atau pengumuman berita baru ke portal.</p>
      </div>

      <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 px-4 py-2 border border-slate-300 text-slate-700 bg-white hover:bg-slate-50 rounded-xl text-xs font-semibold shadow-xs transition-all w-fit">
        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        Kembali ke Daftar
      </a>
    </div>

    <!-- FORM CARD -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
      
      @if ($errors->any())
        <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-700 p-4 rounded-2xl text-xs font-medium space-y-1">
            <div class="font-bold flex items-center gap-2 text-rose-800 text-sm mb-1">
              <svg class="w-4 h-4 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Terjadi Kesalahan Pengisian Form:
            </div>
            <ul class="list-disc list-inside space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          
          <!-- LEFT / MAIN COL (2 cols) -->
          <div class="md:col-span-2 space-y-5">
            <!-- Judul -->
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Judul Berita <span class="text-rose-500">*</span></label>
              <input type="text" name="judul" class="w-full px-4 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium text-slate-800" required value="{{ old('judul') }}" placeholder="Masukkan judul berita utama..." />
            </div>

            <!-- Isi Berita -->
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Isi Konten Berita <span class="text-rose-500">*</span></label>
              <textarea name="isi" class="w-full px-4 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none resize-y min-h-[250px] bg-white leading-relaxed text-slate-800" required placeholder="Tuliskan isi berita secara mendalam di sini...">{{ old('isi') }}</textarea>
            </div>
          </div>

          <!-- RIGHT / SIDE COL (1 col) -->
          <div class="space-y-5">
            <!-- Kategori -->
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Kategori <span class="text-rose-500">*</span></label>
              <input type="text" id="kategoriInput" name="kategori" class="w-full px-4 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium text-slate-800 mb-2" required value="{{ old('kategori') }}" placeholder="Contoh: Pengumuman, Prestasi, Artikel" />
              
              <!-- Quick Select Badges -->
              <div class="flex flex-wrap gap-1.5 mt-2">
                <span class="text-[11px] text-slate-400 self-center font-medium mr-1">Rekomendasi:</span>
                @foreach(['Pengumuman', 'Prestasi', 'Artikel', 'Kegiatan', 'Informasi'] as $kat)
                  <button type="button" onclick="document.getElementById('kategoriInput').value='{{ $kat }}'" class="text-[10px] font-semibold bg-slate-100 hover:bg-emerald-50 text-slate-600 hover:text-primary border border-slate-200 hover:border-emerald-200 px-2.5 py-1 rounded-lg transition-all cursor-pointer">
                    {{ $kat }}
                  </button>
                @endforeach
              </div>
            </div>

            <!-- Tanggal Publish -->
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Tanggal Publish <span class="text-rose-500">*</span></label>
              <input type="date" name="tanggal_publish" class="w-full px-4 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium text-slate-800" required value="{{ old('tanggal_publish', date('Y-m-d')) }}" />
            </div>

            <!-- Upload Gambar -->
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Gambar Berita <span class="text-rose-500">*</span></label>
              
              <!-- Preview Area -->
              <div class="relative border-2 border-dashed border-slate-300 hover:border-primary/50 bg-slate-50/50 rounded-2xl p-3 text-center transition-all group">
                <input type="file" name="gambar" id="gambarInput" accept="image/jpeg,image/png,image/jpg,image/webp" class="hidden" required onchange="previewImage(event)" />
                
                <div id="imagePreviewContainer" class="relative">
                  <img id="imagePreview" src="" alt="Preview Gambar" class="hidden w-full h-44 object-cover rounded-xl mb-2 border border-slate-200" />
                  <div id="placeholderText" class="py-4">
                    <svg class="w-8 h-8 text-slate-400 mx-auto mb-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <label for="gambarInput" class="text-xs font-bold text-primary hover:underline cursor-pointer">Pilih File Gambar</label>
                    <p class="text-[10px] text-slate-400 mt-0.5">JPG, PNG, WEBP (Max: 2MB)</p>
                  </div>
                </div>

                <div class="mt-2 flex items-center justify-center">
                  <label for="gambarInput" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-xs font-semibold cursor-pointer transition-colors">
                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
                    <span>Unggah Gambar</span>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- BOTTOM BUTTONS -->
        <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-3 flex-wrap">
          <a href="{{ route('berita.index') }}" class="px-5 py-2.5 border border-slate-300 text-slate-700 bg-white hover:bg-slate-50 rounded-xl text-xs font-semibold transition-all">
            Batal
          </a>
          <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-primary hover:bg-primary-dark text-white rounded-xl text-xs font-bold transition-all shadow-md hover:shadow-lg active:scale-95 cursor-pointer">
            <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            Simpan Berita
          </button>
        </div>
      </form>
    </div>
  </section>
@endsection

@section('scripts')
<script>
  function previewImage(event) {
    const input = event.target;
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        const preview = document.getElementById('imagePreview');
        const placeholder = document.getElementById('placeholderText');
        preview.src = e.target.result;
        preview.classList.remove('hidden');
        if (placeholder) {
          placeholder.classList.add('hidden');
        }
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection
