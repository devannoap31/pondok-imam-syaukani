<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Kontak') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Daftar Kontak</h3>
                    <a href="{{ route('kontak-admin.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</a>
                </div>

                @if(!$kontak)
                    <p class="text-gray-600">Belum ada data kontak.</p>
                @else
                    <div class="space-y-2">
                        <p><strong>Alamat:</strong> {{ $kontak->alamat }}</p>
                        <p><strong>WhatsApp:</strong> {{ $kontak->whatsapp }}</p>
                        <p><strong>Email:</strong> {{ $kontak->email }}</p>
                        <p><strong>Telepon:</strong> {{ $kontak->telepon }}</p>
                        <div class="mt-4">
                            <a href="{{ route('kontak-admin.edit', $kontak->id_kontak) }}" class="text-yellow-600 mr-2">Edit</a>
                            <form action="{{ route('kontak-admin.destroy', $kontak->id_kontak) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Hapus</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
