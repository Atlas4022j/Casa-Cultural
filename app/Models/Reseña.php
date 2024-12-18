<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseña extends Model
{
    use HasFactory;

    // Define los campos que pueden ser asignados masivamente
    protected $fillable = ['nombre', 'email', 'reseña'];
}
    