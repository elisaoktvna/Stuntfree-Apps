<?php

namespace App\Models;

use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faskes extends Model
{
    use HasFactory;
    protected $table = 'faskes';

    protected $fillable = ['nama', 'alamat', 'telepon', 'urlmaps', 'id_kecamatan' ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
}
