@extends('adminlte::page')

@section('title', 'Data Bagian')
@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark">Data Bagian</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h2 class="card-title"><strong>Table Data Bagian</strong></h2>
                    <a href="{{ route('bagian.create') }}" class="btn btn-primary btn-md float-right"> Tambah Bagian</a>
                    <a href="{{ route('bagian._excel') }}" class="btn btn-info btn-md float-right mr-1"> Export Excel</a>
                    <a href="{{ route('bagian._pdf') }}" class="btn btn-success btn-md float-right mr-1"> Print Bagian</a>
                    <a href="{{ route('bagian.chart') }}" class="btn btn-warning btn-md float-right mr-1"> Grafik Bagian</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="bagian">
                            <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>NAMA BAGIAN</th>
                                    <th>KARYAWAN</th>
                                    <th>LOKASI</th>
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
            var dataTable = $('#bagian').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                stateSave: true,
                // scrollX: true,
                "order": [
                    [0, "desc"]
                ],
                ajax: '{{ route('get.bagian') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama_bagian',
                        name: 'nama_bagian'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'karyawan.nama_lengkap',
                    },
                    {
                        data: 'nama_lokasi',
                        name: 'lokasi.nama_lokasi',
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
