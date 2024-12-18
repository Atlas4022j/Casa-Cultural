@extends('layouts.main')
@section('title','Hospedaje | Nosotros')
@section('content')
<main>
    <!-- Breadcrumb Section Begin -->
<div class="breadcrumb-section">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="breadcrumb-text">
                  <h2>Nosotros</h2>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Breadcrumb Section End -->

<!-- About Us Page Section Begin -->
<section class="aboutus-page-section spad">
  <div class="container">
      <div class="about-page-text">
          <div class="row">
              <div class="col-lg-6">
                  <div class="ap-title">
                      <h2>Bienvenido A Hospedaje El Mirador.</h2>
                      <p>Descubre un refugio único donde la cultura y la serenidad se encuentran. Bienvenido a El Mirador, tu hogar en el corazon de la tradicion.</p>
                  </div>
              </div>
              <div class="col-lg-5 offset-lg-1">
                  <ul class="ap-services">
                      <li><i class="icon_check"></i> Autenticidad Cultural.</li>
                      <li><i class="icon_check"></i> Hospitalidad Personalizada</li>
                      <li><i class="icon_check"></i> Entorno Unico</li>
                      <li><i class="icon_check"></i> Conexion Con La Comunidad.</li>
                      <li><i class="icon_check"></i> Comodidad Y Tradicion</li>
                  </ul>
              </div>
          </div>
      </div>
      <div class="about-page-services">
          <div class="row">
              <div class="col-md-4">
                  <div class="ap-service-item set-bg" data-setbg="{{ asset('img/about/about-p1.jpg') }}">
                      <div class="api-text">
                          <h3><a href="">Servicos De Restaurante</a></h3>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="ap-service-item set-bg" data-setbg="{{ asset('img/about/about-p2.jpg') }}">
                      <div class="api-text">
                          <h3><a href="">Viajes & Experiencias</a></h3>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="ap-service-item set-bg" data-setbg="{{ asset('img/about/about-p3.jpg') }}">
                      <div class="api-text">
                          <h3><a href="">Eventos</a></h3>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- About Us Page Section End -->

<!-- Video Section Begin -->
<section class="video-section set-bg" data-setbg="{{ asset('img/video-bg.jpg') }}">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="video-text">
                  <h2>Descrube Nuestro Hotel Y Sus Servicios.</h2>
                  <p>Presencia la magia de nuestro hospedaje</p>
                  <a href="https://www.youtube.com/watch?v=EzKkl64rRbM" class="play-btn video-popup"><img
                          src="{{ asset('img/play.png') }}" alt=""></a>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- Video Section End -->

<section class="gallery-section spad">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <div class="section-title">
                  <span>Nuestra Galeria</span>
                  <h2>Poseemos Una De Las Mejores Vistas De Chachapoyas</h2>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-lg-6">
              <div class="gallery-item set-bg" data-setbg="{{ asset('img/about/about-a1.jpg') }}">
                  <div class="gi-text">
                      <h3>Chachapoyas</h3>
                  </div>
              </div>
              <div class="row">
                  <div class="col-sm-6">
                      <div class="gallery-item set-bg" data-setbg="{{ asset('img/about/about-a2.jpg') }}">
                          <div class="gi-text">
                              <h3>Chachapoyas</h3>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-6">
                      <div class="gallery-item set-bg" data-setbg="{{ asset('img/about/about-a3.jpg') }}">
                          <div class="gi-text">
                              <h3>Chachapoyas</h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="gallery-item large-item set-bg" data-setbg="{{ asset('img/about/about-a4.jpg') }}">
                  <div class="gi-text">
                      <h3>Chachapoyas</h3>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>

<!-- Modal para el carrusel -->
<div class="gallery-modal">
  <div class="modal-content">
      <span class="close">&times;</span>
      <div class="carousel-container">
          <img src="" alt="Gallery Image" class="carousel-image">
      </div>
      <button class="prev">&#10094;</button>
      <button class="next">&#10095;</button>
  </div>
</div>
<!-- Gallery Section End -->
</main>
@endsection