@extends('admin.layouts.app')

@section('title', 'Detail Donasi #' . $donasi->id_transaksi . ' – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8 max-w-4xl">
      
      <div class="flex items-center justify-between mb-6 pb-4 border-b border-slate-100 flex-wrap gap-4">
        <div class="flex items-center gap-3">
          <div class="w-12 h-12 rounded-2xl bg-emerald-50 border border-emerald-200 text-primary flex items-center justify-center font-bold text-xl">
            <x-donasi-icon name="clipboard" class="w-6 h-6 text-primary" />
          </div>
          <div>
            <div class="flex items-center gap-2">
              <h3 class="text-lg sm:text-xl font-bold font-outfit text-slate-800">Detail Transaksi Donasi</h3>
              <span class="px-2.5 py-0.5 rounded-full text-xs font-mono font-bold bg-emerald-100 text-emerald-800">#{{ $donasi->id_transaksi }}</span>
            </div>
            <p class="text-xs text-slate-500 mt-0.5">Tercatat pada {{ \Carbon\Carbon::parse($donasi->tanggal_donasi)->translatedFormat('l, d F Y') }}</p>
          </div>
        </div>
        <div class="flex items-center gap-2">
          <a href="{{ route('donasi.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl border border-slate-200 text-xs font-semibold text-slate-600 hover:bg-slate-50 transition-all">
            ← Kembali ke Daftar
          </a>
          <a href="{{ route('donasi.edit', $donasi->id_donasi) }}" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-primary text-white text-xs font-bold hover:bg-primary-dark transition-all shadow-sm">
            Edit Data
          </a>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- KOLOM 1: DATA DONATUR & TRANSAKSI -->
        <div class="space-y-4">
          <div class="bg-slate-50 rounded-2xl p-5 border border-slate-200/80 space-y-3">
            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-500 pb-2 border-b border-slate-200">
              Informasi Donatur
            </h4>
            <div class="space-y-2 text-xs">
              <div class="flex justify-between">
                <span class="text-slate-500">Nama Lengkap:</span>
                <span class="font-bold text-slate-800">{{ $donasi->nama_donatur }}</span>
              </div>
              @if($donasi->institusi)
              <div class="flex justify-between">
                <span class="text-slate-500">Institusi / Lembaga:</span>
                <span class="font-semibold text-slate-800">{{ $donasi->institusi }}</span>
              </div>
              @endif
              <div class="flex justify-between">
                <span class="text-slate-500">Tanggal Donasi:</span>
                <span class="font-medium text-slate-800">{{ \Carbon\Carbon::parse($donasi->tanggal_donasi)->format('d M Y H:i') }}</span>
              </div>
            </div>
          </div>

          <div class="bg-emerald-50/70 rounded-2xl p-5 border border-emerald-200/80 space-y-3">
            <h4 class="text-xs font-bold uppercase tracking-wider text-emerald-800 pb-2 border-b border-emerald-200">
              Nominal & Pembayaran
            </h4>
            <div class="space-y-2.5 text-xs">
              <div>
                <span class="text-slate-500 block mb-0.5">Nominal Disalurkan:</span>
                <span class="font-outfit font-extrabold text-2xl text-primary">
                  Rp {{ number_format($donasi->nominal, 0, ',', '.') }}
                </span>
              </div>
              <div class="flex justify-between pt-2 border-t border-emerald-200/60">
                <span class="text-slate-500">Metode Penyaluran:</span>
                <span class="font-bold text-slate-800">{{ $donasi->metode_pembayaran ?? 'Transfer Bank' }}</span>
              </div>
              <div class="pt-2 border-t border-emerald-200/60">
                <span class="text-slate-500 block mb-1">Peruntukan / Pesan:</span>
                <p class="text-slate-700 bg-white p-3 rounded-xl border border-emerald-200/80 leading-relaxed font-medium">
                  {{ $donasi->keterangan }}
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- KOLOM 2: BUKTI PEMBAYARAN -->
        <div>
          <div class="bg-slate-50 rounded-2xl p-5 border border-slate-200/80 h-full flex flex-col">
            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-500 pb-2 border-b border-slate-200 mb-4">
              Bukti Transfer / Pembayaran
            </h4>

            @if($donasi->bukti_pembayaran)
              @php
                $isPdf = str_ends_with(strtolower($donasi->bukti_pembayaran), '.pdf');
              @endphp

              @if($isPdf)
                <div class="flex-1 flex flex-col items-center justify-center p-6 bg-white rounded-2xl border border-slate-200 text-center">
                  <div class="w-16 h-16 rounded-2xl bg-rose-50 text-rose-600 flex items-center justify-center text-3xl font-bold mb-3">
                    PDF
                  </div>
                  <p class="text-xs font-bold text-slate-800 mb-1">Dokumen Struk / Bukti Transfer</p>
                  <p class="text-[11px] text-slate-400 mb-4">{{ basename($donasi->bukti_pembayaran) }}</p>
                  <a href="{{ route('donasi.bukti', $donasi->id_donasi) }}" target="_blank" class="px-5 py-2.5 bg-primary text-white rounded-xl text-xs font-bold hover:bg-primary-dark transition-all shadow-sm">
                    Buka Dokumen PDF
                  </a>
                </div>
              @else
                <div class="flex-1 flex flex-col items-center justify-center">
                  <div class="relative group overflow-hidden rounded-2xl border border-slate-200 bg-white p-2 shadow-sm mb-4">
                    <img src="{{ route('donasi.bukti', $donasi->id_donasi) }}" alt="Bukti Transfer" class="max-h-80 w-auto object-contain rounded-xl" />
                  </div>
                  <a href="{{ route('donasi.bukti', $donasi->id_donasi) }}" target="_blank" download class="px-5 py-2.5 bg-primary text-white rounded-xl text-xs font-bold hover:bg-primary-dark transition-all shadow-sm">
                    Unduh Gambar Bukti
                  </a>
                </div>
              @endif
            @else
              <div class="flex-1 flex flex-col items-center justify-center p-8 text-center text-slate-400">
                <svg class="w-12 h-12 text-slate-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p class="text-xs font-medium">Tidak ada lampiran bukti transfer untuk donasi ini (pencatatan manual / offline).</p>
              </div>
            @endif
          </div>
        </div>

      </div>

    </div>
  </section>
@endsection
