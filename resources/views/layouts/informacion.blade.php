<!-- Area de información
============================================ -->
<div id="course-area" class="course-area bg-gray pt-90 pb-60">
	@if (Request::is('/') || Request::is('info-servicios'))
	<div class="container">
		<!-- Sección de título -->
		<div class="row">
			<div class="section-title text-center col-12 mb-45">
				<h3 class="heading">servicios</h3>
				<div class="excerpt">
					<p>Información sobre los servicios básicos, profesionales, cursos y titulaciones.</p>
				</div>
				<i class="icofont icofont-traffic-light"></i>
			</div>
		</div>
		<!-- Contenedor de los cursos -->
		<div class="course-wrapper row">
			<div class="col-md-3 col-sm-6 col-12 mb-30 fix">
			<div class="course-item text-center">
				<i class="icofont icofont-car-alt-4"></i>
				<h4>básicos</h4>
				{{-- <p>Más información.</p> --}}
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-12 mb-30 fix">
			<div class="course-item text-center">
				<i class="icofont icofont-ambulance-cross"></i>
				<h4>profesionales</h4>
				{{-- <p>Más información.</p> --}}
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-12 mb-30 fix">
			<div class="course-item text-center">
				<i class="icofont icofont-book-alt"></i>
				<h4>cursos</h4>
				{{-- <p>Más información.</p> --}}
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-12 mb-30 fix">
			<div class="course-item text-center">
				<i class="icofont icofont-certificate-alt-1"></i>
				<h4>titulaciones</h4>
				{{-- <p>Más información.</p> --}}
			</div>
		</div>
	</div>
</div>
	{{-- @elseif(Request::is('info-servicios'))
		<div class="container">
			<!-- Sección de título -->
			<div class="row">
				<div class="section-title text-center col-12 mb-45">
					<h3 class="heading">servicios</h3>
					<div class="excerpt">
						<p>Información sobre los distintos servicios que ofrecemos.</p>
					</div>
					<i class="icofont icofont-traffic-light"></i>
				</div>
			</div>
			<div class="panel-group" id="accordion" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="text-center">
							@if (!$basicos->isEmpty())
								<a class="btn color wow fadeInLeft mb-10" role="button" data-toggle="collapse" data-parent="#accordion" href="#basicos" aria-expanded="true" aria-controls="basicos">básicos</a>
							@endif
							@if (!$profesionales->isEmpty())
								<a class="btn color wow fadeInLeft mb-10" role="button" data-toggle="collapse" data-parent="#accordion" href="#profesionales">profesionales</a>
							@endif
							@if (!$cursos->isEmpty())
								<a class="btn color wow fadeInLeft mb-10" role="button" data-toggle="collapse" data-parent="#accordion" href="#cursos">cursos</a>
							@endif
							@if (!$titulaciones->isEmpty())
								<a class="btn color wow fadeInLeft mb-10" role="button" data-toggle="collapse" data-parent="#accordion" href="#titulos">títulos</a>
							@endif
							@if (!$bonos->isEmpty())
								<a class="btn color wow fadeInLeft mb-10" role="button" data-toggle="collapse" data-parent="#accordion" href="#bonos" aria-expanded="true" aria-controls="bonos">bonos</a>
							@endif
						</div>
					</div>
					@if (!$basicos->isEmpty())
						<div id="basicos" class="panel-collapse collapse" data-parent="#accordion">
							<div class="text-center">
								@foreach ($basicos as $basico)
									<a class="btn color mb-10" data-toggle="collapse" href="#{{ Str::slug($basico->descripcion) }}" role="button" aria-expanded="true" aria-controls="{{ Str::slug($basico->descripcion) }}">{{ $basico->descripcion }}</a>
								@endforeach
							</div>
						</div>
					@endif
					@if (!$profesionales->isEmpty())
						<div id="profesionales" class="panel-collapse collapse" data-parent="#accordion">
							<div class="text-center">
								@foreach ($profesionales as $profesional)
									<a class="btn color mb-10" data-toggle="collapse" href="#{{ Str::slug($profesional->descripcion) }}" role="button" aria-expanded="true" aria-controls="{{ Str::slug($profesional->descripcion) }}">{{ $profesional->descripcion }}</a>
								@endforeach
							</div>
						</div>
					@endif
					@if (!$cursos->isEmpty())
						<div id="cursos" class="panel-collapse collapse" data-parent="#accordion">
							<div class="text-center">
								@foreach ($cursos as $curso)
									<a class="btn color mb-10" data-toggle="collapse" href="#{{ Str::slug($curso->descripcion) }}" role="button" aria-expanded="true" aria-controls="{{ Str::slug($curso->descripcion) }}">{{ $curso->descripcion }}</a>
								@endforeach
							</div>
						</div>
					@endif
					@if (!$titulaciones->isEmpty())
						<div id="titulaciones" class="panel-collapse collapse" data-parent="#accordion">
							<div class="text-center">
								@foreach ($titulaciones as $titulo)
									<a class="btn color mb-10" data-toggle="collapse" href="#{{ Str::slug($titulo->descripcion) }}" role="button" aria-expanded="true" aria-controls="{{ Str::slug($titulo->descripcion) }}">{{ $titulo->descripcion }}</a>
								@endforeach
							</div>
						</div>
					@endif
					@if (!$bonos->isEmpty())
						<div id="bonos" class="panel-collapse collapse" data-parent="#accordion">
							<div class="text-center">
								@foreach ($bonos as $bono)
									<a class="btn color mb-10" data-toggle="collapse" href="#{{ Str::slug($bono->descripcion) }}" role="button" aria-expanded="true" aria-controls="{{ Str::slug($bono->descripcion) }}">{{ $bono->descripcion }}</a>
								@endforeach
							</div>
						</div>
					@endif
				</div> 
			</div> 
			@foreach ($servicios as $servicio)
				<div class="row">
					<div class="col" id="accordion2">
						<div class="collapse multi-collapse" data-parent="#accordion2" aria-labelledby="headingOne" id="{{ Str::slug($servicio->descripcion) }}">
							<div class="card card-body">
								<p>{{ $servicio->tipo_servicio }}</p>
								<p>{{ $servicio->nombre_servicio }}</p>
								<p>{{ $servicio->descripcion }}</p>
								@if ($servicio->texto1)
									<p>{{ $servicio->texto1 }}</p>	
								@endif
								@if ($servicio->texto2)
									<p>{{ $servicio->texto2 }}</p>	
								@endif
								@if ($servicio->texto3)
									<p>{{ $servicio->texto3 }}</p>	
								@endif
								@if ($servicio->texto4)
									<p>{{ $servicio->texto4 }}</p>	
								@endif
								@if ($servicio->texto5)
									<p>{{ $servicio->texto5 }}</p>	
								@endif
								@if ($servicio->texto6)
									<p>{{ $servicio->texto6 }}</p>	
								@endif
								@if ($servicio->texto7)
									<p>{{ $servicio->texto7 }}</p>	
								@endif
								@if ($servicio->texto8)
									<p>{{ $servicio->texto8 }}</p>	
								@endif
								@if ($servicio->clases)
									<p>{{ $servicio->clases }}</p>	
								@endif
								<p>{{ $servicio->precio }}</p>
								<p>{{ $servicio->precioiva }}</p>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div> --}}
	@endif
</div>
@if (Request::is('info-servicios'))
	<div class="demo-content bg-white pt-90 pb-60">
		<div class="container">
			<div class="row">
			<div class="section-title text-center col-12 mb-45">
				<h3 class="heading servicio"></h3>
				<div class="excerpt servicio">
					<p>Pasa el ratón sobre los iconos de arriba para saber qué oferta se ajusta más a tus necesidades.</p>
				</div>
				<i class="icofont icofont-traffic-light"></i>
			</div>
		</div>
			<!-- Section Title -->
			<div class="row">		
				@foreach ($servicios as $servicio)
				<div class="col-sm-4 col-12 mb-30 permisos {{ Str::slug($servicio->tipo_servicio) }}">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header servicio">
									<h2>{{ $servicio->nombre_servicio }}</h2>
									<p class="lead">{{ $servicio->descripcion }}</p>
								</div>
								<div class="card-body servicios">
									<ul>
										@if ($servicio->texto1)
											<li>{{ $servicio->texto1 }}</li>	
										@endif
										@if ($servicio->texto2)
											<li>{{ $servicio->texto2 }}</li>	
										@endif
										@if ($servicio->texto3)
											<li>{{ $servicio->texto3 }}</li>	
										@endif
										@if ($servicio->texto4)
											<li>{{ $servicio->texto4 }}</li>	
										@endif
										@if ($servicio->texto5)
											<li>{{ $servicio->texto5 }}</li>	
										@endif
										@if ($servicio->texto6)
											<li>{{ $servicio->texto6 }}</li>	
										@endif
										@if ($servicio->texto7)
											<li>{{ $servicio->texto7 }}</li>	
										@endif
										@if ($servicio->texto8)
											<li>{{ $servicio->texto8 }}</li>	
										@endif
										@if ($servicio->clases > 0)	
											<li>{{ $servicio->clases }} clases prácticas.</li>
										@endif
									</ul>
								</div>
								<div class="card-footer servicio">
									<p>Precio sin IVA: {{ $servicio->precio }}€</p>
									<p class="text-danger">PRECIO TOTAL: {{ (int) $servicio->precioiva }}€</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@endif
@push('scripts')
  <script src="/js/quintamarcha.js"></script>
  <script>
    $(window).on("load", function() {
        infoPermisos();
    });
  </script>
@endpush


