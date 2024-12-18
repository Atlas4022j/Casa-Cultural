@extends('layouts.sidebar')

@section('titulo','Dashboard | Clientes')

@section('contenido')
<div class="rr-container">
    <div class="rr-form-card" style="color: black">
        <div class="rr-form-header">
            <h2 class="rr-form-title">Registrar Cliente</h2>
            <p class="rr-form-subtitle">Complete el formulario para registrar un nuevo cliente</p>
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
        <form action="{{ route('clientes.store') }}" method="POST" id="roomRegistrationForm" class="rr-form rr-form-animate-in" enctype="multipart/form-data">
            @csrf
            <div class="room-group">
        
                <!-- Datos de la habitación -->
                <div class="rr-form-grid">
                    <div class="rr-input-group">
                        <input type="number" name="dni" id="capacidadMaxima" class="form-control"  required>
                        <label for="">DNI</label>
                    </div>
                    <div class="rr-input-group">
                        <input type="text" name="nombre" id="capacidadMaxima" class="form-control"  required>
                        <label for="">Nombre</label>
                    </div>
                    <div class="rr-input-group">
                        <input type="text" name="apellidos" id="capacidadMaxima" class="form-control"  required>
                        <label for="">Apellidos</label>
                    </div>
                    <div class="rr-input-group">
                        <input type="number" name="edad" id="capacidadMaxima" class="form-control"  required>
                        <label for="">Edad</label>
                    </div>
                    <div class="rr-input-group">
                        <input type="number" name="telefono" id="capacidadMaxima" class="form-control"  required>
                        <label for="">Telefono</label>
                    </div>
                    <div class="rr-input-group">
                        <input type="text" name="procedencia" id="capacidadMaxima" class="form-control"  required>
                        <label for="">Lugar De Procedencia</label>
                    </div>                
                </div>
        
                <!-- Descripción de la habitación -->
                <div class="rr-input-group rr-textarea-group">
                    <textarea name="condicion" id="descripcion" rows="3" required></textarea>
                    <label for="descripcion">Condicion</label>
                    <i data-lucide="align-left" class="rr-icon"></i>
                </div>
            </div>
        
            <button type="submit" class="rr-submit-btn">
                <span>Registrar Cliente</span>
                <i data-lucide="check-circle" class="rr-icon"></i>
            </button>
        </form>   
    </div>
</div>
@endsection