{{-- STRUKTUR PONDOK / DEWAN ASATIDZ --}}
<section id="struktur" class="py-16 bg-slate-50">
  <div class="max-w-[1200px] mx-auto px-6">

    {{-- Section Header --}}
    <div class="text-center max-w-[650px] mx-auto mb-10" data-aos="fade-up">
      <div class="inline-block bg-primary-accent text-primary text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-2.5">
        Struktur Pondok
      </div>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold font-outfit text-slate-900 mb-2.5">
        Struktur Pondok & Dewan Asatidz
      </h2>
      <p class="text-slate-500 text-xs sm:text-sm md:text-base">
        Mengenal struktur kepengurusan dan jajaran asatidz pembimbing di PPTQ Imam Syaukani.
      </p>
    </div>

    {{-- Grid Cards (1 Baris 3 Card, Ukuran Ringkas & Tinggi Proporsional) --}}
    @if(isset($ustadzs) && $ustadzs->count() > 0)
    <div class="struktur-cards-container" data-aos="fade-up" data-aos-delay="100">
      @foreach ($ustadzs as $ustadz)
      <div
        class="ustadz-compact-card group"
        data-id="{{ $ustadz->id_ustadz }}"
        data-nama="{{ $ustadz->gelar ? $ustadz->nama . ', ' . $ustadz->gelar : $ustadz->nama }}"
        data-jabatan="{{ $ustadz->jabatan }}"
        data-bio="{{ $ustadz->bio }}"
        data-pendidikan="{{ $ustadz->pendidikan }}"
        data-keahlian="{{ $ustadz->keahlian }}"
        data-foto="{{ $ustadz->foto ? Storage::url($ustadz->foto) : '' }}"
        onclick="openUstadzModal(this)"
      >
        {{-- Area Foto / Siluet (Tinggi Ramping & Tidak Kebesaran) --}}
        <div class="ustadz-photo-box">
          @if($ustadz->foto)
            <img
              src="{{ Storage::url($ustadz->foto) }}"
              alt="{{ $ustadz->nama }}"
              class="group-hover:scale-105 transition-transform duration-500"
            />
          @else
            {{-- Siluet Avatar Rapi Sesuai Mockup --}}
            <svg viewBox="0 0 160 180" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
              <rect width="160" height="180" fill="#CBD5E1"/>
              <circle cx="80" cy="62" r="30" fill="#FFFFFF"/>
              <path d="M20 180 C20 128, 48 112, 80 112 C112 112, 140 128, 140 180 Z" fill="#FFFFFF"/>
            </svg>
          @endif

          {{-- Hover overlay indicator --}}
          <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
            <span class="bg-white/95 text-primary text-[10px] font-semibold px-2.5 py-0.5 rounded-full shadow-md backdrop-blur-xs transform translate-y-1 group-hover:translate-y-0 transition-all duration-300">
              Lihat Detail
            </span>
          </div>
        </div>

        {{-- Bar Hijau Tua Info Nama & Jabatan --}}
        <div class="ustadz-info-strip">
          <div class="text-white font-bold text-xs leading-snug font-outfit truncate" title="{{ $ustadz->gelar ? $ustadz->nama . ', ' . $ustadz->gelar : $ustadz->nama }}">
            {{ $ustadz->gelar ? $ustadz->nama . ', ' . $ustadz->gelar : $ustadz->nama }}
          </div>
          <div class="text-emerald-200 text-[10px] font-medium mt-0.5 truncate" title="{{ $ustadz->jabatan ?: 'Pengajar' }}">
            {{ $ustadz->jabatan ?: 'Pengajar' }}
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @else
    {{-- Fallback Empty State --}}
    <div class="text-center py-12 bg-white rounded-3xl border border-slate-100 shadow-sm max-w-lg mx-auto p-8">
      <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-4">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
      </div>
      <h3 class="text-lg font-bold text-slate-800 mb-1 font-outfit">Data Struktur Belum Ditambahkan</h3>
      <p class="text-sm text-slate-500">Data struktur dewan asatidz dapat dikelola melalui dashboard admin.</p>
    </div>
    @endif

  </div>
</section>

{{-- ===================================
     MODAL DETAIL USTADZ
     =================================== --}}
<div id="ustadzModal" class="fixed inset-0 z-[2000] flex items-center justify-center p-4 hidden" aria-modal="true" role="dialog">
  {{-- Backdrop --}}
  <div id="ustadzModalBackdrop" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeUstadzModal()"></div>

  {{-- Modal Box --}}
  <div class="relative bg-white rounded-3xl shadow-2xl w-full max-w-lg overflow-hidden z-10 modal-scale-in">
    {{-- Close Button --}}
    <button onclick="closeUstadzModal()" class="absolute top-4 right-4 z-20 w-8 h-8 flex items-center justify-center bg-slate-100 hover:bg-slate-200 rounded-full transition-colors" aria-label="Tutup modal">
      <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>

    {{-- Header with Photo --}}
    <div class="flex gap-4 p-6 pb-4 bg-gradient-to-br from-primary to-primary-light">
      <div class="w-20 h-20 rounded-2xl overflow-hidden border-3 border-white shadow-md shrink-0 bg-slate-200">
        <img id="modalFoto" src="" alt="" class="w-full h-full object-cover object-top" />
        <div id="modalFotoPlaceholder" class="w-full h-full flex items-end justify-center hidden">
          <svg viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
            <rect width="80" height="80" fill="#CBD5E1"/>
            <circle cx="40" cy="28" r="15" fill="#FFFFFF"/>
            <path d="M10 80 C10 58, 24 50, 40 50 C56 50, 70 58, 70 80 Z" fill="#FFFFFF"/>
          </svg>
        </div>
      </div>
      <div class="flex-1 min-w-0 pt-2">
        <h3 id="modalNama" class="font-bold font-outfit text-white text-lg leading-tight"></h3>
        <p id="modalJabatan" class="text-emerald-200 text-sm font-medium mt-1"></p>
      </div>
    </div>

    {{-- Body --}}
    <div class="p-6 space-y-4 max-h-[60vh] overflow-y-auto">
      {{-- Bio --}}
      <div id="modalBioWrap">
        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Tentang</h4>
        <p id="modalBio" class="text-slate-600 text-sm leading-relaxed"></p>
      </div>

      {{-- Pendidikan --}}
      <div id="modalPendidikanWrap">
        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Riwayat Pendidikan</h4>
        <div id="modalPendidikan" class="text-slate-600 text-sm leading-relaxed whitespace-pre-line"></div>
      </div>

      {{-- Keahlian --}}
      <div id="modalKeahlianWrap">
        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-1.5">Keahlian</h4>
        <p id="modalKeahlian" class="text-slate-600 text-sm leading-relaxed"></p>
      </div>
    </div>
  </div>
</div>

<style>
  /* Layout 1 Baris 3 Card, Ukuran Ringkas & Tinggi Proporsional */
  .struktur-cards-container {
    display: grid !important;
    grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
    gap: 1.25rem !important;
    max-width: 680px !important;
    margin-left: auto !important;
    margin-right: auto !important;
    justify-items: center !important;
  }
  @media (max-width: 639px) {
    .struktur-cards-container {
      grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
      gap: 0.75rem !important;
      max-width: 420px !important;
    }
  }

  .ustadz-compact-card {
    width: 100% !important;
    max-width: 200px !important;
    background: #ffffff !important;
    border-radius: 0.875rem !important;
    overflow: hidden !important;
    border: 1px solid #e2e8f0 !important;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05) !important;
    transition: all 0.3s ease !important;
    display: flex !important;
    flex-direction: column !important;
    cursor: pointer !important;
  }
  .ustadz-compact-card:hover {
    transform: translateY(-3px) !important;
    box-shadow: 0 8px 16px -3px rgba(0, 0, 0, 0.1) !important;
  }

  .ustadz-photo-box {
    position: relative !important;
    width: 100% !important;
    height: 180px !important;
    background-color: #cbd5e1 !important;
    overflow: hidden !important;
    display: flex !important;
    align-items: flex-end !important;
    justify-content: center !important;
  }
  @media (max-width: 639px) {
    .ustadz-photo-box {
      height: 155px !important;
    }
  }
  .ustadz-photo-box img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    object-position: top center !important;
  }

  .ustadz-info-strip {
    background-color: #144D30 !important;
    padding: 0.5rem 0.5rem !important;
    text-align: center !important;
    display: flex !important;
    flex-direction: column !important;
    justify-content: center !important;
    min-height: 48px !important;
  }

  @keyframes scaleIn {
    from { opacity: 0; transform: scale(0.92) translateY(16px); }
    to   { opacity: 1; transform: scale(1) translateY(0); }
  }
  .modal-scale-in {
    animation: scaleIn 0.28s cubic-bezier(0.16, 1, 0.3, 1) forwards;
  }
</style>

<script>
  function openUstadzModal(el) {
    const nama       = el.dataset.nama;
    const jabatan    = el.dataset.jabatan;
    const bio        = el.dataset.bio;
    const pendidikan = el.dataset.pendidikan;
    const keahlian   = el.dataset.keahlian;
    const foto       = el.dataset.foto;

    document.getElementById('modalNama').textContent    = nama;
    document.getElementById('modalJabatan').textContent = jabatan || 'Pengajar';

    // Foto
    const fotoEl = document.getElementById('modalFoto');
    const fotoPlaceholderEl = document.getElementById('modalFotoPlaceholder');
    if (foto) {
      fotoEl.src = foto;
      fotoEl.alt = nama;
      fotoEl.classList.remove('hidden');
      fotoPlaceholderEl.classList.add('hidden');
    } else {
      fotoEl.classList.add('hidden');
      fotoPlaceholderEl.classList.remove('hidden');
    }

    // Bio
    const bioWrap = document.getElementById('modalBioWrap');
    document.getElementById('modalBio').textContent = bio;
    bioWrap.style.display = bio ? 'block' : 'none';

    // Pendidikan
    const pendidikanWrap = document.getElementById('modalPendidikanWrap');
    document.getElementById('modalPendidikan').textContent = pendidikan;
    pendidikanWrap.style.display = pendidikan ? 'block' : 'none';

    // Keahlian
    const keahlianWrap = document.getElementById('modalKeahlianWrap');
    document.getElementById('modalKeahlian').textContent = keahlian;
    keahlianWrap.style.display = keahlian ? 'block' : 'none';

    // Show modal
    const modal = document.getElementById('ustadzModal');
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';

    // Re-trigger animation
    const box = modal.querySelector('.modal-scale-in');
    box.style.animation = 'none';
    box.offsetHeight; // reflow
    box.style.animation = '';
  }

  function closeUstadzModal() {
    document.getElementById('ustadzModal').classList.add('hidden');
    document.body.style.overflow = '';
  }

  // Close on ESC
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeUstadzModal();
  });
</script>
