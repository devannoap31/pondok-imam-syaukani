<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pendaftaran Diperbarui</title>
</head>
<body>
    <div style="font-family: sans-serif; color: #111;">
        <h1>Status Pendaftaran Anda Telah Diperbarui</h1>
        <p>Halo {{ $name }},</p>
        <p>Status pendaftaran Anda telah berubah menjadi <strong>{{ $newStatus }}</strong>.</p>
        <p><strong>Nomor Pendaftaran:</strong> {{ $registrationCode }}</p>
        <p>Silakan cek kembali status pendaftaran Anda di halaman <a href="{{ route('status-pendaftaran.show') }}">Cek Status Pendaftaran</a>.</p>

        @if($newStatus === 'Diterima')
            <p>Selamat! Anda diterima. Panitia akan menghubungi Anda lebih lanjut untuk proses selanjutnya.</p>
            <p><strong>Jangan lupa daftar ulang di tempat sebelum tanggal 20 Agustus 2026.</strong> Pastikan kehadiran Anda sesuai jadwal agar pendaftaran Anda tetap aktif.</p>
        @elseif($newStatus === 'Ditolak')
            <p>Mohon maaf, status pendaftaran Anda ditolak. Jika Anda ingin klarifikasi, silakan hubungi pihak Pondok Imam Syaukani.</p>
        @else
            <p>Status pendaftaran Anda masih dalam proses verifikasi.</p>
        @endif

        <p>Salam,<br>Pondok Imam Syaukani</p>
    </div>
</body>
</html>
