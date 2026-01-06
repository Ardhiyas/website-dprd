<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomisiC extends Model
{
    protected $table = 'komisi_c_s';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
