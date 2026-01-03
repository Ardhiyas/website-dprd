<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadanMusyawarah extends Model
{
    protected $table = 'badan_musyawarahs';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
