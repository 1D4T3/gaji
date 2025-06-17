@extends('adminlte::page')

@section('title', 'Data Jabatan Karyawan')

@section('content_header')
    <h1 class="m-0 text-dark">Data Jabatan Karyawan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title"><strong>Tambah Data Jabatan Karyawan</strong></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('jabatan_karyawan.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="form-label col-sm-2">Jabatan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="jabatan_id" placeholder="Jabatan Karyawan"
                                        class="form-control" value="{{ old('jabatan_id') }}" required>
                                </div>
                            </div>
                            <label class="form-label col-sm-2">Karyawan</label>
                            <div class="col-sm-4">
                                <input type="text" name="karyawan_id" placeholder="ID Karyawan" class="form-control" value="{{ old('karyawan_id') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-sm-2">Tanggal Mulai</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="date" name="tanggal_mulai" placeholder="Tanggal" class="form-control" value="{{ old('tanggal_mulai') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-info" id="simpan">SIMPAN</button>
                            <a href="{{ route('jabatan_karyawan.index') }}" class="btn btn-danger">BATAL</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
