@extends('layouts.main')
@section('title','Hospedaje | Habitaciones')
@section('content')
<main>
    <!-- Header End -->

<!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Nuestas Habitaciones</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<!-- Rooms Section Begin -->
<section class="rooms-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="room-item" data-room="Habitaciones Grupales" data-price="50" data-floor="3º" data-capacity="5">
                    <img src="{{ asset('img/room/room-1.jpg') }}" alt="Habitaciones Grupales">
                    <div class="ri-text">
                        <h4>Habitaciones Grupales</h4>
                        <h3>S/. 50<span>/Por Noche</span></h3>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Piso:</td>
                                    <td>3°</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacidad:</td>
                                    <td>Maxima 5 Personas</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Servicios:</td>
                                    <td>Wifi, Television, Baño,...</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="primary-btn">Reservar Ahora</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="room-item" data-room="Habitaciones Simples" data-price="100" data-floor="3º" data-capacity="5">
                    <img src="{{ asset('img/room/room-2.jpg') }}" alt="Habitaciones Simples">
                    <div class="ri-text">
                        <h4>Habitaciones Simples</h4>
                        <h3>S/. 100<span>/Por Noche</span></h3>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Piso:</td>
                                    <td>3°</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacidad:</td>
                                    <td>Maxima 5 personas</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Servicios:</td>
                                    <td>Wifi, Television, Baño,...</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="primary-btn">Reservar Ahora</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="room-item" data-room="Habitaciones Dobles" data-price="150" data-floor="3º" data-capacity="2">
                    <img src="{{ asset('img/room/room-3.jpg') }}" alt="Habitaciones Dobles">
                    <div class="ri-text">
                        <h4>Habitaciones Dobles</h4>
                        <h3>S/. 150<span>/Por Noche</span></h3>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Piso:</td>
                                    <td>3°</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacidad:</td>
                                    <td>Maxima 2 Personas</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>Wifi, Television, Baño,...</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="primary-btn">Reservar Ahora</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="room-item" data-room="Suit Matrimonial" data-price="200" data-floor="3º" data-capacity="2">
                    <img src="{{ asset('img/room/room-4.jpg') }}" alt="Suit Matrimonial">
                    <div class="ri-text">
                        <h4>Suit Matrimonial</h4>
                        <h3>S/ 200<span>/Por Noche</span></h3>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="r-o">Piso:</td>
                                    <td>3°</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacidad:</td>
                                    <td>Maximo 2 Personas</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Servicios:</td>
                                    <td>Wifi, Television, Baño,...</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="primary-btn">Reservar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection