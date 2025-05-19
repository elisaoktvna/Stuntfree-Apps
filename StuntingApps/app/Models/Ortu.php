<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Ortu extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use HasFactory;

    protected $table = 'ortu';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'id_kecamatan',
        'alamat'
    ];

    protected $hidden = [
        'password',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
}
