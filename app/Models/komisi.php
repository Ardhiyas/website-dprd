<?php
// app/Models/Komisi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Import ini

class Komisi extends Model
{
    protected $fillable = [
        'nama', 
        'deskripsi' // Pastikan ini ada di $fillable
        // ... kolom lain
    ];
    
    // Definisikan relasi: Satu Komisi memiliki banyak Gambar
    public function images(): HasMany 
    {
        return $this->hasMany(KomisiImage::class)->orderBy('order');
    }
}