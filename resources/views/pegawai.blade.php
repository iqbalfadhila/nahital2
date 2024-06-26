<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pegawai</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Pegawai</h1>
    <div id="error" style="color: red;"></div>
    <form id="pegawaiForm">
        @csrf
        <label for="nip">Masukkan NIP:</label>
        <input type="text" name="nip" id="nip" required>
        <button type="submit">Cari</button>
    </form>

    <div style="margin-top: 20px">
        <button id="exportExcel" style="display: none;">Download Excel</button>
        <button id="exportPdf" style="display: none;">Download PDF</button>
    </div>

    <div id="result"></div>

    <table id="table" border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Kode Divisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pegawai as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->divisi->nama_divisi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#pegawaiForm').on('submit', function(event) {
                event.preventDefault();

                $('#error').text('');
                $('#result').html('');
                $('#exportExcel').hide();
                $('#exportPdf').hide();

                let formData = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    nip: $('#nip').val()
                };

                $.ajax({
                    url: "{{ route('pegawai.detail') }}",
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        if (data.success) {
                            let pegawai = data.pegawai
                            let html = '<h3>Hasil Pencarian Data Pegawai</h3>'
                            html += '<p>NIP          : ' + pegawai.nip + '</p>'
                            html += '<p>Nama            : ' + pegawai.nama + '</p>'
                            html += '<p>Alamat          : ' + pegawai.alamat + '</p>'
                            html += '<p>Tanggal Lahir   : ' + pegawai.tanggal_lahir + '</p>'
                            html += '<p>Divisi  : ' + pegawai.divisi.nama_divisi + '</p>'
                            $('#result').html(html);

                            $('#exportExcel').show();
                            $('#exportPdf').show();
                            $('#table').hide();

                            $('#exportExcel').off('click').on('click', function() {
                                let url = "{{ route('pegawai.export.excel') }}";
                                $('<form>', {
                                    "method": "post",
                                    "action": url
                                }).append($('<input>', {
                                    "name": "_token",
                                    "value": $('meta[name="csrf-token"]').attr('content'),
                                    "type": "hidden"
                                })).append($('<input>', {
                                    "name": "nip",
                                    "value": $('#nip').val(),
                                    "type": "hidden"
                                })).appendTo(document.body).submit().remove();
                            });
                            $('#exportPdf').off('click').on('click', function() {
                                let url = "{{ route('pegawai.export.pdf') }}";
                                $('<form>', {
                                    "method": "post",
                                    "action": url
                                }).append($('<input>', {
                                    "name": "_token",
                                    "value": $('meta[name="csrf-token"]').attr('content'),
                                    "type": "hidden"
                                })).append($('<input>', {
                                    "name": "nip",
                                    "value": $('#nip').val(),
                                    "type": "hidden"
                                })).appendTo(document.body).submit().remove();
                            });

                        } else {
                            $('#error').text(data.message);
                        }
                    },
                    error: function(xhr) {
                        console.log('Error response dari server:', xhr);
                        $('#error').text('Terjadi kesalahan. Silakan coba lagi.');
                    }
                });
            });
        });
    </script>
</body>
</html>
