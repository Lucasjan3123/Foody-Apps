<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $fillable = ["nama", "fotoBackground"];

    public function barang()
    {
     return $this->hasMany(barang::class, 'kategori_id');
    }  
}
