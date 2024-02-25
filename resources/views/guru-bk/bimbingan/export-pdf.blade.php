<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table style="width: 100%">
        <tr>
            <td style="width: 20%">
                <img src="{{ public_path('images/logo.png') }}" alt="gambar" width="100">
            </td>
            <td>
                <h3 style="text-align: center">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h3>
                <h2 style="text-align: center; margin-top: -10px">
                    SMKN 1 BATUSANGKAR
                </h2>
                <p style="margin-top: -10px; text-align: center">
                    <i>
                        GJ9J+W27, Saruaso, Kec. Tj. Emas, Kabupaten Tanah
                        Datar, Sumatera Barat
                        27281
                    </i>
                </p>
            </td>
        </tr>
    </table>

    <table style="width: 100%; border-collapse: collapse; margin-top: 10px">
        <tr>
            <th style="border: 1px solid black; width: 3%">No.</th>
            <th style="border: 1px solid black;">Siswa</th>
            <th style="border: 1px solid black;">Jadwal</th>
            <th style="border: 1px solid black;">Tanggal Bimbingan</th>
            <th style="border: 1px solid black;">Status</th>
        </tr>
        @foreach ($bimbingans as $data)
            <tr>
                <td style="border: 1px solid black;">{{ $loop->iteration }}</td>
                <td style="border: 1px solid black;">{{ $data->siswa->nama_siswa ?? '-' }}</td>
                <td style="border: 1px solid black;">{{ $data->jadwal->hari_jadwal ?? '-' }}</td>
                <td style="border: 1px solid black;">{{ $data->tgl_bimbingan ?? '-' }}</td>
                <td style="border: 1px solid black;">{{ $data->status_bimbingan ?? '-' }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
