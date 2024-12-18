<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;

    protected $table = 'restaurantes';

    protected $fillable = ['nombre', 'categoria', 'descripcion', 'precio', 'estado'];

    // Relación con las imágenes de las habitaciones
    public function imagenes()
    {
        return $this->hasMany(Imagenes::class, 'id_restaurante');
    }
}
