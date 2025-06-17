<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;
use App\Models\Penggajian;
use App\Models\bagian_karyawan;
use App\Models\jabatan_karyawan;
use App\Models\Bagian;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';
    protected $fillable = [
        'nama_jabatan',
        'gapok_jabatan',
        'tunjangan_jabatan',
        'uang_makan_perhari'
    ];
    public $timestamps = false;
    // public function karyawan()
    // {
    //     return $this->hasMany(Karyawan::class, 'jabatan_id');
    // }
    // public function bagian_karyawan()
    // {
    //     return $this->hasMany(bagian_karyawan::class, 'jabatan_id');
    // }

    public function jabatan_karyawan()
    {
        return $this->hasMany(jabatan_karyawan::class, 'jabatan_id');
    }

}
