<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToClientesTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            // Agregar los nuevos campos
            $table->integer('edad')->nullable(); // Edad como un entero, puede ser nula
            $table->string('procedencia')->nullable(); // Procedencia como un campo de texto
            $table->string('condicion')->nullable(); // Condición como un campo de texto
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            // Eliminar los campos si la migración se revierte
            $table->dropColumn(['edad', 'procedencia', 'condicion']);
        });
    }
}
