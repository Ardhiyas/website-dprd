<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomisiD extends Model
{
    protected $table = 'komisi_d_s';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
