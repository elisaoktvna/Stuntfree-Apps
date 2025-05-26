<?php

namespace App\Models;

use App\Models\Edukasi;
use App\Models\Pengukuran;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ortu; // ganti pakai model Ortu
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function pengukuran()
    {
        return $this->hasMany(Pengukuran::class, 'id_anak');
    }

    public function edukasi()
    {
        return $this->hasMany(Edukasi::class, 'id_anak');
    }

    public function latestEdukasi() {
        return $this->hasOne(Edukasi::class, 'id_anak')->latestOfMany();
    }

    public $timestamps = false;
}
