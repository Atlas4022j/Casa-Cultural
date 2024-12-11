@extends('layouts.sidebar')

@section('title','Dashboard | Clientes')

@section('contenido')
<div class="container">
    <h2>Registrar Oferta de Tour</h2>

    <form action="{{ route('tours.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="img" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="img" name="img" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="destino" class="form-label">Destino</label>
            <input type="text" class="form-control" id="destino" name="destino" required>
        </div>

        <div class="mb-3">
            <label for="distancia" class="form-label">Distancia</label>
            <input type="text" class="form-control" id="distancia" name="distancia" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" required>
        </div>

        <div class="mb-3">
            <label for="disponible" class="form-label">Disponibilidad</label>
            <select class="form-select" id="disponible" name="disponible" required>
                <option value="disponible">Disponible</option>
                <option value="no_disponible">No disponible</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Oferta</button>
    </form>
</div>


@endsection