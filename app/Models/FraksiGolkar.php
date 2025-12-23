<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraksiGolkar extends Model
{
    protected $table = 'fraksi_golkars';

    protected $fillable = [
        'judul',
        'logo',
        'deskripsi',
        'nama',
        'jabatan',
    ];
}
