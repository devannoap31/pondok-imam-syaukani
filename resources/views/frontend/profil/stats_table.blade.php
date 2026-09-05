<!-- FASILITAS & DATA STATISTIK TABLE -->
<section id="fasilitas" class="py-20 bg-white border-t border-slate-100">
  <div class="max-w-[1200px] mx-auto px-6">

    <!-- Header -->
    <div class="text-center max-w-[700px] mx-auto mb-14" data-aos="fade-up">
      <div class="inline-block bg-primary-accent text-primary text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-3">
        Data Riil Pondok
      </div>
      <h2 class="text-3xl md:text-4xl font-bold font-outfit text-slate-900 mb-3">
        Fasilitas & Data Statistik Pesantren
      </h2>
      <p class="text-slate-500 text-sm md:text-base">
        Informasi transparan mengenai sarana prasarana, fasilitas, serta data demografi santri di PPTQ Imam Syaukani saat ini.
      </p>
    </div>

    <!-- Quick Stats Metric Cards -->
    @php
      $luasItem     = isset($fasilitas) ? $fasilitas->first(fn($f) => stripos($f->nama_fasilitas, 'luas') !== false) : null;
      $santriItem   = isset($fasilitas) ? $fasilitas->first(fn($f) => stripos($f->nama_fasilitas, 'santri saat ini') !== false) : null;
      $pengajarItem = isset($fasilitas) ? $fasilitas->first(fn($f) => stripos($f->nama_fasilitas, 'pengajar') !== false) : null;
    @endphp
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-12" data-aos="fade-up" data-aos-delay="50">
      <!-- Stat 1 -->
      <div class="bg-gradient-to-br from-emerald-50 to-slate-50 border border-emerald-100/80 rounded-2xl p-5 sm:p-6 shadow-xs hover:shadow-md transition-shadow">
        <div class="w-10 h-10 rounded-xl bg-primary text-white flex items-center justify-center mb-3 text-lg shadow-sm">
          📐
        </div>
        <div class="text-2xl sm:text-3xl font-extrabold font-outfit text-slate-900">
          {{ $luasItem ? trim(str_replace(['m²', 'm2'], '', $luasItem->detail)) : '2.928' }} <span class="text-sm font-semibold text-slate-500">m²</span>
        </div>
        <p class="text-xs sm:text-sm text-slate-600 font-medium mt-1">Luas Area Pondok</p>
      </div>

      <!-- Stat 2 -->
      <div class="bg-gradient-to-br from-amber-50 to-slate-50 border border-amber-100/80 rounded-2xl p-5 sm:p-6 shadow-xs hover:shadow-md transition-shadow">
        <div class="w-10 h-10 rounded-xl bg-[#FFAA00] text-primary-dark flex items-center justify-center mb-3 text-lg shadow-sm">
          🕌
        </div>
        <div class="text-2xl sm:text-3xl font-extrabold font-outfit text-slate-900">300 <span class="text-sm font-semibold text-slate-500">Orang</span></div>
        <p class="text-xs sm:text-sm text-slate-600 font-medium mt-1">Kapasitas Masjid</p>
      </div>

      <!-- Stat 3 -->
      <div class="bg-gradient-to-br from-blue-50 to-slate-50 border border-blue-100/80 rounded-2xl p-5 sm:p-6 shadow-xs hover:shadow-md transition-shadow">
        <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center mb-3 text-lg shadow-sm">
          👥
        </div>
        <div class="text-2xl sm:text-3xl font-extrabold font-outfit text-slate-900">24 / 60</div>
        <p class="text-xs sm:text-sm text-slate-600 font-medium mt-1">Santri Aktif / Kapasitas</p>
      </div>

      <!-- Stat 4 -->
      <div class="bg-gradient-to-br from-teal-50 to-slate-50 border border-teal-100/80 rounded-2xl p-5 sm:p-6 shadow-xs hover:shadow-md transition-shadow">
        <div class="w-10 h-10 rounded-xl bg-teal-600 text-white flex items-center justify-center mb-3 text-lg shadow-sm">
          👨‍🏫
        </div>
        <div class="text-2xl sm:text-3xl font-extrabold font-outfit text-slate-900">11 <span class="text-sm font-semibold text-slate-500">Ustadz</span></div>
        <p class="text-xs sm:text-sm text-slate-600 font-medium mt-1">Tenaga Pengajar</p>
      </div>
    </div>

    <!-- Main Table Card Wrapper -->
    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
      <div class="overflow-x-auto">
        <table class="w-full border-collapse text-left text-sm">
          <thead>
            <tr class="bg-[#144D30] text-white">
              <th class="w-16 sm:w-20 px-5 py-4 font-bold text-xs uppercase tracking-wider text-center">No</th>
              <th class="w-64 sm:w-80 px-6 py-4 font-bold text-xs uppercase tracking-wider">Fasilitas & Keterangan</th>
              <th class="px-6 py-4 font-bold text-xs uppercase tracking-wider">Data Riil & Rincian Detail</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            @if(isset($fasilitas) && $fasilitas->count() > 0)
              @foreach ($fasilitas as $item)
              <tr class="hover:bg-emerald-50/30 transition-colors {{ $loop->even ? 'bg-slate-50/40' : '' }}">
                <td class="px-5 py-4 text-center font-bold text-slate-400">
                  {{ $loop->iteration }}
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-emerald-100/70 text-emerald-800 flex items-center justify-center text-sm shrink-0">
                      {{ $item->icon ?: '🏢' }}
                    </span>
                    <div>
                      <span class="font-semibold text-slate-800 block text-sm">{{ $item->nama_fasilitas }}</span>
                      @if($item->deskripsi_singkat)
                        <span class="text-xs text-slate-400 block mt-0.5">{{ $item->deskripsi_singkat }}</span>
                      @endif
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 text-slate-700 text-xs sm:text-sm leading-relaxed whitespace-pre-line">
                  {{ $item->detail }}
                </td>
              </tr>
              @endforeach
            @else
              <tr>
                <td colspan="3" class="px-6 py-12 text-center text-slate-400 text-sm">
                  Belum ada data fasilitas yang ditambahkan.
                </td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>
