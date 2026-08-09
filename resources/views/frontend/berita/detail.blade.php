@extends('frontend.layouts.app', ['activePage' => 'news'])

@php use Illuminate\Support\Str; @endphp

@section('title', $berita->judul)
@section('meta_description', Str::limit(strip_tags($berita->isi), 160))

@section('content')
  <!-- PAGE HEADER -->
  <section class="bg-gradient-to-br from-primary-dark to-primary py-16 text-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <div class="flex flex-col gap-3 items-center">
        <div class="text-xs uppercase tracking-[1.5px] font-bold bg-white/10 px-4 py-1.5 rounded-full">{{ $berita->kategori ?? 'Berita' }}</div>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-outfit text-white text-center">{{ $berita->judul }}</h1>
        <div class="flex flex-wrap gap-3 text-sm text-white/80">
          <span>📅 {{ optional($berita->tanggal_publish)->format('d M Y') }}</span>
          <span>✍️ Oleh Admin</span>
        </div>
      </div>
    </div>
  </section>

  <section class="py-20 bg-white">
    <div class="max-w-[1000px] mx-auto px-6">
      <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
        @if($berita->gambar)
          <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-[420px] object-cover" />
        @endif
        <div class="p-8">
          <div class="prose prose-slate max-w-none">
            {!! nl2br(e($berita->isi)) !!}
          </div>
        </div>
      </div>

      <div class="mt-10 grid grid-cols-1 lg:grid-cols-[1fr_320px] gap-8">
        <div></div>
        <aside class="space-y-6">
          <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-6">
            <h3 class="text-base font-bold text-primary mb-4">Berita Terbaru</h3>
            <ul class="space-y-4">
              @foreach($recentBeritas as $recent)
                <li>
                  <a href="{{ route('berita.detail', $recent->slug) }}" class="block text-sm font-semibold text-slate-800 hover:text-primary transition-colors">
                    {{ Str::limit($recent->judul, 60) }}
                  </a>
                  <div class="text-[11px] text-slate-500">{{ optional($recent->tanggal_publish)->format('d M Y') }}</div>
                </li>
              @endforeach
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
@endsection
