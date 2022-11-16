<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profile';
    protected $fillable = [
        'alamat',
        'user_id',
        'no_telpon',
        'foto',
        'jenisKelamin',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
      }
      
    
}
