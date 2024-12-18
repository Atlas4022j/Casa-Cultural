<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaHabitacion extends Model
{
    use HasFactory;

    protected $table = 'reserva_habitaciones';

    protected $fillable = [
        'idcliente',
        'idhabitacion',
        'fecha_entrada',
        'fecha_salida',
    ];
}
