@extends('layouts.sidebar')

@section('titulo','Dashboard | Habitaciones')

@section('contenido')


<div class="rr-container">
    <div class="rr-form-card" style="color: black">
        <div class="rr-form-header">
            <h2 class="rr-form-title">Registrar Habitación</h2>
            <p class="rr-form-subtitle">Complete el formulario para registrar una nueva habitación</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form action="{{ route('rooms.store') }}" method="POST" id="roomRegistrationForm" class="rr-form rr-form-animate-in" enctype="multipart/form-data">
            @csrf
            <div class="room-group">
                <!-- Contenedor de carga de imágenes -->
                <div class="rr-file-upload-container">
                    <input type="file" name="img[]" id="roomImages" accept="image/*" multiple required class="rr-file-input">
                    <label for="roomImages" class="rr-file-label">
                        <i data-lucide="upload" class="rr-icon"></i>
                        <span>Seleccionar Imágenes</span>
                    </label>
                </div>
        
                <!-- Contenedor para la previsualización de imágenes -->
                <div id="imagePreviewContainer" class="image-preview-container" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;">
                    <!-- Aquí se mostrará la previsualización de las imágenes seleccionadas -->
                </div>
        
                <!-- Datos de la habitación -->
                <div class="rr-form-grid">
                    <div class="rr-input-group">
                        <select name="tipo_habitacion" id="tipoHabitacion" required>
                            <option value="" disabled selected>Seleccione tipo...</option>
                            <option value="Simples">Simple</option>
                            <option value="Doble">Doble</option>
                            <option value="Matrimonial">Matrimonial</option>
                            <option value="Grupal">Grupal</option>
                        </select>
                        <label for="tipoHabitacion">Tipo de Habitación</label>
                        <i data-lucide="bed" class="rr-icon"></i>
                    </div>
                    
                    <div class="rr-input-group">
                        <input type="number" name="capacidad_maxima" id="capacidadMaxima" class="form-control" min="1" required>
                        <label for="">Capacidad Máxima</label>
                    </div>
                
                    <div class="rr-input-group">
                        <input type="number" name="precio" id="precio" step="0.01" min="0" required>
                        <label for="precio">Precio</label>
                        <i data-lucide="dollar-sign" class="rr-icon"></i>
                    </div>
                    <div class="rr-input-group">
                        <input type="number" name="numero_habitacion" id="numeroHabitacion" value="{{ old('Numero_habitacion') }}" required>
                        <label for="numeroHabitacion">Número de Habitación</label>
                        <i data-lucide="door-closed" class="rr-icon"></i>
                        @error('Numero_habitacion')
                            <div style="color: red;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>                    
                </div>
        
                <!-- Descripción de la habitación -->
                <div class="rr-input-group rr-textarea-group">
                    <textarea name="descripcion" id="descripcion" rows="3" required></textarea>
                    <label for="descripcion">Descripción</label>
                    <i data-lucide="align-left" class="rr-icon"></i>
                </div>
            </div>
        
            <button type="submit" class="rr-submit-btn">
                <span>Registrar Habitación</span>
                <i data-lucide="check-circle" class="rr-icon"></i>
            </button>
        </form>   
    </div>
</div>
@endsection