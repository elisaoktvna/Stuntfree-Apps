<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketGizi extends Model
{
    use HasFactory;
    protected $table = 'paketgizi';

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'urlmaps',
    ];
}
