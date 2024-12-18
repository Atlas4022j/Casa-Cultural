@extends('layouts.sidebar')

@section('titulo','Dashboard | Restaurant')

@section('contenido')
<div class="rr-container">
    <div class="rr-form-card" style="color: black">
        <div class="rr-form-header">
            <h2 class="rr-form-title">Registrar Nuevo Platillo o Bebida</h2>
            <p class="rr-form-subtitle">Complete el formulario para registrar un nuevo platillo o bebida</p>
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
        <form action="{{ route('restaurant.store') }}" method="POST" id="roomRegistrationForm" class="rr-form rr-form-animate-in" enctype="multipart/form-data">
            @csrf
            <div class="room-group">
                <!-- Contenedor de carga de imágenes -->
                <div class="rr-file-upload-container">
                    <input type="file" name="imagenes[]" id="roomImages" accept="image/*" multiple required class="rr-file-input">
                    <label for="roomImages" class="rr-file-label">
                        <i data-lucide="upload" class="rr-icon"></i>
                        <span>Seleccionar Imágenes</span>
                    </label>
                </div>
        
                <!-- Contenedor para la previsualización de imágenes -->
                <div id="imagePreviewContainer" class="image-preview-container" style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px;">
                    <!-- Aquí se mostrará la previsualización de las imágenes seleccionadas -->
                </div>
        
                <!-- Datos del platillo -->
                <div class="rr-form-grid">
                    <div class="rr-input-group">
                        <select name="categoria" id="tipoHabitacion" required>
                            <option value="" disabled selected>Seleccione tipo...</option>
                            <option value="Entrada">Entrada</option>
                            <option value="Postre">Postre</option>
                            <option value="Menu">Menu</option>
                            <option value="Bebida">Bebida</option>
                        </select>
                        <label for="tipoHabitacion">Tipo de Platillo</label>
                        <i data-lucide="bed" class="rr-icon"></i>
                    </div>
                    
                    <div class="rr-input-group">
                        <input type="text" name="nombre" id="capacidadMaxima" class="form-control" min="1" required>
                        <label for="capacidadMaxima">Nombre</label>
                    </div>
                
                    <div class="rr-input-group">
                        <input type="number" name="precio" id="precio" step="0.01" min="0" required>
                        <label for="precio">Precio</label>
                        <i data-lucide="dollar-sign" class="rr-icon"></i>
                    </div>                   
                </div>
        
                <!-- Descripción del platillo -->
                <div class="rr-input-group rr-textarea-group">
                    <textarea name="descripcion" id="descripcion" rows="3" required></textarea>
                    <label for="descripcion">Descripción</label>
                    <i data-lucide="align-left" class="rr-icon"></i>
                </div>
            </div>
        
            <button type="submit" class="rr-submit-btn">
                <span>Registrar Platillo</span>
                <i data-lucide="check-circle" class="rr-icon"></i>
            </button>
        </form>           
    </div>
</div>
@endsection