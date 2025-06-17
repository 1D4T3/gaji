@php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export_gaji_per_jabatan_karyawan.xls");
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Jabatan Karyawan</title>

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
    <h2 style="text-align: center">Laporan Data Jabatan karyawan</h2>
    <hr>
    <table>
        <tr>
            <th>NO.</th>
            <th>JABATAN</th>
            <th>KARYAWAN</th>
            <th>TANGGAL MULAI</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach ($jabatan_karyawan as $jk)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $jk->jabatan_id }}</td>
            <td>{{ $jk->karyawan_id }}</td>
            <td>{{ $jk->tanggal_mulai }}</td>
        </tr>
        @endforeach
    </table>
</body>
