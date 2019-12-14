<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Quintamarcha -  Servicios</title>
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
    <!-- Color Style -->
    <link href="css/color/color-3.css" rel="stylesheet">
	<!-- Modernizer JS
	============================================ -->
	<script src="js/vendor/modernizr-2.8.3.min.js"></script>
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
<!-- Header 1
============================================ -->
<div class="header-area header-absolute header-transparent">
	<div class="header-top hidden-xs">
		<div class="container">
			<div class="row">
				<!-- Header Top -->
				<div class="header-top-wrapper row">
					<div class="header-top-left text-left col-md-6 col-12">
						<p><i class="icofont icofont-envelope"></i><span>info@autoescuelaquintamarcha.com</span></p>
						<p><i class="icofont icofont-ui-call"></i><span>+34 685881044</span></p>
					</div>
					<div class="header-top-right text-right col-md-6 col-12">
						<p><i class="icofont icofont-clock-time"></i><span>Lunes - Viernes : 10 - 13:30 || 17 - 20</span></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="header-bottom sticky">
		<div class="container">
			<div class="row justify-content-between">
				<!-- Header Bottom -->
				<div class="navbar-header">
					<a href="/" class="logo navbar-brand"><img id="logo_img" src="img/logo/" alt="logo" /></a>
				</div>
				<div class="main-menu mean-menu float-right">
					<nav>
						<ul>
							<li><a href="/">autoescuela</a></li>
							<li class="active"><a href="{{ url('/servicios') }}">servicios</a></li>
							<li ><a href="{{ url('/contacto') }}">contacto</a></li>
							<li><a href="{{ route('login') }}">mi autoescuela</a></li>
						</ul>
					</nav>
				</div>
				<div class="mobile-menu"></div>
			</div>
		</div>
	</div>
</div>
<!-- Page Banner Area
============================================ -->
<div class="page-banner-area overlay overlay-black overlay-70">
	<div class="container">
		<div class="row">
			<div class="page-banner text-center col-xs-12">
				<h1>servicios</h1>
				<ul>
					<li><a href="/">inicio</a></li>
					<li><span>servicios</span></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Contatc Area
============================================ -->
<div id="contact-area" class="contact-area bg-gray">
	<div class="container pb-90 pt-90">
		<!-- Section Title -->
		<div class="row">
			<div class="section-title text-center col-xs-12 mb-45">
				<h3 class="heading">información</h3>
				<div class="excerpt">
					<p>Lorem ipsum dolor sit amet, consectetur maksu rez do eiusmod tempor magna aliqua</p>
				</div>
				<i class="icofont icofont-traffic-light"></i>
			</div>
		</div>
		<div class="row">
			<!-- Contact Info -->
			<div class="contact-info col-md-4 col-sm-5 col-xs-12">
				<div class="single-info text-left fix">
					<div class="icon"><i class="icofont icofont-phone"></i></div>
					<div class="content fix">
						<h5>Llámanos</h5>
						<p>+34 685881044</p>
						<br>
					</div>
				</div>
				<div class="single-info text-left fix">
					<div class="icon"><i class="icofont icofont-envelope"></i></div>
					<div class="content fix">
						<h5>Mandanos un email</h5>
						<p><a href="#">info@autoescuelaquintamarcha.com</a></p>
						<br>
					</div>
				</div>
				<div class="single-info text-left fix">
					<div class="icon"><i class="icofont icofont-location-pin"></i></div>
					<div class="content fix">
						<h5>Nos encontrarás en</h5>
						<p>C/ Paseo de la Ermita nº 3, <br />Churriana de la Vega, Granada.</p>
					</div>
				</div>
			</div>
			<!-- Contact Form -->
			<div class="contact-form form text-left col-md-8 col-sm-7 col-xs-12">
				<form id="contact-form" action="mail.php" method="post">
					<div class="input-2">
						<div class="input"><input type="text" name="name" placeholder="Nombre" /></div>
						<div class="input"><input type="email" name="email" placeholder="E-mail" /></div>
					</div>
					<div class="input"><input type="text" name="subject" placeholder="Tema" /></div>
					<div class="input textarea"><textarea name="message" placeholder="Mensaje"></textarea></div>
					<div class="input input-submit"><input type="submit" value="Enviar" /></div>
				</form>
				<p class="form-messege"></p>
			</div>
		</div>
	</div>
	<div id="contact-map"></div>
</div>
<!-- CTA Area
============================================ -->
<div class="cta-area pb-40 pt-40">
	<div class="container">
		<div class="row">
			<div class="call-to-action text-left col-md-10 col-md-offset-1 col-xs-12">
				<h3>Pregunta sin compromiso</h3>
				<a href="https://api.whatsapp.com/send?phone=34685881044&text=Hola%20quiero%20información sobre los cursos." class="btn transparent ">Pregunta por WhatsApp</a>
			</div>
		</div>
	</div>
</div>
<!-- Footer Area
============================================ -->
<div class="footer-area overlay overlay-black overlay-70 pt-90">
	<div class="container">
		<div class="row">
			<div class="footer-widget text-center col-md-6 col-sm-6 col-xs-12">
				<h4 class="widget-title">sobre autoescuelaquintamarcha</h4>
				<div class="about-widget">
					<p>It is a long established fact that is a reader will be distracted by the readable content of page when looking at its layout. it’s the more fact that is reader will be by the readable looking its layout.</p>
					<div class="widget-social fix">
						<a href="#"><i class="icofont icofont-social-facebook"></i></a>
						<a href="#"><i class="icofont icofont-social-pinterest"></i></a>
						<a href="#"><i class="icofont icofont-social-twitter"></i></a>
						<a href="#"><i class="icofont icofont-social-rss"></i></a>
					</div>
				</div>
			</div>
			<div class="footer-widget text-center col-md-6 col-sm-6 col-xs-12">
				<h4 class="widget-title">contacta</h4>
				<div class="contact-widget">
					<h5>direción:</h5>
					<p>C/ Paseo de la Ermita nº 3, <br />Churriana de la Vega, Granada.</p>
					<h5>teléfono:</h5>
					<p>+34 685 88 10 44</p>
					<h5>e-mail:</h5>
					<p>
						<a href="#">info@autoescuelaquintamarcha.com</a>
					</p>
				</div>
			</div>
		</div>
		<div class="footer-bottom text-center col-xs-12">
			<p class="copyright">Copyright Autoescuela QuintaMarcha -<i class="fa fa-copyright"></i> 2019 Todos los derechos reservados - Desarrollado por <a href="https://rubenrleyva.dev/" target="_blank" >RubenRLeyva.dev</a> </p>
		</div>
	</div>
</div>

</div>
<!-- Body main wrapper end -->

<!-- JS -->

<!-- jQuery JS
============================================ -->
<script src="js/vendor/jquery-1.12.0.min.js"></script>
<!-- Bootstrap JS
============================================ -->
<script src="js/bootstrap.min.js"></script>
<!-- Plugins JS
============================================ -->
<script src="js/plugins.js"></script>
<!-- Ajax Mail JS
============================================ -->
<script src="js/ajax-mail.js"></script>
<!-- WOW JS
============================================ -->
<script src="js/wow.min.js"></script>
<!-- Google Map APi
============================================ -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdWLY_Y6FL7QGW5vcO3zajUEsrKfQPNzI"></script>
<script src="js/map.js"></script>
<!-- Main JS
============================================ -->
<script src="js/main.js"></script>

</body>
</html>

