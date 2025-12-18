<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class badanpembentukan extends Model
{
    protected $table = 'badanpembentukans';
    protected $fillable = ['nama', 'jabatan', 'foto'];
}
