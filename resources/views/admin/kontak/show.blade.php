<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Kontak</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-sm">
                <p><strong>Alamat:</strong> {{ $kontak->alamat }}</p>
                <p><strong>WhatsApp:</strong> {{ $kontak->whatsapp }}</p>
                <p><strong>Email:</strong> {{ $kontak->email }}</p>
                <p><strong>Facebook:</strong> {{ $kontak->facebook }}</p>
                <p><strong>Instagram:</strong> {{ $kontak->instagram }}</p>
                <p><strong>YouTube:</strong> {{ $kontak->youtube }}</p>
                <p><strong>Telepon:</strong> {{ $kontak->telepon }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
