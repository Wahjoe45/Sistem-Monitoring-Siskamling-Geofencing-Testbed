<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalDetail extends Model
{
    protected $table = 'jadwal_details';

    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'id_jadwal',
        'id_warga',
        'tanggal',
    ];

    public function jadwal()
    {
        return $this->belongsTo(
            Jadwal::class,
            'id_jadwal',
            'id_jadwal'
        );
    }

    public function warga()
    {
        return $this->belongsTo(
            User::class,
            'id_warga',
            'id_warga'
        );
    }
}
