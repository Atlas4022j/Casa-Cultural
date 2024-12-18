<?php

namespace App\Http\Controllers;

use App\Models\Imagenes;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestauranteController extends Controller
{
    public function index() {
        $Restaurantes = Restaurante::all();
        return view ('services.restaurant.index', compact('Restaurantes'));
    }

    public function create() {
        return view ('services.restaurant.create');
    }

    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'imagenes' => 'required|array', // Validación para las imágenes
            'imagenes.*' => 'image|mimes:jpg,jpeg,png,gif', // Cada imagen debe ser válida
            'categoria' => 'required|string|max:255', // Validación para la categoría
            'nombre' => 'required|string|max:255', // Validación para el nombre
            'precio' => 'required|numeric|min:0', // Validación para el precio
            'descripcion' => 'required|string', // Validación para la descripción
        ]);
    
        // Crear un nuevo registro de restaurante
        $restaurante = Restaurante::create([
            'categoria' => $request->input('categoria'),
            'nombre' => $request->input('nombre'),
            'precio' => $request->input('precio'),
            'descripcion' => $request->input('descripcion'),
        ]);
    
        // Subir las imágenes y guardarlas en la base de datos
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                // Subir la imagen al almacenamiento
                $imagePath = $imagen->store('imagenes_restaurantes', 'public'); // Guardamos las imágenes en 'storage/app/public/imagenes_restaurantes'
    
                // Crear una nueva entrada en la tabla imagenes_restaurantes
                Imagenes::create([
                    'id_restaurante' => $restaurante->id,
                    'img' => $imagePath, // Guardamos la ruta de la imagen
                    'categoria' => $request->input('categoria'),
                    'nombre' => $request->input('nombre'),
                    'precio' => $request->input('precio'),
                    'descripcion' => $request->input('descripcion'),
                ]);
            }
    
            return redirect()->route('restaurant.index', $restaurante->id)
                             ->with('success', 'Las imágenes y la información se han subido correctamente.');
        }
    
        return back()->withErrors(['imagenes' => 'Por favor seleccione imágenes para cargar.']);
    }

    public function edit($id)
    {
        $restaurante = Restaurante::with('imagenes')->findOrFail($id);

        return view('services.restaurant.edit', compact('restaurante'));
    }


    public function update(Request $request, $idRestaurante)
{
    // Validación de los campos del formulario
    $request->validate([
        'imagenes' => 'nullable|array',
        'imagenes.*' => 'image|mimes:jpg,jpeg,png,gif|max:2048', // Validación de imágenes
        'existing_images' => 'nullable|array',
        'existing_images.*' => 'nullable|image|mimes:jpg,jpeg,png,gif',
    ]);

    // Obtener el restaurante por ID
    $restaurante = Restaurante::findOrFail($idRestaurante);

    // Actualización de imágenes existentes si se suben nuevas
    if ($request->has('existing_images')) {
        foreach ($request->file('existing_images') as $imageId => $newImage) {
            if ($newImage) {
                // Obtener la imagen existente
                $imagenExistente = Imagenes::findOrFail($imageId);

                // Eliminar la imagen anterior del almacenamiento
                Storage::disk('public')->delete($imagenExistente->imagenes);

                // Subir la nueva imagen al almacenamiento
                $newImagePath = $newImage->store('imagenes_habitaciones', 'public');

                // Actualizar la ruta en la base de datos
                $imagenExistente->update([
                    'imagenes' => $newImagePath,
                ]);
            }
        }
    }

    // Subida de nuevas imágenes
    if ($request->hasFile('imagenes')) {
        foreach ($request->file('imagenes') as $imagen) {
            $imagePath = $imagen->store('imagenes_habitaciones', 'public');

            // Crear una nueva entrada en la tabla de imágenes
            Imagenes::create([
                'id_restaurante' => $restaurante->id,
                'imagenes' => $imagePath,
            ]);
        }
    }

    return redirect()->route('restaurantes.show', $restaurante->id)
                     ->with('success', 'El platillo y sus imágenes se han actualizado correctamente.');
}


    public function destroy($id) {
        $Restaurante = Restaurante::find($id);
        $Restaurante->delete();
        return redirect()->route('restaurant.index');
    }

    public function show($id)
    {
    // Buscar la habitación por su ID junto con sus imágenes relacionadas
    $restaurante = Restaurante::with('imagenes')->findOrFail($id);

    // Pasar los datos a la vista
    return view('services.restaurant.view', compact('restaurante'));
    }

}
