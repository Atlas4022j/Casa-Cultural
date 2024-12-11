@extends('layouts.sidebar')

@section('title','Dashboard | Clientes')

@section('contenido')
<div class="cu-background"></div>
    <main class="cu-content">
        <div class="cu-card">
            <div class="cu-header">
                <h2 class="cu-title">Editar un Usuario</h2>
                <p class="cu-subtitle">Complete el formulario para ...</p>
            </div>
            <form id="registrationForm" action="{{ route('clientes.update',$cliente->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="cu-form-grid">
                    <div class="cu-input-group">
                        <i class="fas fa-id-card"></i>
                        <input type="text" id="dni" name="dni" maxlength="8" required value="{{ $cliente->dni }}">
                        <label for="dni">DNI</label>
                    </div>
                    <div class="cu-input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" id="nombre" name="nombre" required value="{{ $cliente->nombre }}">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="cu-input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" id="apellidos" name="apellidos" required value="{{ $cliente->apellidos }}">
                        <label for="apellidos">Apellidos</label>
                    </div>
                    <div class="cu-input-group">
                        <i class="fas fa-phone"></i>
                        <input type="tel" id="telefono" name="telefono" required value="{{ $cliente->telefono }}">
                        <label for="telefono">Teléfono</label>
                    </div>
                    <div class="cu-input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" required value="{{ $cliente->email }}">
                        <label for="email">Correo Electrónico</label>
                    </div>
                    <div class="cu-input-group">
                        <i class="fas fa-user-circle"></i>
                        <input type="text" id="usuario" name="usuario" required value="{{ $cliente->usuario }}">
                        <label for="usuario">Usuario</label>
                    </div>
                </div>
                <div class="cu-input-group cu-password-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" id="password" name="password" required value="{{ $cliente->password }}">
                    <label for="password">Contraseña</label>
                    <i class="fas fa-eye-slash cu-toggle-password"></i>
                </div>
                <button type="submit" class="cu-btn-submit">
                    <span>Crear Usuario</span>
                    <i class="fas fa-user-plus"></i>
                </button>
            </form>
        </div>
    </main>
@endsection