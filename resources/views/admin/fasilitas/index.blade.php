@extends('admin.layouts.app')

@section('title', 'Fasilitas & Data Statistik – Dashboard Admin')

@section('content')
<section class="admin-content-section active block">
  <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">

    <div class="flex justify-between items-center gap-3.5 mb-6 flex-wrap">
      <div>
        <h3 class="text-lg font-bold font-outfit text-primary">Fasilitas & Data Statistik Pesantren</h3>
        <p class="text-xs text-slate-400 mt-0.5">Kelola baris data, fasilitas, sarana prasarana, serta statistik riil pondok</p>
      </div>
      <a href="{{ route('fasilitas-admin.create') }}"
         class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-primary text-white rounded-full text-xs font-semibold hover:bg-primary-dark transition-all shadow-sm hover:shadow-md">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Fasilitas / Data
      </a>
    </div>

    @if(session('success'))
      <div class="mb-5 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium flex items-center gap-2.5">
        <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        {{ session('success') }}
      </div>
    @endif

    @if($fasilitas->isEmpty())
      <div class="text-center py-16">
        <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center mx-auto mb-4 text-2xl">
          🏢
        </div>
        <p class="text-slate-500 font-medium text-sm">Belum ada data fasilitas atau statistik.</p>
        <a href="{{ route('fasilitas-admin.create') }}" class="mt-3 inline-block text-primary text-sm font-semibold hover:underline">+ Tambah Data Pertama</a>
      </div>
    @else
    <div class="w-full overflow-x-auto shadow-sm rounded-2xl border border-slate-200">
      <table class="w-full border-collapse bg-white text-left text-xs sm:text-sm">
        <thead>
          <tr class="bg-primary text-white">
            <th class="w-12 p-4 font-semibold text-xs uppercase tracking-wider text-center">No</th>
            <th class="w-14 p-4 font-semibold text-xs uppercase tracking-wider text-center">Icon</th>
            <th class="w-64 p-4 font-semibold text-xs uppercase tracking-wider">Fasilitas / Kategori</th>
            <th class="p-4 font-semibold text-xs uppercase tracking-wider">Rincian Data & Detail</th>
            <th class="w-20 p-4 font-semibold text-xs uppercase tracking-wider text-center">Urutan</th>
            <th class="w-24 p-4 font-semibold text-xs uppercase tracking-wider text-center">Status</th>
            <th class="w-32 p-4 font-semibold text-xs uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          @foreach ($fasilitas as $item)
          <tr class="even:bg-slate-50 hover:bg-slate-50/50 transition-colors">
            <td class="p-4 text-center text-slate-500 font-bold">{{ $loop->iteration }}</td>
            <td class="p-4 text-center text-xl">
              {{ $item->icon ?: '🏢' }}
            </td>
            <td class="p-4">
              <div class="font-bold text-slate-800">{{ $item->nama_fasilitas }}</div>
              @if($item->deskripsi_singkat)
                <div class="text-xs text-slate-400 mt-0.5">{{ $item->deskripsi_singkat }}</div>
              @endif
            </td>
            <td class="p-4 text-slate-600 whitespace-pre-line text-xs sm:text-sm">{{ $item->detail }}</td>
            <td class="p-4 text-center font-medium text-slate-600">{{ $item->urutan }}</td>
            <td class="p-4 text-center">
              @if($item->aktif)
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-[11px] font-semibold border border-emerald-200">
                  <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                </span>
              @else
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-slate-100 text-slate-500 text-[11px] font-semibold border border-slate-200">
                  Nonaktif
                </span>
              @endif
            </td>
            <td class="p-4">
              <div class="flex items-center gap-2">
                <a href="{{ route('fasilitas-admin.edit', $item->id_fasilitas) }}"
                   class="p-1.5 bg-slate-100 hover:bg-primary hover:text-white rounded-lg transition-colors"
                   title="Edit Data">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                </a>
                <form action="{{ route('fasilitas-admin.destroy', $item->id_fasilitas) }}" method="POST"
                      id="del-form-{{ $item->id_fasilitas }}" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="button"
                          onclick="confirmDelete('{{ $item->id_fasilitas }}', '{{ addslashes($item->nama_fasilitas) }}')"
                          class="p-1.5 bg-slate-100 hover:bg-red-600 hover:text-white rounded-lg transition-colors text-slate-600"
                          title="Hapus Data">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                  </button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif

  </div>
</section>

<script>
  function confirmDelete(id, nama) {
    Swal.fire({
      title: 'Hapus Data Fasilitas?',
      text: `Data "${nama}" akan dihapus dari tabel statistik pesantren.`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#dc2626',
      cancelButtonColor: '#64748b',
      confirmButtonText: 'Ya, Hapus',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById(`del-form-${id}`).submit();
      }
    });
  }
</script>
@endsection
