<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadanKehormatan extends Model
{
    protected $table = 'badan_kehormatans';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
