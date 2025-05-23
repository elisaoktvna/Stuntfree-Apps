<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TemplateEdukasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('template_edukasi')->insert([
            [
                'judul' => 'Tips Mengatasi Stunting',
                'konten' => 'Berikan makanan dengan gizi seimbang, rajin kontrol ke posyandu, dan jaga kebersihan.',
                'kategori' => 'stunting',
                'image' => 'image/stunting.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Tips Anak Sehat dan Normal',
                'konten' => 'Pertahankan pola makan bergizi, aktivitas fisik rutin, dan tidur cukup.',
                'kategori' => 'normal',
                'image' => 'image/normal.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Tips Anak Tinggi Ideal',
                'konten' => 'Pastikan asupan kalsium tinggi, protein cukup, dan rutin olahraga ringan.',
                'kategori' => 'tall',
                'image' => 'image/tall.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
