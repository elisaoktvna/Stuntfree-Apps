<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anak extends Model
{
    use HasFactory;

    protected $table = 'anak';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'umur',
        'tanggal_lahir',
        'alamat',
        'id_user'
    ];

    public $timestamps = false;
}
