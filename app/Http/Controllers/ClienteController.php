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
        return view ('clientes.create');
    }

    public function store(Request $request) {
        $cliente = new Cliente();
        $cliente->dni = $request->dni;
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->usuario = $request->usuario;
        $cliente->password = $request->password;
        $cliente->save();
        return redirect()->route('clientes.index');
    }
    public function edit($id){
        $cliente = Cliente::find($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id){
        $cliente = Cliente::find($id); 
        $cliente->dni = $request->dni;
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->usuario = $request->usuario;
        $cliente->password = $request->password;
        $cliente->update();
        return redirect()->route('clientes.index');
    }
    public function destroy($id){
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }

}