@extends('admin.layouts.app')

@section('title', 'Tambah Rekening Bank – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8 max-w-4xl">
      
      <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
        <div>
          <h3 class="text-lg sm:text-xl font-bold font-outfit text-slate-800">Tambah Rekening Bank</h3>
          <p class="text-xs text-slate-500 mt-0.5">Tambahkan rekening bank tujuan transfer donasi.</p>
        </div>
        <a href="{{ route('rekening-bank.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-600 hover:bg-slate-50 transition-all">
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

      <form action="{{ route('rekening-bank.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <!-- Nama Bank -->
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Nama Bank <span class="text-rose-500">*</span>
            </label>
            <input 
              type="text" 
              name="nama_bank" 
              placeholder="Contoh: Bank Syariah Indonesia (BSI)" 
              class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium" 
              required 
              value="{{ old('nama_bank') }}" />
          </div>

          <!-- Kode Bank (Opsional) -->
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Kode Bank (Opsional)
            </label>
            <input 
              type="text" 
              name="kode_bank" 
              placeholder="Contoh: 451" 
              class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-mono" 
              value="{{ old('kode_bank') }}" />
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <!-- Nomor Rekening -->
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Nomor Rekening <span class="text-rose-500">*</span>
            </label>
            <input 
              type="text" 
              name="nomor_rekening" 
              placeholder="Contoh: 7174567890" 
              class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-mono font-bold text-primary" 
              required 
              value="{{ old('nomor_rekening') }}" />
          </div>

          <!-- Atas Nama -->
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Atas Nama Rekening <span class="text-rose-500">*</span>
            </label>
            <input 
              type="text" 
              name="atas_nama" 
              placeholder="Contoh: PPTQ Imam Syaukani" 
              class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium" 
              required 
              value="{{ old('atas_nama') }}" />
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <!-- Urutan -->
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

          <!-- Status Tampil -->
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

        <!-- Upload Logo Bank (Opsional) -->
        <div>
          <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
            Logo Bank (Opsional)
          </label>
          <input 
            type="file" 
            name="logo" 
            accept="image/*"
            class="w-full px-4.5 py-2.5 border border-slate-300 rounded-xl text-sm bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-primary hover:file:bg-emerald-100" />
          <p class="text-[11px] text-slate-400 mt-1">Format: JPG, PNG, atau SVG (Maks. 2MB)</p>
        </div>
        
        <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
          <a href="{{ route('rekening-bank.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-xs hover:bg-slate-50 transition-colors">
            Batal
          </a>
          <button type="submit" class="inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-primary text-white rounded-xl text-xs font-bold hover:bg-primary-dark transition-all shadow-md shadow-primary/20 active:scale-95 cursor-pointer">
            Simpan Rekening
          </button>
        </div>
      </form>
    </div>
  </section>
@endsection
