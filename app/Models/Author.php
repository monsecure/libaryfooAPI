<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'        
    ];


     //se omiten relaciones por no especificarse e mrequerimientos y tiempo
     public function books()
     {        
         return $this->belongsToMany(Book::class,'author_id');
     }
}
