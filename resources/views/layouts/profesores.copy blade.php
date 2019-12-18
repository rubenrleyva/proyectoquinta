<!-- Area de profesores.
============================================ -->
<div id="instructor-area" class="instructor-area bg-gray pt-90 pb-60">
	<div class="container">
		<!-- Sección título -->
		<div class="row">
			<div class="section-title text-center col-12 mb-45">
				<h3 class="heading">Nuestros profesores</h3>
				<div class="excerpt">
					<p>Lorem ipsum dolor sit amet, consectetur maksu rez do eiusmod tempor magna aliqua</p>
				</div>
				<i class="icofont icofont-traffic-light"></i>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-10 col-12 mx-auto">
				<!-- Tabla con contenido del profesor. -->
				@foreach ($usuarios as $usuario)
					@if ($usuario->tipousuario == 1)
				<div class="tab-content">
							<div class="tab-pane fade show @if($usuario->id == 1) active @endif" id="{{ Str::slug($usuario->apellidos) }}">
								<div class="row">
									<div class="instructor-details text-left col-lg-7 col-12">
										<h4 class="instructor-name"> {{ $usuario->name }} {{ $usuario->apellidos }}</h4>
										<h5 class="instructor-title">Clases teóricas y prácticas</h5>
										<p>There are many many variations of passages of Lorem Ipsum available, but the majority have suffered   alteration in some form, by hum domised words which is don't look even slightly believable.There are many many variations of passages of Lorem Ipsum available,but the on majority have suffered   alteration in some form, by hum maksu rez words which is don't look even slightly believable.</p>
										<div class="instructor-social fix">
											<a href="#"><i class="icofont icofont-social-facebook"></i></a>
											<a href="#"><i class="icofont icofont-social-pinterest"></i></a>
											<a href="#"><i class="icofont icofont-social-twitter"></i></a>
											<a href="#"><i class="icofont icofont-social-google-plus"></i></a>
										</div>
									</div>
									<div class="instructor-image col-lg-5 col-md-6 col-12">
										<img src="{{ $usuario->foto->url_foto }}" alt="" />
									</div>
								</div>
							</div>
						</div>
						@endif
					@endforeach
				<!-- Tabla de profesores -->
				<ul class="instructor-tab-list fix">
					@foreach ($usuarios as $usuario)
						@if ($usuario->tipousuario == 1)
							<li class="@if($usuario->id == 1) active @endif"><a href="#{{ Str::slug($usuario->apellidos) }}" data-toggle="tab"><img src="{{ $usuario->foto->url_foto }}" alt="" /></a></li>
						@endif
					@endforeach		
				</ul> 
			</div>
		</div>
	</div>
</div>