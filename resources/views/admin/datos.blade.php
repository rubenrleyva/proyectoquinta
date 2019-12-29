<!-- Area de datos de administración
============================================ -->
<div id="instructor-area" class="instructor-area bg-white pt-90 pb-60">
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
					@if (Request::is('editarusuario/*'))
						<h3 class="heading">Estas editando al usuario @if (isset($usuario)){{ $usuario->name }}@endif</h3>
					@elseif (Request::is('crearusuario'))
						<h3 class="heading">Estas creando un nuevo usuario</h3>
					@else
						<h3 class="heading">Eligue una opción entre las que se muestran a continuación</h3>
					@endif
					<div class="excerpt">
						@if (Request::is('inicio'))
							<p>Aquí podrás ver las opciones que tienes</p>
						@elseif (Request::is('usuarios'))
							<p>Aquí podrás ver los usuarios que existen en el sistema</p>
						@elseif (Request::is('crearusuario'))
							<p>Rellena los datos necesarios para crear un nuevo usuario</p>
						@elseif (Request::is('editarusuario/*'))
							<p>Rellena los datos necesarios para editar el usuario</p>
						@elseif (Request::is('permisos'))
							<p>Aquí podrás ver los permisos que existen en el sistema.</p>
						@elseif (Request::is('crearformacion'))
							<p>Rellena los datos necesarios para crear una nueva formación</p>
						@elseif (Request::is('editarformacion/*'))
							<p>Rellena los datos necesarios para editar la formación</p>
						@elseif (Request::is('encuestas'))
							<p>Aquí podrás ver las encuestas que existen en el sistema.</p>
						@elseif (Request::is('clasespracticas'))
							<p>Aquí podrás ver las clases prácticas que existen en el sistema.</p>
						@elseif (Request::is('pagos'))
							<p>Aquí podrás ver los pagos que existen en el sistema.</p>
						@elseif (Request::is('fotos'))
							<p>Aquí podrás ver las fotos que existen en el sistema.</p>
						@elseif (Request::is('examenes'))
							<p>Aquí podrás ver los exámenes que existen en el sistema.</p>
						@endif
					</div>
					<i class="icofont icofont-traffic-light"></i>
				@endif
			</div>
		</div>
		@if (!Request::is('login'))
			<div class="row">
				<div class="text-center col-12 mb-20">
					@if (Request::is('usuarios') || Request::is('inicio')
					|| Request::is('servicios')
					|| Request::is('encuestas')
					|| Request::is('clasespracticas')
					|| Request::is('pagos')
					|| Request::is('fotos')
					|| Request::is('examenes'))
						<!-- Opciones -->
					<div class="gallery-filter-quintamarcha text-center">
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrarusuarios') }}">usuarios</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrarservicios') }}">servicios</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrarencuestas') }}">encuestas</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrarclases') }}">clases</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrarclases') }}">pagos</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrarfotos') }}">fotos</a>
						<a class="btn color wow fadeInLeft botones-menu mb-10" href="{{ route('admin.mostrarusuarios') }}">exámenes</a>
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
<!-- Area de pie de página
============================================
<div class="footer-area overlay overlay-black overlay-70">
	<div class="container">
		<div class="footer-bottom text-center col-12">
			<p class="copyright">Copyright Autoescuela QuintaMarcha -<i class="fa fa-copyright"></i> Desde el 2005 - Todos los derechos reservados - Desarrollado por <a href="https://rubenrleyva.dev/" target="_blank" >RubenRLeyva.dev</a> </p>
		</div>
	</div>
</div> -->
