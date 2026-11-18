<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwals';

    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'bulan',
        'tahun',
    ];

    public function details()
    {
        return $this->hasMany(
            JadwalDetail::class,
            'id_jadwal',
            'id_jadwal'
        );
    }
}
