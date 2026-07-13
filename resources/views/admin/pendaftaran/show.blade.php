<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Pendaftaran</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow-sm">
                <p><strong>Nomor Pendaftaran:</strong> {{ $pendaftar->nomor_pendaftaran }}</p>
                <p><strong>Nama Lengkap:</strong> {{ $pendaftar->nama_lengkap }}</p>
                <p><strong>Tempat, Tanggal Lahir:</strong> {{ $pendaftar->tempat_lahir }}, {{ $pendaftar->tanggal_lahir }}</p>
                <p><strong>Jenis Kelamin:</strong> {{ $pendaftar->jenis_kelamin }}</p>
                <p><strong>Alamat:</strong> {{ $pendaftar->alamat }}</p>
                <p><strong>Nomor HP:</strong> {{ $pendaftar->nomor_hp }}</p>
                <p><strong>Nama Orang Tua:</strong> {{ $pendaftar->nama_ortu }}</p>
                <p><strong>Pekerjaan Orang Tua:</strong> {{ $pendaftar->pekerjaan_ortu }}</p>
                <p><strong>Status:</strong> {{ $pendaftar->status }}</p>

                <div class="mt-6">
                    <h3 class="font-semibold text-lg mb-3">Berkas Pendaftaran</h3>
                    @if($pendaftar->berkas->isEmpty())
                        <p class="text-gray-600">Belum ada berkas yang diunggah.</p>
                    @else
                        <ul class="space-y-2">
                            @foreach($pendaftar->berkas as $berkas)
                                <li class="border rounded p-3 flex items-center justify-between gap-3">
                                    <span>{{ $berkas->jenis_berkas }}</span>
                                    <div class="space-x-3">
                                        <a href="{{ route('pendaftaran.berkas.view', [$pendaftar->id_pendaftaran, $berkas->id_berkas_pendaftaran]) }}" class="text-blue-600">Lihat</a>
                                        <a href="{{ route('pendaftaran.berkas.download', [$pendaftar->id_pendaftaran, $berkas->id_berkas_pendaftaran]) }}" class="text-green-600">Unduh</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
