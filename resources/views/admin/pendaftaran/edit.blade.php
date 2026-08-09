@extends('admin.layouts.app')
 
@section('title', 'Verifikasi Pendaftar (PPDB) – Dashboard Admin')
 
@section('content')
  <section class="admin-content-section active block flex-1 flex flex-col w-full">
    <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200 shadow-xs p-6 sm:p-8 flex-1 flex flex-col justify-between w-full">
      <div>
        <h3 class="text-lg font-bold font-outfit text-primary mb-6">Verifikasi & Edit Pendaftaran</h3>
        
        @if ($errors->any())
          <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <form id="pendaftaranEditForm" action="{{ route('pendaftaran.update', $pendaftar) }}" method="POST" class="space-y-6">
          @csrf
          @method('PUT')
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              <div class="form-group">
                <label class="block text-slate-700 text-xs font-bold mb-2">Nomor Pendaftaran</label>
                <input type="text" name="nomor_pendaftaran" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-slate-50" required value="{{ old('nomor_pendaftaran', $pendaftar->nomor_pendaftaran) }}" readonly />
                <p class="text-[10px] text-slate-400 mt-1">Otomatis / Tidak dapat diubah</p>
              </div>
              <div class="form-group">
                <label class="block text-slate-700 text-xs font-bold mb-2">Status Pendaftaran</label>
                <select name="status" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white font-bold {{ $pendaftar->status == 'Diterima' ? 'text-green-600' : ($pendaftar->status == 'Ditolak' ? 'text-red-600' : 'text-yellow-600') }}" required>
                  <option value="Diverifikasi" {{ old('status', $pendaftar->status) == 'Diverifikasi' ? 'selected' : '' }}>Diverifikasi (Menunggu Keputusan)</option>
                  <option value="Diterima" {{ old('status', $pendaftar->status) == 'Diterima' ? 'selected' : '' }}>Diterima (Lulus)</option>
                  <option value="Ditolak" {{ old('status', $pendaftar->status) == 'Ditolak' ? 'selected' : '' }}>Ditolak (Tidak Lulus)</option>
                </select>
              </div>
              
              <div class="form-group">
                <label class="block text-slate-700 text-xs font-bold mb-2">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('nama_lengkap', $pendaftar->nama_lengkap) }}" />
              </div>
              <div class="form-group">
                <label class="block text-slate-700 text-xs font-bold mb-2">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required>
                  <option value="laki-laki" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                  <option value="perempuan" {{ old('jenis_kelamin', $pendaftar->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
              </div>

              <div class="form-group">
                <label class="block text-slate-700 text-xs font-bold mb-2">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('tempat_lahir', $pendaftar->tempat_lahir) }}" />
              </div>
              <div class="form-group">
                <label class="block text-slate-700 text-xs font-bold mb-2">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('tanggal_lahir', $pendaftar->tanggal_lahir) }}" />
              </div>

              <div class="form-group">
                <label class="block text-slate-700 text-xs font-bold mb-2">Nama Orang Tua</label>
                <input type="text" name="nama_ortu" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('nama_ortu', $pendaftar->nama_ortu) }}" />
              </div>
              <div class="form-group">
                <label class="block text-slate-700 text-xs font-bold mb-2">Pekerjaan Orang Tua</label>
                <input type="text" name="pekerjaan_ortu" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('pekerjaan_ortu', $pendaftar->pekerjaan_ortu) }}" />
              </div>

              <div class="form-group">
                <label class="block text-slate-700 text-xs font-bold mb-2">Nomor HP / WhatsApp</label>
                <input type="text" name="nomor_hp" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required value="{{ old('nomor_hp', $pendaftar->nomor_hp) }}" />
              </div>
              <div class="form-group">
                <label class="block text-slate-700 text-xs font-bold mb-2">Alamat Lengkap</label>
                <textarea name="alamat" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[50px] bg-white" required>{{ old('alamat', $pendaftar->alamat) }}</textarea>
              </div>
          </div>
          
          <!-- SECTION: VERIFIKASI BERKAS LAMPIRAN -->
          <div class="mt-8 border-t border-slate-200/80 pt-7">
              <div class="flex items-start justify-between mb-5 flex-wrap gap-3">
                <div>
                  <div class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></div>
                    <h4 class="font-bold text-slate-800 font-outfit text-base">Dokumen Lampiran Calon Santri</h4>
                  </div>
                  <p class="text-xs text-slate-500 mt-1">Periksa keaslian berkas persyaratan pendaftaran di bawah ini secara langsung.</p>
                </div>
                <div class="flex items-center gap-2">
                  <span class="inline-flex items-center gap-1.5 text-xs font-semibold px-3 py-1 bg-emerald-50 text-emerald-700 border border-emerald-200 rounded-full">
                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    {{ count($pendaftar->berkas) }} Berkas Tersedia
                  </span>
                </div>
              </div>

              @if(count($pendaftar->berkas) > 0)
                  <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                      @foreach($pendaftar->berkas as $berkas)
                      @php
                        $fileUrl = Storage::url($berkas->file_path);
                        $extension = strtolower(pathinfo($berkas->file_path, PATHINFO_EXTENSION));
                        $isPdf = $extension === 'pdf';
                        $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg']);
                      @endphp
                      
                      <!-- BERKAS CARD -->
                      <div class="bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-lg hover:border-primary/40 transition-all duration-300 flex flex-col overflow-hidden group">
                          <!-- CARD HEADER -->
                          <div class="px-4.5 pt-4 pb-3 flex items-center justify-between border-b border-slate-100 bg-slate-50/50">
                            <div class="flex items-center gap-2 min-w-0">
                              <span class="w-2 h-2 rounded-full {{ $isPdf ? 'bg-rose-500' : 'bg-emerald-500' }}"></span>
                              <span class="text-xs font-bold text-slate-800 truncate">{{ $berkas->jenis_berkas }}</span>
                            </div>
                            <span class="text-[10px] font-extrabold uppercase px-2 py-0.5 rounded-md {{ $isPdf ? 'bg-rose-100 text-rose-700' : 'bg-emerald-100 text-emerald-700' }}">
                              {{ $extension ?: 'FILE' }}
                            </span>
                          </div>

                          <!-- CARD MEDIA PREVIEW AREA -->
                          <div onclick="openBerkasModal('{{ $fileUrl }}', '{{ $berkas->jenis_berkas }}', '{{ $extension }}')" class="relative h-40 bg-slate-100/70 flex items-center justify-center p-3 cursor-pointer overflow-hidden group/thumb">
                            @if($isImage)
                              <!-- Real Image Thumbnail -->
                              <img src="{{ $fileUrl }}" alt="{{ $berkas->jenis_berkas }}" class="w-full h-full object-cover rounded-xl transition-transform duration-500 group-hover/thumb:scale-105" loading="lazy" />
                              <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-900/20 to-transparent opacity-0 group-hover/thumb:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-end p-3 text-white">
                                <div class="w-9 h-9 rounded-full bg-white/25 backdrop-blur-md flex items-center justify-center mb-1 transition-transform group-hover/thumb:scale-110">
                                  <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                </div>
                                <span class="text-[11px] font-semibold tracking-wide">Klik untuk Perbesar</span>
                              </div>
                            @elseif($isPdf)
                              <!-- PDF Visual Card -->
                              <div class="w-full h-full rounded-xl bg-gradient-to-br from-rose-50 to-orange-50 border border-rose-100 flex flex-col items-center justify-center text-center p-3 transition-transform duration-300 group-hover/thumb:scale-102">
                                <div class="w-12 h-12 rounded-2xl bg-rose-500/10 text-rose-600 flex items-center justify-center mb-2 shadow-xs group-hover/thumb:scale-110 transition-transform">
                                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 13h6M9 17h3"/></svg>
                                </div>
                                <span class="text-xs font-bold text-slate-800 leading-tight">Dokumen PDF</span>
                                <span class="text-[10px] text-slate-500 mt-0.5">Klik untuk Membaca</span>
                              </div>
                            @else
                              <!-- Generic File Visual Card -->
                              <div class="w-full h-full rounded-xl bg-slate-100 border border-slate-200 flex flex-col items-center justify-center text-center p-3">
                                <div class="w-12 h-12 rounded-2xl bg-primary/10 text-primary flex items-center justify-center mb-2">
                                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </div>
                                <span class="text-xs font-bold text-slate-700">File Lampiran</span>
                              </div>
                            @endif
                          </div>

                          <!-- CARD FOOTER ACTIONS -->
                          <div class="p-3.5 bg-white flex items-center gap-2 border-t border-slate-100">
                            <button type="button" onclick="openBerkasModal('{{ $fileUrl }}', '{{ $berkas->jenis_berkas }}', '{{ $extension }}')" class="flex-1 inline-flex items-center justify-center gap-2 px-3 py-2 rounded-xl bg-primary hover:bg-primary-dark text-white text-xs font-semibold shadow-xs active:scale-[0.98] transition-all cursor-pointer">
                              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                              <span>Pratinjau</span>
                            </button>
                            <a href="{{ $fileUrl }}" target="_blank" download title="Unduh File Asli" class="p-2 rounded-xl text-slate-500 hover:text-slate-800 hover:bg-slate-100 border border-slate-200 transition-colors cursor-pointer" aria-label="Unduh File">
                              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            </a>
                          </div>
                      </div>
                      @endforeach
                  </div>
              @else
                  <div class="p-10 text-center bg-slate-50/80 rounded-2xl border border-dashed border-slate-300">
                    <div class="w-14 h-14 rounded-2xl bg-slate-200/70 text-slate-400 flex items-center justify-center mx-auto mb-3">
                      <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h5 class="text-sm font-bold text-slate-700 mb-1">Belum Ada Berkas Diunggah</h5>
                    <p class="text-xs text-slate-400">Pendaftar ini belum melampirkan berkas persyaratan saat mengisi formulir.</p>
                  </div>
              @endif
          </div>

          <!-- SUBMIT ACTIONS -->
          <div class="pt-8 border-t border-slate-200/80 flex items-center justify-between flex-wrap gap-4">
              <a href="{{ route('pendaftaran.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 text-xs font-semibold transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Kembali ke Daftar
              </a>
              <button type="submit" class="inline-flex items-center justify-center gap-2 px-8 py-3 bg-gradient-to-r from-primary to-primary-dark hover:from-primary-dark hover:to-emerald-950 text-white rounded-xl text-sm font-semibold shadow-md hover:shadow-lg active:scale-[0.98] transition-all cursor-pointer">
                <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                <span>Simpan Verifikasi & Perubahan</span>
              </button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- PROFESSIONAL LIGHTBOX MODAL PREVIEW -->
  <div id="berkasModal" class="fixed inset-0 z-[2000] hidden items-center justify-center p-2 sm:p-5 transition-all duration-300">
    <!-- DARK BACKDROP -->
    <div class="fixed inset-0 bg-slate-950/85 backdrop-blur-md transition-opacity cursor-pointer" onclick="closeBerkasModal()"></div>
    
    <!-- LIGHTBOX CONTAINER -->
    <div class="relative bg-slate-900 rounded-2xl sm:rounded-3xl shadow-2xl max-w-5xl w-full max-h-[94vh] flex flex-col overflow-hidden border border-white/10 z-10 animate-scale-up">
      
      <!-- LIGHTBOX HEADER -->
      <div class="px-5 sm:px-6 py-3.5 border-b border-white/10 flex items-center justify-between bg-slate-950/80 shrink-0">
        <div class="flex items-center gap-3 min-w-0">
          <div class="w-10 h-10 rounded-xl bg-accent/20 border border-accent/40 text-accent flex items-center justify-center shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
          </div>
          <div class="min-w-0">
            <div class="flex items-center gap-2">
              <h4 id="berkasModalTitle" class="font-outfit font-bold text-white text-sm sm:text-base leading-tight truncate">Pratinjau Dokumen</h4>
              <span id="berkasModalBadge" class="text-[9.5px] font-extrabold uppercase px-2 py-0.5 rounded bg-white/15 text-emerald-300">PDF</span>
            </div>
            <p class="text-[11px] text-slate-400 truncate mt-0.5">Santri: <span class="text-slate-200 font-semibold">{{ $pendaftar->nama_lengkap }}</span> ({{ $pendaftar->nomor_pendaftaran }})</p>
          </div>
        </div>

        <div class="flex items-center gap-2 shrink-0">
          <a id="berkasModalDownload" href="#" target="_blank" class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-semibold border border-white/15 transition-all shadow-xs">
            <svg class="w-3.5 h-3.5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            <span class="hidden sm:inline">Buka Dokumen Asli</span>
          </a>
          <button type="button" onclick="closeBerkasModal()" class="w-9 h-9 rounded-xl bg-white/10 hover:bg-rose-500 text-white/80 hover:text-white flex items-center justify-center transition-all cursor-pointer border border-white/10 active:scale-95" aria-label="Tutup Pratinjau">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
          </button>
        </div>
      </div>
      
      <!-- LIGHTBOX BODY -->
      <div id="berkasModalBody" class="p-3 sm:p-5 flex-1 overflow-y-auto flex items-center justify-center bg-slate-950/60 min-h-[420px]">
        <!-- Dynamic preview content inserted via Javascript -->
      </div>
      
      <!-- LIGHTBOX FOOTER -->
      <div class="px-5 sm:px-6 py-2.5 border-t border-white/10 bg-slate-950 flex items-center justify-between shrink-0 text-xs text-slate-400">
        <span class="hidden sm:inline">Gunakan mouse scroll atau klik untuk navigasi dokumen</span>
        <button type="button" onclick="closeBerkasModal()" class="px-4 py-1.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-semibold transition-all cursor-pointer ml-auto">
          Tutup (ESC)
        </button>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script>
  function openBerkasModal(fileUrl, fileTitle, ext) {
    const modal = document.getElementById('berkasModal');
    const modalTitle = document.getElementById('berkasModalTitle');
    const modalBadge = document.getElementById('berkasModalBadge');
    const modalBody = document.getElementById('berkasModalBody');
    const modalDownload = document.getElementById('berkasModalDownload');
    
    modalTitle.textContent = fileTitle || 'Pratinjau Dokumen';
    modalDownload.href = fileUrl;
    
    // Clean extension detection
    let extension = ext || '';
    if (!extension) {
      const cleanUrl = fileUrl.split('?')[0];
      extension = cleanUrl.split('.').pop().toLowerCase();
    }
    
    modalBadge.textContent = extension.toUpperCase() || 'BERKAS';
    
    if (['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'].includes(extension.toLowerCase())) {
      modalBody.innerHTML = `
        <div class="max-h-[72vh] w-full flex items-center justify-center p-2">
          <img src="${fileUrl}" alt="${fileTitle}" class="max-h-[70vh] max-w-full object-contain rounded-2xl shadow-2xl border border-white/10 bg-slate-900" />
        </div>
      `;
    } else if (extension.toLowerCase() === 'pdf') {
      modalBody.innerHTML = `
        <div class="w-full h-[74vh] rounded-2xl overflow-hidden shadow-2xl border border-white/10 bg-slate-900">
          <iframe src="${fileUrl}" class="w-full h-full border-0"></iframe>
        </div>
      `;
    } else {
      modalBody.innerHTML = `
        <div class="text-center py-12 px-6 bg-white/5 rounded-3xl border border-white/10 max-w-md w-full backdrop-blur-sm">
          <div class="w-16 h-16 rounded-2xl bg-accent/20 text-accent flex items-center justify-center mx-auto mb-4 text-3xl">📄</div>
          <h5 class="font-bold text-white text-base mb-1">${fileTitle}</h5>
          <p class="text-xs text-slate-400 mb-6">Format file (.${extension}) memerlukan aplikasi eksternal untuk dibuka.</p>
          <a href="${fileUrl}" target="_blank" class="inline-flex items-center gap-2 px-6 py-2.5 bg-primary hover:bg-primary-dark text-white rounded-xl text-xs font-semibold shadow-lg transition-all">
            Buka File di Tab Baru
          </a>
        </div>
      `;
    }
    
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    document.body.style.overflow = 'hidden';
  }

  function closeBerkasModal() {
    const modal = document.getElementById('berkasModal');
    if (modal) {
      modal.classList.add('hidden');
      modal.classList.remove('flex');
      document.getElementById('berkasModalBody').innerHTML = '';
      document.body.style.overflow = '';
    }
  }

  // Close on Escape Key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closeBerkasModal();
    }
  });
</script>
@endsection
