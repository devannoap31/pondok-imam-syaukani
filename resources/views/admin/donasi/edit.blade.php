@extends('admin.layouts.app')

@section('title', 'Edit Donasi #' . $donasi->id_transaksi . ' – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8 max-w-4xl">
      
      <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100">
        <div>
          <h3 class="text-lg sm:text-xl font-bold font-outfit text-slate-800">Edit Data Donasi</h3>
          <p class="text-xs text-slate-500 mt-0.5">Perbarui informasi transaksi donasi #{{ $donasi->id_transaksi }}.</p>
        </div>
        <a href="{{ route('donasi.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-600 hover:bg-slate-50 transition-all">
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

      <form action="{{ route('donasi.update', $donasi->id_donasi) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <!-- ID Transaksi -->
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              ID Transaksi / No. Referensi <span class="text-rose-500">*</span>
            </label>
            <input 
              type="number" 
              name="id_transaksi" 
              class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-mono font-bold" 
              required 
              value="{{ old('id_transaksi', $donasi->id_transaksi) }}" />
          </div>

          <!-- Tanggal Donasi -->
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Tanggal Donasi <span class="text-rose-500">*</span>
            </label>
            <input 
              type="date" 
              name="tanggal_donasi" 
              class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium" 
              required 
              value="{{ old('tanggal_donasi', \Carbon\Carbon::parse($donasi->tanggal_donasi)->format('Y-m-d')) }}" />
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <!-- Nama Donatur -->
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Nama Lengkap Donatur <span class="text-rose-500">*</span>
            </label>
            <input 
              type="text" 
              name="nama_donatur" 
              placeholder="Contoh: H. Ahmad Fauzi / Hamba Allah" 
              class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium" 
              required 
              value="{{ old('nama_donatur', $donasi->nama_donatur) }}" />
          </div>

          <!-- Institusi / Lembaga -->
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Institusi / Lembaga (Opsional)
            </label>
            <input 
              type="text" 
              name="institusi" 
              placeholder="Contoh: PT Berkah Nusantara" 
              class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white" 
              value="{{ old('institusi', $donasi->institusi) }}" />
          </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <!-- Nominal Donasi -->
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Nominal Donasi (Rp) <span class="text-rose-500">*</span>
            </label>
            <div class="relative">
              <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 font-bold text-sm">Rp</span>
              <input 
                type="number" 
                name="nominal" 
                min="0"
                placeholder="100000" 
                class="w-full pl-12 pr-4 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-outfit font-extrabold text-primary" 
                required 
                value="{{ old('nominal', (int)$donasi->nominal) }}" />
            </div>
          </div>

          <!-- Metode Pembayaran -->
          <div>
            <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
              Metode Pembayaran
            </label>
            <input 
              type="text" 
              name="metode_pembayaran" 
              placeholder="Contoh: Transfer Bank BSI / Tunai / QRIS" 
              class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white font-medium" 
              value="{{ old('metode_pembayaran', $donasi->metode_pembayaran) }}" />
          </div>
        </div>

        <!-- Keterangan / Peruntukan -->
        <div>
          <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
            Keterangan / Peruntukan Donasi <span class="text-rose-500">*</span>
          </label>
          <textarea 
            name="keterangan" 
            rows="3"
            placeholder="Contoh: Infaq beras santri / Sedekah pembangunan asrama / Kafalah asatidz" 
            class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none bg-white" 
            required>{{ old('keterangan', $donasi->keterangan) }}</textarea>
        </div>

        <!-- Bukti Pembayaran / Struk -->
        <div>
          <label class="block text-slate-700 text-xs font-bold uppercase tracking-wider mb-2">
            Lampiran Bukti Transfer / Struk
          </label>
          @if($donasi->bukti_pembayaran)
            <div class="mb-3 p-3 bg-slate-50 border border-slate-200 rounded-xl flex items-center justify-between">
              <div class="flex items-center gap-3">
                <span class="text-xs font-bold text-slate-700">File Saat Ini:</span>
                <span class="text-xs text-primary font-medium">{{ basename($donasi->bukti_pembayaran) }}</span>
              </div>
              <a href="{{ Storage::url($donasi->bukti_pembayaran) }}" target="_blank" class="text-xs text-primary font-bold hover:underline">
                Lihat File
              </a>
            </div>
          @endif
          <input 
            type="file" 
            name="bukti_pembayaran" 
            accept="image/*,.pdf"
            class="w-full px-4.5 py-2.5 border border-slate-300 rounded-xl text-sm bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-emerald-50 file:text-primary hover:file:bg-emerald-100" />
          <p class="text-[11px] text-slate-400 mt-1">Format: JPG, PNG, atau PDF (Maks. 5MB). Biarkan kosong jika tidak ingin mengubah bukti.</p>
        </div>
        
        <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
          <a href="{{ route('donasi.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 font-semibold text-xs hover:bg-slate-50 transition-colors">
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
