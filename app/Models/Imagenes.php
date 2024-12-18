<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use HasFactory;

    protected $table = 'imagenes_habitaciones';

    protected $fillable = [
        'id_habitacion',
        'id_restaurante',
        'img',
    ];

    // Relación con la tabla Habitaciones
    public function habitacion()
    {
        return $this->belongsTo(Habitacione::class, 'id_habitacion');
    }

    // Relación con la tabla Restaurantes
    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class, 'id_restaurante');
    }
}
