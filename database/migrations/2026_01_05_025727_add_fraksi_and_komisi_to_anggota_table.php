<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->foreignId('fraksi_id')->nullable()->constrained('fraksis')->onDelete('set null');
            $table->foreignId('komisi_id')->nullable()->constrained('komisis')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->dropForeign(['fraksi_id']);
            $table->dropForeign(['komisi_id']);
            $table->dropColumn(['fraksi_id', 'komisi_id']);
        });
    }
};
