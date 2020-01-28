<!-- Area de datos de administración
============================================ -->
<div id="instructor-area" class="instructor-area bg-white pt-95 pb-100">
	<div class="container-fluid">
		<!-- Section Title -->
		<div class="row">
			<div class="section-title text-center col-12 mb-20">
				@if (Request::is('login'))
					<h3 class="heading">Conectate para disfrutar de todas las ventajas</h3>
					<div class="excerpt">
						<p>Introduce tus datos para entrar en la plataforma</p>
					</div>
					<i class="icofont icofont-traffic-light"></i>
				@else
					@if (Request::is('inicio') || Request::is('usuarios') || Request::is('servicios') || Request::is('encuestas') || Request::is('clasespracticas') || Request::is('pagos') || Request::is('fotos') || Request::is('tests'))
						<h3 class="heading">Eligue una opción entre las que se muestran a continuación</h3>
					@elseif (Request::is('crearusuario'))
						<h3 class="heading">Estas añadiendo un nuevo usuario</h3>
					@elseif (Request::is('editarusuario/*'))
						<h3 class="heading">Estas editando al usuario @if (isset($usuario)){{ $usuario->name }}@endif</h3>
					@elseif (Request::is('crearservicio'))
						<h3 class="heading">Estas añadiendo un nuevo servicio</h3>
					@elseif (Request::is('editarservicio/*'))
						<h3 class="heading">Estas editando el servicio @if (isset($servicio)){{ $servicio->titulo }}@endif</h3>
					@elseif (Request::is('crearencuesta'))
						<h3 class="heading">Estas añadiendo una nueva encuesta</h3>
					@elseif (Request::is('editarencuesta/*'))
						<h3 class="heading">Estas editando la encuesta @if (isset($encuesta)){{ $encuesta->titulo }}@endif</h3>
					@elseif (Request::is('creartest'))
						<h3 class="heading">Estas añadiendo un nuevo test</h3>
					@elseif (Request::is('editartest/*'))
						<h3 class="heading">Estas editando el test @if (isset($test)){{ $test->servicio }}@endif</h3>
					@elseif (Request::is('test/*'))
						<h3 class="heading">Estas realizando el test @if (isset($test)){{ $test->titulo }}@endif</h3>
					@elseif (Request::is('crearfoto'))
						<h3 class="heading">Estas añadiendo una nueva foto</h3>
					@elseif (Request::is('editarfoto/*'))
						<h3 class="heading">Estas editando una foto</h3>
					@elseif (Request::is('crearpago/*'))
						<h3 class="heading">Estas añadiendo un nuevo pago</h3>
					@elseif (Request::is('editarpago/*'))
						<h3 class="heading">Estas editando un pago</h3>
					@elseif (Request::is('preguntasencuestas/*'))
						<h3 class="heading">Preguntas encuesta</h3>
					@elseif (Request::is('crearpreguntaencuesta/*'))
						<h3 class="heading">Pregunta encuesta</h3>
					@elseif (Request::is('encuesta/*'))
						<h3 class="heading">@if (isset($encuesta)){{ $encuesta->titulo }}@endif</h3>
					@endif
					<div class="excerpt">
						@if (Request::is('inicio'))
							<p>Aquí podrás ver las opciones que tienes.</p>
						@elseif (Request::is('usuarios'))
							<p>Aquí podrás ver los usuarios que existen en el sistema.</p>
						@elseif (Request::is('crearusuario'))
							<p>Rellena los datos necesarios para añadir un nuevo usuario.</p>
						@elseif (Request::is('editarusuario/*'))
							<p>Rellena los datos necesarios para editar el usuario.</p>
						@elseif (Request::is('servicios'))
							<p>Aquí podrás ver los servicios que existen en el sistema.</p>
						@elseif (Request::is('crearservicio'))
							<p>Rellena los datos necesarios para añadir un nuevo servicio.</p>
						@elseif (Request::is('editarservicio/*'))
							<p>Rellena los datos necesarios para editar la formación.</p>
						@elseif (Request::is('encuestas'))
							<p>Aquí podrás ver las encuestas que existen en el sistema.</p>
						@elseif (Request::is('crearencuesta'))
							<p>Rellena los datos necesarios para añadir una nueva encuesta.</p>
						@elseif (Request::is('editarencuesta/*'))
							<p>Aquí podrás ver las encuestas que existen en el sistema.</p>
						@elseif (Request::is('clasespracticas'))
							<p>Aquí podrás ver las clases prácticas que existen en el sistema.</p>
						@elseif (Request::is('pagos'))
							<p>Aquí podrás ver los pagos que existen en el sistema.</p>
						@elseif (Request::is('fotos'))
							<p>Aquí podrás ver las fotos que existen en el sistema.</p>
						@elseif (Request::is('crearfoto'))
							<p>Rellena los datos necesarios para añadir una nueva foto.</p>
						@elseif (Request::is('tests'))
							<p>Aquí podrás ver los test que existen en el sistema.</p>
						@elseif (Request::is('test/*'))
							<p>Contesta a las preguntas y pulsa en finalizar.</p>
						@elseif (Request::is('creartest'))
							<p>Rellena los datos necesarios para añadir un nuevo test.</p>
						@elseif (Request::is('encuesta/*'))
							<p>Rellena los datos y pulsa sobre finalizar.</p>
						@elseif (Request::is('crearpago/*'))
							<p>Rellena los datos necesarios para añadir un nuevo pago.</p>
						@elseif (Request::is('editarpago/*'))
							<p>Rellena los datos necesarios para editar el pago.</p>
						@elseif (Request::is('preguntasencuestas/*'))
							<p>Aquí puedes ver todas las preguntas de la encuesta elegida.</p>
						@elseif (Request::is('crearpreguntaencuesta/*'))
							<p>Rellena los datos necesarios para añadir una nueva pregunta.</p>
						@endif
					</div>
					<i class="icofont icofont-traffic-light"></i>
				@endif
			</div>
		</div>
		@if (!Request::is('login') && auth()->user()->tipousuario == 1)
			<div class="row">
				<div class="text-center col-12 mb-20">
					@if (Request::is('usuarios') || Request::is('inicio')
					|| Request::is('servicios')
					|| Request::is('encuestas')
					|| Request::is('clasespracticas')
					|| Request::is('pagos')
					|| Request::is('fotos')
					|| Request::is('tests'))
					<div class="gallery-filter-quintamarcha text-center">
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrarusuarios') }}">usuarios</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrarservicios') }}">servicios</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrarpagos') }}">pagos</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrarclases') }}">clases</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrarfotos') }}">fotos</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrarencuestas') }}">encuestas</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrartests') }}">test</a>
					</div>
					@endif
				</div>
			</div>
		@elseif(!Request::is('login') && auth()->user()->tipousuario != 1)
			<div class="row">
				<div class="text-center col-12 mb-20">
					@if (Request::is('usuarios') || Request::is('inicio')
					|| Request::is('servicios')
					|| Request::is('encuestas')
					|| Request::is('clasespracticas')
					|| Request::is('pagos')
					|| Request::is('fotos')
					|| Request::is('tests'))
					<div class="gallery-filter-quintamarcha text-center">
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.misdatos') }}">mis datos</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mistest') }}">mis test</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mistest') }}">mis clases</a>
					</div>
					@endif
				</div>
			</div>
		@endif
		<div class="row">
			<div class="col">
				@if (session()->has('respuesta-negativa'))
                    <div class="alert alert-danger text-center">
                        {{ session('respuesta-negativa') }}
                    </div>
                @endif
				<div class="tab-content">
					<main class="py-4">
						@yield('contenido')
					</main>
				</div>
			</div>
		</div>
	</div>
</div>
