<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $fillable = ["kategori_id", "nama","harga","jumlah","foto"];

    public function kategori()
    {
      return $this->belongsTo(Kategori::class,'kategori_id' );
    }
   
    
    public function review(){
        return $this->hasMany(Review::class,'barang_id');
      }
}
