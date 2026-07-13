<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Galeri</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-sm">
                <p><strong>Judul:</strong> {{ $galeri->judul }}</p>
                <p><strong>Tipe:</strong> {{ $galeri->tipe }}</p>
                <p><strong>Deskripsi:</strong> {{ $galeri->deskripsi }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
