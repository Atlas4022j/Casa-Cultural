<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hospedaje | El Mirador</title>

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" >
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/main.js') }}"></script>
</head>
<body>

    @include('partials.header')

    <main>
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
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/hero-1.jpg') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/hero-2.jpg') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/hero-3.jpg') }}"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>Nuestro</span>
                            <h2>Hospedaje</h2>
                        </div>
                        <p class="f-para">En Hospedaje Casa Cultural El Mirador, ofrecemos más que solo un lugar para descansar; brindamos una experiencia cultural auténtica y enriquecedora. Ubicados en un entorno lleno de historia y tradición, nuestro espacio invita a los huéspedes a conectar con las raíces y la esencia de la región. Nos apasiona ofrecer una estancia cálida y personalizada, donde cada visitante pueda sentir la armonía entre el confort moderno y la riqueza cultural de nuestro entorno. Somos un equipo comprometido con hacer de tu visita una experiencia inolvidable, donde la hospitalidad y el respeto por nuestras tradiciones son nuestra mayor inspiración.</p>
                        <a href="#" class="primary-btn about-btn">Leer Mas</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="{{ asset('img/about/about-1.jpg') }}" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('img/about/about-2.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>¿Que Hacemos?</span>
                        <h2>Descubre Nuestros Servicios</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-036-parking"></i>
                        <h4>Planes de Turistas</h4>
                        <p>Explora la región con itinerarios diseñados especialmente para ti. Ofrecemos paquetes turísticos personalizados que te permitirán descubrir los secretos y bellezas de los alrededores, desde visitas guiadas hasta actividades culturales.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-033-dinner"></i>
                        <h4>Servicio De Restaurante</h4>
                        <p>Disfruta de una experiencia gastronómica única en nuestro restaurante. Con una selección de platos locales y opciones internacionales, cada comida es preparada con ingredientes frescos y locales, asegurando una experiencia deliciosa y auténtica.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="flaticon-033-dinner"></i>
                        <h4>Galeria De Fotos</h4>
                        <p>Disfruta de las mejores vistas de nuestro hospedaje hacia todo Chachapoyas, vistas inigualables.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{ asset('img/room/room-b1.jpg') }}">
                            <div class="hr-text">
                                <h3>Habitaciones Grupales</h3>
                                <h2>S/. 50<span>/Por Noche</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Piso:</td>
                                            <td>3°</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacidad:</td>
                                            <td>Maximo 5 Personas</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Servicios:</td>
                                            <td>Wifi, Television, Baño,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">Mas Detalles</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{ asset('img/room/room-b2.jpg') }}">
                            <div class="hr-text">
                                <h3>Habitaciones Simples</h3>
                                <h2>S/. 100<span>/Por Noche</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Piso:</td>
                                            <td>3°</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacidad:</td>
                                            <td>Maximo 5 Personas</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Servicios:</td>
                                            <td>Wifi, Television, Baño,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">Mas Detalles</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{ asset('img/room/room-b3.jpg') }}">
                            <div class="hr-text">
                                <h3>Habitaciones Dobles</h3>
                                <h2>S/. 150<span>/Por Noche</span></h2>
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
                                            <td class="r-o">Servicios :</td>
                                            <td>Wifi, Television, Baño,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">Mas Detalles</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="hp-room-item set-bg" data-setbg="{{ asset('img/room/room-b4.jpg') }}">
                            <div class="hr-text">
                                <h3>Suit Matrimonial</h3>
                                <h2>S/. 200<span>/Por Noche</span></h2>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Capacidad:</td>
                                            <td>3°</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Capacidad:</td>
                                            <td>Maximo 5 Personas</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Servicios:</td>
                                            <td>Wifi, Television, Baño,...</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="primary-btn">Mas Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Room Section End -->


    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Hotel</span>
                        <h2>Nuestro Blog & Eventos</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="{{ asset('img/blog/blog-1.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Hospedaje</span>
                            <h4><a href="#">Nuestro Hospedaje</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 11 noviembre, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="{{ asset('img/blog/blog-2.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Chachapoyas</span>
                            <h4><a href="#">Plaza de Armas</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 11 noviembre, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item set-bg" data-setbg="{{ asset('img/blog/blog-3.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Eventos</span>
                            <h4><a href="#">Aniversario De Amazonas</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 11 noviembre, 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog-item small-size set-bg" data-setbg="{{ asset('img/blog/blog-wide.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Eventos</span>
                            <h4><a href="#">Raymi Llacta</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> Junio 2024</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-item small-size set-bg" data-setbg="{{ asset('img/blog/blog-10.jpg') }}">
                        <div class="bi-text">
                            <span class="b-tag">Tours</span>
                            <h4><a href="#">Viaje A Kuelap</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> 11 noviembre, 2024</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
    </main>

    @include('partials.footer')
    

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    
</body>
</html>