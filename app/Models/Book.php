<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'author_id',
        'editorial_id',
        'biblioteca_id',
        'synopsis',
        'language',
        'pagesNumber',
        'publishingDate',
        'isbn'
    ];

     //se omiten relaciones complejas  por no especificarse en requerimientos y tiempo
    
    public function authors()
    {        
        return $this->hasMany(Author::class,'id','id');
    }

    public function library()
    {        
        return $this->hasOne(Biblioteca::class,'id','id');
    }

    public function editorial()
    {        
        return $this->hasOne(Editorial::class,'id','id');
    }
}
