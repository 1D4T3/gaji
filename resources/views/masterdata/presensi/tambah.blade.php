@extends('adminlte::page')

@section('title', 'Data Presensi')

@section('content_header')
    <h1 class="m-0 text-dark">Data Presensi</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title"><strong>Tambah Data Presensi</strong></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('presensi.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="form-label col-sm-2">Karyawan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="karyawan_id" placeholder="Karyawan ID"
                                        class="form-control" value="{{ old('karyawan_id') }}" required>
                                </div>
                            </div>
                            <label class="form-label col-sm-2">Tanggal</label>
                            <div class="col-sm-4">
                                <input type="date" name="tanggal" placeholder="Tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-sm-2">Jam Masuk</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="time" name="jam_masuk" placeholder="Jam Masuk" class="form-control" value="{{ old('jam_masuk') }}" required>
                                </div>
                            </div>
                            <label class="form-label col-sm-2">Jam Keluar</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="time" name="jam_keluar" placeholder="Jam Keluar" class="form-control" value="{{ old('jam_keluar') }}" required>
                                </div>
                            </div>
                            <label class="form-label col-sm-2">Keterangan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="keterangan" placeholder="Keterangan" class="form-control" value="{{ old('keterangan') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-info" id="simpan">SIMPAN</button>
                            <a href="{{ route('presensi.index') }}" class="btn btn-danger">BATAL</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
