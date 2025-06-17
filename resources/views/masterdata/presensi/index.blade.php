@extends('adminlte::page')

@section('title', 'Data Presensi')
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark">Data Presensi</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h2 class="card-title"><strong>Table Data Presensi</strong></h2>
                    <a href="{{ route('presensi.create') }}" class="btn btn-primary btn-md float-right"> Tambah Presensi</a>
                    <a href="{{ route('presensi._excel') }}" class="btn btn-info btn-md float-right mr-1"> Export Excel</a>
                    <a href="{{ route('presensi._pdf') }}" class="btn btn-success btn-md float-right mr-1"> Print Presensi</a>
                    <a href="{{ route('presensi.chart') }}" class="btn btn-warning btn-md float-right mr-1"> Grafik Presensi</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="presensi">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>KARYAWAN</th>
                                    <th>TANGGAL</th>
                                    <th>JAM MASUK</th>
                                    <th>JAM KELUAR</th>
                                    <th>KETERANGAN</th>
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
            var dataTable = $('#presensi').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                stateSave: true,
                // scrollX: true,
                "order": [
                    [0, "desc"]
                ],
                ajax: '{{ route('get.presensi') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'karyawan_id',
                        name: 'karyawan_id'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'jam_masuk',
                        name: 'jam_masuk'
                    },
                    {
                        data: 'jam_keluar',
                        name: 'jam_keluar'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
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
