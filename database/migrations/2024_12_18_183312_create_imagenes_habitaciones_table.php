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
            $table->unsignedBigInteger('id_habitaciones')->nullable(); // Clave foránea para habitaciones
            $table->unsignedBigInteger('id_restaurante')->nullable(); // Clave foránea para restaurante
            $table->string('img')->nullable();
            $table->timestamps();

            // Claves foráneas
            $table->foreign('id_habitaciones')
                ->references('id')
                ->on('habitaciones')
                ->onDelete('cascade');

            $table->foreign('id_restaurante')
                ->references('id')
                ->on('restaurantes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes_habitaciones');
    }
};
