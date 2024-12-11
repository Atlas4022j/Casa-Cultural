@extends('layouts.main')
@section('title','Hospedaje | Blog')
@section('content')
<main>
        <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2>Blog</h2>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section blog-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="{{ asset('img/blog/raymi1.jpg') }}">
                    <div class="bi-text">
                        <span class="b-tag">Eventos</span>
                        <h4><a href="blog-details.php">Raymi Llacta De Los Chachapoyas</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> Junio, 2024</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="{{ asset('img/blog/blog-2.jpg') }}">
                    <div class="bi-text">
                        <span class="b-tag">Turismo</span>
                        <h4><a href="blog-details.php">Aventura A Kuelap</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 11 de noviembre 2024</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="{{ asset('img/blog/blog-3.jpg') }}">
                    <div class="bi-text">
                        <span class="b-tag">Celebracion</span>
                        <h4><a href="blog-details.php">Aniversario De Amazonas</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 11 de noviembre de 2024</div>
                    </div>
                </div>
            </div>
            <!--  <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="img/blog/blog-4.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Trivago</span>
                        <h4><a href="./blog-details.html">A Time Travel Postcard</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 22th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="img/blog/blog-5.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Camping</span>
                        <h4><a href="./blog-details.html">A Time Travel Postcard</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 25th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="img/blog/blog-6.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Travel Trip</span>
                        <h4><a href="./blog-details.html">Virginia Travel For Kids</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 28th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="img/blog/blog-7.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Travel Trip</span>
                        <h4><a href="./blog-details.html">Bryce Canyon A Stunning</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 29th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="img/blog/blog-8.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Event & Travel</span>
                        <h4><a href="./blog-details.html">Motorhome Or Trailer</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 30th April, 2019</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-item set-bg" data-setbg="img/blog/blog-9.jpg">
                    <div class="bi-text">
                        <span class="b-tag">Camping</span>
                        <h4><a href="./blog-details.html">Lost In Lagos Portugal</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> 30th April, 2019</div>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-12">
                <div class="load-more">
                    <a href="#" class="primary-btn">Leer Mas</a>
                </div>
            </div>
        </div>
    </div>
    </section>
    </main>
@endsection