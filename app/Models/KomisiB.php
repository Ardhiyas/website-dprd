<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomisiB extends Model
{
    protected $table = 'komisi_bs';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
