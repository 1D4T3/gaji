@php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=export_gaji_per_bagian_karyawan.xls");
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Bagian Karyawan</title>

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
    <h2 style="text-align: center">Laporan Data Bagian Karyawan</h2>
    <hr>
    <table>
        <tr>
            <th>NO.</th>
            <th>BAGIAN</th>
            <th>KARYAWAN</th>
            <th>TANGGAL MULAI</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach ($bagian_karyawan as $bk)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $bk->bagian_id }}</td>
            <td>{{ $bk->karyawan_id }}</td>
            <td>{{ $bk->tanggal_mulai }}</td>
        </tr>
        @endforeach
    </table>
</body>
