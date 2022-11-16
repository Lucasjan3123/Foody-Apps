<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $fillable = [
        'user_id',
        'barang_id',
        'komentar',
    ];

    
    public function barang(){
        return $this->belongsTo(barang::class, 'barang_id');
      }
      public function user(){
        return $this->belongsTo(User::class, 'user_id');
      }
}
