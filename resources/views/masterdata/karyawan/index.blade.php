@extends('adminlte::page')

@section('title', 'Data Karyawan')
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark">Data Karyawan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h2 class="card-title"><strong>Table Data Karyawan</strong></h2>
                    <a href="{{ route('karyawan.create') }}" class="btn btn-primary btn-md float-right"> Tambah Karyawan</a>
                    <a href="{{ route('karyawan._excel') }}" class="btn btn-info btn-md float-right mr-1"> Export Excel</a>
                    <a href="{{ route('karyawan._pdf') }}" class="btn btn-success btn-md float-right mr-1"> Print Karyawan</a>
                    <a href="{{ route('karyawan.chart') }}" class="btn btn-warning btn-md float-right mr-1"> Grafik Karyawan</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="karyawan">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>NIK</th>
                                    <th>NAMA LENGKAP</th>
                                    <th>HANDPHONE</th>
                                    <th>EMAIL</th>
                                    <th>TANGGAL MASUK</th>
                                    <th>ID PENGGUNA</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            var dataTable = $('#karyawan').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                stateSave: true,
                // scrollX: true,
                "order": [
                    [0, "desc"]
                ],
                ajax: '{{ route('get.karyawan') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'handphone',
                        name: 'handphone'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'tanggal_masuk',
                        name: 'tanggal_masuk'
                    },
                    {
                        data: 'pengguna_id',
                        name: 'pengguna_id'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        'sClass': 'text-center'
                    }
                ]
            });
        });
    </script>
@endpush
