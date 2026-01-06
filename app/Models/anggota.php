<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    protected $table = 'anggota';
    protected $fillable = ['nama', 'jabatan', 'foto', 'fraksi_id', 'komisi_id'];

    public function fraksi()
    {
        return $this->belongsTo(Fraksi::class);
    }

    public function komisi()
    {
        return $this->belongsTo(Komisi::class);
    }
}
