<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Kontak</title>
</head>
<body>
    <h1>Pesan Kontak Baru</h1>
    <p><strong>Nama:</strong> {{ $fullName }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>WhatsApp:</strong> {{ $whatsapp }}</p>
    <p><strong>Pesan:</strong></p>
    <p>{{ nl2br(e($messageContent)) }}</p>
</body>
</html>
