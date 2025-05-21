<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Ortu; // ganti pakai model Ortu

class Anak extends Model
{
    use HasFactory;

    protected $table = 'anak';

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'id_orangtua',
        'status'
    ];

    public function ortu()
    {
        return $this->belongsTo(Ortu::class, 'id_orangtua');
    }

    public $timestamps = false;
}
