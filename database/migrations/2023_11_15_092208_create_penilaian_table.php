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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggan');
            $table->foreignId('kriteria_id');
            $table->foreign('kriteria_id')->references('id')->on('kriteria');
            $table->integer("bulan");
            $table->year("tahun");
            $table->integer("nilai");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
