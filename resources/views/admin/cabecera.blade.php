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
				<!-- Botón de cabecera -->
					<div class="navbar-header">
						<h2 class="text-white">Autoescuela Quinta Marcha</h2>
						<!-- <a href="/" class="logo navbar-brand"><img id="logo_img" src="img/logo/" alt="logo" /></a> -->
					</div>
					<div class="main-menu mean-menu col-auto">
						<nav>
							<ul>
								@if (Auth::check())
									<li><a href="/">autoescuela</a></li>
									@if (Auth::user()->tipousuario == 1)
										<li class="active"><a href="{{ route('login') }}">administración</a></li>
									@else
										<li class="active"><a href="{{ route('login') }}">mi autoescuela</a></li>
									@endif
									<li>
										<a class="" href="{{ route('logout') }}"
										onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
											{{ __('Salir') }}
                                    	</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											@csrf
										</form>
									</li>
								@else
									<li><a href="/">autoescuela</a></li>
									<li><a href="{{ url('/servicios') }}">servicios</a></li>
									<li><a href="{{ url('/contacto') }}">contacto</a></li>
									<li class="active"><a href="{{ route('login') }}">mi autoescuela</a></li>
								@endif
							</ul>
						</nav>
					</div>
					<div class="mobile-menu"></div>
				
			</div>
		</div>
	</div>
</div>


