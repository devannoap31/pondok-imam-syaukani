@extends('admin.layouts.app')

@section('title', 'Kelola Berita – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
      
      @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('success') }}
        </div>
      @endif

      <div class="flex justify-between items-center gap-3.5 mb-6 flex-wrap">
        <h3 class="text-lg font-bold font-outfit text-primary">Data Berita & Sorotan Kegiatan</h3>
        <a href="{{ route('berita.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-primary text-white rounded-full text-xs font-semibold hover:bg-primary-dark transition-all">+ Tambah Berita Baru</a>
      </div>
      <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
        <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
          <thead>
            <tr class="bg-primary text-white">
              <th class="w-16 p-4 font-semibold text-xs uppercase tracking-wider">No</th>
              <th class="p-4 font-semibold text-xs uppercase tracking-wider">Judul Berita</th>
              <th class="w-32 p-4 font-semibold text-xs uppercase tracking-wider">Tgl Publish</th>
              <th class="w-40 p-4 font-semibold text-xs uppercase tracking-wider">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            @forelse ($berita as $item)
            <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
              <td class="p-4">{{ $loop->iteration }}</td>
              <td class="p-4 whitespace-normal min-w-[220px] font-semibold text-slate-800">{{ $item->judul }}</td>
              <td class="p-4 text-slate-600">{{ \Carbon\Carbon::parse($item->tanggal_publish)->format('d M Y') }}</td>
              <td class="p-4 space-x-2">
                <a href="{{ route('berita.edit', $item->id) }}" class="inline-flex items-center justify-center px-3 py-1 border border-primary text-primary rounded-lg text-xs font-semibold hover:bg-primary hover:text-white transition-all">Edit</a>
                <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-danger hover:underline text-xs font-semibold">Hapus</button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="p-4 text-center text-slate-500">Belum ada berita.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection
