@extends('layouts.main')

@section('title', 'Reserva de Habitación')

@section('content')
<div class="container py-5">
    <h1 class="text-center text-warning mb-4">Reserva de {{ $room }}</h1>
    <p class="text-center text-secondary">Precio por noche: <strong>S/. {{ $price }}</strong></p>
    <p class="text-center text-secondary">Piso: <strong> {{ $floor }}</strong></p>
    <p class="text-center text-secondary">Capacidad máxima: <strong>{{ $capacity }} personas</strong></p>


    <form action="{{ route('procesar-reserva') }}" method="POST" class="bg-light shadow rounded p-4 mt-4">
        @csrf
        <input type="hidden" name="room" value="{{ $room }}">
        <input type="hidden" name="price" value="{{ $price }}">
        <input type="hidden" name="floor" value="{{ $floor }}">
        <input type="hidden" name="capacity" value="{{ $capacity }}">

        <div class="mb-3">
            <label for="start_date" class="form-label text-primary">Fecha de inicio:</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label text-primary">Fecha de fin:</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-warning w-100">Confirmar Reserva</button>
    </form>
</div>
@endsection