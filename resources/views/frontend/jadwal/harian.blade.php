<!-- JADWAL HARIAN -->
<div class="bg-primary-dark text-white rounded-3xl p-6 sm:p-8 mb-6 shadow-md border border-primary/20">
  <h3 class="text-lg font-bold font-outfit text-white mb-6 flex items-center gap-2.5">
    <span class="text-accent">📅</span> Jadwal Harian
  </h3>
  
  <div class="flex flex-col gap-6 relative before:content-[''] before:absolute before:left-[3px] before:top-2.5 before:bottom-2.5 before:w-[2px] before:bg-accent/25 before:z-1">
    @forelse($jadwals as $jadwal)
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
  </div>
</div>
