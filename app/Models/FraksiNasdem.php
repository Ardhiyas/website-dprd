<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraksiNasdem extends Model
{
    protected $table = 'fraksi_nasdems';

    protected $fillable = [
        'judul',
        'logo',
        'deskripsi',
        'nama',
        'jabatan',
    ];
}
