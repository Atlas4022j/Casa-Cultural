@extends('layouts.sidebar')

@section('titulo','Dashboard | Habitaciones')

@section('contenido')

<div class="rr-container" style="color: black">
    <div class="rr-form-card">
        <div class="rr-form-header">
            <h2 class="rr-form-title">Editar Habitación</h2>
            <p class="rr-form-subtitle">Complete el formulario para editar la habitación seleccionada</p>
        </div>
        <form action="{{ route('rooms.update', $habitacion->id) }}" method="POST" enctype="multipart/form-data" id="roomRegistrationForm" class="rr-form rr-form-animate-in">
            @csrf
            @method('PUT')

            <!-- Imágenes -->
            <div class="rr-file-upload-container">
                <label for="rr-img" class="rr-file-label">
                    <i data-lucide="upload" class="rr-icon"></i>
                    <span id="rr-fileName">Imágenes de la Habitación:</span>
                </label>
                <input type="file" id="rr-img" name="images[]" accept="image/*" class="rr-file-input" multiple onchange="handleImageUpload(event)">
                <div id="image-preview-container" class="image-gallery">
                    @if($habitacion->imagenes->isNotEmpty())
                        @foreach($habitacion->imagenes as $image)
                            <div class="image-wrapper" id="image-{{ $image->id }}">
                                <img src="{{ asset('storage/' . $image->img) }}" alt="Imagen de la habitación" onclick="openCarousel(this)">
                                <button type="button" class="change-img-btn" onclick="triggerFileInput({{ $image->id }})">
                                    <i data-lucide="edit" class="change-icon"></i> Cambiar
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Otros campos del formulario (sin cambios) -->
            <div class="rr-form-grid">
                <div class="rr-input-group">
                    <select id="rr-tipo-habitacion" name="tipo_habitacion" required>
                        <option value="" disabled>Seleccione tipo...</option>
                        <option value="Simples" {{ $habitacion->tipo_habitacion == 'Simples' ? 'selected' : '' }}>Simple</option>
                        <option value="Doble" {{ $habitacion->tipo_habitacion == 'Doble' ? 'selected' : '' }}>Doble</option>
                        <option value="Matrimonial" {{ $habitacion->tipo_habitacion == 'Matrimonial' ? 'selected' : '' }}>Matrimonial</option>
                        <option value="Grupal" {{ $habitacion->tipo_habitacion == 'Grupal' ? 'selected' : '' }}>Grupal</option>
                    </select>
                    <label for="rr-tipo-habitacion">Tipo de Habitación</label>
                </div>
                <div class="rr-input-group">
                    <input type="number" id="rr-precio" name="precio" step="0.01" min="0" value="{{ $habitacion->precio }}" required>
                    <label for="rr-precio">Precio</label>
                </div>
                <div class="rr-input-group" style="color: black">
                    <input type="number" id="rr-numero-habitacion" name="numero_habitacion" value="{{ old('numero_habitacion', $habitacion->numero_habitacion ?? '') }}" required>                
                    <label for="rr-numero-habitacion">Número de Habitación</label>
                    @error('numero_habitacion')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="rr-input-group">
                    <input type="number" id="rr-capacidad-maxima" name="capacidad_maxima" value="{{ $habitacion->capacidad_maxima }}" required>
                    <label for="rr-capacidad-maxima">Capacidad Máxima</label>
                </div>
            </div>
            <div class="rr-input-group rr-textarea-group">
                <textarea id="rr-descripcion" name="descripcion" rows="3" required>{{ $habitacion->descripcion }}</textarea>
                <label for="rr-descripcion">Descripción</label>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="rr-submit-btn">
                <span>Actualizar Habitación</span>
                <i data-lucide="save" class="rr-icon"></i>
            </button>
        </form>
    </div>
</div>

<!-- Carrusel en pantalla completa -->
<div id="fullscreen-carousel" class="fullscreen-carousel">
    <div class="carousel-content">
        <button id="close-carousel" class="close-carousel">&times;</button>
        <div class="carousel-container">
            <div id="carousel-slides" class="carousel-slides"></div>
        </div>
        <button id="prev-slide" class="carousel-nav prev">&lt;</button>
        <button id="next-slide" class="carousel-nav next">&gt;</button>
    </div>
</div>

@endsection