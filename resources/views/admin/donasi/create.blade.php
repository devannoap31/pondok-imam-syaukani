<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Donasi</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-sm">
                <form action="{{ route('donasi.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div><label>Nama Donatur</label><input type="text" name="nama_donatur" class="w-full border rounded p-2"></div>
                        <div><label>Nominal</label><input type="number" name="nominal" class="w-full border rounded p-2"></div>
                        <div><label>Tanggal Donasi</label><input type="datetime-local" name="tanggal_donasi" class="w-full border rounded p-2"></div>
                        <div><label>ID Transaksi</label><input type="number" name="id_transaksi" class="w-full border rounded p-2"></div>
                        <div class="col-span-2"><label>Keterangan</label><textarea name="keterangan" class="w-full border rounded p-2"></textarea></div>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
