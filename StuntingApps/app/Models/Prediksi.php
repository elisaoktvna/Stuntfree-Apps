<?php

namespace App\Models;

use App\Models\Pengukuran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prediksi extends Model
{
    use HasFactory;
    protected $table = 'prediksi';

    protected $fillable = [
        'id_pengukuran',
        'prediksi',
        'probility'
    ];

    public function pengukuran()
    {
        return $this->belongsTo(Pengukuran::class, 'id_orangtua');
    }
}
