@extends('admin.layouts.app')

@section('title', 'Detail Berita: ' . $berita->judul . ' – Dashboard Admin')

@section('content')
  <section class="admin-content-section active block">
    
    <!-- HEADER BREADCRUMB & ACTIONS -->
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
      <div>
        <div class="flex items-center gap-2 text-xs font-semibold text-slate-400 mb-1">
          <a href="{{ route('berita.index') }}" class="hover:text-primary transition-colors flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            Kelola Berita
          </a>
          <svg class="w-3 h-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
          <span class="text-primary font-bold">Detail Berita</span>
        </div>
        <h3 class="text-xl sm:text-2xl font-bold font-outfit text-slate-800">Detail Berita</h3>
        <p class="text-xs text-slate-500 mt-0.5">Pratinjau lengkap isi konten dan informasi meta berita.</p>
      </div>

      <div class="flex items-center gap-2.5 flex-wrap">
        <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 px-4 py-2 border border-slate-300 text-slate-700 bg-white hover:bg-slate-50 rounded-xl text-xs font-semibold shadow-xs transition-all">
          <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
          Kembali
        </a>

        <a href="{{ route('berita.detail', $berita->slug) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 border border-emerald-200 text-primary bg-emerald-50 hover:bg-emerald-100 rounded-xl text-xs font-bold transition-all">
          <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
          Lihat di Web
        </a>

        <a href="{{ route('berita.edit', $berita) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-accent hover:bg-accent-dark text-primary-dark rounded-xl text-xs font-bold transition-all shadow-xs">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
          Edit Berita
        </a>

        <form action="{{ route('berita.destroy', $berita) }}" method="POST" class="inline-block" onsubmit="return confirmDelete(event, 'berita ini');">
          @csrf
          @method('DELETE')
          <button type="submit" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200 rounded-xl text-xs font-bold transition-all cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
            Hapus
          </button>
        </form>
      </div>
    </div>

    <!-- CONTENT GRID -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      
      <!-- MAIN CONTAINER (2 cols) -->
      <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 sm:p-8">
          
          <!-- Category & Date Header -->
          <div class="flex items-center justify-between gap-3 mb-4 flex-wrap">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-primary text-xs font-bold uppercase tracking-wider">
              🏷️ {{ $berita->kategori ?? 'Umum' }}
            </span>
            <div class="text-xs font-medium text-slate-400 flex items-center gap-1.5">
              <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
              <span>Dipublikasikan: {{ \Carbon\Carbon::parse($berita->tanggal_publish)->format('d F Y') }}</span>
            </div>
          </div>

          <!-- Title -->
          <h1 class="text-xl sm:text-2xl md:text-3xl font-extrabold font-outfit text-slate-900 leading-tight mb-6">
            {{ $berita->judul }}
          </h1>

          <!-- Featured Image -->
          @if($berita->gambar)
            <div class="mb-8 rounded-2xl overflow-hidden border border-slate-200 shadow-sm bg-slate-100 max-h-[420px] group">
              <img 
                src="{{ asset('storage/' . $berita->gambar) }}" 
                alt="{{ $berita->judul }}" 
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
              />
            </div>
          @endif

          <!-- Body Content -->
          <div class="prose prose-slate max-w-none text-slate-700 leading-relaxed text-sm sm:text-base whitespace-pre-line space-y-4">
            {{ $berita->isi }}
          </div>

        </div>
      </div>

      <!-- SIDEBAR INFO (1 col) -->
      <div class="space-y-6">
        <!-- Meta Details Card -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6 space-y-4">
          <h4 class="text-sm font-bold font-outfit text-slate-900 pb-3 border-b border-slate-100 flex items-center gap-2">
            <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Informasi Berita
          </h4>

          <div class="space-y-3 text-xs">
            <div>
              <span class="text-slate-400 block mb-0.5">Penulis / Administrator</span>
              <span class="font-semibold text-slate-800 flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                {{ $berita->user->name ?? 'Admin Portal' }}
              </span>
            </div>

            <div>
              <span class="text-slate-400 block mb-0.5">Slug URL</span>
              <code class="block p-2 rounded-lg bg-slate-50 border border-slate-200 text-slate-700 font-mono text-[11px] break-all select-all">
                {{ $berita->slug }}
              </code>
            </div>

            <div>
              <span class="text-slate-400 block mb-0.5">ID Berita Database</span>
              <span class="font-semibold text-slate-800">#{{ $berita->id_berita }}</span>
            </div>

            <div>
              <span class="text-slate-400 block mb-0.5">Dibuat Pada</span>
              <span class="font-semibold text-slate-800">{{ $berita->created_at ? $berita->created_at->format('d M Y, H:i') : '-' }}</span>
            </div>

            <div>
              <span class="text-slate-400 block mb-0.5">Terakhir Diperbarui</span>
              <span class="font-semibold text-slate-800">{{ $berita->updated_at ? $berita->updated_at->format('d M Y, H:i') : '-' }}</span>
            </div>
          </div>

          <div class="pt-4 border-t border-slate-100">
            <button 
              type="button" 
              onclick="navigator.clipboard.writeText('{{ route('berita.detail', $berita->slug) }}'); alert('Tautan berita berhasil disalin!');" 
              class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-semibold transition-colors cursor-pointer"
            >
              <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
              Salin Tautan Publik
            </button>
          </div>
        </div>

        <!-- Quick Tips / Help -->
        <div class="bg-gradient-to-br from-primary-dark to-primary text-white rounded-3xl p-6 shadow-sm relative overflow-hidden">
          <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-accent/20 rounded-full blur-xl pointer-events-none"></div>
          <span class="text-accent text-xs font-bold uppercase tracking-wider block mb-1">💡 Tips Admin</span>
          <p class="text-xs text-white/80 leading-relaxed mb-3">
            Gunakan tombol <strong>Edit Berita</strong> di atas untuk memperbarui judul, isi, kategori, atau foto sampul berita ini.
          </p>
          <a href="{{ route('berita.edit', $berita) }}" class="inline-flex items-center gap-1 text-xs font-bold text-accent hover:underline">
            Buka Form Edit →
          </a>
        </div>
      </div>

    </div>
  </section>
@endsection