<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pendaftaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Daftar Pendaftar</h3>
                    <a href="{{ route('pendaftaran.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a>
                </div>

                @if($pendaftar->isEmpty())
                    <p class="text-gray-600">Belum ada data pendaftaran.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full border">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="border px-4 py-2">Nama</th>
                                    <th class="border px-4 py-2">Nomor</th>
                                    <th class="border px-4 py-2">Status</th>
                                    <th class="border px-4 py-2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendaftar as $item)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $item->nama_lengkap }}</td>
                                        <td class="border px-4 py-2">{{ $item->nomor_pendaftaran }}</td>
                                        <td class="border px-4 py-2">{{ $item->status }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('pendaftaran.show', $item->id_pendaftaran) }}" class="text-blue-600 mr-2">Lihat</a>
                                            <a href="{{ route('pendaftaran.edit', $item->id_pendaftaran) }}" class="text-yellow-600 mr-2">Edit</a>
                                            <form action="{{ route('pendaftaran.destroy', $item->id_pendaftaran) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
