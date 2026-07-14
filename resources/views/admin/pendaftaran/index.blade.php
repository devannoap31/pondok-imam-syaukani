@extends('admin.layouts.app')

@section('title', 'Kelola PPDB – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
      
      @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('success') }}
        </div>
      @endif

      <div class="flex justify-between items-center gap-3.5 mb-6 flex-wrap">
        <h3 class="text-lg font-bold font-outfit text-primary mb-6">Daftar Pendaftar Santri Baru (PPDB)</h3>
        <a href="{{ route('pendaftaran.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-primary text-white rounded-full text-xs font-semibold hover:bg-primary-dark transition-all">+ Tambah Pendaftar</a>
      </div>

      <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
        <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
          <thead>
            <tr class="bg-primary text-white">
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">No</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Nama Calon Santri</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Nomor Pendaftaran</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Jenis Kelamin</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Wali Santri</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">No. HP</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Status</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            @forelse ($pendaftar as $item)
            <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
              <td class="p-4">{{ $loop->iteration }}</td>
              <td class="p-4 font-semibold text-slate-800">{{ $item->nama_lengkap }}</td>
              <td class="p-4 text-slate-600">{{ $item->nomor_pendaftaran }}</td>
              <td class="p-4 text-slate-600">{{ ucfirst($item->jenis_kelamin) }}</td>
              <td class="p-4 text-slate-600">{{ $item->nama_ortu }}</td>
              <td class="p-4 text-slate-600">{{ $item->nomor_hp }}</td>
              <td class="p-4 text-slate-600">
                  <span class="px-2 py-1 rounded text-xs font-semibold 
                    {{ $item->status == 'Diterima' ? 'bg-green-100 text-green-700' : ($item->status == 'Ditolak' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                    {{ $item->status }}
                  </span>
              </td>
              <td class="p-4 space-x-2">
                <a href="{{ route('pendaftaran.edit', $item->id_pendaftaran) }}" class="inline-flex items-center justify-center px-3 py-1 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-primary-dark transition-all">Edit</a>
                <form action="{{ route('pendaftaran.destroy', $item->id_pendaftaran) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-danger hover:underline text-xs font-semibold">Hapus</button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8" class="p-4 text-center text-slate-500">Belum ada data pendaftar.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection
