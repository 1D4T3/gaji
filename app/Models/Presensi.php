<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'presensi';


    protected $fillable =[
        'karyawan_id',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
        'keterangan'
    ];
    public $timestamps = false;
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}
