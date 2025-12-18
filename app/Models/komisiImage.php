<?php
// app/Models/KomisiImage.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomisiImage extends Model
{
    protected $fillable = ['komisi_id', 'path_gambar', 'order'];

    // Gambar ini dimiliki oleh satu Komisi
    public function komisi()
    {
        return $this->belongsTo(Komisi::class);
    }
}