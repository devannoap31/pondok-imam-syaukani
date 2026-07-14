@extends('admin.layouts.app')

@section('title', 'Verifikasi Pendaftar (PPDB) – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
      <h3 class="text-lg font-bold font-outfit text-primary mb-6">Verifikasi & Edit Pendaftaran</h3>
      
      @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <form action="{{ route('pendaftaran.update', $pendaftar->id_pendaftaran) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Nomor Pendaftaran</label>
              <input type="text" name="nomor_pendaftaran" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-slate-50" required value="{{ old('nomor_pendaftaran', $pendaftar->nomor_pendaftaran) }}" readonly />
              <p class="text-[10px] text-slate-400 mt-1">Otomatis / Tidak dapat diubah</p>
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Status Pendaftaran</label>
              <select name="status" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white font-bold {{ $pendaftar->status == 'Diterima' ? 'text-green-600' : ($pendaftar->status == 'Ditolak' ? 'text-red-600' : 'text-yellow-600') }}" required>
                <option value="Diverifikasi" {{ old('status', $pendaftar->status) == 'Diverifikasi' ? 'selected' : '' }}>Diverifikasi (Menunggu Keputusan)</option>
                <option value="Diterima" {{ old('status', $pendaftar->status) == 'Diterima' ? 'selected' : '' }}>Diterima (Lulus)</option>
                <option value="Ditolak" {{ old('status', $pendaftar->status) == 'Ditolak' ? 'selected' : '' }}>Ditolak (Tidak Lulus)</option>
              </select>
            </div>
            
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('nama_lengkap', $pendaftar->nama_lengkap) }}" />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Jenis Kelamin</label>
              <select name="jenis_kelamin" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required>
                <option value="laki-laki" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="perempuan" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
              </select>
            </div>

            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('tempat_lahir', $pendaftar->tempat_lahir) }}" />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('tanggal_lahir', $pendaftar->tanggal_lahir) }}" />
            </div>

            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Nama Orang Tua</label>
              <input type="text" name="nama_ortu" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('nama_ortu', $pendaftar->nama_ortu) }}" />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Pekerjaan Orang Tua</label>
              <input type="text" name="pekerjaan_ortu" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('pekerjaan_ortu', $pendaftar->pekerjaan_ortu) }}" />
            </div>

            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Nomor HP / WhatsApp</label>
              <input type="text" name="nomor_hp" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('nomor_hp', $pendaftar->nomor_hp) }}" />
            </div>
            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Alamat Lengkap</label>
              <textarea name="alamat" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[50px] bg-white" required>{{ old('alamat', $pendaftar->alamat) }}</textarea>
            </div>
        </div>
        
        <div class="mt-8 border-t border-slate-200 pt-6">
            <h4 class="font-bold text-primary font-outfit mb-4">Verifikasi Berkas Lampiran</h4>
            @if(count($pendaftar->berkas) > 0)
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($pendaftar->berkas as $berkas)
                    <div class="border border-slate-200 rounded-xl p-4 flex flex-col items-center gap-3">
                        <span class="text-xs font-bold text-slate-500 uppercase">{{ $berkas->jenis_berkas }}</span>
                        <a href="{{ Storage::url($berkas->file_path) }}" target="_blank" class="text-primary hover:underline text-sm font-semibold flex flex-col items-center">
                            <span class="text-4xl mb-2">📄</span>
                            Lihat Berkas
                        </a>
                    </div>
                    @endforeach
                </div>
            @else
                <p class="text-sm text-slate-500">Pendaftar ini belum mengunggah berkas apapun.</p>
            @endif
        </div>

        <div class="mt-8">
            <button type="submit" class="inline-flex items-center justify-center px-8 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
            Simpan Verifikasi & Perubahan
            </button>
        </div>
      </form>
    </div>
  </section>
@endsection
