<?php

namespace App\Http\Controllers;

use App\Http\Controllers\HabitacionesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Models\Habitacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Hr;

/* Route::get('/', function () { return view('inicio.inicio'); }) ->name('inicio'); */

Route::get('/nosotros', [HomeController::class, 'nosotros'])->name('nosotros');
Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/habitacion',[HomeController::class,'habitacion'])->name('habitacion');
Route::get('/restaurante',[HomeController::class, 'restaurante'])->name('restaurante');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/contactanos', [HomeController::class, 'contactanos'])->name('contactanos');
Route::get('reportes', [HomeController::class, 'reportes'])->name('reportes');
Route::get('clientes', [HomeController::class, 'clientes'])->name('clientes');
route::get('registrar', [HomeController::class, 'registrar'])->name('registrar');
Route::resource('reseñas', ReseñasController::class)-> names('reseñas');



//RUTA DE HABITACIONES
Route::resource('/rooms', HabitacionController::class) -> names('rooms');

//RUTA DE CLIENTES
/* Route::get('/clientes', [ClienteController::class, 'index']) -> name ('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes/store', [ClienteController::class,'store'])->name('clientes.store'); */
Route::resource('/clientes', ClienteController::class)->names('clientes');

//RUTA DE RESATAURANTE
/* Route::get('/restaurant', [RestauranteController::class, 'index']) -> name ('restaurante.index');
Route::get('/restaurante/create', [RestauranteController::class, 'create'])->name('restaurante.create');
Route::post('/restaurante/store', [RestauranteController::class,'store'])->name('restaurante.store'); */
Route::resource('Restaurantes', restauranteController::class)->names('restaurant');

// RUTA DE TOURS
/* Route::get('/tours', [ToursController::class, 'index'])->name('tours.index');
Route::get('/tours/create', [ToursController::class, 'create'])->name('tours.create');
Route::post('/tours/store', [ToursController::class, 'store'])->name('tours.store'); */
Route::resource('tours', ToursController::class);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



route::get('/reserva-habitacion', function () {
    return view('reservas.index');
})->name('reserva-habitacion');