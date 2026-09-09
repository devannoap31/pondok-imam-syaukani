@extends('admin.layouts.app')

@section('title', 'Edit Tujuan Donasi – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8 max-w-4xl">
      
      <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
        <div>
          <h3 class="text-lg sm:text-xl font-bold font-outfit text-slate-800">Edit Card Tujuan Donasi</h3>
          <p class="text-xs text-slate-500 mt-0.5">Perbarui informasi tujuan dan dampak donasi.</p>
        </div>
        <a href="{{ route('tujuan-donasi.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-600 hover:bg-slate-50 transition-all">
          ← Kembali
        </a>
      </div>
      
      @if ($errors->any())
        <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-700 px-4.5 py-3 rounded-2xl text-xs">
          <ul class="list-disc list-inside space-y-1">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('tujuan-donasi.update', $tujuan->id_tujuan) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
          <!-- Nomor Urut Card (e.g. 01, 02) -->
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Nomor Tampilan (01, 02, ..) <span class="text-rose-500">*</span>
            </label>
            <input 
              type="text" 
              name="nomor" 
              placeholder="Contoh: 01" 
              class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-bold" 
              required 
              value="{{ old('nomor', $tujuan->nomor) }}" />
          </div>

          <!-- Urutan Query -->
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Urutan Sorting <span class="text-rose-500">*</span>
            </label>
            <input 
              type="number" 
              name="urutan" 
              min="1"
              class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-semibold" 
              required 
              value="{{ old('urutan', $tujuan->urutan) }}" />
          </div>

          <!-- Status Tampil -->
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Status Tampil <span class="text-rose-500">*</span>
            </label>
            <select name="aktif" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium">
              <option value="1" {{ old('aktif', $tujuan->aktif ? '1' : '0') == '1' ? 'selected' : '' }}>Aktif (Ditampilkan)</option>
              <option value="0" {{ old('aktif', $tujuan->aktif ? '1' : '0') == '0' ? 'selected' : '' }}>Nonaktif (Disembunyikan)</option>
            </select>
          </div>
        </div>

        <!-- Judul Tujuan -->
        <div>
          <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
            Judul Visi & Dampak <span class="text-rose-500">*</span>
          </label>
          <input 
            type="text" 
            name="judul" 
            placeholder="Contoh: Mencetak Generasi Penghafal Al-Qur'an" 
            class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium" 
            required 
            value="{{ old('judul', $tujuan->judul) }}" />
        </div>

        <!-- Warna Aksen Box Nomor -->
        <div>
          <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
            Aksen Warna Box <span class="text-rose-500">*</span>
          </label>
          <select name="warna" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium">
            <option value="primary" {{ old('warna', $tujuan->warna) == 'primary' ? 'selected' : '' }}>Hijau Emerald (Primary)</option>
            <option value="accent" {{ old('warna', $tujuan->warna) == 'accent' ? 'selected' : '' }}>Kuning Emas (Accent)</option>
            <option value="primary-light" {{ old('warna', $tujuan->warna) == 'primary-light' ? 'selected' : '' }}>Toska Muda (Primary Light)</option>
          </select>
        </div>

        <!-- Deskripsi Lengkap -->
        <div>
          <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
            Deskripsi Tujuan <span class="text-rose-500">*</span>
          </label>
          <textarea 
            name="deskripsi" 
            rows="4"
            placeholder="Jelaskan dampak dan tujuan dari program ini..."
            class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white" 
            required>{{ old('deskripsi', $tujuan->deskripsi) }}</textarea>
        </div>
        
        <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
          <a href="{{ route('tujuan-donasi.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-xs hover:bg-slate-50 transition-colors">
            Batal
          </a>
          <button type="submit" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-primary text-white rounded-xl text-xs font-bold hover:bg-primary-dark transition-all shadow-md shadow-primary/20 active:scale-95 cursor-pointer">
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </section>
@endsection
