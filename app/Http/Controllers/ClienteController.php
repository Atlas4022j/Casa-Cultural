<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        // Obtener todos los clientes de la base de datos
        $Clientes = Cliente::all();
        // Pasar los datos a la vista
        return view('clientes.index', compact('Clientes'));
    }

    public function create () {
        return view('clientes.create');
    }

    public function store(Request $request) {
        // Validar los datos recibidos del formulario
        $request->validate([
            'dni' => 'required|numeric|digits:8',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|numeric',
            'edad' => 'required|numeric|min:1',
            'procedencia' => 'required|string|max:255',
            'condicion' => 'required|string|max:255',
        ]);

        // Crear el nuevo cliente
        $cliente = new Cliente();
        $cliente->dni = $request->dni;
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->telefono = $request->telefono;
        $cliente->edad = $request->edad;
        $cliente->procedencia = $request->procedencia;
        $cliente->condicion = $request->condicion;
        $cliente->save(); // Guardar el cliente en la base de datos

        return redirect()->route('clientes.index');
    }

    public function edit($id){
        // Obtener el cliente por su ID
        $cliente = Cliente::find($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id){
        // Validar los datos recibidos del formulario
        $request->validate([
            'dni' => 'required|numeric|digits:8',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|numeric',
            'edad' => 'required|numeric|min:1',
            'procedencia' => 'required|string|max:255',
            'condicion' => 'required|string|max:255',
        ]);

        // Encontrar al cliente por ID
        $cliente = Cliente::find($id); 
        
        // Actualizar los datos del cliente
        $cliente->dni = $request->dni;
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->telefono = $request->telefono;
        $cliente->edad = $request->edad;
        $cliente->procedencia = $request->procedencia;
        $cliente->condicion = $request->condicion;
        $cliente->save(); // Guardar los cambios

        return redirect()->route('clientes.index');
    }

    public function destroy($id){
        // Encontrar y eliminar el cliente por ID
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
    public function show($id) {
        $cliente = Cliente::find($id);
        return view('clientes.show', compact('cliente'));
    }
}
