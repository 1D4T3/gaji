@php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export_gaji_per_presensi.xls");
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Presensi</title>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center">Laporan Data Presensi</h2>
    <hr>
    <table>
        <tr>
            <th>NO.</th>
            <th>KARYAWAN</th>
            <th>TANGGAL</th>
            <th>JAM MASUK</th>
            <th>JAM KELUAR</th>
            <th>KETERANGAN</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach ($presensi as $ps)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $ps->karyawan_id }}</td>
            <td>{{ $ps->tanggal }}</td>
            <td>{{ $ps->jam_masuk }}</td>
            <td>{{ $ps->jam_keluar }}</td>
            <td>{{ $ps->keterangan }}</td>
        </tr>
        @endforeach
    </table>
</body>
