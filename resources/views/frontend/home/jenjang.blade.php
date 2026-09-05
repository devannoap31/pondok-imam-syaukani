<!-- JENJANG PENDIDIKAN SECTION -->
<section class="py-20 bg-slate-50">
  <div class="max-w-[1200px] mx-auto px-6">
    <!-- Header -->
    <div class="text-center max-w-[700px] mx-auto mb-14" data-aos="fade-up">
      <div class="inline-block bg-primary-accent text-primary text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-3">
        <span>Jenjang Pendidikan</span>
      </div>
      <h2 class="text-3xl md:text-4xl font-bold font-outfit text-slate-900 mb-3">
        <span>Jenjang Pendidikan Tersedia</span>
      </h2>
      <p class="text-slate-600">
        <span>Pilihan jenjang pendidikan formal dan non-formal di PPTQ Imam Syaukani.</span>
      </p>
    </div>

    <!-- Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @php
        $icons = ['📖', '🕌', '✨', '🏫', '🎓'];
      @endphp
      @if(isset($programs) && $programs->count() > 0)
        @foreach($programs as $index => $program)
          @php
            $icon = $icons[$index % count($icons)];
            $backgrounds = [
              'from-[#e3f2fd] to-[#90caf9]',
              'from-[#e8f5e9] to-[#a5d6a7]',
              'from-[#fff3e0] to-[#ffcc80]',
            ];
            $background = $backgrounds[$index % count($backgrounds)];
          @endphp
          <div class="bg-white rounded-3xl overflow-hidden shadow-md border border-slate-200 transition-all duration-300 hover:-translate-y-3 hover:shadow-xl hover:border-primary-light flex flex-col group"
               data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 150 }}" data-aos-duration="700">
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
                <h5 class="text-slate-400 text-sm font-semibold mb-4">{{ $program->subjudul }}</h5>
              @else
                <div class="mb-4"></div>
              @endif
              <p class="text-slate-600 text-sm mb-6 leading-relaxed flex-1">
                {!! nl2br(e($program->deskripsi)) !!}
              </p>
              <div class="flex flex-col gap-2 mb-6">
                <div class="flex items-center gap-2.5 text-xs text-slate-600">
                  <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
                  <span>{{ is_array($program->keunggulan) && isset($program->keunggulan[0]) ? $program->keunggulan[0] : 'Kurikulum Terintegrasi Salaf & Modern' }}</span>
                </div>
                <div class="flex items-center gap-2.5 text-xs text-slate-600">
                  <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
                  <span>{{ is_array($program->keunggulan) && isset($program->keunggulan[1]) ? $program->keunggulan[1] : 'Bimbingan Asatidz Berpengalaman' }}</span>
                </div>
                <div class="flex items-center gap-2.5 text-xs text-slate-600">
                  <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
                  <span>{{ is_array($program->keunggulan) && isset($program->keunggulan[2]) ? $program->keunggulan[2] : 'Lingkungan Pembinaan Intensif' }}</span>
                </div>
                <div class="flex items-center gap-2.5 text-xs text-slate-600">
                  <span class="flex-shrink-0 w-[18px] h-[18px] bg-emerald-500 text-white rounded-full flex items-center justify-center font-bold text-[10px]">✓</span>
                  <span>{{ is_array($program->keunggulan) && isset($program->keunggulan[3]) ? $program->keunggulan[3] : 'Program Gratis Yatim & Dhuafa' }}</span>
                </div>
              </div>
              <a href="{{ route('sekolah.program.detail', $program) }}" class="ripple-btn mt-auto inline-flex items-center justify-center px-4 py-2.5 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all w-full">
                <span>Lihat Detail Program</span>
              </a>
            </div>
          </div>
        @endforeach
      @endif
    </div>
  </div>
</section>
