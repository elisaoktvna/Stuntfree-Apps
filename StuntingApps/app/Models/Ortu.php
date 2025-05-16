<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ortu extends Model
{
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
