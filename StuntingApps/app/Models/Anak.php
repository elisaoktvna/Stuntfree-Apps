<?php

namespace App\Models;

use App\Models\Ortu;
use Illuminate\Database\Eloquent\Model;
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
        'alamat',
        'id_orangtua',
        'status'
    ];

    public function ortu()
    {
        return $this->belongsTo(Ortu::class, 'id_orangtua');
    }

    public $timestamps = false;
}
