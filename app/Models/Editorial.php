<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address'       
    ];

    //se omiten relaciones por no especificarse e mrequerimientos y tiempo
    public function books()
    {        
        return $this->hasMany(Book::class,'editorial_id');
    }
}
