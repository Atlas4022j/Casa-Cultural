<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('resources/css/dashboard.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('resources/css/iconos.css') }}?v={{ time() }}">
    <link rel="stylesheet" href="{{ asset('resources/css/views.css') }}?v={{ time() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="hm-body">
    <div class="hm-dashboard">        
        @include('layouts.partials.sidebar')
        <!-- Main Content -->
        <div class="hm-main-content">
            <!-- Header -->
            @include('layouts.partials.header-sidebar')


            @yield('contenido')
        </div>
    </div>

    

    <!-- Overlay para móviles -->
    <div class="mobile-overlay" id="mobile-overlay"></div>
    <script src="{{ asset('resources/js/dashboard.js') }}?v={{ time() }}"></script>
    <script src="{{ asset('resources/js/views.js') }}?v={{ time() }}"></script>
</body>
</html>