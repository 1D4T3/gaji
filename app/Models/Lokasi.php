<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;
    protected $table = 'lokasi';

    protected $fillable = [
        'nama_lokasi'
    ];
    public $timestamps = false;
    public function bagian()
    {
        return $this->hasMany(Bagian::class, 'lokasi_id');
    }
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'lokasi_id');
    }


}
