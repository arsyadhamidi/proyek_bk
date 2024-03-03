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
            <td style="width: 10%">
                <img src="{{ public_path('images/sumbar.png') }}" alt="gambar" width="100">
            </td>
            <td>
                <h3 style="text-align: center">PEMERINTAH PROVINSI SUMATERA BARAT</h3>
                <h2 style="text-align: center; margin-top: -10px">
                    DINAS PENDIDIKAN
                </h2>
                <h2 style="text-align: center; margin-top: -10px">
                    SMK NEGERI 1 BATUSANGKAR
                </h2>
            </td>
            <td style="width: 10%">
                <img src="{{ public_path('images/smk.png') }}" alt="gambar" width="100">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p style="margin-top: -10px; text-align: center; font-size: 10px">
                    Alamat: Jln Pintu Rayo Saruaso E-Mail. smkn1_batusangkar@yahoo.c.o.id WEB.
                    http://smkn1batusangkar.sch.id/Telp/ Fax: (0752) 71063
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
