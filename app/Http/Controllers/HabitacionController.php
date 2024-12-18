<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitacioneStoreRequest;
use App\Models\Habitacione;
use App\Models\Imagenes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'img.*' => 'required|image|mimes:jpeg,png,jpg,gif',
            'tipo_habitacion' => 'required|string|in:Simples,Doble,Matrimonial,Grupal',
            'capacidad_maxima' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
            'numero_habitacion' => 'required|integer|unique:habitaciones,numero_habitacion',
            'descripcion' => 'required|string|max:1000',
        ]);

        DB::beginTransaction();

        try {
            // Crear la habitación sin incluir un campo img
            $habitacion = Habitacione::create([
                'tipo_habitacion' => $request->input('tipo_habitacion'),
                'capacidad_maxima' => $request->input('capacidad_maxima'),
                'precio' => $request->input('precio'),
                'numero_habitacion' => $request->input('numero_habitacion'),
                'descripcion' => $request->input('descripcion'),
            ]);

            // Comprobar si hay imágenes y guardarlas en la tabla de imágenes
            if ($request->hasFile('img')) {
                foreach ($request->file('img') as $image) {
                    if ($image->isValid()) {
                        // Guardar la imagen en storage/app/public/imagenes
                        $path = $image->store('imagenes', 'public');

                        // Insertar la ruta de la imagen en la tabla 'imagenes'
                        Imagenes::create([
                            'id_habitacion' => $habitacion->id,
                            'img' => $path, // Ruta de la imagen
                        ]);
                    }
                }
            }

            DB::commit();

            // Redirigir con mensaje de éxito
            return redirect()->route('rooms.index')->with('success', 'Habitación registrada correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Redirigir con mensaje de error
            return back()->with('error', 'Error al registrar la habitación: ' . $e->getMessage());
        }
    }

    // HabitacionController.php
    public function edit($id)
    {
        $habitacion = Habitacione::with('imagenes')->findOrFail($id);

        return view('services.rooms.edit', compact('habitacion'));
    }


    public function update(Request $request, $id)
    {
        $habitacion = Habitacione::findOrFail($id);
    
        // Validar las entradas
        $request->validate([
            'tipo_habitacion' => 'required|string',
            'precio' => 'required|numeric',
            'numero_habitacion' => 'required|integer',
            'capacidad_maxima' => 'required|integer',
            'descripcion' => 'required|string',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Actualizar los campos de la habitación
        $habitacion->update([
            'tipo_habitacion' => $request->tipo_habitacion,
            'precio' => $request->precio,
            'numero_habitacion' => $request->numero_habitacion,
            'capacidad_maxima' => $request->capacidad_maxima,
            'descripcion' => $request->descripcion,
        ]);
    
        // Subir nuevas imágenes y eliminar las antiguas si es necesario
        if ($request->hasFile('images')) {
            // Eliminar las imágenes anteriores si existen
            foreach ($habitacion->imagenes as $image) {
                Storage::delete('public/' . $image->img);  // Eliminar la imagen del almacenamiento
                $image->delete();  // Eliminar el registro de la base de datos
            }
    
            // Subir nuevas imágenes
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('habitaciones', 'public');
                $habitacion->imagenes()->create(['img' => $path]);  // Crear un nuevo registro en la base de datos
            }
        }
    
        return redirect()->route('rooms.show', $habitacion->id)->with('success', 'Habitación actualizada con éxito');
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
