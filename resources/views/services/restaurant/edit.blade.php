@extends('layouts.sidebar')

@section('titulo','Dashboard | Restaurant')

@section('contenido')
<div class="rr-container" style="color: black">
    <div class="rr-form-card">
        <div class="rr-form-header">
            <h2 class="rr-form-title">Editar Platillo</h2>
            <p class="rr-form-subtitle">Complete el formulario para editar el platillo seleccionado</p>
        </div>
        <form action="{{ route('restaurant.update', $restaurante->id) }}" method="POST" enctype="multipart/form-data" id="roomRegistrationForm" class="rr-form rr-form-animate-in">
            @csrf
            @method('PUT')

            <!-- Imágenes -->
            <div class="rr-file-upload-container">
                <label for="rr-img" class="rr-file-label">
                    <i data-lucide="upload" class="rr-icon"></i>
                    <span id="rr-fileName">Seleccionar Una Imagen:</span>
                </label>
                <input type="file" id="rr-img" name="images[]" accept="image/*" class="rr-file-input" multiple onchange="handleImageUpload(event)">

                <div id="image-preview-container" class="image-gallery">
                    @if($restaurante->imagenes->isNotEmpty())
                        @foreach($restaurante->imagenes as $image)
                            <div class="image-wrapper" id="image-{{ $image->id }}">
                                <img src="{{ asset('storage/' . $image->img) }}" alt="Imagen de la habitación" onclick="openCarousel(this)">
                                
                                <!-- Botón de cambiar imagen -->
                                <input type="file" id="change-img-{{ $image->id }}" class="hidden-file-input" accept="image/*" onchange="replaceImage(this, {{ $image->id }})" style="display: none;">
                                <button type="button" class="change-img-btn" onclick="document.getElementById('change-img-{{ $image->id }}').click()">
                                    <i data-lucide="edit" class="change-icon"></i> Cambiar
                                </button>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <!-- Otros campos del formulario -->
            <div class="rr-form-grid">
                <div class="rr-input-group">
                    <select id="rr-tipo-habitacion" name="categoria" required>
                        <option value="" disabled>Seleccione tipo...</option>
                        <option value="Entrada" {{ $restaurante->categoria == 'Entrada' ? 'selected' : '' }}>Entrada</option>
                        <option value="Postre" {{ $restaurante->categoria == 'Postre' ? 'selected' : '' }}>Postre</option>
                        <option value="Menu" {{ $restaurante->categoria == 'Menu' ? 'selected' : '' }}>Menu</option>
                        <option value="Bebida" {{ $restaurante->categoria == 'Bebida' ? 'selected' : '' }}>Bebida</option>
                    </select>
                    <label for="rr-tipo-habitacion">Categoria</label>
                </div>
                <div class="rr-input-group">
                    <input type="number" id="rr-precio" name="precio" step="0.01" min="0" value="{{ $restaurante->precio }}" required>
                    <label for="rr-precio">Precio</label>
                </div>
                <div class="rr-input-group">
                    <input type="text" id="rr-numero-habitacion" name="nombre" value="{{ $restaurante->nombre }}" required>                
                    <label for="rr-numero-habitacion">Nombre</label>
                </div>
            </div>
            <div class="rr-input-group rr-textarea-group">
                <textarea id="rr-descripcion" name="descripcion" rows="3" required>{{ $restaurante->descripcion }}</textarea>
                <label for="rr-descripcion">Descripción</label>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="rr-submit-btn">
                <span>Actualizar Platillo</span>
                <i data-lucide="save" class="rr-icon"></i>
            </button>
        </form>
    </div>
</div>

@endsection
