<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomisiA extends Model
{
    protected $table = 'komisi_as';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
