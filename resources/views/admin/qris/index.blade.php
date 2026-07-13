<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data QRIS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Daftar QRIS</h3>
                    <a href="{{ route('qris.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a>
                </div>

                @if($qris->isEmpty())
                    <p class="text-gray-600">Belum ada data QRIS.</p>
                @else
                    <table class="min-w-full border">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="border px-4 py-2">Nama Penerima</th>
                                <th class="border px-4 py-2">Status Aktif</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($qris as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->nama_penerima }}</td>
                                    <td class="border px-4 py-2">{{ $item->aktif ? 'Aktif' : 'Nonaktif' }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('qris.show', $item->id_qris) }}" class="text-blue-600 mr-2">Lihat</a>
                                        <a href="{{ route('qris.edit', $item->id_qris) }}" class="text-yellow-600 mr-2">Edit</a>
                                        <form action="{{ route('qris.destroy', $item->id_qris) }}" method="POST" class="inline">
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
