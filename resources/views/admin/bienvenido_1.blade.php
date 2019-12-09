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


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">

	@if (Request::is('*/*'))
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="/../img/favicon.png">
		<!-- Fuentes -->
		<link rel="stylesheet" href="/../fonts/lato/lato.css">
		<!-- CSS -->
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
		<!-- Modernizer JS
		============================================ -->
		<script type="text/javascript" src="/js/vendor/modernizr-2.8.3.min.js"></script>

		
	@else
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
		<!-- Fuentes -->
		<link href="fonts/lato/lato.css" rel="stylesheet">
		<!-- CSS -->
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<!-- JS -->

@if (Request::is('*/*'))
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

