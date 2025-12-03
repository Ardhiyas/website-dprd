<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komisi extends Model
{
    protected $table = 'komisi';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
