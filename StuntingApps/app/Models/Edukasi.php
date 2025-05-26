<?php

namespace App\Models;

use App\Models\Anak;
use App\Models\Pengukuran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Edukasi extends Model
{
    use HasFactory;
    protected $table = 'edukasi';

    protected $fillable = ['id_anak','id_pengukuran','judul', 'content', 'kategori', 'image'];

    public function anak()
    {
        return $this->belongsTo(Anak::class, 'id_anak');
    }

    public function pengukuran()
    {
        return $this->belongsTo(Pengukuran::class, 'id_pengukuran');
    }
}
