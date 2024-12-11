@extends('layouts.sidebar')
@section('title','Dashboard | Turismo')

@section('contenido')
<div class="tours-container">
  <h1 class="tours-title">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-map">
          <circle cx="12" cy="12" r="10"/>
          <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/>
          <path d="M2 12h20"/>
      </svg>
      Gestión de Tours
  </h1>

  <!-- Acciones principales -->
  <div class="tours-actions">
      <div class="search-wrapper">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon">
              <circle cx="11" cy="11" r="8"/>
              <path d="m21 21-4.3-4.3"/>
          </svg>
          <input 
              type="text" 
              id="tours-search" 
              placeholder="Buscar por nombre, destino o precio" 
              onkeyup="filterTable()"
              aria-label="Buscar tours"
          >
      </div>
      <a href="{{ route('tours.create') }}">
      <button 
          onclick="openModal('register')"
          data-tooltip="Agregar nuevo tour"
          class="add-tour-btn"
      >
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 5v14M5 12h14"/>
          </svg>
          Registrar Tour
      </button>
    </a>
  </div>

  <!-- Tabla de tours -->
  <div class="table-responsive">
    <table class="tours-table" id="tours-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">
                    <div class="th-content">
                        Destino
                    </div>
                </th>
                <th scope="col">
                    <div class="th-content">
                        Descripción
                    </div>
                </th>
                <th scope="col">
                    <div class="th-content">
                        Precio
                    </div>
                </th>
                <th scope="col">
                    <div class="th-content">
                        Estado
                    </div>
                </th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tours as $tour)
            <tr>
                <td>{{ $tour->id }}</td>
                <td>
                    <div class="tour-name">
                        {{ $tour->destino }}
                    </div>
                </td>

                <td>{{ $tour->descripcion }}</td>
                <td>S/ {{ number_format($tour->precio, 2) }}</td>
                <td>
                    <span class="status-badge {{ $tour->estado == 'disponible' ? 'status-available' : 'status-unavailable' }}">
                        @if ($tour->estado == 'disponible')
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/>
                                <path d="M9 12l2 2 4-4"/>
                            </svg>
                            Disponible
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <path d="m15 9-6 6"/>
                                <path d="m9 9 6 6"/>
                            </svg>
                            No Disponible
                        @endif
                    </span>
                </td>
                <td>
                    <button class="tours-btn-view" onclick="viewTour({{ $tour->id }})" data-tooltip="Ver detalles">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                        <span class="sr-only">Ver detalles</span>
                    </button>
                    <button class="tours-btn-edit" onclick="editTour({{ $tour->id }})" data-tooltip="Editar tour">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m16 3 5 5-12 12H3v-5L16 3Z"/>
                        </svg>
                        <span class="sr-only">Editar</span>
                    </button>
                    <button class="tours-btn-delete" onclick="deleteTour({{ $tour->id }})" data-tooltip="Eliminar tour">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 6h18M3 12h18M3 18h18"/>
                        </svg>
                        <span class="sr-only">Eliminar</span>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>

  <!-- Estado de carga -->
  <div class="tours-loading" style="display: none;">
      <div class="loading-spinner"></div>
  </div>

  <!-- Skeleton loading para nuevas filas -->
  <template id="tour-row-skeleton">
      <tr class="tours-skeleton">
          <td><div class="skeleton-text"></div></td>
          <td><div class="skeleton-text"></div></td>
          <td><div class="skeleton-text"></div></td>
          <td><div class="skeleton-text"></div></td>
          <td><div class="skeleton-text"></div></td>
          <td><div class="skeleton-text"></div></td>
          <td><div class="skeleton-text"></div></td>
          <td>
              <div class="skeleton-actions">
                  <div class="skeleton-button"></div>
                  <div class="skeleton-button"></div>
                  <div class="skeleton-button"></div>
              </div>
          </td>
      </tr>
  </template>
</div>
@endsection