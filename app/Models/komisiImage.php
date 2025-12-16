<?php
// app/Models/KomisiImage.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Import ini

class KomisiImage extends Model
{
    protected $fillable = [
        'komisi_id', 
        'path_gambar', 
        'order'
    ];

    // Definisikan relasi: Gambar ini milik satu Komisi
    public function komisi(): BelongsTo
    {
        return $this->belongsTo(Komisi::class);
    }
}