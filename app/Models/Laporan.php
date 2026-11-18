<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $primaryKey = 'id_laporan';
    protected $fillable = [
        'namaLaporan',
        'namaPelapor',
        'isiLaporan',
    ];
}
