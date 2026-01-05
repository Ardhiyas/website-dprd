<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomisiD extends Model
{
    protected $table = 'komisi_ds';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
