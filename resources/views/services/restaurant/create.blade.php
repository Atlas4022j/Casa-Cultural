@extends('layouts.sidebar')

@section('title','Dashboard | Restaurant')

@section('contenido')
<div class="rg-container">
    <div class="rg-card">
        <h1 class="rg-title">Registrar Plato</h1>
        <p class="rg-subtitle">Complete el formulario para registrar un nuevo plato</p>
        <form id="restaurantForm" class="rg-form" action="{{ route('restaurant.store') }}" method="POST" enctype="multipart/form-data">
            <div class="rg-form-grid">
                <div class="rg-form-group">
                    <label for="imagen" class="rg-label">
                        <div class="rg-input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                        </div>
                        <input type="file" id="imagen" name="imagen" accept="image/*" class="rg-input" placeholder="Seleccionar imagen">
                    </label>
                </div>

                <div class="rg-form-group">
                    <label for="categoria" class="rg-label">
                        <div class="rg-input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3h18v18H3zM12 8v8M8 12h8"/></svg>
                        </div>
                        <select id="categoria" name="categoria" required class="rg-input">
                            <option value="">Categoría...</option>
                            <option value="Entrante">Entrante</option>
                            <option value="Plato Principal">Plato Principal</option>
                            <option value="Postre">Postre</option>
                            <option value="Bebida">Bebida</option>
                        </select>
                    </label>
                </div>

                <div class="rg-form-group">
                    <label for="nombre" class="rg-label">
                        <div class="rg-input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                        </div>
                        <input type="text" id="nombre" name="nombre" required class="rg-input" placeholder="Nombre del plato">
                    </label>
                </div>

                <div class="rg-form-group">
                    <label for="precio" class="rg-label">
                        <div class="rg-input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                        </div>
                        <input type="number" id="precio" name="precio" step="0.01" min="0" required class="rg-input" placeholder="Precio">
                    </label>
                </div>

                <div class="rg-form-group rg-form-group-full">
                    <label for="descripcion" class="rg-label">
                        <div class="rg-input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="21" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="3" y2="18"></line></svg>
                        </div>
                        <input type="text" id="descripcion" name="descripcion" required class="rg-input" placeholder="Descripción">
                    </label>
                </div>

                <div class="rg-form-group rg-form-group-full">
                    <label for="disponible" class="rg-label">
                        <div class="rg-input-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                        </div>
                        <select id="disponible" name="disponible" required class="rg-input">
                            <option value="disponible">Disponible</option>
                            <option value="no_disponible">No disponible</option>
                        </select>
                    </label>
                </div>
            </div>

            <button type="submit" class="rg-button">
                <span class="rg-button-icon">+</span>
                Registrar Plato
            </button>
        </form>
    </div>
</div>

@endsection