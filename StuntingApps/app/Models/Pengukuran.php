<?php

namespace App\Models;

use App\Models\Anak;
use App\Models\Edukasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengukuran extends Model
{
    use HasFactory;
    protected $table = 'pengukuran';

    protected $fillable = [
        'id_anak',
        'berat',
        'tinggi',
        'usia_bulan',
        'zs_tbu',
        'hasil',
        'bmi',
        'zs_bmi_u',
        'status_gizi_bmi',
    ];

    public function anak()
    {
        return $this->belongsTo(Anak::class, 'id_anak');
    }

    public function edukasi()
    {
        return $this->hasOne(Edukasi::class, 'id_pengukuran');
    }
}
