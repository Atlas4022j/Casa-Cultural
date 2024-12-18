@extends('layouts.sidebar')

@section('titulo','Dashboard | Clientes')

@section('contenido')
<div class="luxe-container" style="color: black">
    <h1 class="luxe-title luxe-fade-in">Detalles del Cliente</h1>
    <div class="luxe-card luxe-fade-in">
        <div class="luxe-info-grid">
            <div class="luxe-info-item luxe-slide-in">
                <strong class="luxe-icon-wrapper">
                    <i data-feather="hash"></i>
                    ID:
                </strong>
                <span id="luxe-room-id">{{ $cliente -> id }}</span>
            </div>
            <div class="luxe-info-item luxe-slide-in">
                <strong class="luxe-icon-wrapper">
                    <i data-feather="key"></i>
                    DNI:
                </strong>
                <span id="luxe-room-number">{{ $cliente -> dni }}</span>
            </div>
            <div class="luxe-info-item luxe-slide-in">
                <strong class="luxe-icon-wrapper">
                    <i data-feather="home"></i>
                    Nombre:
                </strong>
                <span id="luxe-room-type">{{ $cliente -> nombre }}</span>
            </div>
            <div class="luxe-info-item luxe-slide-in">
                <strong class="luxe-icon-wrapper">
                    <i data-feather="dollar-sign"></i>
                    Apellidos:
                </strong>
                <span id="luxe-room-price">{{ $cliente -> apellidos }}</span>
            </div>
            <div class="luxe-info-item luxe-slide-in">
                <strong class="luxe-icon-wrapper">
                    <i data-feather="dollar-sign"></i>
                    Edad:
                </strong>
                <span id="luxe-room-price">{{ $cliente -> telefono }}</span>
            </div>
            <div class="luxe-info-item luxe-slide-in">
                <strong class="luxe-icon-wrapper">
                    <i data-feather="dollar-sign"></i>
                    Telefono:
                </strong>
                <span id="luxe-room-price">{{ $cliente -> edad }}</span>
            </div>
            <div class="luxe-info-item luxe-slide-in">
                <strong class="luxe-icon-wrapper">
                    <i data-feather="dollar-sign"></i>
                    Procedencia:
                </strong>
                <span id="luxe-room-price">{{ $cliente -> procedencia }}</span>
            </div>
            <div class="luxe-info-item luxe-info-item-description luxe-slide-in">
                <strong class="luxe-icon-wrapper">
                    <i data-feather="file-text"></i>
                    Condicion:
                </strong>
                <p id="luxe-room-description" class="luxe-description-text">{{ $cliente -> condicion }}</p>
            </div>
            <div class="luxe-info-item luxe-slide-in">
                <strong class="luxe-icon-wrapper">
                    <i data-feather="check-circle"></i>
                    Estado:
                </strong>
                <span id="luxe-room-status" class="luxe-badge luxe-available">
                    {{ $cliente -> estado }}
                </span>
            </div>
        </div>
    </div>
  
@endsection