<?php
// app/Models/Komisi.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komisi extends Model 
{
    // Tambahkan 'deskripsi' di fillable agar bisa diupdate
    protected $fillable = ['nama', 'deskripsi']; 
    
    // Satu Komisi memiliki banyak Gambar (KomisiImage)
    public function images()
    {
        return $this->hasMany(KomisiImage::class)->orderBy('order');
    }
}