@extends('adminlte::page')

@section('title', 'Data Penggajian')
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark">Data Penggajian</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h2 class="card-title"><strong>Table Data Penggajian</strong></h2>
                    <a href="{{ route('penggajian.create') }}" class="btn btn-primary btn-md float-right"> Tambah Penggajian</a>
                    <a href="{{ route('penggajian._excel') }}" class="btn btn-info btn-md float-right mr-1"> Export Excel</a>
                   <a href="{{ route('penggajian._pdf') }}" class="btn btn-success btn-md float-right mr-1"> Print Penggajian</a>
                    <a href="{{ route('penggajian.chart') }}" class="btn btn-warning btn-md float-right mr-1"> Grafik Penggajian</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="penggajian">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>KARYAWAN</th>
                                    <th>TAHUN</th>
                                    <th>BULAN</th>
                                    <th>GAJI POKOK</th>
                                    <th>TUNJANGAN</th>
                                    <th>UANG MAKAN</th>
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
            var dataTable = $('#penggajian').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                stateSave: true,
                // scrollX: true,
                "order": [
                    [0, "desc"]
                ],
                ajax: '{{ route('get.penggajian') }}',
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
                        data: 'tahun',
                        name: 'tahun'
                    },
                    {
                        data: 'bulan',
                        name: 'bulan'
                    },
                    {
                        data: 'gapok',
                        name: 'gapok'
                    },
                    {
                        data: 'tunjangan',
                        name: 'tunjangan'
                    },
                    {
                        data: 'uang_makan',
                        name: 'uang_makan'
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
