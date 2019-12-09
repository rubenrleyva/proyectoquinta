<!-- Cabecera
============================================ -->
<div class="header-area header-absolute header-transparent">
	<div class="header-top d-none d-md-block">
		<div class="container">
			<!-- Cabecera superior -->
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
	<div class="header-bottom sticky">
		<div class="container">
			<div class="row justify-content-between">
				<div class="navbar-header col-auto">
					<h2 class="text-white">Autoescuela Quinta Marcha</h2>
					<!-- <a href="index.html" class="logo navbar-brand"><img id="logo_img" src="img/logo/color-1.png" alt="logo" /></a> -->
				</div>
				<div class="main-menu mean-menu col-auto text-right">
					<nav>
						<ul>
							@if (Request::is('/'))
								<li class="active"><a href="/">autoescuela</a></li>
								<li><a href="{{ url('/servicios') }}">servicios<i class="icofont icofont-simple-down"></i></a>
									<ul>
										<li><a href="{{ url('/infopermisos') }}">Permisos</a></li>
										<li><a href="header-2.html">Titulos</a></li>
									</ul>
								</li>
								<li><a href="{{ url('/contacto') }}">contacto</a></li>
								<li><a href="{{ route('login') }}">mi autoescuela</a></li>
							@elseif (Request::is('servicios'))
								<li><a href="/">autoescuela</a></li>
								<li><a class="active" href="{{ url('/servicios') }}">servicios<i class="icofont icofont-simple-down"></i></a>
									<ul>
										<li><a href="{{ url('/infopermisos') }}">Permisos</a></li>
										<li><a href="header-2.html">Titulos</a></li>
									</ul>
								</li>
								<li><a href="{{ url('/contacto') }}">contacto</a></li>
								<li><a href="{{ route('login') }}">mi autoescuela</a></li>
							@elseif (Request::is('infopermisos'))
								<li><a href="/">autoescuela</a></li>
								<li><a href="{{ url('/servicios') }}">servicios<i class="icofont icofont-simple-down"></i></a>
									<ul>
										<li><a class="active" href="{{ url('/infopermisos') }}">Permisos</a></li>
										<li><a href="header-2.html">Titulos</a></li>
									</ul>
								</li>
								<li><a href="{{ url('/contacto') }}">contacto</a></li>
								<li><a href="{{ route('login') }}">mi autoescuela</a></li>
							@elseif (Request::is('contacto'))
								<li><a href="/">autoescuela</a></li>
								<li><a href="{{ url('/servicios') }}">servicios<i class="icofont icofont-simple-down"></i></a>
									<ul>
										<li><a href="header-1.html">Permisos</a></li>
										<li><a href="header-2.html">Titulos</a></li>
									</ul>
								</li>
								<li class="active"><a href="{{ url('/contacto') }}">contacto</a></li>
								<li><a href="{{ route('login') }}">mi autoescuela</a></li>
							@elseif (Request::is('login'))
								<li><a href="/">autoescuela</a></li>
								<li><a href="{{ url('/servicios') }}">servicios<i class="icofont icofont-simple-down"></i></a>
									<ul>
										<li><a href="header-1.html">Permisos</a></li>
										<li><a href="header-2.html">Titulos</a></li>
									</ul>
								</li>
								<li><a href="{{ url('/contacto') }}">contacto</a></li>
								<li class="active"><a href="{{ route('login') }}">mi autoescuela</a></li>
							@endif
						</ul>
					</nav>
				</div>
				<div class="mobile-menu col-12"></div>
			</div>
		</div>
	</div>
</div>


