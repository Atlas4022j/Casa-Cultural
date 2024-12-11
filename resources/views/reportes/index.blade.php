@extends('layouts.sidebar')

@section('titulo','Dashboard | Reportes')
@section('contenido')
<!-- New Reportes Section -->
<section class="reportes-container">
    <div class="reportes-header">
        <h2><i class="fas fa-chart-line"></i> Reportes Generales</h2>
    </div>
    <div class="reportes-cards">
        <div class="reportes-card" data-aos="fade-up">
            <div class="card-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="card-content">
                <h3>45</h3>
                <p>Reservaciones del Día</p>
            </div>
        </div>
        <div class="reportes-card" data-aos="fade-up" data-aos-delay="100">
            <div class="card-icon">
                <i class="fas fa-bed"></i>
            </div>
            <div class="card-content">
                <h3>S/ 5,000</h3>
                <p>Ingresos por Habitaciones</p>
            </div>
        </div>
        <div class="reportes-card" data-aos="fade-up" data-aos-delay="200">
            <div class="card-icon">
                <i class="fas fa-utensils"></i>
            </div>
            <div class="card-content">
                <h3>S/ 3,000</h3>
                <p>Ingresos por Restaurante</p>
            </div>
        </div>
    </div>
    <div class="reportes-content">
        <div class="reportes-chart-container" data-aos="fade-up">
            <h3><i class="fas fa-chart-bar"></i> Ingresos por Habitaciones</h3>
            <canvas id="habitacionesChart"></canvas>
        </div>
        <div class="reportes-chart-container" data-aos="fade-up" data-aos-delay="100">
            <h3><i class="fas fa-chart-pie"></i> Ingresos por Restaurante</h3>
            <canvas id="restauranteChart"></canvas>
        </div>
        <div class="reportes-tabla-container" data-aos="fade-up" data-aos-delay="200">
            <h3><i class="fas fa-list"></i> Reservaciones por Habitaciones</h3>
            <div class="table-responsive">
                <table class="reportes-table">
                    <thead>
                        <tr>
                            <th>Habitación</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>101</td>
                            <td>Juan Pérez</td>
                            <td>27/11/2024</td>
                        </tr>
                        <tr>
                            <td>202</td>
                            <td>María López</td>
                            <td>28/11/2024</td>
                        </tr>
                        <tr>
                            <td>305</td>
                            <td>Carlos Rodríguez</td>
                            <td>29/11/2024</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="reportes-tabla-container" data-aos="fade-up" data-aos-delay="300">
            <h3><i class="fas fa-clipboard-list"></i> Reservaciones por Restaurante</h3>
            <div class="table-responsive">
                <table class="reportes-table">
                    <thead>
                        <tr>
                            <th>Mesa</th>
                            <th>Cliente</th>
                            <th>Hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>5</td>
                            <td>Ana López</td>
                            <td>12:00 PM</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Pedro Gómez</td>
                            <td>1:30 PM</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Laura Martínez</td>
                            <td>7:00 PM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection