<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class PaketGizi extends Model
{
    protected $connection = 'mongodb'; // Wajib: agar pakai MongoDB
    protected $collection = 'paketgizi'; // Opsional: nama koleksi di MongoDB

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'urlmaps',
    ];
}
