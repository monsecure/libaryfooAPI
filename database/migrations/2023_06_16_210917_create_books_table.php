<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');//name
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('editorial_id');
            $table->unsignedBigInteger('biblioteca_id');
            $table->string('synopsis',5000);
            $table->string('language');
            $table->smallInteger('pagesNumber');
            $table->dateTime('publishingDate');
            $table->string('isbn');
            $table->timestamps();
            
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');// no especificado en requerimiento  se asume por coenvecion default 
            $table->foreign('editorial_id')->references('id')->on('editorials')->onDelete('cascade');
            $table->foreign('biblioteca_id')->references('id')->on('bibliotecas')->onDelete('cascade');
            $table->softDeletes($column = 'deleted_at', $precision = 0);         
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('books');
    }
};
