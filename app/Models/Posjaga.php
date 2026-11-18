<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posjaga extends Model
{
    protected $table = 'posjagas';

    protected $primaryKey = 'id_pos';
    protected $fillable = [
        'namaPos',
        'deskripsiPos',
        'latitude',
        'longitude',
    ];
}
