<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fraksiPembangunan extends Model
{
    protected $table = 'fraksi-pembangunans';
    protected $fillable = ['judul', 'logo', 'deskripsi', 'nama', 'jabatan'];
}
