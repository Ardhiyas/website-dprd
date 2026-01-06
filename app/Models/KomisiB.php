<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomisiB extends Model
{
    protected $table = 'komisi_b_s';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
