<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Kontak</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-sm">
                <form action="{{ route('kontak-admin.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2"><label>Alamat</label><textarea name="alamat" class="w-full border rounded p-2"></textarea></div>
                        <div><label>WhatsApp</label><input type="text" name="whatsapp" class="w-full border rounded p-2"></div>
                        <div><label>Email</label><input type="email" name="email" class="w-full border rounded p-2"></div>
                        <div><label>Facebook</label><input type="text" name="facebook" class="w-full border rounded p-2"></div>
                        <div><label>Instagram</label><input type="text" name="instagram" class="w-full border rounded p-2"></div>
                        <div><label>YouTube</label><input type="text" name="youtube" class="w-full border rounded p-2"></div>
                        <div><label>Telepon</label><input type="text" name="telepon" class="w-full border rounded p-2"></div>
                        <div class="col-span-2"><label>Maps Embed</label><textarea name="maps_embed" class="w-full border rounded p-2"></textarea></div>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
