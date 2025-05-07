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
        Schema::create('pengukuran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_anak')->constrained('anak')->onDelete('cascade');
            $table->decimal('berat');
            $table->decimal('tinggi');
            $table->decimal('lila');
            $table->string('usia');
            $table->decimal('zs_tbu');
            $table->string('hasil');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengukuran');
    }
};
