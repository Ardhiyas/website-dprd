<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraksiGerindra extends Model
{
    protected $table = 'fraksi_gerindras';
    protected $fillable = ['judul', 'logo', 'deskripsi', 'nama', 'jabatan'];
}
