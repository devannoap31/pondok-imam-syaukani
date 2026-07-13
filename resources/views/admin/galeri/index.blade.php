<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Galeri') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Daftar Galeri</h3>
                    <a href="{{ route('galeri-admin.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a>
                </div>

                @if($galeri->isEmpty())
                    <p class="text-gray-600">Belum ada data galeri.</p>
                @else
                    <table class="min-w-full border">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="border px-4 py-2">Judul</th>
                                <th class="border px-4 py-2">Tipe</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galeri as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->judul }}</td>
                                    <td class="border px-4 py-2">{{ $item->tipe }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('galeri-admin.show', $item->id_galeri) }}" class="text-blue-600 mr-2">Lihat</a>
                                        <a href="{{ route('galeri-admin.edit', $item->id_galeri) }}" class="text-yellow-600 mr-2">Edit</a>
                                        <form action="{{ route('galeri-admin.destroy', $item->id_galeri) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
