@extends('adminlte::page')

@section('title', 'Data Karyawan')

@section('content_header')
    <h1 class="m-0 text-dark">Data Karyawan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title"><strong>Edit Data Karyawan</strong></h3>
                </div>

                <div class="card-body">
                    @include('partials._error')

                    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label class="form-label col-sm-2">NIK</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="nik" placeholder="NIK" class="form-control"
                                        value="{{ isset($karyawan) ? $karyawan->nik : old('nik') }}" required>
                                </div>
                            </div>

                            <label class="form-label col-sm-2">Nama Lengkap</label>
                            <div class="col-sm-4">
                                <input type="text" name="nama_lengkap" placeholder="Nama Anda" class="form-control"
                                    value="{{ isset($karyawan) ? $karyawan->nama_lengkap : old('nama_lengkap') }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-2">Handphone</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="number" name="handphone" placeholder="Nomor HP" class="form-control"
                                        value="{{ isset($karyawan) ? $karyawan->handphone : old('handphone') }}" required>
                                </div>
                            </div>

                            <label class="form-label col-sm-2">Email</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="email" placeholder="Email Anda" class="form-control"
                                        value="{{ isset($karyawan) ? $karyawan->email : old('email') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-2">Tanggal Masuk</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="date" name="tanggal_masuk" class="form-control"
                                        value="{{ isset($karyawan) ? $karyawan->tanggal_masuk : old('tanggal_masuk') }}" required>
                                </div>
                            </div>
                            <label class="form-label col-sm-2">ID Pengguna</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" name="pengguna_id" placeholder="ID Pengguna" class="form-control"
                                        value="{{ isset($karyawan) ? $karyawan->pengguna_id : old('pengguna_id') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-info" id="simpan">SIMPAN</button>
                            <a href="{{ route('karyawan.index') }}" class="btn btn-danger">BATAL</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
