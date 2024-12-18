@extends('layouts.sidebar')

@section('titulo','Dashboard | Clientes')

@section('contenido')
<div class="rr-container" style="color: black">
    <div class="rr-form-card">
        <div class="rr-form-header">
            <h2 class="rr-form-title">Editar Cliente</h2>
            <p class="rr-form-subtitle">Complete el formulario para editar la información del cliente seleccionado</p>
        </div>
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" enctype="multipart/form-data" id="clientRegistrationForm" class="rr-form rr-form-animate-in">
            @csrf
            @method('PUT')

            <!-- Datos del Cliente -->
            <div class="rr-form-grid">
                <div class="rr-input-group">
                    <input type="text" id="dni" name="dni" value="{{ old('dni', $cliente->dni) }}" required>
                    <label for="dni">DNI</label>
                </div>
                <div class="rr-input-group">
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $cliente->nombre) }}" required>
                    <label for="nombre">Nombre</label>
                </div>
                <div class="rr-input-group">
                    <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos', $cliente->apellidos) }}" required>
                    <label for="apellidos">Apellidos</label>
                </div>
                <div class="rr-input-group">
                    <input type="number" id="edad" name="edad" value="{{ old('edad', $cliente->edad) }}" required>
                    <label for="edad">Edad</label>
                </div>
                <div class="rr-input-group">
                    <input type="text" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" required>
                    <label for="telefono">Teléfono</label>
                </div>
                <div class="rr-input-group">
                    <input type="text" id="procedencia" name="procedencia" value="{{ old('procedencia', $cliente->procedencia) }}" required>
                    <label for="procedencia">Lugar de Procedencia</label>
                </div>                
            </div>

            <div class="rr-input-group rr-textarea-group">
                <textarea id="condicion" name="condicion" rows="3" required>{{ old('condicion', $cliente->condicion) }}</textarea>
                <label for="condicion">Condición</label>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="rr-submit-btn">
                <span>Actualizar Cliente</span>
                <i data-lucide="save" class="rr-icon"></i>
            </button>
        </form>
    </div>
</div>
@endsection
