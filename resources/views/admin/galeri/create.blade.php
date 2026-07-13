<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Galeri</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-sm">
                <form action="{{ route('galeri-admin.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div><label>Judul</label><input type="text" name="judul" class="w-full border rounded p-2"></div>
                        <div><label>Tipe</label><select name="tipe" class="w-full border rounded p-2"><option value="foto">Foto</option><option value="video">Video</option></select></div>
                        <div class="col-span-2"><label>File</label><input type="file" name="file_path" class="w-full border rounded p-2"></div>
                        <div class="col-span-2"><label>Deskripsi</label><textarea name="deskripsi" class="w-full border rounded p-2"></textarea></div>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
