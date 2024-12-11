@extends('layouts.main')
@section('title','Hospedaje | Restaurante')
@section('content')
<main>
    <!-- Breadcrumb Section Begin -->
   <div class="breadcrumb-section">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="breadcrumb-text">
                       <h2>Nuestro Buffet</h2>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- Breadcrumb Section End -->

   <section class="py-5 bg-light">
       <div class="container">
           
           <div class="d-flex justify-content-center mb-4">
               <div class="btn-group" role="group" aria-label="Filtro de categorías">
                   <button type="button" class="btn btn-outline-primary active" data-filter="all">Todos</button>
                   <button type="button" class="btn btn-outline-primary" data-filter="plato-principal">Plato Principal</button>
                   <button type="button" class="btn btn-outline-primary" data-filter="postres">Postres</button>
                   <button type="button" class="btn btn-outline-primary" data-filter="bebidas">Bebidas</button>
               </div>
           </div>
   
           <div class="row g-4" id="menu-items">
               <div class="col-md-6 col-lg-4 menu-item" data-category="plato-principal">
                   <div class="card h-100 shadow-sm">
                       <img src="{{ asset('img/gallery/Juanes.jpg') }}" height="250px" class="card-img-top" alt="Juane">
                       <div class="card-body">
                           <h5 class="card-title">Juane</h5>
                           <p class="card-text">Uno de los mejores platos tipicos de la region, para desgustar al maximo vuestro palagar.</p>
                           <div class="d-flex justify-content-between align-items-center">
                               <span class="h4 mb-0">S/. 5</span>
                               <button type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</button>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-md-6 col-lg-4 menu-item" data-category="postres">
                   <div class="card h-100 shadow-sm">
                       <img src="{{ asset('img/gallery/arroz-leche.webp') }}" height="250px" class="card-img-top" alt="Arroz Con Leche">
                       <div class="card-body">
                           <h5 class="card-title">Arroz Con Leche</h5>
                           <p class="card-text">Postre tradicional peruano, cremoso y delicioso.</p>
                           <div class="d-flex justify-content-between align-items-center">
                               <span class="h4 mb-0">S/. 5</span>
                               <button type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</button>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-md-6 col-lg-4 menu-item" data-category="bebidas">
                   <div class="card h-100 shadow-sm">
                       <img src="{{ asset('img/gallery/cafe.jpeg') }}" height="250px" class="card-img-top" alt="Cafe">
                       <div class="card-body">
                           <h5 class="card-title">Café</h5>
                           <p class="card-text">Cafe regional, con granos naturales de la region, para diferenciar el sabor del resto.</p>
                           <div class="d-flex justify-content-between align-items-center">
                               <span class="h4 mb-0">S/. 3</span>
                               <button type="button" class="btn btn-sm btn-outline-secondary">Más Detalles</button>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
   
           <nav aria-label="Paginación del menú" class="mt-5">
               <ul class="pagination justify-content-center">
                   <li class="page-item active"><a class="page-link" href="#">1</a></li>
                   <li class="page-item"><a class="page-link" href="#">2</a></li>
                   <li class="page-item">
                       <a class="page-link" href="#" aria-label="Siguiente">
                           <span aria-hidden="true">&raquo;</span>
                       </a>
                   </li>
               </ul>
           </nav>
       </div>
   </section>
</main>
@endsection