@php
  $limit = 4;
  $initialJadwals = $jadwals->take($limit);
  $remainingJadwals = $jadwals->slice($limit);
  $hasMore = $jadwals->count() > $limit;
@endphp

<!-- JADWAL HARIAN -->
<div 
  x-data="{ expanded: false, modalOpen: false }" 
  id="jadwal-harian-card"
  class="bg-primary-dark text-white rounded-3xl p-6 sm:p-8 shadow-md border border-primary/20 transition-all duration-300"
>
  <!-- Card Header -->
  <div class="flex items-center justify-between gap-3 mb-6 flex-wrap">
    <h3 class="text-lg font-bold font-outfit text-white flex items-center gap-2.5">
      <span class="text-accent">📅</span> Jadwal Harian
    </h3>
    <div class="flex items-center gap-2">
      @if($jadwals->count() > 0)
        <span class="text-[10px] sm:text-xs font-semibold px-2.5 py-1 rounded-full bg-white/10 text-accent border border-accent/20">
          {{ $jadwals->count() }} Kegiatan
        </span>
        <button 
          type="button"
          @click="modalOpen = true"
          title="Buka tampilan modal jadwal lengkap"
          class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-accent/15 hover:bg-accent text-accent hover:text-primary-dark border border-accent/30 text-[11px] font-semibold transition-all duration-200 cursor-pointer"
        >
          <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
          </svg>
          <span>Lihat Penuh</span>
        </button>
      @endif
    </div>
  </div>
  
  <!-- Timeline Items Container -->
  <div class="flex flex-col gap-6 relative before:content-[''] before:absolute before:left-[3px] before:top-2.5 before:bottom-2.5 before:w-[2px] before:bg-accent/25 before:z-1">
    {{-- Item Awal (Selalu Tampil agar Sejajar dengan Rincian Program Utama di Sisi Kiri) --}}
    @forelse($initialJadwals as $jadwal)
      <div class="relative pl-5 z-2 before:content-[''] before:absolute before:left-0 before:top-1.5 before:w-[8px] before:h-[8px] before:rounded-full before:bg-accent before:z-3">
        <div class="text-[10px] sm:text-xs font-bold text-accent mb-0.5">{{ $jadwal->waktu }}</div>
        <div class="text-sm font-semibold text-white">{{ $jadwal->judul }}</div>
        <div class="text-[11px] sm:text-xs text-white/70 mt-0.5 leading-relaxed">{{ $jadwal->deskripsi }}</div>
      </div>
    @empty
      <div class="text-xs text-white/60 pl-5">
        Belum ada data jadwal kegiatan harian.
      </div>
    @endforelse

    {{-- Item Lanjutan (Bisa di-expand / collapse dengan tombol Chevron 'v') --}}
    @if($hasMore)
      <div 
        id="jadwal-extra-items"
        x-show="expanded" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="hidden flex-col gap-6"
        :class="expanded ? '!flex' : 'hidden'"
      >
        @foreach($remainingJadwals as $jadwal)
          <div class="relative pl-5 z-2 before:content-[''] before:absolute before:left-0 before:top-1.5 before:w-[8px] before:h-[8px] before:rounded-full before:bg-accent before:z-3">
            <div class="text-[10px] sm:text-xs font-bold text-accent mb-0.5">{{ $jadwal->waktu }}</div>
            <div class="text-sm font-semibold text-white">{{ $jadwal->judul }}</div>
            <div class="text-[11px] sm:text-xs text-white/70 mt-0.5 leading-relaxed">{{ $jadwal->deskripsi }}</div>
          </div>
        @endforeach
      </div>
    @endif
  </div>

  @if($hasMore)
    <!-- Info Ringkas jika collapsed -->
    <div 
      x-show="!expanded" 
      class="text-center pt-3 pb-1 text-[11px] text-accent/80 font-medium"
      :class="expanded ? 'hidden' : 'block'"
    >
      +{{ $remainingJadwals->count() }} kegiatan lainnya (hingga malam)
    </div>

    <!-- Tombol Toggle Jadwal dengan Icon Chevron 'v' -->
    <div class="mt-4 pt-4 border-t border-white/10 flex items-center justify-between gap-3">
      <button 
        type="button" 
        id="btn-toggle-jadwal"
        @click="expanded = !expanded" 
        class="w-full flex items-center justify-center gap-2.5 py-2.5 px-4 rounded-2xl bg-white/10 hover:bg-white/15 active:scale-[0.98] border border-white/10 text-xs font-semibold text-accent hover:text-white transition-all duration-200 cursor-pointer shadow-sm group"
        aria-label="Lihat Seluruh Jadwal"
      >
        <span id="btn-toggle-text" x-text="expanded ? 'Tutup Jadwal' : 'Lihat Seluruh Jadwal ({{ $jadwals->count() }})'">
          Lihat Seluruh Jadwal ({{ $jadwals->count() }})
        </span>
        <!-- Chevron 'v' Icon yang berputar saat dibuka -->
        <svg 
          id="chevron-icon"
          xmlns="http://www.w3.org/2000/svg" 
          class="w-4 h-4 transition-transform duration-300 transform group-hover:translate-y-0.5" 
          :class="expanded ? 'rotate-180 -translate-y-0.5' : ''"
          fill="none" 
          viewBox="0 0 24 24" 
          stroke="currentColor" 
          stroke-width="2.5"
        >
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
      </button>
    </div>
  @endif

  <!-- MODAL JADWAL LENGKAP -->
  <div 
    x-show="modalOpen" 
    x-cloak 
    class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center p-4 sm:p-6"
    role="dialog" 
    aria-modal="true"
    id="modal-jadwal-lengkap"
  >
    <!-- Backdrop Blur -->
    <div 
      x-show="modalOpen"
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="ease-in duration-200"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
      @click="modalOpen = false"
      class="fixed inset-0 bg-slate-900/75 backdrop-blur-sm transition-opacity"
    ></div>

    <!-- Modal Content Card -->
    <div 
      x-show="modalOpen"
      x-transition:enter="ease-out duration-300"
      x-transition:enter-start="opacity-0 scale-95 translate-y-4"
      x-transition:enter-end="opacity-100 scale-100 translate-y-0"
      x-transition:leave="ease-in duration-200"
      x-transition:leave-start="opacity-100 scale-100 translate-y-0"
      x-transition:leave-end="opacity-0 scale-95 translate-y-4"
      @keydown.escape.window="modalOpen = false"
      class="relative w-full max-w-2xl bg-white rounded-3xl shadow-2xl overflow-hidden z-10 border border-slate-200 max-h-[88vh] flex flex-col"
    >
      <!-- Modal Header -->
      <div class="bg-gradient-to-r from-primary-dark to-primary p-6 text-white flex items-start justify-between">
        <div>
          <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-accent/20 text-accent text-xs font-semibold mb-2">
            <span>📅</span> Agenda 24 Jam
          </div>
          <h3 class="text-xl sm:text-2xl font-bold font-outfit text-white">
            Jadwal Harian Santri
          </h3>
          <p class="text-white/80 text-xs sm:text-sm mt-1">
            Pondok Pesantren Tahfidzul Qur'an Imam Syaukani
          </p>
        </div>
        <button 
          type="button" 
          @click="modalOpen = false" 
          class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-all cursor-pointer"
          title="Tutup Modal"
        >
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Modal Body (List Jadwal Penuh) -->
      <div class="p-6 overflow-y-auto space-y-3.5 flex-1 divide-y divide-slate-100">
        @foreach($jadwals as $item)
          <div class="pt-3.5 first:pt-0 flex items-start gap-4">
            <div class="px-3 py-1.5 rounded-xl bg-primary-dark text-accent text-[11px] font-bold whitespace-nowrap shadow-xs">
              {{ $item->waktu }}
            </div>
            <div class="flex-1">
              <div class="text-sm font-bold text-slate-800 font-outfit">{{ $item->judul }}</div>
              <div class="text-xs text-slate-600 mt-1 leading-relaxed">{{ $item->deskripsi }}</div>
            </div>
          </div>
        @endforeach
      </div>

      <!-- Modal Footer -->
      <div class="p-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between">
        <span class="text-xs text-slate-500">Total: <strong class="text-primary">{{ $jadwals->count() }}</strong> kegiatan terjadwal</span>
        <button 
          type="button" 
          @click="modalOpen = false" 
          class="px-5 py-2 rounded-xl bg-primary hover:bg-primary-dark text-white text-xs font-semibold transition-all cursor-pointer shadow-sm"
        >
          Tutup
        </button>
      </div>
    </div>
  </div>
</div>

{{-- Vanilla JS fallback --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('btn-toggle-jadwal');
    const extra = document.getElementById('jadwal-extra-items');
    const chevron = document.getElementById('chevron-icon');
    const btnText = document.getElementById('btn-toggle-text');

    if (btn && extra) {
      btn.addEventListener('click', function () {
        if (!window.Alpine) {
          const isHidden = extra.classList.contains('hidden');
          if (isHidden) {
            extra.classList.remove('hidden');
            extra.classList.add('flex');
            if (chevron) chevron.classList.add('rotate-180');
            if (btnText) btnText.textContent = 'Tutup Jadwal';
          } else {
            extra.classList.add('hidden');
            extra.classList.remove('flex');
            if (chevron) chevron.classList.remove('rotate-180');
            if (btnText) btnText.textContent = 'Lihat Seluruh Jadwal ({{ $jadwals->count() }})';
          }
        }
      });
    }
  });
</script>
