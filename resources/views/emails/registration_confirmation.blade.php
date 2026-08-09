<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pendaftaran</title>
</head>
<body>
    <div style="font-family: sans-serif; color: #111;">
        <h1>Terima Kasih, {{ $name }}!</h1>
        <p>Data pendaftaran Anda telah kami terima. Nomor pendaftaran Anda akan digunakan untuk pengecekan status selanjutnya.</p>
        <p><strong>Nomor Pendaftaran:</strong> {{ $registrationCode }}</p>
        <p><strong>Status awal:</strong> {{ $status }}</p>
        <p>Silakan catat nomor pendaftaran ini dan gunakan pada halaman <a href="{{ route('status-pendaftaran.show') }}">Cek Status Pendaftaran</a>.</p>
        <p>Jika Anda memiliki pertanyaan, silakan hubungi kami kembali.</p>
        <p>Salam,<br>Pondok Imam Syaukani</p>
    </div>
</body>
</html>
