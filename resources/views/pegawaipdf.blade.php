<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Divisi</title>
</head>
<body>
    <h1>Data Detail Pegawai</h1>
    {{-- <p>Id : {{$pegawai->id}}</p> --}}
    <p>NIP : {{$pegawai->nip}}</p>
    <p>Nama : {{$pegawai->nama}}</p>
    <p>Alamat : {{$pegawai->alamat}}</p>
    <p>Tanggal Lahir : {{$pegawai->tanggal_lahir}}</p>
    <p>Divisi : {{$pegawai->divisi->nama_divisi}}</p>
</body>
</html>
