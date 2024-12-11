<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitacioneStoreRequest;
use App\Models\Habitacione;
use App\Models\Imagenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HabitacionController extends Controller
{
    public function index()
    {
        // Obtener todas las habitaciones con sus imágenes
        $habitaciones = Habitacione::all(); 

        // Pasar los datos a la vista
        return view('services.rooms.index', compact('habitaciones'));
    }

    public function create()
    {
        return view('services.rooms.create');
    }

    public function store(HabitacioneStoreRequest $request)
    {
    
        // Validación de los datos del formulario
        
        try {
            //code...
            DB::beginTransaction();
            $habitacion = Habitacione::create([
                'tipo_habitacion' => $request->tipo_habitacion,
                'precio' => $request->precio,
                'numero_habitacion' => $request->numero_habitacion,
                'capacidad_maxima' => $request->capacidad_maxima,
                'descripcion' => $request->descripcion,
            ]);
    
            // Subir las imágenes y asociarlas con la habitación
            
            if ($request->hasFile('img')) {
                foreach ($request->file('img') as $image) {
                    if ($image->isValid()) {
                        $path = $image->store('imagenes_habitaciones', 'public'); // Almacena la imagen
                        Imagenes::create([
                            'id_habitaciones' => $habitacion->id,
                            'img' => $path,
                        ]); // Crea un registro por cada imagen
                    }
                }
            }
            DB::commit();
    
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $th->getMessage();
        }
        // Crear la habitación
        
        // Redirigir con mensaje de éxito
        return redirect()->route('rooms.index')->with('success', 'Habitación registrada con éxito.');
    }

    public function edit($id)
    {
        $habitacion = Habitacione::findOrFail($id);
        return view('services.rooms.edit', compact('habitacion'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'tipo_habitacion' => 'required|string|max:255',
        'precio' => 'required|numeric',
        'numero_habitacion' => 'required|integer|unique:habitaciones,Numero_habitacion,' . $id,
        'descripcion' => 'nullable|string',
        'img.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $habitacion = Habitacione::findOrFail($id);

    // Actualizar datos de la habitación
    $habitacion->update([
        'tipo_habitacion' => $request->tipo_habitacion,
        'precio' => $request->precio,
        'Numero_habitacion' => $request->numero_habitacion,
        'descripcion' => $request->descripcion,
    ]);

    // Subir y guardar imágenes nuevas
    if ($request->hasFile('img')) {
        foreach ($request->file('img') as $image) {
            $path = $image->store('imagenes_habitaciones', 'public');

            Imagenes::create([
                'id_habitaciones' => $habitacion->id,
                'img' => $path,
            ]);
        }
    }

    return redirect()->route('rooms.index')->with('success', 'Habitación actualizada exitosamente.');
}

    public function destroy($id)
    {
        $habitacion = Habitacione::findOrFail($id);

        // Eliminar las imágenes asociadas a la habitación
        $imagenes = $habitacion->imagenes;
        foreach ($imagenes as $imagen) {
            // Eliminar la imagen del almacenamiento
            if (file_exists(storage_path('app/public/' . $imagen->img))) {
                unlink(storage_path('app/public/' . $imagen->img));
            }
            // Eliminar la entrada en la tabla 'imagenes_habitaciones'
            $imagen->delete();
        }

        // Eliminar la habitación
        $habitacion->delete();

        return redirect()->route('rooms.index');
    }

    public function show($id)
    {
    // Buscar la habitación por su ID junto con sus imágenes relacionadas
    $habitacion = Habitacione::with('imagenes')->findOrFail($id);

    // Pasar los datos a la vista
    return view('services.rooms.view', compact('habitacion'));
    }

}
