@php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export_gaji_per_penggajian.xls");
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Penggajian</title>

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
    <h2 style="text-align: center">Laporan Data Penggajian</h2>
    <hr>
    <table>
        <tr>
            <th>NO.</th>
            <th>KARYAWAN</th>
            <th>TAHUN</th>
            <th>BULAN</th>
            <th>GAPOK</th>
            <th>TUNJANGAN</th>
            <th>UANG MAKAN</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach ($penggajian as $pg)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $pg->karyawan_id }}</td>
            <td>{{ $pg->tahun }}</td>
            <td>{{ $pg->bulan }}</td>
            <td>{{ $pg->gapok }}</td>
            <td>{{ $pg->tunjangan }}</td>
            <td>{{ $pg->uang_makan }}</td>
        </tr>
        @endforeach
    </table>
</body>
