<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemberitahuan Tiket Pesan</title>
</head>
<body>
    <p>Halo {{ $data['nama_pemohon'] }},</p>
    
    <p>Pesan Anda telah terkirim dengan nomor tiket: {{ $data['tiket'] }}.</p>
    
    <p>Silakan lakukan pengecekan status pesan pada halaman <a href="https://bpkad.tasikmalayakota.go.id/cek-tiket">https://bpkad.tasikmalayakota.go.id/cek-tiket</a>.</p>
    
    <p>Terima kasih atas pesan Anda.</p>

    <p>Salam,
        <br>
        BPKAD Kota Tasikmalaya
    </p>
</body>
</html>
