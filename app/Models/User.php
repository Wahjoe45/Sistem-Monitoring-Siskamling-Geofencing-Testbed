<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id_warga';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = [
        'nama',
        'username',
        'password',
        'role',
        'no_telepon',
        'blok',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'username_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function jadwalDetails()
    {
        return $this->hasMany(
            JadwalDetail::class,
            'id_warga',
            'id_warga'
        );
    }
}
