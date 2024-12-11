@extends('layouts.sidebar')
@section('titulo','Dashboard | Habitaciones')

@section('contenido')

<div class="rd-container">
    <h2 class="rd-room-details-title rd-fade-in-section">Detalles de la Habitación</h2>
    <div class="rd-room-card rd-fade-in-section">
      <div class="rd-room-info">
        <div class="rd-info-item">
          <strong>ID:</strong>
          <span id="rd-room-id">{{ $habitacion->id }}</span>
        </div>
        <div class="rd-info-item">
          <strong>Número de Habitación:</strong>
          <span id="rd-room-number">{{ $habitacion->numero_habitacion }}</span>
        </div>
        <div class="rd-info-item">
          <strong>Tipo:</strong>
          <span id="rd-room-type">{{ ucfirst($habitacion->tipo_habitacion) }}</span>
        </div>
        <div class="rd-info-item">
          <strong>Precio:</strong>
          <span id="rd-room-price">S/ {{ number_format($habitacion->precio, 2) }}</span>
        </div>
        <div class="rd-info-item">
          <strong>Descripción:</strong>
          <span id="rd-room-description">{{ $habitacion->descripcion ?? 'No especificada' }}</span>
        </div>
        <div class="rd-info-item">
          <strong>Estado:</strong>
          <span id="rd-room-status" class="rd-badge rd-{{ $habitacion->estado ? 'available' : 'unavailable' }}">
            {{ $habitacion->estado ? 'Disponible' : 'No Disponible' }}
          </span>
        </div>
      </div>
    </div>
  
    <h3 class="rd-images-title rd-fade-in-section">Imágenes</h3>
    <div id="rd-images-grid" class="rd-images-grid rd-fade-in-section">
      @if($habitacion->imagenes->isNotEmpty())
        @foreach ($habitacion->imagenes as $imagen)
          <div class="rd-image-card">
            <img src="{{ asset('storage/' . $imagen->img) }}" alt="Imagen de la habitación" class="rd-room-image">
          </div>
        @endforeach
      @else
        <p>No hay imágenes disponibles para esta habitación.</p>
      @endif
    </div>
  
    <div class="rd-back-button-container rd-fade-in-section">
      <a href="{{ route('rooms.index') }}" class="rd-btn rd-btn-secondary">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="rd-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
        Volver
      </a>
    </div>
  </div>
  
  <div id="rd-image-modal" class="rd-modal">
    <div class="rd-modal-content">
      <span class="rd-close-button">&times;</span>
      <img id="rd-modal-image" src="" alt="Imagen de la habitación">
      <button id="rd-prev-button" class="rd-nav-button rd-prev">&#10094;</button>
      <button id="rd-next-button" class="rd-nav-button rd-next">&#10095;</button>
    </div>
  </div>
  

@endsection