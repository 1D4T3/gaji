<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Bagian</title>
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
    <h2 style="text-align: center">Laporan Data Bagian</h2>
    <hr>
    <table>
        <tr>
            <th>NO.</th>
            <th>NAMA BAGIAN</th>
            <th>KARYAWAN</th>
            <th>LOKASI</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach ($bagian as $bg)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $bg->nama_bagian }}</td>
            <td>{{ $bg->karyawan_id }}</td>
            <td>{{ $bg->lokasi_id }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
