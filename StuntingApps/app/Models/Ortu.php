<?php

namespace App\Models;

use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ortu extends Model
{
    use HasFactory;

    protected $table = 'orangtua';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'id_kecamatan',
        'alamat'
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
}
