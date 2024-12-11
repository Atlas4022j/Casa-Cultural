<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitacione extends Model
{
    use HasFactory;

    protected $table = 'habitaciones'; // Asegúrate de que el nombre coincide con la tabla

    // Define los campos que se pueden asignar de forma masiva
    protected $fillable = ['id', 'tipo_habitacion', 'precio', 'descripcion', 'numero_habitacion', 'estado', 'img']; // Añadí el campo 'img' aquí

    // Relación con la tabla imagenes_habitaciones
    public function imagenes() {
        return $this->hasMany(Imagenes::class, 'id_habitaciones');
    
    }
}
