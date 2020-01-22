<!-- Area de galería de imágenes
============================================ -->
<div id="gallery-area" class="gallery-area bg pt-90 pb-60">
	<div class="container">
		<!-- Sección título. -->
		<div class="row">
			<div class="section-title text-center col-12 mb-45">
				<h3 class="heading">galería de imágenes</h3>
				<div class="excerpt">
					<p>Lorem ipsum dolor sit amet, consectetur maksu rez do eiusmod tempor magna aliqua</p>
				</div>
				<i class="icofont icofont-traffic-light"></i>
			</div>
		</div>
		<!-- Filtro de galería -->
		<div class="gallery-filter text-center">
			<button class="active" data-filter="*">todo</button>
			<button data-filter=".coches">coches</button>
			<button data-filter=".instalaciones">instalaciones</button>
			<button data-filter=".examenes">exámenes</button>
			<button data-filter=".otras">otras</button>
		</div>
		<!-- Galería de imágenes -->
		<div class="gallery-grid row">
            @if (isset($fotos))
				@foreach ($fotos as $foto)
					@if (($foto->tipo_foto != "estudiantes") && ($foto->tipo_foto != "test"))
						<div class="gallery-item {{ $foto->tipo_foto }} col-lg-3 col-md-4 col-12">
							<a href="{{ $foto->url_foto }}" class="gallery-image image-popup">
								<img src="{{ $foto->url_foto }}" alt="{{ $foto->tipo_foto }}" />
								<div class="content">
									<i class="icofont icofont-search"></i>
									<h4>{{ $foto->texto }}</h4>
								</div>
							</a>
						</div>
					@endif
                @endforeach
            @endif
		</div>
	</div>
</div>
