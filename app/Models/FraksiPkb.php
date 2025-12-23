<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraksiPkb extends Model
{
    protected $table = 'fraksi_pkbs';

    protected $fillable = [
        'judul',
        'logo',
        'deskripsi',
        'nama',
        'jabatan',
    ];
}
