<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;
use App\Models\Bagian;

class bagian_karyawan extends Model
{
    use HasFactory;
    protected $table = 'bagian_karyawan';

    protected $fillable = [
        'bagian_id',
        'karyawan_id',
        'tanggal_mulai',
    ];
    public $timestamps = false;
    public function bagian()
    {
        return $this->belongsTo(Bagian::class, 'bagian_id');
    }
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
}
}
