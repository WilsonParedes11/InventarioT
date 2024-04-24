<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>POS Dash | Plantilla de Panel de Administración Bootstrap 4 Responsiva</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/backend.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/fonts/remixicon.css') }}">
</head>
<body>
<!-- Cargador Inicio -->
{{-- <div id="loading">
    <div id="loading-center"></div>
</div> --}}
<!-- Cargador FIN -->

<!-- Contenedor Inicio -->
<div class="wrapper">
    <section class="login-content">
        <div class="container">
            @yield('container')
        </div>
    </section>
</div>
<!-- Contenedor Fin-->

<!-- Backend Bundle JavaScript -->
<script src="{{ asset('assets/js/backend-bundle.min.js') }}"></script>

@yield('specificpagescripts')

<!-- App JavaScript -->
<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
