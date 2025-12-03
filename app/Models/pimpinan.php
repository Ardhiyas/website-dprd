<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pimpinan extends Model
{
    protected $table = 'pimpinans';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
