<!DOCTYPE html>
<html lang="en">
<head>
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
<body  style="background-image: url(https://onlinezebra.com/wp-content/uploads/2019/01/error-404-not-found.jpg); background-size: cover;">
    <article style="margin-top: !null;">
        <section>     
            <h1 class="text-center texto1">Lo sentimos pero los desarrolladores no alcanzaron a crear esta ruta</h1>
            <h2 class="text-center texto2">Error 404</h2>
        </section>   
    </article>     
</body>
</html>