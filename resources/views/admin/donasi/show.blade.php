<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Donasi</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-sm">
                <p><strong>Nama Donatur:</strong> {{ $donasi->nama_donatur }}</p>
                <p><strong>Nominal:</strong> {{ number_format($donasi->nominal, 0, ',', '.') }}</p>
                <p><strong>Tanggal Donasi:</strong> {{ $donasi->tanggal_donasi->format('d-m-Y H:i') }}</p>
                <p><strong>ID Transaksi:</strong> {{ $donasi->id_transaksi }}</p>
                <p><strong>Keterangan:</strong> {{ $donasi->keterangan }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
