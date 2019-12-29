@if (Request::is('/'))
	<!-- Area de Slider
    ============================================ -->
	<div id="hero-area" class="hero-slider-area">
		<div id="hero-slider" class="nivoSlider slider-image">
			<img src="img/slider/1.jpg" alt="main slider" title="#htmlcaption1"/>
			<img src="img/slider/2.jpg" alt="main slider" title="#htmlcaption2"/>
			<img src="img/slider/3.jpg" alt="main slider" title="#htmlcaption3"/>
		</div>
		<div id="htmlcaption1" class="nivo-html-caption">
			<div class="slide-table container">
				<div class="table-cell">
					<div class="hero-slide-content float-right text-right">
						<!-- <h3 class="wow fadeInUp" data-wow-duration=".9s" data-wow-delay="0.8s">Autoescuela QuintaMarcha</h3> -->
						<h1 class="wow fadeInUp" data-wow-duration=".9s" data-wow-delay="1.2s">la mejor <span>formación</span> del mercado</h1>
						<p class="wow fadeInUp" data-wow-duration=".9s" data-wow-delay="1.6s">Obten tu permiso de conducir a un precio insuperable, hasta te puede salir GRATIS.</p>
						<div class="button-group float-left text-left">
							<!-- <a href="#" class="btn transparent wow fadeInLeft" data-wow-duration=".9s" data-wow-delay="2.4s"></a> -->
							<a href="#" class="btn color wow fadeInLeft" data-wow-duration=".9s" data-wow-delay="2s">Saber más</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="htmlcaption2" class="nivo-html-caption backstretch">
			<div class="slide-table container">
				<div class="table-cell">
					<div class="hero-slide-content float-left text-left">
						<!-- <h3 class="wow fadeInUp" data-wow-duration=".9s" data-wow-delay="0.8s">Autoescuela QuintaMarcha</h3> -->
						<h1 class="wow fadeInUp" data-wow-duration=".9s" data-wow-delay="1.2s">la mejor <span>formación</span> del mercado</h1>
						<p class="wow fadeInUp" data-wow-duration=".9s" data-wow-delay="1.6s">Realiza los test de la D.G.T.totalmente gratis y asegúrate el aprobado. Control, seguimiento y guiado del alumno, suspender NO es una opción.</p>
						<div class="button-group float-right text-right">
							<!-- <a href="#" class="btn transparent wow fadeInRight" data-wow-duration=".9s" data-wow-delay="2s">book lesson</a> -->
							<a href="#" class="btn color wow fadeInRight" data-wow-duration=".9s" data-wow-delay="2.4s">Saber más</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="htmlcaption3" class="nivo-html-caption backstretch">
			<div class="slide-table container">
				<div class="table-cell">
					<div class="hero-slide-content text-center">
						<!-- <h3 class="wow fadeInUp" data-wow-duration=".9s" data-wow-delay="0.8s">Autoescuela QuintaMarcha</h3> -->
						<h1 class="wow fadeInUp" data-wow-duration=".9s" data-wow-delay="1.2s">la mejor <span>formación</span> del mercado</h1>
						<p class="wow fadeInUp" data-wow-duration=".9s" data-wow-delay="1.6s">Apuntate a nuestros cursos intensivos de teórico y ahorrarás tiempo y esfuerzo. <br /> Amplia tu curriculum con nuestras titulaciones y cursos. ¡¡¡ FÓRMATE. !!!</p>
						<div class="button-group">
							<!-- <a href="#" class="btn transparent wow fadeInLeft" data-wow-duration=".9s" data-wow-delay="2s">book lesson</a> -->
							<a href="#" class="btn color wow fadeInRight" data-wow-duration=".9s" data-wow-delay="2s">Saber más</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@else
	<!-- Demas Slider
	============================================ -->
	<div class="page-banner-area overlay overlay-black overlay-70">
		<div class="container">
			<div class="row">
				<div class="page-banner text-center col-12">
					@if (Request::is('contacto'))
						<h1>contacto</h1>
						<ul>
							<li><a href="/">inicio</a></li>
							<li><span>contacto</span></li>
						</ul>
					@elseif(Request::is('info-servicios'))
						<h1>servicios</h1>
						<ul>
							<li><a href="/">inicio</a></li>
							<li><span>servicios</span></li>
						</ul>
					@endif
				</div>
			</div>
		</div>
	</div>
@endif

