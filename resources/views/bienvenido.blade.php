<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Quintamarcha</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <!-- Fonts -->
        <link href="fonts/lato/lato.css" rel="stylesheet">
        <!-- CSS -->
        <!-- Bootstrap CSS
        ============================================ -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Icon Font CSS
        ============================================ -->
        <link rel="stylesheet" href="css/icofont.css">
        <!-- Plugins CSS
        ============================================ -->
        <link rel="stylesheet" href="css/plugins.css">
        <!-- ShortCodes CSS
        ============================================ -->
        <link rel="stylesheet" href="css/shortcode/shortcodes.css">
        <!-- Style CSS
        ============================================ -->
        <link rel="stylesheet" href="style.css">
        <!-- Responsive CSS
        ============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- Estilo de color
		============================================ -->
		<link href="css/color/color-3.css" rel="stylesheet">
        <!-- Modernizer JS
        ============================================ -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- Estilo de color
		============================================ -->
		<link href="css/quintamarcha.css" rel="stylesheet">
    </head>
    <body>
        <!-- Pre Loader
        ============================================ -->
        <div class="preloader">
            <div class="loading-center">
                <div class="loading-center-absolute">
                    <div class="object object_one"></div>
                    <div class="object object_two"></div>
                    <div class="object object_three"></div>
                </div>
            </div>
        </div>
        <!-- Body main wrapper start -->
        <div class="wrapper fix">
        @if (Request::is('/'))
            @include('layouts.cabecera')
            @include('layouts.slider')
            @include('layouts.caracteristicas')
            @include('layouts.datos')
            @include('layouts.informacion')
            {{-- @include('layouts.videos') --}} 
            @include('layouts.imagenes')
            @include('layouts.comentarios')
            @include('layouts.profesores')
            @include('layouts.ofertas')
            @include('layouts.preguntas')
            @include('layouts.whatsapp')
            @include('layouts.pie')
        @elseif (Request::is('contacto'))
            @include('layouts.cabecera')
            @include('layouts.slider')
            @include('layouts.contacto')
            @include('layouts.whatsapp')
            @include('layouts.pie')
        @elseif (Request::is('infopermisos'))
            @include('layouts.cabecera')
            @include('layouts.slider')
            @include('layouts.informacion')
            @include('layouts.ofertas')
            @include('layouts.whatsapp')
            @include('layouts.pie')
        @elseif (Request::is('login'))
            @include('layouts.cabecera')
            @include('admin.slider')
            @include('admin.datos')
            @include('layouts.whatsapp')
            @include('layouts.pie')
        @elseif (Request::is('register'))
            @include('layouts.cabecera')
            @include('layouts.slider')
            @include('auth.register')
            @include('layouts.pie')
        @endif
        </div>
        <!--style-customizer end -->

        <!-- JS -->

        <!-- jQuery JS
        ============================================ -->
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap JS
        ============================================ -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Plugins JS
        ============================================ -->
        <script src="js/plugins.js"></script>
        <!-- Ajax Mail JS
        ============================================ -->
        <script src="js/ajax-mail.js"></script>
        <!-- WOW JS
        ============================================ -->
        <script src="js/wow.min.js"></script>
        <!-- Style Customizer JS
        ============================================ -->
        <script src="js/style-customizer.js"></script>
        <!-- Main JS
        ============================================ -->
        <script src="js/main.js"></script>
        <!-- Aquí cargamos los script de las tablas cuando nos hagan falta 
        ============================================ -->
        @stack('scripts')
    </body>
</html>
