<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	@if (Request::is('inicio'))
		<title>Quintamarcha - Inicio</title>
	@elseif (Request::is('crearusuario'))
		<title>Quintamarcha - Registrar Usuario</title>
	@elseif (Request::is('crearusuario/*'))
		<title>Quintamarcha - Editar Usuario</title>
	@elseif (Request::is('crearpreguntasencuesta/*'))
		<title>Quintamarcha - Crear preguntas encuesta</title>
	@elseif (Request::is('permisos'))
		<title>Quintamarcha - Permisos</title>
	@elseif (Request::is('permisos/*'))
		<title>Quintamarcha - Crear permisos</title>
	@endif
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	@if (Request::is('*/*'))
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="/../img/favicon.png">
		<!-- Fuentes -->
		<link rel="stylesheet" href="/../fonts/lato/lato.css">
		<!-- CSS -->
		<!-- Bootstrap CSS
		============================================ -->
		<link rel="stylesheet" href="/../css/bootstrap.min.css">
		<!-- Fuente de iconos CSS
		============================================ -->
		<link rel="stylesheet" href="/../css/icofont.css">
		<!-- Plugins CSS
		============================================ -->
		<link rel="stylesheet" href="/../css/plugins.css">
		<!-- ShortCodes CSS
		============================================ -->
		<link rel="stylesheet" href="/../css/shortcode/shortcodes.css">
		<!-- Estilos CSS
		============================================ -->
		<link rel="stylesheet" href="/../style.css">
		<!-- Responsivo CSS
		============================================ -->
		<link rel="stylesheet" href="/../css/responsive.css">
		<!-- Estilo de color
		============================================ -->
		<link rel="stylesheet" href="/../css/color/color-3.css">
		<!-- Tabla CSS 
		============================================ -->
		<link rel="stylesheet" href="/css/jquery.dataTables.min.css">
		<!-- Tabla CSS 
		============================================ -->
		<link rel="stylesheet" href="/css/quintamarcha.css">
		<!-- Modernizer JS
		============================================ -->
		<script type="text/javascript" src="/js/vendor/modernizr-2.8.3.min.js"></script>

		
	@else
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
		<!-- Fuentes -->
		<link href="fonts/lato/lato.css" rel="stylesheet">
		<!-- CSS -->
		<!-- Bootstrap CSS
		============================================ -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Fuente de iconos CSS
		============================================ -->
		<link rel="stylesheet" href="css/icofont.css">
		<!-- Plugins CSS
		============================================ -->
		<link rel="stylesheet" href="css/plugins.css">
		<!-- ShortCodes CSS
		============================================ -->
		<link rel="stylesheet" href="css/shortcode/shortcodes.css">
		<!-- Estilos CSS
		============================================ -->
		<link rel="stylesheet" href="style.css">
		<!-- Responsivo CSS
		============================================ -->
		<link rel="stylesheet" href="css/responsive.css">
		<!-- Estilo de color
		============================================ -->
		<link href="css/color/color-3.css" rel="stylesheet">
		<!-- Tabla CSS 
		============================================ -->
		<link rel="stylesheet" href="css/jquery.dataTables.min.css">
		<!-- Tabla CSS 
		============================================ -->
		<link rel="stylesheet" href="css/quintamarcha.css">
		<!-- Modernizer JS
		============================================ -->
		<script type="text/javascript" src="js/vendor/modernizr-2.8.3.min.js"></script>	
	@endif
	<!-- Aquí cargamos los css de las tablas cuando nos hagan falta
	============================================ -->
	@stack('csstablas')
	
</head>
<body>

<!-- Pre Lectura
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

<!-- Inicio del body principal -->
<div class="wrapper fix">
	@include('admin.cabecera')
	@include('admin.slider')
	@include('admin.datos')
	@include('layouts.whatsapp')
	@include('layouts.pie')
</div>
<!-- Final del body principal -->

<!-- JS -->

@if (Request::is('*/*'))
	<!-- jQuery JS
	============================================ -->
	<script type="text/javascript" src="/../js/vendor/jquery-1.12.0.min.js"></script> 
	<!-- DataTable JS
	============================================ -->
	<script type="text/javascript" src="/../js/jquery.dataTables.min.js"></script>
	<!-- Bootstrap JS
	============================================ -->
	<script type="text/javascript" src="/../js/bootstrap.bundle.min.js"></script>
	<!-- Plugins JS
	============================================ -->
	<script type="text/javascript" src="/../js/plugins.js"></script>
	<!-- Ajax Mail JS
	============================================ -->
	<script type="text/javascript" src="/../js/ajax-mail.js"></script>
	<!-- WOW JS
	============================================ -->
	<script type="text/javascript" src="/../js/wow.min.js"></script>
	<!-- Main JS
	============================================ -->
	<script type="text/javascript" src="/../js/main.js"></script>
@else
	<!-- jQuery JS
	============================================ -->
	<script type="text/javascript" src="js/vendor/jquery-1.12.0.min.js"></script>
	<!-- DataTable JS
	============================================ -->
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<!-- Bootstrap JS
	============================================ -->
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
	<!-- Plugins JS
	============================================ -->
	<script type="text/javascript" src="js/plugins.js"></script>
	<!-- Ajax Mail JS
	============================================ -->
	<script type="text/javascript" src="js/ajax-mail.js"></script>
	<!-- WOW JS
	============================================ -->
	<script type="text/javascript" src="js/wow.min.js"></script>
	<!-- Main JS
	============================================ -->
	<script type="text/javascript" src="js/main.js"></script>
@endif
<!-- Aquí cargamos los script de las tablas cuando nos hagan falta 
============================================ -->
@stack('scripttablas')

</body>
</html>
