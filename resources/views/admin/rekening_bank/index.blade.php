@extends('admin.layouts.app')

@section('title', 'Kelola Rekening Bank – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
      
      @if(session('success'))
        <div class="mb-6 bg-emerald-50 border border-emerald-300 text-emerald-800 px-4.5 py-3 rounded-2xl flex items-center gap-3">
          <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span class="text-xs sm:text-sm font-semibold">{{ session('success') }}</span>
        </div>
      @endif

      <div class="flex justify-between items-center gap-4 mb-6 flex-wrap">
        <div>
          <h3 class="text-lg sm:text-xl font-bold font-outfit text-slate-800">Daftar Rekening Bank Donasi</h3>
          <p class="text-xs text-slate-500 mt-0.5">Rekening tujuan transfer yang tampil di modal formulir donasi.</p>
        </div>
        <div class="flex items-center gap-2.5">
          <a href="{{ route('qris.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-slate-200 text-slate-600 rounded-xl text-xs font-semibold hover:bg-slate-50 transition-all">Kelola QRIS</a>
          <a href="{{ route('rekening-bank.create') }}" class="inline-flex items-center justify-center gap-1.5 px-4 py-2 bg-primary text-white rounded-xl text-xs font-bold hover:bg-primary-dark transition-all shadow-sm shadow-primary/20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Rekening Bank
          </a>
        </div>
      </div>

      <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
        <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
          <thead>
            <tr class="bg-primary text-white">
              <th class="p-4 font-semibold text-xs uppercase tracking-wider w-16 text-center">Urutan</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Nama Bank</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Nomor Rekening</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Atas Nama</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider w-24 text-center">Kode Bank</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider w-28 text-center">Status</th>
              <th class="w-36 p-4 font-semibold text-xs uppercase tracking-wider text-center">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            @forelse ($rekenings as $item)
            <tr class="even:bg-slate-50/70 hover:bg-slate-50 transition-colors">
              <td class="p-4 font-bold text-slate-700 text-center">{{ $item->urutan }}</td>
              <td class="p-4">
                <div class="flex items-center gap-3">
                  <div class="w-9 h-9 rounded-xl bg-emerald-50 border border-emerald-200 text-primary flex items-center justify-center shrink-0">
                    <x-donasi-icon name="bank" class="w-5 h-5 text-primary" />
                  </div>
                  <div>
                    <div class="font-bold font-outfit text-slate-800 text-sm">{{ $item->nama_bank }}</div>
                    @if($item->logo)
                      <img src="{{ Storage::url($item->logo) }}" alt="Logo" class="h-4 object-contain mt-1" />
                    @endif
                  </div>
                </div>
              </td>
              <td class="p-4">
                <span class="font-mono font-extrabold text-base text-primary bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-200">
                  {{ $item->nomor_rekening }}
                </span>
              </td>
              <td class="p-4 font-semibold text-slate-800">
                {{ $item->atas_nama }}
              </td>
              <td class="p-4 text-center font-mono font-bold text-slate-600">
                {{ $item->kode_bank ?? '-' }}
              </td>
              <td class="p-4 text-center">
                @if($item->aktif)
                  <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-700 border border-emerald-200">Aktif</span>
                @else
                  <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600 border border-slate-200">Nonaktif</span>
                @endif
              </td>
              <td class="p-4 text-center space-x-1.5">
                <a href="{{ route('rekening-bank.edit', $item->id_rekening) }}" class="inline-flex items-center justify-center px-3 py-1.5 bg-slate-100 text-slate-700 hover:bg-primary hover:text-white rounded-lg text-xs font-bold transition-all">Edit</a>
                <form action="{{ route('rekening-bank.destroy', $item->id_rekening) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus rekening bank ini?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="inline-flex items-center justify-center px-3 py-1.5 bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white rounded-lg text-xs font-bold transition-all">Hapus</button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="7" class="p-8 text-center text-slate-400 font-medium">Belum ada data rekening bank. Klik "Tambah Rekening Bank" untuk membuat baru.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection
