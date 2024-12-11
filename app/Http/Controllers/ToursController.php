<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function index() {
        $tours = Tour::all();
        return view('services.turism.index', compact('tours'));
    }

    public function create() {
        return view('services.turism.create');
    }

    public function store(Request $request) {
        // Validación de los campos del formulario
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'destino' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
        ]);

        // Manejo de la imagen subida
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('tours', 'public');
        }

        // Crear y guardar el tour
        $tour = new Tour();
        $tour->img = $imagePath ?? null;
        $tour->destino = $request->destino;
        $tour->descripcion = $request->descripcion;
        $tour->precio = $request->precio;
        $tour->save();

        return redirect()->route('tours.index')->with('success', 'Tour registrado correctamente.');
    }
}
