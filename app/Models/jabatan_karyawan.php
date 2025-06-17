<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jabatan;
use App\Models\Karyawan;


class jabatan_karyawan extends Model
{
    use HasFactory;

    /**
     *
     *
     * @var string
     */
    protected $table = 'jabatan_karyawan';

    /**
     *
     *
     * @var array
     */
    protected $fillable = [
        'jabatan_id',
        'karyawan_id',
        'tanggal_mulai',
    ];
    public $timestamps = false;

    // --- BAGIAN TAMBAHAN YANG PALING PENTING ---

    /**
     * Mendefinisikan relasi "belongsTo" ke model Jabatan.
     * Ini memberitahu Laravel bahwa setiap record di sini MILIK satu Jabatan.
     */
    public function jabatan()
    {
        // Parameter kedua ('jabatan_id') adalah foreign key di tabel 'jabatan_karyawan'
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    /**
     * Mendefinisikan relasi "belongsTo" ke model Karyawan.
     * Ini memberitahu Laravel bahwa setiap record di sini MILIK satu Karyawan.
     */
    public function karyawan()
    {
        // Parameter kedua ('karyawan_id') adalah foreign key di tabel 'jabatan_karyawan'
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}

