<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadanAnggaran extends Model
{
    protected $table = 'badan_anggarans';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
