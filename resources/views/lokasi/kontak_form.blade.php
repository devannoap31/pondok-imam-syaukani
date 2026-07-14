<!-- RIGHT COLUMN: CONTACT FORM -->
<div class="bg-white rounded-3xl border border-slate-200 shadow-md p-6 sm:p-10 w-full">
  <div class="inline-block bg-accent-bg text-accent-dark text-xs font-bold uppercase tracking-[1.5px] px-4 py-1.5 rounded-full mb-5 select-none">
    Hubungi Kami
  </div>
  <h3 class="text-xl font-bold font-outfit text-primary mb-2">
    Kirim Pesan / Hubungi Kami
  </h3>
  <p class="text-slate-500 text-sm mb-6 leading-relaxed">
    Silakan hubungi kami atau kunjungi langsung pondok pesantren untuk bersilaturahmi dan melihat kegiatan santri.
  </p>

  <form onsubmit="event.preventDefault(); alert('Pesan Anda telah terkirim! Terima kasih.');" class="space-y-5">
    <div class="form-group">
      <label for="fullName" class="block text-slate-700 text-xs font-bold mb-2">Nama Lengkap *</label>
      <input type="text" id="fullName" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Masukkan nama Anda" required />
    </div>
    <div class="form-group">
      <label for="whatsapp" class="block text-slate-700 text-xs font-bold mb-2">Nomor WhatsApp (Aktif) *</label>
      <input type="tel" id="whatsapp" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none" placeholder="Contoh: 081234567890" required />
    </div>
    <div class="form-group">
      <label for="message" class="block text-slate-700 text-xs font-bold mb-2">Pesan / Pertanyaan *</label>
      <textarea id="message" class="w-full px-4.5 py-3 border border-slate-300 rounded-xl text-sm transition-all focus:border-primary focus:shadow-[0_0_0_3px_rgba(18,78,63,0.1)] focus:outline-none resize-y min-h-[120px]" placeholder="Tuliskan pesan Anda secara detail..." required></textarea>
    </div>
    <button type="submit" class="inline-flex items-center justify-center px-6 py-3.5 bg-primary text-white rounded-full text-sm font-semibold hover:bg-primary-dark transition-all w-full shadow-sm">
      Kirim Pesan
    </button>
  </form>
</div>
