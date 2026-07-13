<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Donasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Daftar Donasi</h3>
                    <a href="{{ route('donasi.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a>
                </div>

                @if($donasi->isEmpty())
                    <p class="text-gray-600">Belum ada data donasi.</p>
                @else
                    <table class="min-w-full border">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="border px-4 py-2">Donatur</th>
                                <th class="border px-4 py-2">Nominal</th>
                                <th class="border px-4 py-2">Tanggal</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donasi as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->nama_donatur }}</td>
                                    <td class="border px-4 py-2">{{ number_format($item->nominal, 0, ',', '.') }}</td>
                                    <td class="border px-4 py-2">{{ $item->tanggal_donasi->format('d-m-Y') }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('donasi.show', $item->id_donasi) }}" class="text-blue-600 mr-2">Lihat</a>
                                        <a href="{{ route('donasi.edit', $item->id_donasi) }}" class="text-yellow-600 mr-2">Edit</a>
                                        <form action="{{ route('donasi.destroy', $item->id_donasi) }}" method="POST" class="inline">
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
