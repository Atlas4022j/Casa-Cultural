<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('imagenes_habitaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_habitaciones');
            $table->string('img');
            $table->timestamps();
        
            $table->foreign('id_habitaciones')
                  ->references('id')
                  ->on('habitaciones')
                  ->onDelete('cascade');
        });

        // Relación de uno a muchos con la tabla habitaciones

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes_habitaciones');
    }
};
