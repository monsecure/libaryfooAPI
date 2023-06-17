<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\BibliotecaController;




Route::group(['prefix' => 'books'], function () {
    Route::get('/', [BookController::class, 'index']);

    Route::post('/search', [BookController::class, 'search']);

    // Get by id
    Route::get('/{id}', [BookController::class, 'show'])->where('id', '[0-9]+');

    // Add entry
    Route::post('/', [BookController::class, 'store']);

    // Update entry 
    Route::put('/{id}', [BookController::class, 'update'])->where('id', '[0-9]+');

    // Delete entry
    Route::delete('/{id}', [BookController::class, 'destroy'])->where('id', '[0-9]+');


    Route::get('/only-trashed', [BookController::class, 'onlyTrashed']);

    //move to trashentry
    Route::patch('/{id}/move-to-trash', [BookController::class, 'moveToTrash'])->where('id', '[0-9]+');
   
    // restore entry
    Route::patch('/{id}/restore', [BookController::class, 'restore'])->where('id', '[0-9]+');
  
   
});


/*Route::apiResource('books', BookController::class);
Route::get('/books/only-trashed', 'BookController@onlyTrashed');*/





Route::apiResource('authors', AuthorController::class);
Route::apiResource('editorials', EditorialController::class);
Route::apiResource('bibliotecas', BibliotecaController::class);
