<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    public function index() {
        $Restaurantes = Restaurante::all();
        return view ('services.restaurant.index', compact('Restaurantes'));
    }

    public function create() {
        return view ('services.restaurant.create');
    }

    public function store(Request $request) {
        $Restaurante = new Restaurante();
        $Restaurante->nombre = $request->nombre;
        $Restaurante->categoria  = $request->categoria;
        $Restaurante->precio = $request->precio;
        $Restaurante->descripcion = $request->descripcion;
        $Restaurante->save();
        return redirect()->route('restaurant.index');
    }

    public function edit($id) {
        $Restaurante = Restaurante::find($id);
        return view('restaurant.edit', compact('Restaurante'));
    }

    public function update(Request $request, $id) {
        $Restaurante = Restaurante::find($id);
        $Restaurante->nombre = $request->nombre;
        $Restaurante->categoria  = $request->categoria;
        $Restaurante->precio = $request->precio;
        $Restaurante->descripcion = $request->descripcion;
        $Restaurante->save();
        return redirect()->route('restaurant.index');
    }

    public function destroy($id) {
        $Restaurante = Restaurante::find($id);
        $Restaurante->delete();
        return redirect()->route('restaurant.index');
    }
}
