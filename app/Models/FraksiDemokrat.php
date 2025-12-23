<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fraksiDemokrat extends Model
{
    protected $table = 'fraksi_demokrats';
    protected $fillable = ['judul', 'logo', 'deskripsi', 'nama', 'jabatan'];    
}
