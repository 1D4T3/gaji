@extends('adminlte::page')

@section('title', 'Data Penggajian')

@section('content_header')
    <h1 class="m-0 text-dark">Data Penggajian</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title"><strong>Tambah Data Penggajian</strong></h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('penggajian.store') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="form-label col-sm-2">Karyawan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="karyawan_id" placeholder="Karyawan ID"
                                        class="form-control" value="{{ old('karyawan_id') }}" required>
                                </div>
                            </div>
                            <label class="form-label col-sm-2">Tahun</label>
                            <div class="col-sm-4">
                                <input type="number" name="tahun" placeholder="Tahun" class="form-control" value="{{ old('tahun') }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-sm-2">Bulan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="bulan" placeholder="Bulan" class="form-control" value="{{ old('bulan') }}" required>
                                </div>
                            </div>
                            <label class="form-label col-sm-2">Gaji Pokok</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="number" name="gapok" placeholder="Gaji Pokok" class="form-control" value="{{ old('gapok') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-2">Tunjangan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="number" name="tunjangan" placeholder="Tunjangan" class="form-control" value="{{ old('tunjangan') }}" required>
                                </div>
                            </div>
                            <label class="form-label col-sm-2">Uang Makan</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="number" name="uang_makan" placeholder="Uang Makan" class="form-control" value="{{ old('uang_makan') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-info" id="simpan">SIMPAN</button>
                            <a href="{{ route('penggajian.index') }}" class="btn btn-danger">BATAL</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
