@extends('layouts.sidebar')

@section('titulo' ,'Dashboard | Restaurant')
@section('contenido')
<div class="tours-container">
    <h1 class="tours-title">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-map">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/>
            <path d="M2 12h20"/>
        </svg>
        Gestión de Comidas Y Bebidas
    </h1>
  
    <div class="tours-actions">
        <div class="search-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon">
                <circle cx="11" cy="11" r="8"/>
                <path d="m21 21-4.3-4.3"/>
            </svg>
            <input 
                type="text" 
                id="tours-search" 
                placeholder="Buscar por Nombre o Precio" 
                onkeyup="filterTable()"
                aria-label="Buscar comidas y bebidas"
            >
        </div>
        <a href="{{ route('restaurant.create') }}" class="add-tour-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 5v14M5 12h14"/>
            </svg>
            Agregar Nuevo
        </a>
    </div>
  
    <div class="table-responsive">
        <table class="tours-table" id="tours-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($Restaurantes) && $Restaurantes->isNotEmpty())
                    @foreach ($Restaurantes as $index => $Restaurante)
                        <tr>
                            <td>{{ $Restaurante->id }}</td>
                            <td>
                                <div class="tour-name">
                                    
                                    {{ $Restaurante->nombre }}
                                </div>
                            </td>
                            <td>{{ $Restaurante->categoria }}</td>
                            <td>{{ $Restaurante->descripcion }}</td>
                            <td>S/ {{ number_format($Restaurante->precio, 2) }}</td>
                            <td>
                                <span class="status-badge {{ $Restaurante->disponible == 'disponible' ? 'status-available' : 'status-unavailable' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/>
                                        <path d="M9 12l2 2 4-4"/>
                                    </svg>
                                    {{ $Restaurante->disponible == 'disponible' ? 'Disponible' : 'No Disponible' }}
                                </span>
                            </td>
                            <td>
                                <div class="tours-actions">
                                    <button class="tours-btn-view" onclick="viewPlato({{ $Restaurante->id }})" aria-label="Ver detalles">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                            <circle cx="12" cy="12" r="3"/>
                                        </svg>
                                    </button>
                                    <a href="{{ route('restaurant.edit', $Restaurante->id) }}" class="tours-btn-edit" aria-label="Editar Platillo">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('restaurant.destroy', $Restaurante->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="tours-btn-delete" aria-label="Eliminar Platillo">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 6h18"/>
                                                <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                                <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                                <line x1="10" y1="11" x2="10" y2="17"/>
                                                <line x1="14" y1="11" x2="14" y2="17"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">No hay platillos o bebidas registrados.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
  
    <div class="tours-loading" style="display: none;">
        <div class="loading-spinner"></div>
    </div>
  
    <template id="tour-row-skeleton">
        <tr class="tours-skeleton">
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