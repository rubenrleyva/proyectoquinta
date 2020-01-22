<!-- Area de comentarios
============================================ -->
@if (isset($usuarios) && ($comentarios->count() > 0))
<div id="testimonial-area" class="testimonial-area overlay overlay-white overlay-80 text-center pt-90 pb-90">
	<div class="container">
		<div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <!-- Slider fotos comentarios -->
				<div class="ti-slider mb-40">
                    @foreach($usuarios as $usuario)
                        @if ($usuario->comentario)
                            <div class="single-slide"><div class="image fix"><img src="{{ $usuario->foto->url_foto }}" alt="" /></div>
                        @endif
                    @endforeach
				</div>
				<!-- Slider comentarios -->
				<div class="tc-slider">
                    @foreach($usuarios as $usuario)
                        @if ($usuario->comentario)
                            <div class="single-slide">
                            <p>{{ $usuario->comentario }}</p>
                            <h5>{{$usuario->name}}</h5>
                            <span>{{ $usuario->trabajo }}</span>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
		</div>
	</div>
	<!-- Slider -->
	<button class="ts-arrows ts-prev"><i class="icofont icofont-caret-left"></i></button>
	<button class="ts-arrows ts-next"><i class="icofont icofont-caret-right"></i></button>
</div>
@endif
