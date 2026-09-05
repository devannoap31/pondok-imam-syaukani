@extends('admin.layouts.app')

@section('title', 'Kelola Dewan Asatidz – Dashboard Admin')

@section('content')
<section class="admin-content-section active block">
  <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">

    <div class="flex justify-between items-center gap-3.5 mb-6 flex-wrap">
      <div>
        <h3 class="text-lg font-bold font-outfit text-primary">Kelola Dewan Asatidz</h3>
        <p class="text-xs text-slate-400 mt-0.5">Kelola data ustadz / pengajar pondok pesantren</p>
      </div>
      <a href="{{ route('ustadz-admin.create') }}"
         class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-primary text-white rounded-full text-xs font-semibold hover:bg-primary-dark transition-all shadow-sm hover:shadow-md">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Ustadz
      </a>
    </div>

    @if($ustadzs->isEmpty())
      <div class="text-center py-16">
        <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-4">
          <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
          </svg>
        </div>
        <p class="text-slate-500 font-medium text-sm">Belum ada data ustadz.</p>
        <a href="{{ route('ustadz-admin.create') }}" class="mt-3 inline-block text-primary text-sm font-semibold hover:underline">+ Tambah Ustadz Pertama</a>
      </div>
    @else
    <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
      <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
        <thead>
          <tr class="bg-primary text-white">
            <th class="w-12 p-4 font-semibold text-xs uppercase tracking-wider">No</th>
            <th class="w-16 p-4 font-semibold text-xs uppercase tracking-wider">Foto</th>
            <th class="p-4 font-semibold text-xs uppercase tracking-wider">Nama</th>
            <th class="p-4 font-semibold text-xs uppercase tracking-wider">Jabatan</th>
            <th class="w-20 p-4 font-semibold text-xs uppercase tracking-wider text-center">Urutan</th>
            <th class="w-24 p-4 font-semibold text-xs uppercase tracking-wider text-center">Status</th>
            <th class="w-32 p-4 font-semibold text-xs uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          @foreach ($ustadzs as $item)
          <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
            <td class="p-4 text-slate-500">{{ $loop->iteration }}</td>
            <td class="p-4">
              @if($item->foto)
                <img src="{{ Storage::url($item->foto) }}" alt="{{ $item->nama }}"
                     class="w-11 h-11 rounded-xl object-cover object-top border border-slate-200 shadow-sm"/>
              @else
                <div class="w-11 h-11 rounded-xl bg-slate-100 flex items-center justify-center border border-slate-200">
                  <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                  </svg>
                </div>
              @endif
            </td>
            <td class="p-4">
              <div class="font-semibold text-slate-800">{{ $item->nama }}{{ $item->gelar ? ', ' . $item->gelar : '' }}</div>
            </td>
            <td class="p-4 text-slate-600">{{ $item->jabatan }}</td>
            <td class="p-4 text-center text-slate-600">{{ $item->urutan }}</td>
            <td class="p-4 text-center">
              @if($item->aktif)
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[11px] font-semibold border border-emerald-200">
                  <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Aktif
                </span>
              @else
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-slate-50 text-slate-500 text-[11px] font-semibold border border-slate-200">
                  <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>Nonaktif
                </span>
              @endif
            </td>
            <td class="p-4 space-x-2">
              <a href="{{ route('ustadz-admin.edit', $item) }}"
                 class="inline-flex items-center justify-center px-3 py-1.5 border border-primary text-primary rounded-lg text-xs font-semibold hover:bg-primary hover:text-white transition-all">
                Edit
              </a>
              <form action="{{ route('ustadz-admin.destroy', $item) }}" method="POST" class="inline-block"
                    onsubmit="return confirmDelete(event, '{{ addslashes($item->nama) }}')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-danger hover:underline text-xs font-semibold">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif

  </div>
</section>
@endsection
