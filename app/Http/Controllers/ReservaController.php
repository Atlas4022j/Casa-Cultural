<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class ReservaController extends Controller
{
    public function reservarHabitacion(Request $request)
    {
        $room = $request->query('room'); 
        $price = $request->query('price');
        $floor = $request->query('floor'); 
        $capacity = $request->query('capacity'); 

        Log::info($room);
        Log::info($price);
        Log::info($floor);
        Log::info($capacity);

        return view('reservas.index', compact('room', 'price', 'floor' ,'capacity'));
    }
    
}


    
    
    

