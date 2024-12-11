@extends('layouts.sidebar')

@section('title','Hospedaje | Dashboard')

@section('contenido')

<div class="tours-container">
    <h1 class="tours-title">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-map">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/>
            <path d="M2 12h20"/>
        </svg>
        Gestión de Clientes
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
                placeholder="Buscar por DNI O NOMBRE" 
                onkeyup="filterTable()"
                aria-label="Buscar clientes"
            >
        </div>
        <a href="{{ route('clientes.create') }}" class="add-tour-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 5v14M5 12h14"/>
            </svg>
            Agregar Cliente
        </a>
    </div>
  
    <!-- Tabla de clientes -->
    <div class="table-responsive">
        <table class="tours-table" id="tours-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($Clientes) && $Clientes->isNotEmpty())
                    @foreach ($Clientes as $index => $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>
                                <div class="tour-name">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 7V5c0-1.1.9-2 2-2h2"/>
                                        <path d="M17 3h2c1.1 0 2 .9 2 2v2"/>
                                        <path d="M21 17v2c0 1.1-.9 2-2 2h-2"/>
                                        <path d="M7 21H5c-1.1 0-2-.9-2-2v-2"/>
                                        <path d="M8 14s1.5 2 4 2 4-2 4-2"/>
                                        <path d="M9 9h.01"/>
                                        <path d="M15 9h.01"/>
                                    </svg>
                                    {{ $cliente->dni }}
                                </div>
                            </td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->apellidos }}</td>
                            <td>{{ $cliente->telefono }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>
                                <span class="status-badge {{ $cliente->estado ? 'status-available' : 'status-unavailable' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/>
                                        <path d="M9 12l2 2 4-4"/>
                                    </svg>
                                    {{ $cliente->estado ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td>
                                <button class="tours-btn-view" onclick="viewCliente({{ $cliente->id }})" aria-label="Ver detalles">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="tours-btn-edit" aria-label="Editar Cliente">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" style="display: inline-block;" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="tours-btn-delete" aria-label="Eliminar Cliente">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6h18"/>
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                            <line x1="10" y1="11" x2="10" y2="17"/>
                                            <line x1="14" y1="11" x2="14" y2="17"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">No hay clientes registrados.</td>
                    </tr>
                @endif
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