<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = 'pengguna';

    protected $fillable = [
        'username',
        'password',
        'peran',
        'login_terakhir|nullable',
    ];
    public $timestamps = false;
    public function karyawan()
    {
        return $this->hasOne(Karyawan::class, 'pengguna_id');
    }

}
