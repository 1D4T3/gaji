<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Data Karyawan</title>
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
    <h2 style="text-align: center">Laporan Data Karyawan</h2>
    <hr>
    <table>
        <tr>
            <th>NO.</th>
            <th>NIK</th>
            <th>NAMA LENGKAP</th>
            <th>HANDPHONE</th>
            <th>EMAIL</th>
            <th>TANGGAL MASUK</th>
            <th>ID PENGGUNA</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach ($karyawan as $ky)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $ky->nik }}</td>
            <td>{{ $ky->nama_lengkap }}</td>
            <td>{{ $ky->handphone }}</td>
            <td>{{ $ky->email }}</td>
            <td>{{ $ky->tanggal_masuk }}</td>
            <td>{{ $ky->pengguna_id }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
