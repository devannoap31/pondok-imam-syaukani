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

    <!-- Card Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @php
        $icons = ['📖', '🕌', '✨', '🏫', '🎓'];
      @endphp
      @forelse($programs as $index => $program)
        @php
          $icon = $icons[$index % count($icons)];
          $backgrounds = [
            'from-[#e3f2fd] to-[#90caf9]',
            'from-[#e8f5e9] to-[#a5d6a7]',
            'from-[#fff3e0] to-[#ffcc80]',
          ];
          $background = $backgrounds[$index % count($backgrounds)];
        @endphp
        <div class="bg-white rounded-3xl overflow-hidden shadow-md border border-slate-200 transition-all duration-300 hover:-translate-y-3 hover:shadow-xl hover:border-primary-light flex flex-col group">
          <div class="h-48 flex items-center justify-center text-6xl bg-gradient-to-br {{ $background }} relative overflow-hidden">
            @if($program->gambar && file_exists(public_path('storage/' . $program->gambar)))
              <img src="{{ asset('storage/' . $program->gambar) }}" alt="{{ $program->nama_program }}" class="w-20 h-20 object-contain rounded-xl transition-transform duration-500 group-hover:scale-125 group-hover:rotate-6" />
            @else
              <span class="transition-transform duration-500 group-hover:scale-125 group-hover:rotate-6 inline-block">{{ $icon }}</span>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-primary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
          </div>
          <div class="p-8 flex-1 flex flex-col">
            <h3 class="text-2xl font-bold font-outfit text-primary mb-1">{{ $program->nama_program }}</h3>
            @if($program->subjudul)
              <p class="text-slate-400 text-sm font-semibold mb-4">{{ $program->subjudul }}</p>
            @else
              <div class="mb-4"></div>
            @endif
            <div class="text-slate-600 text-sm leading-relaxed mb-6 flex-1">
              {!! nl2br(e($program->deskripsi)) !!}
            </div>
            <div class="flex flex-col gap-2 mb-6">
              <div class="flex items-center gap-2.5 text-xs text-slate-600">
                <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
                <span>{{ $program->keunggulan[0] ?? 'Kurikulum Terintegrasi Salaf & Modern' }}</span>
              </div>
              <div class="flex items-center gap-2.5 text-xs text-slate-600">
                <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
                <span>{{ $program->keunggulan[1] ?? 'Bimbingan Asatidz Berpengalaman' }}</span>
              </div>
              <div class="flex items-center gap-2.5 text-xs text-slate-600">
                <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
                <span>{{ $program->keunggulan[2] ?? 'Lingkungan Pembinaan Intensif' }}</span>
              </div>
              <div class="flex items-center gap-2.5 text-xs text-slate-600">
                <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
                <span>{{ $program->keunggulan[3] ?? 'Program Gratis Yatim & Dhuafa' }}</span>
              </div>
            </div>
            <a href="{{ route('sekolah.program.detail', $program) }}" class="ripple-btn mt-auto inline-flex items-center justify-center px-4 py-2.5 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all w-full">
              <span>Detail Program</span>
            </a>
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
