<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail QRIS</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-sm">
                <p><strong>Nama Penerima:</strong> {{ $qris->nama_penerima }}</p>
                <p><strong>Status:</strong> {{ $qris->aktif ? 'Aktif' : 'Nonaktif' }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
