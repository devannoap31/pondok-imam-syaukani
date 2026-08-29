<!-- JADWAL HARIAN -->
<div class="bg-primary-dark text-white rounded-3xl p-6 sm:p-8 mb-6 shadow-md border border-primary/20">
  <div class="flex items-center justify-between gap-3 mb-6 pb-2 border-b border-white/10">
    <h3 class="text-lg font-bold font-outfit text-white flex items-center gap-2.5">
      <span class="text-accent">📅</span> Jadwal Harian Santri
    </h3>
    <span class="text-[10px] font-semibold bg-accent/15 text-accent px-2.5 py-1 rounded-full border border-accent/30 flex items-center gap-1">
      <svg class="w-3 h-3 text-accent animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
      Scroll untuk detail
    </span>
  </div>
  
  <div class="max-h-[460px] overflow-y-auto pr-3 custom-jadwal-scrollbar">
    <div class="flex flex-col gap-6 relative py-1 before:content-[''] before:absolute before:left-[4px] before:top-2.5 before:bottom-2.5 before:w-[2px] before:bg-accent/30 before:z-1">
      @forelse($jadwals as $jadwal)
        <div class="relative pl-6 z-2 group">
          <span class="absolute left-0 top-1.5 w-2.5 h-2.5 rounded-full bg-accent border-2 border-primary-dark group-hover:scale-125 transition-transform z-3"></span>
          <div class="text-[10px] sm:text-xs font-bold text-accent mb-0.5 tracking-wide">{{ $jadwal->waktu }}</div>
          <div class="text-sm font-semibold text-white group-hover:text-accent transition-colors">{{ $jadwal->judul }}</div>
          <div class="text-[11px] sm:text-xs text-white/70 mt-0.5 leading-relaxed">{{ $jadwal->deskripsi }}</div>
        </div>
      @empty
        <div class="text-xs text-white/60 pl-5">
          Belum ada data jadwal kegiatan harian.
        </div>
      @endforelse
    </div>
  </div>
</div>

<style>
  .custom-jadwal-scrollbar::-webkit-scrollbar {
    width: 4px;
  }
  .custom-jadwal-scrollbar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.08);
    border-radius: 10px;
  }
  .custom-jadwal-scrollbar::-webkit-scrollbar-thumb {
    background: #FFAA00;
    border-radius: 10px;
  }
  .custom-jadwal-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #FFBB33;
  }
</style>
