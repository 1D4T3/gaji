@extends('adminlte::page')

@section('title', 'Data Bagian Karyawan')
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark">Data Bagian Karyawan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h2 class="card-title"><strong>Table Data Bagian Karyawan</strong></h2>
                    <a href="{{ route('bagian_karyawan.create') }}" class="btn btn-primary btn-md float-right"> Tambah Bagian Karyawan</a>
                    <a href="{{ route('bagian_karyawan._excel') }}" class="btn btn-info btn-md float-right mr-1"> Export Excel</a>
                    <a href="{{ route('bagian_karyawan._pdf') }}" class="btn btn-success btn-md float-right mr-1"> Print Bagian Karyawan</a>
                    <a href="{{ route('bagian_karyawan.chart') }}" class="btn btn-warning btn-md float-right mr-1"> Grafik Bagian Karyawan</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="bagian_karyawan">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>BAGIAN</th>
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
            var dataTable = $('#bagian_karyawan').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                stateSave: true,
                // scrollX: true,
                "order": [
                    [0, "desc"]
                ],
                ajax: '{{ route('get.bagian_karyawan') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'bagian_id',
                        name: 'bagian_id'
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
