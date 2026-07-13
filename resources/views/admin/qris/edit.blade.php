<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit QRIS</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-sm">
                <form action="{{ route('qris.update', $qris->id_qris) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-4">
                        <div><label>Nama Penerima</label><input type="text" name="nama_penerima" value="{{ $qris->nama_penerima }}" class="w-full border rounded p-2"></div>
                        <div><label>Gambar QRIS</label><input type="file" name="gambar_qris" class="w-full border rounded p-2"></div>
                        <div><label>Status Aktif</label><select name="aktif" class="w-full border rounded p-2"><option value="1" @selected($qris->aktif)>Aktif</option><option value="0" @selected(!$qris->aktif)>Nonaktif</option></select></div>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
