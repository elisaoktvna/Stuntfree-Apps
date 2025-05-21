<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateEdukasi extends Model
{
    use HasFactory;
     protected $table = 'template_edukasi';

    // Tambahkan ini:
    protected $fillable = [
        'judul',
        'konten',
        'kategori',
        'image',
    ];
}
