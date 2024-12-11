@extends('layouts.sidebar')

@section('title','Dashboard | Habitaciones')

@section('contenido')


<div class="rr-container">
    <div class="rr-form-card">
        <div class="rr-form-header">
            <h2 class="rr-form-title">Editar Habitación</h2>
            <p class="rr-form-subtitle">Complete el formulario para editar la habitacion seleccionada</p>
        </div>
        <form action="{{ route('rooms.update', $habitacion->id) }}" method="POST" id="roomRegistrationForm" class="rr-form rr-form-animate-in">
            @csrf
            @method('PUT')
            <div class="rr-file-upload-container">
                <input type="file" id="rr-img" name="img" accept="image/*" required class="rr-file-input" value="{{ $habitacion->img }}">
                <label for="rr-img" class="rr-file-label">
                    <i data-lucide="upload" class="rr-icon"></i>
                    <span id="rr-fileName">Seleccionar Imagen</span>
                </label>
            </div>
            <div class="rr-form-grid">
                <div class="rr-input-group">
                    <select id="rr-tipo-habitacion" name="tipo_habitacion" required>
                        <option value="" disabled selected>Seleccione tipo...</option>
                        <option value="Simples" {{ $habitacion->tipo_habitacion == 'Simples' ? 'selected' : '' }}>Simple</option>
                        <option value="Doble" {{ $habitacion->tipo_habitacion == 'Doble' ? 'selected' : '' }}>Doble</option>
                        <option value="Matrimonial" {{ $habitacion->tipo_habitacion == 'Matrimonial' ? 'selected' : '' }}>Matrimonial</option>
                        <option value="Grupal" {{ $habitacion->tipo_habitacion == 'Grupal' ? 'selected' : '' }}>Grupal</option>
                    </select>
                    <label for="rr-tipo-habitacion">Tipo de Habitación</label>
                    <i data-lucide="bed" class="rr-icon"></i>
                </div>
                <div class="rr-input-group">
                    <input type="number" id="rr-precio" name="precio" step="0.01" min="0" value="{{ $habitacion->precio}}" required>
                    <label for="rr-precio">Precio</label>
                    <i data-lucide="dollar-sign" class="rr-icon"></i>
                </div>
                <div class="rr-input-group">
                    <input type="number" id="rr-numero-habitacion" name="numero_habitacion" value="{{ $habitacion->numero_habitacion}}" required>
                    <label for="rr-numero-habitacion">Número de Habitación</label>
                    <i data-lucide="door-closed" class="rr-icon"></i>
                </div>
            </div>
            <div class="rr-input-group rr-textarea-group">
                <textarea id="rr-descripcion" name="descripcion" rows="3" required>{{ $habitacion->descripcion }}</textarea>
                <label for="rr-descripcion">Descripción</label>
                <i data-lucide="align-left" class="rr-icon"></i>
            </div>
            <button type="submit" class="rr-submit-btn">
                <span>Registrar Habitación</span>
                <i data-lucide="plus-circle" class="rr-icon"></i>
            </button>
        </form>
    </div>
</div>
@endsection