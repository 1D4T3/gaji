<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;
use App\Models\Lokasi;
use App\Models\bagian_karyawan;

class Bagian extends Model
{
    use HasFactory;

    protected $table = 'bagian';
    protected $fillable = [
        'nama_bagian',
        'karyawan_id',
        'lokasi_id'
    ];
    public $timestamps = false;
    public function karyawan()
    {

        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
    public function lokasi()
    {

        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
    public function bagian_karyawan()
    {
        return $this->hasMany(bagian_karyawan::class, 'bagian_id');
}
}
