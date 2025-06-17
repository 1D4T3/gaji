@extends('adminlte::page')

@section('title', 'Data Bagian')

@section('content_header')
    <h1 class="m-0 text-dark">Data Bagian</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title"><strong>Tambah Data Bagian</strong></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('bagian.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="form-label col-sm-2">Nama Bagian</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="nama_bagian" placeholder="Bagian"
                                        class="form-control" value="{{ old('nama_bagian') }}" required>
                                </div>
                            </div>
                            <label class="form-label col-sm-2">Karyawan</label>
                            <div class="col-sm-4">
                                <input type="text" name="karyawan_id" placeholder="ID Karyawan" class="form-control" value="{{ old('karyawan_id') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-sm-2">Lokasi</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="lokasi_id" placeholder="ID Lokasi" class="form-control" value="{{ old('lokasi_id') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-info" id="simpan">SIMPAN</button>
                            <a href="{{ route('bagian.index') }}" class="btn btn-danger">BATAL</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
