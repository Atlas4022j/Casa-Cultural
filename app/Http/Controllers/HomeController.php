<?php

namespace App\Http\Controllers;

use App\Models\Habitacione;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view ('index');
    }
    public function habitacion(){        
        return view ('habitaciones.habitacion');
    }
    public function nosotros() {
        return view('nosotros.nosotros');
    }
    public function restaurante() {
        return view('restaurante.restaurante');
    }
    public function blog() {
        return view('blog.blog');
    }
    public function contactanos() {
        return view('contactanos.contacto');
    }
    public function login() {
        return view('auth.login');
    }
   public function reportes() {
    return view('reportes.index');
   }

}