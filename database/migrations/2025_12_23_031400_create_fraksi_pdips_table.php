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
        Schema::create('fraksi_pdips', function (Blueprint $table) {
            $table->id();
            
            $table->string('judul');
            $table->string('logo');
            $table->text('deskripsi');
            $table->string('nama');
            $table->string('jabatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fraksi_pdips');
    }
};
