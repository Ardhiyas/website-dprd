<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomisiA extends Model
{
    protected $table = 'komisi_a_s';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
