@extends('admin.layouts.app')

@section('title', 'Riwayat Donasi Masuk – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block" x-data="{
    previewModal: false,
    previewSrc: '',
    previewTitle: '',
    openPreview(src, title) {
      this.previewSrc = src;
      this.previewTitle = title;
      this.previewModal = true;
    }
  }">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
      
      @if(session('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-300 text-emerald-800 px-4.5 py-3 rounded-2xl flex items-center gap-3">
          <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span class="text-xs sm:text-sm font-semibold">{{ session('success') }}</span>
        </div>
      @endif

      <!-- STATISTIK RINGKAS DONASI -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
        <div class="bg-gradient-to-br from-primary to-primary-dark rounded-2xl p-5 text-white shadow-md shadow-primary/15">
          <div class="text-emerald-200 text-xs font-semibold uppercase tracking-wider mb-1">Total Donasi Masuk</div>
          <div class="text-2xl sm:text-3xl font-extrabold font-outfit">
            Rp {{ number_format($donasi->sum('nominal'), 0, ',', '.') }}
          </div>
          <div class="text-[11px] text-emerald-200/80 mt-1.5 flex items-center gap-1">
            <span>{{ $donasi->count() }} transaksi tercatat</span>
          </div>
        </div>
        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5">
          <div class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Transaksi Mandiri / Web</div>
          <div class="text-2xl sm:text-3xl font-extrabold font-outfit text-slate-800">
            {{ $donasi->whereNotNull('bukti_pembayaran')->count() }}
          </div>
          <div class="text-[11px] text-slate-400 mt-1.5">Dilengkapi bukti transfer</div>
        </div>
        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5">
          <div class="text-slate-500 text-xs font-semibold uppercase tracking-wider mb-1">Donasi Bulan Ini</div>
          <div class="text-2xl sm:text-3xl font-extrabold font-outfit text-primary">
            Rp {{ number_format($donasi->where('tanggal_donasi', '>=', now()->startOfMonth())->sum('nominal'), 0, ',', '.') }}
          </div>
          <div class="text-[11px] text-slate-400 mt-1.5">{{ now()->translatedFormat('F Y') }}</div>
        </div>
      </div>

      <!-- HEADER & ACTIONS -->
      <div class="flex justify-between items-center gap-4 mb-6 flex-wrap">
        <div>
          <h3 class="text-lg sm:text-xl font-bold font-outfit text-slate-800">Riwayat Donasi & Transaksi</h3>
          <p class="text-xs text-slate-500 mt-0.5">Daftar seluruh konfirmasi donasi dari donatur dan pencatatan manual.</p>
        </div>
        <div class="flex flex-wrap items-center gap-2.5">
          <a href="{{ route('rekening-bank.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-slate-200 text-slate-700 rounded-xl text-xs font-semibold hover:bg-slate-50 transition-all">
            🏦 Kelola Rekening Bank
          </a>
          <a href="{{ route('qris.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-slate-200 text-slate-700 rounded-xl text-xs font-semibold hover:bg-slate-50 transition-all">
            📱 Kelola QRIS
          </a>
          <a href="{{ route('donasi.create') }}" class="inline-flex items-center justify-center gap-1.5 px-4 py-2 bg-primary text-white rounded-xl text-xs font-bold hover:bg-primary-dark transition-all shadow-sm shadow-primary/20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Catat Donasi Manual
          </a>
        </div>
      </div>

      <!-- TABEL DATA DONASI -->
      <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
        <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
          <thead>
            <tr class="bg-primary text-white">
              <th class="p-4 font-semibold text-xs uppercase tracking-wider w-12 text-center">No</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">ID Ref & Tanggal</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Donatur & Institusi</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Nominal</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Metode & Bukti</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Peruntukan</th>
              <th class="w-36 p-4 font-semibold text-xs uppercase tracking-wider text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            @forelse ($donasi as $item)
            <tr class="even:bg-slate-50/70 hover:bg-slate-50 transition-colors">
              <td class="p-4 font-bold text-slate-700 text-center">{{ $loop->iteration }}</td>
              <td class="p-4">
                <span class="font-mono font-bold text-xs text-primary bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">
                  #{{ $item->id_transaksi }}
                </span>
                <div class="text-[11px] text-slate-400 mt-1">
                  {{ \Carbon\Carbon::parse($item->tanggal_donasi)->format('d M Y') }}
                </div>
              </td>
              <td class="p-4">
                <div class="font-bold text-slate-800 text-sm">{{ $item->nama_donatur }}</div>
                @if($item->institusi)
                  <div class="text-[11px] text-slate-500 font-medium">{{ $item->institusi }}</div>
                @endif
              </td>
              <td class="p-4">
                <span class="font-outfit font-extrabold text-sm text-emerald-700">
                  Rp {{ number_format($item->nominal, 0, ',', '.') }}
                </span>
              </td>
              <td class="p-4">
                <div class="text-xs font-semibold text-slate-700">
                  {{ $item->metode_pembayaran ?? 'Transfer Bank' }}
                </div>
                @if($item->bukti_pembayaran)
                  @php
                    $isPdf = str_ends_with(strtolower($item->bukti_pembayaran), '.pdf');
                  @endphp
                  @if($isPdf)
                    <a href="{{ route('donasi.bukti', $item->id_donasi) }}" target="_blank" class="inline-flex items-center gap-1 mt-1 text-[11px] font-bold text-emerald-700 hover:text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">
                      📄 Lihat PDF Bukti
                    </a>
                  @else
                    <button 
                      type="button" 
                      @click="openPreview('{{ route('donasi.bukti', $item->id_donasi) }}', 'Bukti Donasi: {{ $item->nama_donatur }}')"
                      class="inline-flex items-center gap-1 mt-1 text-[11px] font-bold text-primary hover:text-primary-dark bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200 cursor-pointer">
                      🖼️ Lihat Struk
                    </button>
                  @endif
                @else
                  <span class="text-[10px] text-slate-400 italic">Tanpa lampiran</span>
                @endif
              </td>
              <td class="p-4 text-slate-600 text-xs max-w-xs leading-relaxed">
                {{ $item->keterangan }}
              </td>
              <td class="p-4 text-center space-x-1">
                <a href="{{ route('donasi.show', $item->id_donasi) }}" class="inline-flex items-center justify-center p-1.5 bg-slate-100 text-slate-700 hover:bg-primary hover:text-white rounded-lg text-xs font-bold transition-all" title="Lihat Detail">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </a>
                <a href="{{ route('donasi.edit', $item->id_donasi) }}" class="inline-flex items-center justify-center p-1.5 bg-slate-100 text-slate-700 hover:bg-emerald-600 hover:text-white rounded-lg text-xs font-bold transition-all" title="Edit Data">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </a>
                <form action="{{ route('donasi.destroy', $item->id_donasi) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data donasi ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="inline-flex items-center justify-center p-1.5 bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white rounded-lg text-xs font-bold transition-all" title="Hapus Data">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                  </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="p-8 text-center text-slate-400 font-medium">Belum ada data riwayat transaksi donasi.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- MODAL PREVIEW BUKTI TRANSFER -->
    <div 
      x-show="previewModal" 
      x-cloak
      class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 sm:p-6" 
      role="dialog">
      <div 
        x-show="previewModal" 
        x-transition:enter="ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="previewModal = false" 
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs"></div>

      <div 
        x-show="previewModal"
        x-transition:enter="ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        class="relative bg-white rounded-3xl shadow-2xl border border-slate-100 max-w-lg w-full overflow-hidden z-10">
        <div class="bg-primary px-6 py-4 text-white flex items-center justify-between">
          <h4 class="font-bold text-sm text-white" x-text="previewTitle"></h4>
          <button @click="previewModal = false" class="text-white/80 hover:text-white text-lg font-bold">✕</button>
        </div>
        <div class="p-6 text-center max-h-[75vh] overflow-y-auto">
          <img :src="previewSrc" alt="Bukti Transfer" class="max-w-full h-auto mx-auto rounded-xl border border-slate-200 shadow-sm" />
          <div class="mt-4 flex justify-center gap-3">
            <a :href="previewSrc" target="_blank" download class="px-4 py-2 bg-primary text-white rounded-xl text-xs font-bold hover:bg-primary-dark transition-all">
              Unduh Gambar Asli
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
