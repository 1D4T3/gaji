@extends('adminlte::page')

@section('title', 'Data Jabatan Karyawan')
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark">Data Jabatan Karyawan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h2 class="card-title"><strong>Table Data Jabatan Karyawan</strong></h2>
                    <a href="{{ route('jabatan_karyawan.create') }}" class="btn btn-primary btn-md float-right"> Tambah Jabatan Karyawan</a>
                    <a href="{{ route('jabatan_karyawan._excel') }}" class="btn btn-info btn-md float-right mr-1"> Export Excel</a>
                    <a href="{{ route('jabatan_karyawan._pdf') }}" class="btn btn-success btn-md float-right mr-1"> Print Jabatan Karyawan</a>
                    <a href="{{ route('jabatan_karyawan.chart') }}" class="btn btn-warning btn-md float-right mr-1"> Grafik Jabatan Karyawan</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="jabatan_karyawan">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>JABATAN</th>
                                    <th>KARYAWAN</th>
                                    <th>TANGGAL MULAI</th>
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
            var dataTable = $('#jabatan_karyawan').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                stateSave: true,
                // scrollX: true,
                "order": [
                    [0, "desc"]
                ],
                ajax: '{{ route('get.jabatan_karyawan') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'jabatan_id',
                        name: 'jabatan_id'
                    },
                    {
                        data: 'karyawan_id',
                        name: 'karyawan_id'
                    },
                    {
                        data: 'tanggal_mulai',
                        name: 'tanggal_mulai'
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
