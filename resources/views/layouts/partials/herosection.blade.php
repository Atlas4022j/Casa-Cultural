<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>Hospedaje Casa Cultural El Mirador</h1>
                    <p>Descubre un refugio único donde la cultura y la serenidad se encuentran. Bienvenido a El Mirador, tu hogar en el corazón de la tradición.</p>
                    <a href="#" class="primary-btn">Descubrir Ahora</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                <div class="booking-form">
                    <h3>Reserva Tu Habitacion</h3>
                    <form action="#">
                        <div class="check-date">
                            <label for="date-in">Entrada:</label>
                            <input type="text" class="date-input" id="date-in">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Salida:</label>
                            <input type="text" class="date-input" id="date-out">
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="select-option">
                            <label for="guest">Personas:</label>
                            <select id="guest">
                                <option value="">2 Adultos</option>
                                <option value="">3 Adultos</option>
                            </select>
                        </div>
                        <button type="submit">Ver Disponibilidad</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="{{ asset('resources/img/hero/hero-1.jpg') }}"></div>
        <div class="hs-item set-bg" data-setbg="{{ asset('resources/img/hero/hero-2.jpg') }}"></div>
        <div class="hs-item set-bg" data-setbg="{{ asset('resources/img/hero/hero-3.jpg') }}"></div>
    </div>
</section>
<!-- Hero Section End -->