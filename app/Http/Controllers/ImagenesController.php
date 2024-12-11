<?php

namespace App\Http\Controllers;

use App\Models\Imagenes;
use Illuminate\Http\Request;

class ImagenesController extends Controller
{
    public function destroy($id) {
        $imagen = Imagenes::findOrFail($id);

        // Eliminar el archivo físico
        unlink(storage_path('app/public/' . $imagen->img));
 
        // Eliminar la imagen de la base de datos
        $imagen->delete();
 
        return back();
    }
}
