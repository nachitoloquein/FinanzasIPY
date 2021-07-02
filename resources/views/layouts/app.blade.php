<!doctype html>
<html style="overflow:scroll" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head >
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" defer></script>
    <script src="{{ asset('js/core/jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/core/popper.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/chartist.min.js') }}" defer></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}" defer></script>
    <script src="{{ asset('js/material-dashboard.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-dashboard-rtl.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material-dashboard.css.map') }}" rel="stylesheet">
    <link href="{{ asset('css/material-dashboard.min.css') }}" rel="stylesheet">
</head>
<nav class="barra">

    <div class="d-flex flex-column p-4 text-white bg-dark barra" style="width: 280px">
      <a class="navbar-brand " href="{{ url('/') }}">
            Finanzas
            <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
              <head>
                  <!-- CSRF Token -->
                  <meta name="csrf-token" content="{{ csrf_token() }}">
                  <!-- Scripts -->
                  <script src="{{ asset('js/app.js') }}" defer></script>
              
              
              </head>
              <body>
                  @guest
                    @if (Route::has('login'))
                      <div >
                        <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                      </div>
                    @endif
              
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
              
                    @endif
                      @else
                          <hr>
                          <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Bienvenido :
                            {{ Auth::user()->name }}
                              </a>
                              <div >
                                <a  href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  {{ __('Salir') }}
                                  </a>
              
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                                    </form>
                              </div>
                        
                    @endguest
              
              </body>
              </html>
      </a>
    <hr>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-4">Area finanzas</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link text-white">
              Estadísticas
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('listaProveedores')}}" class="nav-link text-white">
              Proveedores
            </a>
          </li>
          <li>
            <a href="{{route('documentos')}}" class="nav-link text-white">
              Historial de Compras/Venta 
            </a>
          </li>
          <li>
            <a href="{{route('listaP')}}" class="nav-link text-white">
    
              Modificar Precio
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="{{route('soap')}}" class="nav-link text-white">
              Consultar productos
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

