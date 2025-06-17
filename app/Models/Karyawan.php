<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengguna;
use App\Models\Bagian;
use App\Models\Jabatan;
use App\Models\Presensi;
use App\Models\Penggajian;
use App\Models\bagian_karyawan;
use App\Models\jabatan_karyawan;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';

    protected $fillable =[
        'nik',
        'nama_lengkap',
        'handphone',
        'email',
        'tanggal_masuk',
        'pengguna_id'

    ];
    public $timestamps = false;

    public function pengguna()
    {

        return $this->belongsTo(Pengguna::class, 'pengguna_id');
    }
    public function bagian()
    {
        return $this->hasMany(Bagian::class, 'karyawan_id');
    }
    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'karyawan_id');
    }
    public function penggajian()
    {
        return $this->hasMany(Penggajian::class, 'karyawan_id');
    }
    public function bagian_karyawan()
    {
        return $this->hasMany(bagian_karyawan::class, 'karyawan_id');
    }
    public function jabatan_karyawan()
    {
        return $this->hasMany(jabatan_karyawan::class, 'karyawan_id');
    }
}
