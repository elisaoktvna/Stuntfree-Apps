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
            $table->integer('usia_bulan');
            $table->decimal('zs_tbu')->nullable();
            $table->string('hasil')->nullable();
            $table->decimal('bmi')->nullable();
            $table->decimal('zs_bmi_u')->nullable();
            $table->string('status_gizi_bmi')->nullable();
            $table->text('note')->nullable();
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
