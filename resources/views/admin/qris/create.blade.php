@extends('admin.layouts.app')

@section('title', 'Tambah QRIS – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8">
      <h3 class="text-lg font-bold font-outfit text-primary mb-6">Tambah Data Rekening / QRIS</h3>
      
      @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <form action="{{ route('qris.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Nama Penerima / Bank</label>
          <input type="text" name="nama_penerima" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('nama_penerima') }}" />
        </div>
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Status Aktif</label>
          <select name="aktif" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required>
            <option value="1" {{ old('aktif') == '1' ? 'selected' : '' }}>Aktif (Tampilkan di web)</option>
            <option value="0" {{ old('aktif') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
          </select>
        </div>
        <div class="form-group">
          <label class="block text-slate-700 text-xs font-bold mb-2">Upload Gambar QRIS</label>
          <input type="file" name="gambar_qris" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required accept="image/*" />
        </div>
        
        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
          Simpan Data
        </button>
      </form>
    </div>
  </section>
@endsection
