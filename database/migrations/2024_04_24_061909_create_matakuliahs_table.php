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
         Schema::create('matakuliah', function (Blueprint $table) {
        $table->string('kode_mk', 10)->primary(); // Primary key pada kolom kode_mk
        $table->string('nama_mk', 20);
        $table->unsignedInteger('sks'); // Menggunakan tipe data unsigned integer
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliah');
    }
};
