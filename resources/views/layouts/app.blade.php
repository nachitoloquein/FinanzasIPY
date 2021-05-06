<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
</head>
<nav>
    <div class="container bg-dark">
        <a class="navbar-brand " href="{{ url('/') }}">
            Finanzas
        </a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="d-flex flex-column p-4 text-white bg-dark barra" style="width: 280px">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-4">Area finanzas</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="proveedores.html" class="nav-link text-white">
              Proveedores
            </a>
          </li>
          <li>
            <a href="historialcompras.html" class="nav-link text-white">
              Historial de compras 
            </a>
          </li>
          <li>
            <a href="registro_venta.html" class="nav-link text-white">
    
              Registro historial de ventas
            </a>
          </li>
        </ul>
        <hr>
      </div>
    </div>
</nav>

<div class="centro" style="width: 50rem;">
    @yield('content')
</div>
</html>

