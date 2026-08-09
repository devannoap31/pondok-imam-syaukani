<!-- SEJARAH SECTION -->
<section class="py-20 bg-white">
  <div class="max-w-[1200px] mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
    <!-- Content -->
    <div>
      <div class="inline-block bg-primary-accent text-primary text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-3">
        Sejarah Pondok
      </div>
      <h2 class="text-3xl md:text-4xl font-bold font-outfit text-primary mb-5">
        Latar Belakang & Sejarah Pendirian
      </h2>
      @if($profil)
        <div class="text-slate-600 leading-relaxed prose prose-sm">
          {!! nl2br(e($profil->sejarah)) !!}
        </div>
      @else
        <p class="text-slate-600 mb-5 leading-relaxed">
          Data sejarah pondok tidak tersedia.
        </p>
      @endif
    </div>
    <!-- Image -->
    <div class="w-full overflow-hidden rounded-3xl border-4 border-slate-100 shadow-lg bg-white">
      @if($profil && $profil->logo)
        <img src="{{ asset('storage/' . $profil->logo) }}" alt="{{ $profil->nama_pondok }}" class="w-full h-[300px] md:h-[350px] object-contain p-8 bg-white" />
      @else
        <div class="rounded-3xl w-full h-[300px] md:h-[350px] bg-gray-200 flex items-center justify-center">
          <span class="text-gray-500">Logo tidak tersedia</span>
        </div>
      @endif
    </div>
  </div>
</section>
