<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
{
    // Validar los datos de entrada
    $validated = $request->validate([
        'nombres' => 'required|max:255',
        'apellidos' => 'required|max:255',
        'usuario' => 'required|unique:cliente,usuario_cliente|max:255',
        'email' => 'required|email|unique:cliente,email_cliente|max:255',
        'password' => 'required|min:8',
    ]);

    // Crear el cliente con Eloquent
    Cliente::create([
        'nombre_cliente' => $validated['nombres'],
        'apellido_cliente' => $validated['apellidos'],
        'usuario_cliente' => $validated['usuario'],
        'email_cliente' => $validated['email'],
        'password_cliente' => bcrypt($validated['password']),
    ]);

    // Redirigir con mensaje de éxito
    return redirect()->route('login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
}
    

    
    public function login(Request $request)
    {
        $validated = $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        $cliente = Cliente::where('usuario_cliente', $validated['usuario'])->first();

        // Si las credenciales son incorrectas, devolver un solo mensaje de error.
        if (!$cliente || !Hash::check($validated['password'], $cliente->password_cliente)) {
            return back()->withErrors([
                'usuario' => 'Las credenciales son incorrectas.',
            ]);
        }

        return redirect()->route('inicio');
    }

    
}
