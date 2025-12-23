<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraksiPdip extends Model
{
    protected $table = 'fraksi_pdips';
    protected $fillable = ['judul', 'logo', 'deskripsi', 'nama', 'jabatan'];
}
