@extends('frontend.layouts.app', ['activePage' => 'register'])

@section('title', 'Penerimaan Santri Baru – PPTQ Imam Syaukani')
@section('meta_description', 'Lengkapi formulir pendaftaran di bawah ini untuk bergabung menjadi santri PPTQ Imam Syaukani.')

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
        <a href="index.blade.php" class="text-white/70 hover:text-accent transition-colors">Home</a>
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

        <!-- Stepper -->
        <div class="flex justify-between mb-10 relative before:content-[''] before:absolute before:top-5 before:left-0 before:right-0 before:h-0.5 before:bg-slate-200 before:z-1">
          <div class="relative z-2 text-center flex-1 step active" id="stepIndicator1">
            <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold mx-auto mb-2 transition-colors select-none">1</div>
            <div class="text-[10px] sm:text-xs font-semibold text-slate-400">Calon Santri</div>
          </div>
          <div class="relative z-2 text-center flex-1 step" id="stepIndicator2">
            <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold mx-auto mb-2 transition-colors select-none">2</div>
            <div class="text-[10px] sm:text-xs font-semibold text-slate-400">Orang Tua/Wali</div>
          </div>
          <div class="relative z-2 text-center flex-1 step" id="stepIndicator3">
            <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold mx-auto mb-2 transition-colors select-none">3</div>
            <div class="text-[10px] sm:text-xs font-semibold text-slate-400">Upload Dokumen</div>
          </div>
        </div>

        <form id="regForm" onsubmit="handleRegistration(event)" class="space-y-6">
          <!-- STEP 1: DATA CALON SANTRI -->
          <div class="form-section active space-y-5" id="formSection1">
            <h4 class="text-base font-bold font-outfit text-primary pb-2 border-b-2 border-slate-100 mb-5">
              1. Data Calon Santri
            </h4>
            
            <div class="form-group">
              <label for="fullName" class="block text-slate-700 text-xs font-bold mb-2">Nama Panjang (Sesuai Akte) *</label>
              <input type="text" id="fullName" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Masukkan Nama Lengkap" required />
            </div>

            <div class="form-group">
              <label for="nik" class="block text-slate-700 text-xs font-bold mb-2">NIK (Nomor Induk Keluarga) *</label>
              <input type="text" id="nik" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="16 Digit NIK" maxlength="16" pattern="\d{16}" required />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div class="form-group">
                <label for="gender" class="block text-slate-700 text-xs font-bold mb-2">Jenis Kelamin *</label>
                <select id="gender" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required>
                  <option value="" disabled selected>Pilih Jenis Kelamin</option>
                  <option value="Laki-laki">Laki-laki (Santri)</option>
                  <option value="Perempuan">Perempuan (Santriwati)</option>
                </select>
              </div>
              <div class="form-group">
                <label for="schoolTarget" class="block text-slate-700 text-xs font-bold mb-2">Jenjang yang dituju *</label>
                <select id="schoolTarget" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required>
                  <option value="" disabled selected>Pilih Jenjang</option>
                  <option value="MTs/SMP">MTs (Madrasah Tsanawiyah)</option>
                  <option value="MA/SMA">MA (Madrasah Aliyah)</option>
                  <option value="Takhossus">Takhossus (Tahfidz Intensif)</option>
                </select>
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div class="form-group">
                <label for="birthPlace" class="block text-slate-700 text-xs font-bold mb-2">Tempat Lahir *</label>
                <input type="text" id="birthPlace" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Contoh : Karanganyar" required />
              </div>
              <div class="form-group">
                <label for="birthDate" class="block text-slate-700 text-xs font-bold mb-2">Tanggal Lahir *</label>
                <input type="date" id="birthDate" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required />
              </div>
            </div>

            <div class="form-group">
              <label for="prevSchool" class="block text-slate-700 text-xs font-bold mb-2">Asal Sekolah *</label>
              <input type="text" id="prevSchool" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Asal Sekolah Sebelumnya" required />
            </div>

            <div class="flex justify-end pt-4">
              <button type="button" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all" onclick="nextSection(2)">
                Lanjut Langkah 2
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
                <label for="fatherName" class="block text-slate-700 text-xs font-bold mb-2">Nama Ayah *</label>
                <input type="text" id="fatherName" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Nama Lengkap Ayah" required />
              </div>
              <div class="form-group">
                <label for="motherName" class="block text-slate-700 text-xs font-bold mb-2">Nama Ibu *</label>
                <input type="text" id="motherName" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Nama Lengkap Ibu" required />
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
              <div class="form-group">
                <label for="parentWhatsapp" class="block text-slate-700 text-xs font-bold mb-2">Nomor WhatsApp (Aktif) *</label>
                <input type="tel" id="parentWhatsapp" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Contoh : 0888 8888 8888" required />
              </div>
              <div class="form-group">
                <label for="parentJob" class="block text-slate-700 text-xs font-bold mb-2">Pekerjaan Orang Tua *</label>
                <select id="parentJob" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none bg-white" required>
                  <option value="" disabled selected>Pilih Pekerjaan</option>
                  <option value="PNS/TNI/Polri">PNS / TNI / Polri</option>
                  <option value="Karyawan Swasta">Karyawan Swasta</option>
                  <option value="Wiraswasta">Wiraswasta / Pedagang</option>
                  <option value="Petani/Nelayan">Petani / Nelayan</option>
                  <option value="Lainnya">Lainnya</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="parentAddress" class="block text-slate-700 text-xs font-bold mb-2">Alamat Lengkap *</label>
              <textarea id="parentAddress" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[100px]" placeholder="Contoh : Jl. Contoh, No. 12, RT/RW, Kelurahan, Kecamatan, Kabupaten" required></textarea>
            </div>

            <div class="flex justify-between pt-4">
              <button type="button" class="inline-flex items-center justify-center px-5 py-2.5 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all" onclick="prevSection(1)">
                Kembali
              </button>
              <button type="button" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all" onclick="nextSection(3)">
                Lanjut Langkah 3
              </button>
            </div>
          </div>

          <!-- STEP 3: UPLOAD DOKUMEN & DEKLARASI -->
          <div class="form-section hidden space-y-5" id="formSection3">
            <h4 class="text-base font-bold font-outfit text-primary pb-2 border-b-2 border-slate-100 mb-5">
              3. Upload Dokumen & Pernyataan
            </h4>

            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Scan/Foto Kartu Keluarga (KK) *</label>
              <div class="border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center bg-slate-50 cursor-pointer transition-all hover:border-primary flex flex-col items-center justify-center" onclick="document.getElementById('fileKK').click()">
                <div class="text-3xl mb-1.5 select-none">📄</div>
                <div class="text-xs text-slate-500 font-semibold" id="textKK">Klik di sini untuk mengunggah file KK (PDF/JPG, Max 2MB)</div>
                <input type="file" id="fileKK" class="hidden" accept=".pdf,.jpg,.jpeg,.png" onchange="fileSelected('fileKK', 'textKK')" required />
              </div>
            </div>

            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Scan/Foto Akta Kelahiran *</label>
              <div class="border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center bg-slate-50 cursor-pointer transition-all hover:border-primary flex flex-col items-center justify-center" onclick="document.getElementById('fileAkta').click()">
                <div class="text-3xl mb-1.5 select-none">📄</div>
                <div class="text-xs text-slate-500 font-semibold" id="textAkta">Klik di sini untuk mengunggah file Akta Kelahiran (PDF/JPG, Max 2MB)</div>
                <input type="file" id="fileAkta" class="hidden" accept=".pdf,.jpg,.jpeg,.png" onchange="fileSelected('fileAkta', 'textAkta')" required />
              </div>
            </div>

            <div class="form-group">
              <label class="block text-slate-700 text-xs font-bold mb-2">Scan/Foto Ijazah Terakhir / SKL *</label>
              <div class="border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center bg-slate-50 cursor-pointer transition-all hover:border-primary flex flex-col items-center justify-center" onclick="document.getElementById('fileIjazah').click()">
                <div class="text-3xl mb-1.5 select-none">🎓</div>
                <div class="text-xs text-slate-500 font-semibold" id="textIjazah">Klik di sini untuk mengunggah file Ijazah atau SKL (PDF/JPG, Max 2MB)</div>
                <input type="file" id="fileIjazah" class="hidden" accept=".pdf,.jpg,.jpeg,.png" onchange="fileSelected('fileIjazah', 'textIjazah')" required />
              </div>
            </div>

            <div class="flex items-start gap-2.5 text-xs text-slate-600 mt-8">
              <input type="checkbox" id="declaration" class="mt-0.5 cursor-pointer" required />
              <label for="declaration" class="cursor-pointer select-none">Saya menyatakan bahwa data yang saya isikan di atas adalah benar. Saya bersedia mengikuti seluruh tahapan seleksi dan mematuhi peraturan Pondok Pesantren.</label>
            </div>

            <div class="flex justify-between pt-6">
              <button type="button" class="inline-flex items-center justify-center px-5 py-2.5 border-2 border-primary text-primary rounded-full text-xs font-semibold hover:bg-primary hover:text-white transition-all" onclick="prevSection(2)">
                Kembali
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

@section('scripts')
  <script>
    function nextSection(step) {
      // Basic check
      if (step === 2) {
        if (!document.getElementById('fullName').value || !document.getElementById('nik').value || !document.getElementById('gender').value || !document.getElementById('schoolTarget').value || !document.getElementById('birthPlace').value || !document.getElementById('birthDate').value || !document.getElementById('prevSchool').value) {
          alert('Mohon lengkapi semua field bertanda bintang (*)');
          return;
        }
        if (document.getElementById('nik').value.length !== 16) {
          alert('NIK harus terdiri dari 16 digit');
          return;
        }
      } else if (step === 3) {
        if (!document.getElementById('fatherName').value || !document.getElementById('motherName').value || !document.getElementById('parentWhatsapp').value || !document.getElementById('parentJob').value || !document.getElementById('parentAddress').value) {
          alert('Mohon lengkapi semua field bertanda bintang (*)');
          return;
        }
      }

      // Hide all sections
      document.querySelectorAll('.form-section').forEach(sec => {
        sec.classList.add('hidden');
        sec.classList.remove('active');
      });
      document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));

      // Active
      const formSec = document.getElementById('formSection' + step);
      formSec.classList.remove('hidden');
      formSec.classList.add('active');

      document.getElementById('stepIndicator' + step).classList.add('active');
      for (let i = 1; i < step; i++) {
        document.getElementById('stepIndicator' + i).classList.add('completed');
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
      formSec.classList.remove('hidden');
      formSec.classList.add('active');

      document.getElementById('stepIndicator' + step).classList.add('active');
      for (let i = 1; i < step; i++) {
        document.getElementById('stepIndicator' + i).classList.add('completed');
      }
    }

    function fileSelected(inputId, textId) {
      const fileInput = document.getElementById(inputId);
      const textBox = document.getElementById(textId);
      if (fileInput.files.length > 0) {
        textBox.innerText = "✓ File terpilih: " + fileInput.files[0].name + " (" + (fileInput.files[0].size / 1024 / 1024).toFixed(2) + " MB)";
        textBox.style.color = "#10B981"; // Success color (emerald)
      }
    }

    function handleRegistration(event) {
      event.preventDefault();
      if (!document.getElementById('declaration').checked) {
        alert('Anda harus menyetujui pernyataan deklarasi.');
        return;
      }
      alert('Pendaftaran berhasil dikirim! Silakan periksa WhatsApp Anda secara berkala untuk info tahapan seleksi selanjutnya.');
      window.location.href = 'index.blade.php';
    }
  </script>
@endsection
