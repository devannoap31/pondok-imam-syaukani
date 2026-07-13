<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Pendaftaran</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-sm">
                <form action="{{ route('pendaftaran.update', $pendaftar->id_pendaftaran) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-4">
                        <div><label>Nomor Pendaftaran</label><input type="text" name="nomor_pendaftaran" value="{{ $pendaftar->nomor_pendaftaran }}" class="w-full border rounded p-2"></div>
                        <div><label>Nama Lengkap</label><input type="text" name="nama_lengkap" value="{{ $pendaftar->nama_lengkap }}" class="w-full border rounded p-2"></div>
                        <div><label>Tempat Lahir</label><input type="text" name="tempat_lahir" value="{{ $pendaftar->tempat_lahir }}" class="w-full border rounded p-2"></div>
                        <div><label>Tanggal Lahir</label><input type="date" name="tanggal_lahir" value="{{ $pendaftar->tanggal_lahir }}" class="w-full border rounded p-2"></div>
                        <div><label>Jenis Kelamin</label><select name="jenis_kelamin" class="w-full border rounded p-2"><option value="laki-laki" @selected($pendaftar->jenis_kelamin === 'laki-laki')>Laki-laki</option><option value="perempuan" @selected($pendaftar->jenis_kelamin === 'perempuan')>Perempuan</option></select></div>
                        <div><label>Nomor HP</label><input type="text" name="nomor_hp" value="{{ $pendaftar->nomor_hp }}" class="w-full border rounded p-2"></div>
                        <div><label>Nama Orang Tua</label><input type="text" name="nama_ortu" value="{{ $pendaftar->nama_ortu }}" class="w-full border rounded p-2"></div>
                        <div><label>Pekerjaan Orang Tua</label><input type="text" name="pekerjaan_ortu" value="{{ $pendaftar->pekerjaan_ortu }}" class="w-full border rounded p-2"></div>
                        <div class="col-span-2"><label>Alamat</label><textarea name="alamat" class="w-full border rounded p-2">{{ $pendaftar->alamat }}</textarea></div>
                        <div><label>Status</label><select name="status" class="w-full border rounded p-2"><option value="Diverifikasi" @selected($pendaftar->status === 'Diverifikasi')>Diverifikasi</option><option value="Diterima" @selected($pendaftar->status === 'Diterima')>Diterima</option><option value="Ditolak" @selected($pendaftar->status === 'Ditolak')>Ditolak</option></select></div>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
