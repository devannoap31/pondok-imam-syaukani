@extends('frontend.layouts.app', ['activePage' => 'register'])

@section('title', 'Penerimaan Santri Baru – PPTQ Imam Syaukani')
@section('meta_description', 'Lengkapi formulir pendaftaran di bawah ini untuk bergabung menjadi santri PPTQ Imam Syaukani.')

@push('styles')
<style>
  .step.active .step-num {
    background-color: #144D30 !important;
    color: #ffffff !important;
    box-shadow: 0 0 0 4px rgba(20, 77, 48, 0.2);
  }
  .step.active .step-label {
    color: #144D30 !important;
    font-weight: 700 !important;
  }
  .step.completed .step-num {
    background-color: #10B981 !important;
    color: #ffffff !important;
  }
  .step.completed .step-label {
    color: #10B981 !important;
  }
</style>
@endpush

@section('content')
  <!-- PAGE HEADER -->
  <div class="bg-gradient-to-br from-primary-dark to-primary py-16 text-center text-white">
    <div class="max-w-[1200px] mx-auto px-6">
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold font-outfit text-white mb-2.5">
        Penerimaan Santri Baru
      </h1>
      <p class="text-white/85 text-sm sm:text-base">
        Lengkapi formulir di bawah ini dengan data yang valid dan benar sesuai dengan dokumen kependudukan resmi.
      </p>
      <div class="flex items-center justify-center gap-2 mt-4.5 text-xs sm:text-sm">
        <a href="{{ url('/') }}" class="text-white/70 hover:text-accent transition-colors">Home</a>
        <span class="text-white/40">›</span>
        <span class="text-white font-medium">Pendaftaran</span>
      </div>
    </div>
  </div>

  <!-- FORM SECTION -->
  <section class="py-20 bg-white">
    <div class="max-w-[800px] mx-auto px-6">
      <div class="bg-white rounded-3xl border border-slate-200 shadow-md p-6 sm:p-10">
        <div class="inline-block bg-primary-accent text-primary text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-5 select-none">
          Tahun Ajaran 2026/2027
        </div>
        <h3 class="text-xl font-bold font-outfit text-primary mb-1">
          Formulir Pendaftaran Online
        </h3>
        <p class="text-slate-500 text-xs sm:text-sm mb-8">Gelombang 1 Dibuka</p>

        <!-- Validation Errors Display -->
        @if ($errors->any())
          <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl text-red-700 text-xs sm:text-sm">
            <p class="font-bold mb-1">Mohon perbaiki kesalahan berikut:</p>
            <ul class="list-disc pl-5 space-y-1">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Stepper -->
        <div class="flex justify-between mb-10 relative before:content-[''] before:absolute before:top-5 before:left-0 before:right-0 before:h-0.5 before:bg-slate-200 before:z-1">
          <div class="relative z-2 text-center flex-1 step active" id="stepIndicator1">
            <div class="step-num w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold mx-auto mb-2 transition-all select-none">1</div>
            <div class="step-label text-[10px] sm:text-xs font-semibold text-slate-400">Calon Santri</div>
          </div>
          <div class="relative z-2 text-center flex-1 step" id="stepIndicator2">
            <div class="step-num w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold mx-auto mb-2 transition-all select-none">2</div>
            <div class="step-label text-[10px] sm:text-xs font-semibold text-slate-400">Orang Tua/Wali</div>
          </div>
          <div class="relative z-2 text-center flex-1 step" id="stepIndicator3">
            <div class="step-num w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold mx-auto mb-2 transition-all select-none">3</div>
            <div class="step-label text-[10px] sm:text-xs font-semibold text-slate-400">Upload Dokumen</div>
          </div>
        </div>

        <form id="regForm" action="{{ route('daftar.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
          @csrf

          <!-- STEP 1: DATA CALON SANTRI -->
          <div class="form-section active space-y-5" id="formSection1">
            <h4 class="text-base font-bold font-outfit text-primary pb-2 border-b-2 border-slate-100 mb-5">
              1. Data Calon Santri
            </h4>
            
            <div class="form-group">
              <label for="nama_lengkap" class="block text-slate-700 text-xs font-bold mb-2">Nama Panjang (Sesuai Akte) *</label>
              <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Masukkan Nama Lengkap" required />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div class="form-group">
                <label for="jenis_kelamin" class="block text-slate-700 text-xs font-bold mb-2">Jenis Kelamin *</label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required>
                  <option value="" disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>Pilih Jenis Kelamin</option>
                  <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki (Santri)</option>
                  <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan (Santriwati)</option>
                </select>
              </div>
              <div class="form-group">
                <label for="tempat_lahir" class="block text-slate-700 text-xs font-bold mb-2">Tempat Lahir *</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Contoh : Boyolali" required />
              </div>
            </div>

            <div class="form-group">
              <label for="tanggal_lahir" class="block text-slate-700 text-xs font-bold mb-2">Tanggal Lahir *</label>
              <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required />
            </div>

            <div class="flex justify-end pt-4">
              <button type="button" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm" onclick="nextSection(2)">
                Lanjut Langkah 2 →
              </button>
            </div>
          </div>

          <!-- STEP 2: DATA ORANG TUA / WALI -->
          <div class="form-section hidden space-y-5" id="formSection2">
            <h4 class="text-base font-bold font-outfit text-primary pb-2 border-b-2 border-slate-100 mb-5">
              2. Data Orang Tua / Wali
            </h4>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div class="form-group">
                <label for="nama_ortu" class="block text-slate-700 text-xs font-bold mb-2">Nama Orang Tua / Wali *</label>
                <input type="text" id="nama_ortu" name="nama_ortu" value="{{ old('nama_ortu') }}" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Nama Lengkap Orang Tua / Wali" />
              </div>
              <div class="form-group">
                <label for="pekerjaan_ortu" class="block text-slate-700 text-xs font-bold mb-2">Pekerjaan Orang Tua *</label>
                <select id="pekerjaan_ortu" name="pekerjaan_ortu" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white">
                  <option value="" disabled {{ old('pekerjaan_ortu') ? '' : 'selected' }}>Pilih Pekerjaan</option>
                  <option value="PNS/TNI/Polri" {{ old('pekerjaan_ortu') == 'PNS/TNI/Polri' ? 'selected' : '' }}>PNS / TNI / Polri</option>
                  <option value="Karyawan Swasta" {{ old('pekerjaan_ortu') == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan Swasta</option>
                  <option value="Wiraswasta" {{ old('pekerjaan_ortu') == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta / Pedagang</option>
                  <option value="Petani/Nelayan" {{ old('pekerjaan_ortu') == 'Petani/Nelayan' ? 'selected' : '' }}>Petani / Nelayan</option>
                  <option value="Lainnya" {{ old('pekerjaan_ortu') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="nomor_hp" class="block text-slate-700 text-xs font-bold mb-2">Nomor WhatsApp / HP (Aktif) *</label>
              <input type="tel" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Contoh : 088888888888" />
            </div>

            <div class="form-group">
              <label for="alamat" class="block text-slate-700 text-xs font-bold mb-2">Alamat Lengkap *</label>
              <textarea id="alamat" name="alamat" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[100px]" placeholder="Contoh : Jl. Kramat Jati, Demangan, Sambi, Boyolali, Jawa Tengah">{{ old('alamat') }}</textarea>
            </div>

            <div class="flex justify-between pt-4">
              <button type="button" class="inline-flex items-center justify-center px-5 py-2.5 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all" onclick="prevSection(1)">
                ← Kembali
              </button>
              <button type="button" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm" onclick="nextSection(3)">
                Lanjut Langkah 3 →
              </button>
            </div>
          </div>

          <!-- STEP 3: UPLOAD DOKUMEN & DEKLARASI -->
          <div class="form-section hidden space-y-5" id="formSection3">
            <h4 class="text-base font-bold font-outfit text-primary pb-2 border-b-2 border-slate-100 mb-5">
              3. Upload Dokumen & Pernyataan
            </h4>

            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Scan/Foto Kartu Keluarga (KK)</label>
              <div class="border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center bg-slate-50 cursor-pointer transition-all hover:border-primary flex flex-col items-center justify-center" onclick="document.getElementById('file_kk').click()">
                <div class="text-3xl mb-1.5 select-none">📄</div>
                <div class="text-xs text-slate-500 font-semibold" id="textKK">Klik di sini untuk mengunggah file KK (PDF/JPG, Max 2MB)</div>
                <input type="file" id="file_kk" name="file_kk" class="hidden" accept=".pdf,.jpg,.jpeg,.png" onchange="fileSelected('file_kk', 'textKK')" />
              </div>
            </div>

            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Scan/Foto Akta Kelahiran</label>
              <div class="border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center bg-slate-50 cursor-pointer transition-all hover:border-primary flex flex-col items-center justify-center" onclick="document.getElementById('file_akta').click()">
                <div class="text-3xl mb-1.5 select-none">📄</div>
                <div class="text-xs text-slate-500 font-semibold" id="textAkta">Klik di sini untuk mengunggah file Akta Kelahiran (PDF/JPG, Max 2MB)</div>
                <input type="file" id="file_akta" name="file_akta" class="hidden" accept=".pdf,.jpg,.jpeg,.png" onchange="fileSelected('file_akta', 'textAkta')" />
              </div>
            </div>

            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Scan/Foto Ijazah Terakhir / SKL</label>
              <div class="border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center bg-slate-50 cursor-pointer transition-all hover:border-primary flex flex-col items-center justify-center" onclick="document.getElementById('file_ijazah').click()">
                <div class="text-3xl mb-1.5 select-none">🎓</div>
                <div class="text-xs text-slate-500 font-semibold" id="textIjazah">Klik di sini untuk mengunggah file Ijazah atau SKL (PDF/JPG, Max 2MB)</div>
                <input type="file" id="file_ijazah" name="file_ijazah" class="hidden" accept=".pdf,.jpg,.jpeg,.png" onchange="fileSelected('file_ijazah', 'textIjazah')" />
              </div>
            </div>

            <div class="flex items-start gap-2.5 text-xs text-slate-600 mt-8">
              <input type="checkbox" id="declaration" name="declaration" class="mt-0.5 cursor-pointer" required />
              <label for="declaration" class="cursor-pointer select-none">Saya menyatakan bahwa data yang saya isikan di atas adalah benar. Saya bersedia mengikuti seluruh tahapan seleksi dan mematuhi peraturan Pondok Pesantren.</label>
            </div>

            <div class="flex justify-between pt-6">
              <button type="button" class="inline-flex items-center justify-center px-5 py-2.5 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all" onclick="prevSection(2)">
                ← Kembali
              </button>
              <button type="submit" class="inline-flex items-center justify-center px-6 py-3.5 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all shadow-sm">
                Kirim Formulir Pendaftaran
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection

@push('scripts')
  <!-- SweetAlert2 Registration Success Modal -->
  @if (session('registration_success'))
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        if (typeof Swal !== 'undefined') {
          Swal.fire({
            icon: 'success',
            title: 'Pendaftaran Berhasil!',
            html: `
              <div class="text-center">
                <p class="text-sm text-slate-600 mb-3">Selamat <b>{{ session('registration_success.nama') }}</b>, data pendaftaran Anda telah berhasil disimpan.</p>
                <div class="bg-slate-100 p-4 rounded-xl border border-slate-200 mb-3">
                  <span class="text-xs text-slate-500 block mb-1">Nomor Registrasi Anda:</span>
                  <span class="text-xl font-extrabold text-primary font-outfit tracking-wider select-all">{{ session('registration_success.nomor') }}</span>
                </div>
                <p class="text-xs text-slate-500">Silakan simpan Nomor Registrasi di atas. Panitia pendaftaran akan menghubungi Anda via WhatsApp untuk verifikasi berkas dan tahapan seleksi.</p>
              </div>
            `,
            confirmButtonText: 'Tutup',
            confirmButtonColor: '#144D30',
            customClass: {
              popup: 'rounded-2xl shadow-2xl border border-slate-200'
            }
          });
        }
      });
    </script>
  @endif

  <script>
    function nextSection(step) {
      if (step === 2) {
        const nama = document.getElementById('nama_lengkap').value.trim();
        const jk = document.getElementById('jenis_kelamin').value;
        const tempat = document.getElementById('tempat_lahir').value.trim();
        const tanggal = document.getElementById('tanggal_lahir').value;

        if (!nama || !jk || !tempat || !tanggal) {
          if (typeof Swal !== 'undefined') {
            Swal.fire({
              icon: 'warning',
              title: 'Data Belum Lengkap',
              text: 'Mohon lengkapi seluruh kolom bertanda bintang (*) pada Data Calon Santri.',
              confirmButtonColor: '#144D30'
            });
          } else {
            alert('Mohon lengkapi seluruh kolom bertanda bintang (*) pada Data Calon Santri.');
          }
          return;
        }
      } else if (step === 3) {
        const ortu = document.getElementById('nama_ortu').value.trim();
        const kerja = document.getElementById('pekerjaan_ortu').value;
        const hp = document.getElementById('nomor_hp').value.trim();
        const alamat = document.getElementById('alamat').value.trim();

        if (!ortu || !kerja || !hp || !alamat) {
          if (typeof Swal !== 'undefined') {
            Swal.fire({
              icon: 'warning',
              title: 'Data Belum Lengkap',
              text: 'Mohon lengkapi seluruh kolom bertanda bintang (*) pada Data Orang Tua/Wali.',
              confirmButtonColor: '#144D30'
            });
          } else {
            alert('Mohon lengkapi seluruh kolom bertanda bintang (*) pada Data Orang Tua/Wali.');
          }
          return;
        }
      }

      document.querySelectorAll('.form-section').forEach(sec => {
        sec.classList.add('hidden');
        sec.classList.remove('active');
      });
      document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));

      const formSec = document.getElementById('formSection' + step);
      if (formSec) {
        formSec.classList.remove('hidden');
        formSec.classList.add('active');
      }

      const stepInd = document.getElementById('stepIndicator' + step);
      if (stepInd) {
        stepInd.classList.add('active');
      }

      for (let i = 1; i < step; i++) {
        const prevInd = document.getElementById('stepIndicator' + i);
        if (prevInd) prevInd.classList.add('completed');
      }
    }

    function prevSection(step) {
      document.querySelectorAll('.form-section').forEach(sec => {
        sec.classList.add('hidden');
        sec.classList.remove('active');
      });
      document.querySelectorAll('.step').forEach(s => {
        s.classList.remove('active');
        s.classList.remove('completed');
      });

      const formSec = document.getElementById('formSection' + step);
      if (formSec) {
        formSec.classList.remove('hidden');
        formSec.classList.add('active');
      }

      const stepInd = document.getElementById('stepIndicator' + step);
      if (stepInd) {
        stepInd.classList.add('active');
      }

      for (let i = 1; i < step; i++) {
        const prevInd = document.getElementById('stepIndicator' + i);
        if (prevInd) prevInd.classList.add('completed');
      }
    }

    function fileSelected(inputId, textId) {
      const fileInput = document.getElementById(inputId);
      const textBox = document.getElementById(textId);
      if (fileInput && fileInput.files.length > 0) {
        textBox.innerText = "✓ File terpilih: " + fileInput.files[0].name + " (" + (fileInput.files[0].size / 1024 / 1024).toFixed(2) + " MB)";
        textBox.style.color = "#10B981";
      }
    }
  </script>
@endpush
