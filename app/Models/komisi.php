<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komisi extends Model
{
    protected $table = 'komisis';
    protected $fillable = ['kategori', 'judul', 'deskripsi', 'gambar'];
}
