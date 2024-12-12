<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReseñasTable extends Migration
{
    public function up()
    {
        Schema::create('reseñas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email');
            $table->text('reseña');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reseñas');
    }
}