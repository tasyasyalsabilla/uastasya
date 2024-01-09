<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'tb_absensi'; 

    protected $fillable = [
        'id_siswa', 'id_kegiatan', 'status_kehadiran', 'keterangan'
    ];

    public function siswa(): HasOne
    {
        return $this->hasOne(Siswa::class, 'id', 'id_siswa');
    }

    public function kegiatan(): HasOne
    {
        return $this->hasOne(Kegiatan::class, 'id', 'id_kegiatan');
    }

}
