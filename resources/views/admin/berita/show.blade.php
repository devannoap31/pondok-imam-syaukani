@extends('admin.layouts.app')

@section('title', 'Detail Berita – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8 mb-8 max-w-4xl">
      <div class="flex justify-between items-center gap-3.5 mb-6 pb-4 border-b border-slate-100 flex-wrap">
        <div>
          <span class="inline-block bg-primary-accent text-primary text-xs font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-2">
            {{ $berita->kategori ?? 'Berita' }}
          </span>
          <h3 class="text-xl sm:text-2xl font-bold font-outfit text-primary">{{ $berita->judul }}</h3>
          <p class="text-xs text-slate-400 mt-1">Dipublikasikan pada: {{ \Carbon\Carbon::parse($berita->tanggal_publish)->format('d F Y') }}</p>
        </div>
        <div class="flex gap-2">
          <a href="{{ route('berita.edit', $berita->id_berita) }}" class="inline-flex items-center justify-center px-4 py-2 bg-accent text-primary-dark rounded-full text-xs font-semibold hover:bg-accent-dark transition-all">Edit Berita</a>
          <a href="{{ route('berita.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-slate-300 text-slate-700 rounded-full text-xs font-semibold hover:bg-slate-50 transition-all">Kembali</a>
        </div>
      </div>

      @if($berita->gambar)
        <div class="mb-6 rounded-2xl overflow-hidden max-h-96 bg-slate-100 flex items-center justify-center border border-slate-200">
          <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover" />
        </div>
      @endif

      <div class="prose prose-sm max-w-none text-slate-700 leading-relaxed whitespace-pre-line">
        {{ $berita->isi }}
      </div>
    </div>
  </section>
@endsection
