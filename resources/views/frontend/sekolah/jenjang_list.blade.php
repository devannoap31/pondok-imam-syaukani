<!-- SECTION 3: JENJANG PENDIDIKAN TERSEDIA -->
<section class="py-20 bg-white">
  <div class="max-w-[1200px] mx-auto px-6">
    <!-- Section Header -->
    <div class="border-l-[5px] border-accent pl-4 mb-10">
      <h2 class="text-3xl font-bold font-outfit text-primary mb-1.5">
        Jenjang Pendidikan Tersedia
      </h2>
      <p class="text-slate-500 text-sm sm:text-base">
        Pilihan jenjang pendidikan formal dan non-formal di PPTQ Imam Syaukani.
      </p>
    </div>

    <!-- Card List -->
    <div class="flex flex-col gap-8">
      @php
        $icons = ['🕌', '🏫', '⭐', '📖', '🎓'];
      @endphp
      @forelse($programs as $index => $program)
        @php
          $isReverse = $index % 2 !== 0;
          $icon = $icons[$index % count($icons)];
          $isAccent = ($index % 3 === 2);
        @endphp
        <div class="flex flex-col {{ $isReverse ? 'md:flex-row-reverse' : 'md:flex-row' }} rounded-3xl overflow-hidden border border-slate-200 shadow-sm bg-white transition-all duration-300 hover:-translate-y-1 hover:shadow-md hover:border-primary-light">
          <div class="w-full md:w-[220px] md:min-w-[220px] {{ $isAccent ? 'bg-accent text-primary-dark' : 'bg-primary text-white' }} flex flex-col items-center justify-center text-center p-8 font-outfit font-extrabold flex-shrink-0">
            @if($program->gambar && file_exists(public_path('storage/' . $program->gambar)))
              <img src="{{ asset('storage/' . $program->gambar) }}" alt="{{ $program->nama_program }}" class="w-16 h-16 object-contain mb-2.5 rounded-xl shadow-xs" />
            @else
              <div class="text-5xl mb-2.5">{{ $icon }}</div>
            @endif
            <h4 class="{{ $isAccent ? 'text-primary-dark' : 'text-white' }} text-xl font-bold leading-tight">{{ $program->nama_program }}</h4>
          </div>
          <div class="flex-1 p-8 flex flex-col justify-center">
            <h4 class="text-lg font-bold text-primary mb-2">{{ $program->nama_program }}</h4>
            <div class="text-slate-600 text-sm leading-relaxed mb-4">
              {!! nl2br(e($program->deskripsi)) !!}
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 pt-2 border-t border-slate-100">
              <div class="flex items-center gap-2 text-xs text-slate-600 font-semibold">
                <span class="text-emerald-500 font-bold">✓</span> Kurikulum Terintegrasi Salaf & Modern
              </div>
              <div class="flex items-center gap-2 text-xs text-slate-600 font-semibold">
                <span class="text-emerald-500 font-bold">✓</span> Bimbingan Asatidz Berpengalaman
              </div>
              <div class="flex items-center gap-2 text-xs text-slate-600 font-semibold">
                <span class="text-emerald-500 font-bold">✓</span> Lingkungan Pembinaan Intensif
              </div>
              <div class="flex items-center gap-2 text-xs text-slate-600 font-semibold">
                <span class="text-emerald-500 font-bold">✓</span> Program Gratis Yatim & Dhuafa
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="bg-slate-50 border border-slate-200 rounded-3xl p-12 text-center text-slate-500">
          <p class="text-base font-medium">Belum ada data program pendidikan yang ditambahkan.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>
