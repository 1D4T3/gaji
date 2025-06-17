<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;
    protected $table = 'penggajian';

    protected $fillable =[
        'karyawan_id',
        'tahun',
        'bulan',
        'gapok',
        'tunjangan',
        'uang_makan'
    ];
    public $timestamps = false;
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}
