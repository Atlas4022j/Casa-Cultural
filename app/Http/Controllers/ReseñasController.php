<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reseña;

class ReseñasController extends Controller
{
    // Método para mostrar todas las reseñas
    public function index()
    {
        // Obtener todas las reseñas de la base de datos
        $reseñas = Reseña::all();
        
        // Pasar los datos a la vista
        return view('index', compact('reseñas'));
    }

    // Método para manejar el formulario y almacenar los datos en la base de datos
    public function store(Request $request)
    {
        // Validar los datos recibidos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'reseña' => 'required|string|max:255',
        ]);

        // Crear una nueva reseña y guardarla en la base de datos
        Reseña::create([  // Asegúrate de usar el nombre correcto del modelo
            'nombre' => $request->nombre,
            'email' => $request->email,
            'reseña' => $request->reseña,
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('index')->with('success', 'Tu reseña ha sido enviada con éxito.');
    }
}
