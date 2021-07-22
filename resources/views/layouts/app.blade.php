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
<header class="barra">

    <div class="d-flex flex-column p-4 text-white bg-blue-600 barra" style="width: 280px">
      <a href="/">
        <img src="{{asset('img/logo.svg')}}"alt="Lider" class="img-fluid">
      </a>
      
      <a class="navbar-brand " >
            <h3>Finanza</h3>
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
                        <a  href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                      </div>
                    @endif
              
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">{{ __('Registrar') }}</a>
              
                    @endif
                      @else
                          <hr>
                          <a role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Bienvenido :
                            {{ Auth::user()->name }}
                              </a>
                              <div >
                                <a  href="{{ route('logout') }}" class="text-white"
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
        <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
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
          <li>
            <a href="{{route('agregarD')}}" class="nav-link text-white">
    
              Agregar documento
            </a>
          </li>
          </li>
        </ul>
        <hr>
      </div>
    </div>
</header>
<body style="background-image: url(https://cdn.crello.com/api/media/medium/169306418/stock-photo-repetitive-pattern-of-envelopes)">
<div class="centro" style="width: 50%;  display: flex; flex-direction: column;
align-items: center">
    @yield('content')
</div>  
</body>

</html>

