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
        // Peta Model Lama ke Data Fraksi Baru
        $map = [
            'App\Models\FraksiPkb' => ['nama' => 'Fraksi PKB', 'slug' => 'fraksi-pkb'],
            'App\Models\FraksiGolkar' => ['nama' => 'Fraksi Golkar', 'slug' => 'fraksi-golkar'],
            'App\Models\FraksiPdip' => ['nama' => 'Fraksi PDIP', 'slug' => 'fraksi-pdip'],
            'App\Models\FraksiNasdem' => ['nama' => 'Fraksi Nasdem', 'slug' => 'fraksi-nasdem'],
            'App\Models\FraksiGerindra' => ['nama' => 'Fraksi Gerindra', 'slug' => 'fraksi-gerindra'],
            'App\Models\FraksiDemokrat' => ['nama' => 'Fraksi Demokrat', 'slug' => 'fraksi-demokrat'],
            'App\Models\fraksiPembangunan' => ['nama' => 'Fraksi Pembangunan', 'slug' => 'fraksi-pembangunan'],
        ];

        foreach ($map as $modelClass => $info) {
            // Cek apakah class model ada
            if (class_exists($modelClass)) {
                // Ambil data dari tabel lama
                // Asumsi: Row pertama menyimpan deskripsi & logo (konfigurasi), row lainnya adalah anggota
                // Atau: Setiap row adalah anggota, tapi deskripsi & logo terduplikasi di setiap row
                // Berdasarkan controller lama, deskripsi & logo ada di SEMUA row.

                $oldData = $modelClass::all();

                if ($oldData->count() > 0) {
                    $firstRow = $oldData->first();

                    // 1. Buat/Update Fraksi di tabel Unified
                    $fraksi = \App\Models\Fraksi::updateOrCreate(
                        ['slug' => $info['slug']],
                        [
                            'nama' => $info['nama'],
                            'deskripsi' => $firstRow->deskripsi,
                            'logo' => $firstRow->logo,
                        ]
                    );

                    // 2. Pindahkan Anggota
                    foreach ($oldData as $row) {
                        // Hindari duplikasi jika migrasi dijalankan ulang
                        // Cek apakah anggota ini sudah ada di fraksi tersebut
                        \App\Models\anggota::firstOrCreate(
                            [
                                'nama' => $row->nama,
                                'fraksi_id' => $fraksi->id
                            ],
                            [
                                'jabatan' => $row->jabatan,
                                'foto' => null // Atau migrasi foto jika ada kolomnya
                            ]
                        );
                    }
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Opsional: Kosongkan tabel fraksis dan anggotas atau biarkan saja
        // Kita tidak menghapus data lama di 'up', jadi aman.
    }
};
