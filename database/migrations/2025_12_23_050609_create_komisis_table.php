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
        Schema::create('komisis', function (Blueprint $table) {
            $table->id();
            $table->string('kategori'); // A, B, C, atau D
            $table->string('judul');    // Nama Komisi
            $table->text('deskripsi')->nullable(); // Deskripsi Singkat Komisi
            $table->string('gambar')->nullable();  // Foto Anggota
            $table->enum('type', ['info', 'anggota'])->default('anggota'); // Pembeda antara info dan anggota
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komisis');
    }
};
