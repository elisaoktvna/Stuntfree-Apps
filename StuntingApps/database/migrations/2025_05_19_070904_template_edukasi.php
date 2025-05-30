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
        Schema::create('template_edukasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 150);
            $table->text('content');
            $table->enum('kategori', ['Resiko Tinggi Stunting', 'Stunting','Normal','Resiko Gizi Lebih']);
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('template_edukasi');
    }
};
