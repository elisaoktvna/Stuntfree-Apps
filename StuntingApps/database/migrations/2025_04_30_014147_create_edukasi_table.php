<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('edukasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anak')->constrained('anak')->onDelete('cascade');
            $table->foreignId('id_pengukuran')->constrained('pengukuran')->onDelete('cascade');
            $table->string('judul', 150);
            $table->string('content');
            $table->enum('kategori', ['Resiko Tinggi Stunting','Stunting', 'Normal', 'Resiko Gizi Lebih']);
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('edukasi');
    }
};
