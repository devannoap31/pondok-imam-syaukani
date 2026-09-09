@extends('admin.layouts.app')

@section('title', 'Tambah Penyaluran Dana – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8 max-w-4xl">
      
      <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
        <div>
          <h3 class="text-lg sm:text-xl font-bold font-outfit text-slate-800">Tambah Card Penyaluran Dana</h3>
          <p class="text-xs text-slate-500 mt-0.5">Tambahkan program penyaluran donasi baru ke halaman depan.</p>
        </div>
        <a href="{{ route('penyaluran-dana.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-600 hover:bg-slate-50 transition-all">
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

      <form action="{{ route('penyaluran-dana.store') }}" method="POST" class="space-y-6" x-data="{
        selectedIcon: '{{ old('icon', 'academic-cap') }}',
        selectedColor: '{{ old('warna', 'emerald') }}'
      }">
        @csrf

        <!-- Judul Program -->
        <div>
          <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
            Judul Program Penyaluran <span class="text-rose-500">*</span>
          </label>
          <input 
            type="text" 
            name="judul" 
            placeholder="Contoh: Beasiswa Santri Yatim & Dhuafa" 
            class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium" 
            required 
            value="{{ old('judul') }}" />
        </div>

        <!-- Tag / Badge Kategori -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Label / Tag (Bawah Card)
            </label>
            <input 
              type="text" 
              name="tag" 
              placeholder="Contoh: Pendidikan Gratis / Wakaf Produktif" 
              class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white" 
              value="{{ old('tag') }}" />
          </div>
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Urutan Tampil <span class="text-rose-500">*</span>
            </label>
            <input 
              type="number" 
              name="urutan" 
              min="1"
              class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-semibold" 
              required 
              value="{{ old('urutan', 1) }}" />
          </div>
        </div>

        <!-- VISUAL ICON SELECTOR -->
        <div>
          <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
            Pilih Icon Profesional (Vektor SVG) <span class="text-rose-500">*</span>
          </label>
          
          <input type="hidden" id="iconInput" name="icon" value="{{ old('icon', 'academic-cap') }}" :value="selectedIcon">

          <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-3 mb-3">
            @php
              $icons = [
                'academic-cap' => 'Pendidikan / Beasiswa',
                'utensils' => 'Pangan / Konsumsi',
                'heart-handshake' => 'Bantuan & Sosial',
                'building-library' => 'Pembangunan / Masjid',
                'book-open' => 'Guru / Tahfidz / Dakwah',
                'user-group' => 'Santri & Dhuafa',
                'sparkles' => 'Keutamaan & Berkah',
                'shield-check' => 'Amanah & Transparan',
                'gift' => 'Wakaf & Hadiah',
                'scale' => 'Pemerataan',
                'bank' => 'Bank & Finansial',
                'clipboard' => 'Dokumen & Program',
              ];
            @endphp

            @foreach($icons as $iconKey => $iconLabel)
              <button 
                type="button" 
                onclick="document.getElementById('iconInput').value = '{{ $iconKey }}'"
                @click="selectedIcon = '{{ $iconKey }}'"
                class="p-3.5 rounded-2xl border text-center flex flex-col items-center justify-center gap-2 transition-all cursor-pointer group"
                :class="selectedIcon === '{{ $iconKey }}' ? 'bg-emerald-50 border-primary shadow-sm ring-2 ring-primary/20 text-primary' : 'bg-white border-slate-200 hover:border-slate-300 text-slate-600 hover:bg-slate-50'">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center transition-transform group-hover:scale-110"
                     :class="selectedIcon === '{{ $iconKey }}' ? 'bg-primary text-white' : 'bg-slate-100 text-slate-700'">
                  <x-donasi-icon :name="$iconKey" class="w-5 h-5" />
                </div>
                <span class="text-[11px] font-bold leading-tight">{{ $iconLabel }}</span>
              </button>
            @endforeach
          </div>

          <p class="text-[11px] text-slate-500">Icon terpilih saat ini: <strong class="text-primary font-mono" x-text="selectedIcon">{{ old('icon', 'academic-cap') }}</strong></p>
        </div>

        <!-- Pilihan Tema Warna Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Aksen Warna Card <span class="text-rose-500">*</span>
            </label>
            <select name="warna" x-model="selectedColor" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium">
              <option value="emerald">Emerald (Hijau Islami - Utama)</option>
              <option value="amber">Amber (Kuning Keemasan)</option>
              <option value="teal">Teal (Toska / Fasilitas)</option>
              <option value="blue">Blue (Biru Profesional / Guru)</option>
            </select>
          </div>
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Status Tampil <span class="text-rose-500">*</span>
            </label>
            <select name="aktif" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium">
              <option value="1" {{ old('aktif', '1') == '1' ? 'selected' : '' }}>Aktif (Ditampilkan)</option>
              <option value="0" {{ old('aktif') == '0' ? 'selected' : '' }}>Nonaktif (Disembunyikan)</option>
            </select>
          </div>
        </div>

        <!-- Deskripsi Lengkap -->
        <div>
          <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
            Deskripsi Penyaluran <span class="text-rose-500">*</span>
          </label>
          <textarea 
            name="deskripsi" 
            rows="4"
            placeholder="Jelaskan peruntukan dana untuk program ini secara jelas dan transparan..."
            class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white" 
            required>{{ old('deskripsi') }}</textarea>
        </div>
        
        <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
          <a href="{{ route('penyaluran-dana.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-xs hover:bg-slate-50 transition-colors">
            Batal
          </a>
          <button type="submit" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-primary text-white rounded-xl text-xs font-bold hover:bg-primary-dark transition-all shadow-md shadow-primary/20 active:scale-95 cursor-pointer">
            Simpan Program
          </button>
        </div>
      </form>
    </div>
  </section>
@endsection
