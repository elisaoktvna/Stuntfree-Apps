<?php

namespace App\Models;

use App\Models\Anak;
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
        'lila',
        'usia',
        'zs_tbu'
    ];

    public function anak()
    {
        return $this->belongsTo(Anak::class, 'id_anak');
    }
}
