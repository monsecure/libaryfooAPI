<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address'       
    ];

     //se omiten relaciones por no especificarse en requerimientos y tiempo
     public function books()
     {        
         return $this->hasMany(Book::class,'biblioteca_id');
     }
}
